<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;

use App\Models\Translation;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function index()
    {
        $locales = ['en', 'fr', 'es', 'it']; // Langues disponibles
        $keys = []; // Liste des clés de traduction

        // Étape 1 : Récupérer toutes les clés depuis les fichiers dans le dossier 'lang' à la racine
        foreach ($locales as $locale) {
            $filePath = base_path("lang/{$locale}/messages.php");
            if (file_exists($filePath)) {
                $translationsInFile = include($filePath);
                $keys = array_merge($keys, array_keys($translationsInFile));
            }
        }

        // Supprimer les doublons des clés
        $keys = array_unique($keys);

        // Étape 2 : Organiser les traductions par clé et par locale
        $translations = [];
        foreach ($keys as $key) {
            foreach ($locales as $locale) {
                // Vérifier d'abord dans la base de données
                $translation = Translation::where('key', $key)->where('locale', $locale)->first();
                // Si la traduction n'existe pas en base, récupérer du fichier
                $filePath = base_path("lang/{$locale}/messages.php");
                if (!$translation && file_exists($filePath)) {
                    $translationsInFile = include($filePath);
                    $value = $translationsInFile[$key] ?? '';
                } else {
                    $value = $translation->value ?? '';
                }
                $translations[$key][$locale] = $value;
            }
        }

        return view('backend.translations.index', compact('translations', 'locales'));
    }

    public function update(Request $request)
    {
        if ($request->input('translations')) {
            foreach ($request->input('translations') as $key => $translations) {
                $newKey = $request->input("new_translation_key_{$key}");

                if ($newKey && $newKey !== $key) {
                    // Renommer la clé dans la base de données et dans les fichiers
                    foreach ($translations as $locale => $value) {
                        $translation = Translation::where('key', $key)->where('locale', $locale)->first();
                        if ($translation) {
                            $translation->key = $newKey;
                            $translation->value = $value;
                            $translation->save();
                        } else {
                            // Si la traduction n'existe pas dans la base, la créer avec la nouvelle clé
                            Translation::create([
                                'key' => $newKey,
                                'locale' => $locale,
                                'value' => $value,
                            ]);
                        }
                        // Mettre à jour les fichiers de traduction
                        $this->updateTranslationFiles($key, $newKey, [$locale => $value]);
                    }
                } else {
                    // Mise à jour normale des traductions si la clé n'est pas changée
                    foreach ($translations as $locale => $value) {
                        Translation::updateOrCreate(
                            ['key' => $key, 'locale' => $locale],
                            ['value' => $value]
                        );
                        // Mettre à jour les fichiers de traduction
                        $this->updateTranslationFiles($key, null, [$locale => $value]);
                    }
                }
            }
        };
        // Mise à jour des traductions existantes et modification des clés si nécessaire


        // Création de nouvelles clés de traduction
        $newKey = $request->input('new_translation_key');
        if ($newKey) {
            foreach ($request->input('new_translation') as $locale => $value) {
                if ($value) {
                    Translation::create([
                        'key' => $newKey,
                        'locale' => $locale,
                        'value' => $value,
                    ]);
                    // Mise à jour des fichiers pour la nouvelle clé
                    $this->updateTranslationFiles($newKey, null, [$locale => $value]);
                }
            }
        }

        return redirect()->back()->with('ok', 'Translations updated successfully!');
    }

    /**
     * Met à jour les fichiers de traduction.
     *
     * @param string $oldKey Ancienne clé de traduction (ou actuelle si elle n'a pas changé)
     * @param string|null $newKey Nouvelle clé si elle a été modifiée (sinon null)
     * @param array $translations Tableau contenant les traductions par locale
     */
    protected function updateTranslationFiles($oldKey, $newKey = null, $translations)
    {
        foreach ($translations as $locale => $value) {
            $path = base_path('lang/' . $locale . '/messages.php');

            if (file_exists($path)) {
                $translationsArray = include($path);

                // Si la clé a changé, on supprime l'ancienne et ajoute la nouvelle
                if ($newKey && isset($translationsArray[$oldKey])) {
                    unset($translationsArray[$oldKey]);
                }

                // Mettre à jour la nouvelle clé ou la clé existante
                $translationsArray[$newKey ?? $oldKey] = $value;

                // Sauvegarder les changements dans le fichier
                file_put_contents($path, '<?php return ' . var_export($translationsArray, true) . ';');
            } else {
                // Si le fichier n'existe pas, on le crée avec la nouvelle traduction
                $translationsArray = [$newKey ?? $oldKey => $value];
                file_put_contents($path, '<?php return ' . var_export($translationsArray, true) . ';');
            }
        }
    }
}
