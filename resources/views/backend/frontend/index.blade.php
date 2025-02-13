<x-admin-layout title="Frontend Settings">
  <div class="flex items-center justify-center bg-blue-600 dark:bg-sky-500/50 h-64">
    <h1 class="text-3xl lg:text-4xl text-white font-bold mb-5">{{__("Section Settings")}} </h1>
  </div>

  <div class="container mx-auto p-6">
    <!-- Gérer les Sections -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
      <table class="table-auto w-full border-collapse">
        <thead>
          <tr class="bg-gray-100">
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">{{ __('Name') }}</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">{{ __('Status') }}</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">{{ __('Action') }}</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">{{ __('Template Name') }}</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($sections as $section)
          <tr class="border-b">
            <td class="px-4 py-2 text-sm text-gray-800">{{ $section->name }}</td>
            <td class="px-4 py-2 text-sm {{ $section->is_active ? 'text-green-600' : 'text-red-600' }}">
              {{ $section->is_active ? 'Active' : 'Inactive' }}
            </td>
            <td class="px-4 py-2 text-sm">
              <form action="{{ route('admin.sections.toggle', $section->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="px-4 py-2 text-white {{ $section->is_active ? 'bg-red-500 hover:bg-red-600' : 'bg-green-500 hover:bg-green-600' }} rounded-md focus:outline-none">
                  {{ $section->is_active ? 'Désactiver' : 'Activer' }}
                </button>
              </form>
            </td>
            <td>{{$section->template_path}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!-- Gérer le Carousel -->
  <div class="container mx-auto p-6 mt-10">
    <h2 class="text-3xl font-semibold mb-6">{{ __('Manage Carousel') }}</h2>

    <!-- Formulaire d'ajout d'image -->
    <form action="{{ route('admin.carousel.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 max-w-3xl mx-auto">
      @csrf
      <x-input type="file" name="image" id="image" label="{{ __('Carousel Image') }}" />

      <x-input type="text" name="title_fr" id="title_fr" value="{{ old('title_fr') }}" label="{{ __('Title in French') }}" placeholder="{{ __('Title in French') }}" />
      <x-input type="text" name="title_en" id="title_en" value="{{ old('title_en') }}" label="{{ __('Title in English') }}" placeholder="{{ __('Title in English') }}" />
      <x-input type="text" name="title_es" id="title_es" value="{{ old('title_es') }}" label="{{ __('Title in Spanish') }}" placeholder="{{ __('Title in Spanish') }}" />
      <x-input type="text" name="title_it" id="title_it" value="{{ old('title_it') }}" label="{{ __('Title in Italian') }}" placeholder="{{ __('Title in Italian') }}" />

      <div>
        <label for="description_fr" class="block text-sm font-medium text-gray-700 dark:text-white mb-2">
          {{ __('Description in French') }}
        </label>
        <textarea name="description_fr" id="description_fr" rows="3" class="mt-2 p-2 border border-gray-300 rounded-md w-full">
        {{ old('description_fr') }}
        </textarea>
      </div>
      <div>
        <label for="description_en" class="block text-sm font-medium text-gray-700 dark:text-white mb-2">
          {{ __('Description in English') }}
        </label>
        <textarea name="description_en" id="description_en" rows="3" class="mt-2 p-2 border border-gray-300 rounded-md w-full">
        {{ old('description_en') }}
        </textarea>
      </div>
      <div>
        <label for="description_es" class="block text-sm font-medium text-gray-700 dark:text-white mb-2">
          {{ __('Description in Spanish') }}
        </label>
        <textarea name="description_es" id="description_es" rows="3" class="mt-2 p-2 border border-gray-300 rounded-md w-full">
        {{ old('description_es') }}
        </textarea>
      </div>
      <div>
        <label for="description_it" class="block text-sm font-medium text-gray-700 dark:text-white mb-2">
          {{ __('Description in Italian') }}
        </label>
        <textarea name="description_it" id="description_it" rows="3" class="mt-2 p-2 border border-gray-300 rounded-md w-full">
        {{ old('description_it') }}
        </textarea>
      </div>

      <input type="text" name="section" value="hero-section" class="hidden">

      <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
        {{ __('Add Image') }}
      </button>
    </form>




    <!-- Affichage des images -->
    <div class="mt-10">
      <h2 class="text-2xl font-semibold mb-4">{{ __('Carousel Images') }}</h2>


      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($images as $image)
        <div class="relative bg-white rounded-lg shadow-lg overflow-hidden group">
          <!-- Image -->
          <img src="{{ asset('storage/' . $image->image_path) }}" alt="Image" class="w-full h-60 object-cover  transition duration-300">

          <!-- Contenu -->
          <div class="p-4 space-y-2">
            <h3 class="text-lg font-semibold text-gray-800"> {{ $image['title_' . App::getLocale()] ?? 'Title not set' }}</h3>
            <p class="text-sm text-gray-600">{!! $image['description_' . App::getLocale()] ?? 'No description available.' !!}</p>
          </div>

          <!-- Actions -->
          <div class="absolute top-2 right-2 flex gap-2">
            <!-- Modifier les textes -->
            <button type="button" class="p-2 " aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-scale-animation-{{ $image->id }}l" data-hs-overlay="#hs-scale-animation-{{ $image->id }}">
              <x-lucide-pencil-line class="text-blue-600 size-7" />
            </button>

            <!-- Supprimer l'image -->
            <form action="{{ route('admin.carousel.destroy', $image->id) }}" method="POST" class="p-2">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-red-800 hover:text-red-600 focus:outline-none">
                <x-lucide-trash-2 class="size-7" />
              </button>
            </form>
          </div>
        </div>
        <div id="hs-scale-animation-{{ $image->id }}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-scale-animation-{{ $image->id }}-label">
          <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
            <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
              <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                <h3 id="hs-scale-animation-{{ $image->id }}-label" class="font-bold text-gray-800 dark:text-white">
                  Modifier les Textes
                </h3>
                <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-scale-animation-{{ $image->id }}">
                  <span class="sr-only">Close</span>
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                  </svg>
                </button>
              </div>
              <div class="p-4 overflow-y-auto">
                <form action="{{ route('admin.carousel.update', $image->id) }}" method="POST" class="space-y-4">
                  @csrf
                  @method('PUT')

                  <!-- Champ pour le titre en Français -->
                  <x-input type="text" name="title_fr" id="title_fr" value="{{ $image->title_fr ?? old('title_fr') }}" label="Titre en Français" placeholder="Titre en Français" />
                  <!-- Description en Français -->
                  <div>
                    <label for="description_fr" class="block text-sm font-medium text-gray-700 dark:text-white">Description en Français</label>
                    <textarea name="description_fr" id="description_fr" rows="3" class="mt-2 p-2 border border-gray-300 rounded-md w-full">
                    {{ $image->description_fr ?? old('description_fr') }}
                    </textarea>
                  </div>


                  <!-- Champ pour le titre en Anglais -->
                  <x-input type="text" name="title_en" id="title_en" value="{{ $image->title_en ?? old('title_en') }}" label="Title in English" placeholder="Title in English" />
                  <!-- Description en Anglais -->
                  <div>
                    <label for="description_en" class="block text-sm font-medium text-gray-700 dark:text-white">Description in English</label>
                    <textarea name="description_en" id="description_en" rows="3" class="mt-2 p-2 border border-gray-300 rounded-md w-full">
                    {{ $image->description_en ?? old('description_en') }}
                    </textarea>
                  </div>
                  <!-- Champ pour le titre en Espagnol -->
                  <x-input type="text" name="title_es" id="title_es" value="{{ $image->title_es ?? old('title_es') }}" label="Título en Español" placeholder="Título en Español" />
                  <!-- Description en Espagnol -->
                  <div>
                    <label for="description_es" class="block text-sm font-medium text-gray-700 dark:text-white">Descripción en Español</label>
                    <textarea name="description_es" id="description_es" rows="3" class="mt-2 p-2 border border-gray-300 rounded-md w-full">
                    {{ $image->description_es ?? old('description_es') }}
                    </textarea>
                  </div>


                  <!-- Champ pour le titre en Italien -->
                  <x-input type="text" name="title_it" id="title_it" value="{{ $image->title_it ?? old('title_it') }}" label="Titolo in Italiano" placeholder="Titolo in Italiano" />
                  <!-- Description en Italien -->
                  <div>
                    <label for="description_it" class="block text-sm font-medium text-gray-700 dark:text-white">Descrizione in Italiano</label>
                    <textarea name="description_it" id="description_it" rows="3" class="mt-2 p-2 border border-gray-300 rounded-md w-full">
                    {{ $image->description_it ?? old('description_it') }}
                    </textarea>
                  </div>

                  <!-- Boutons -->
                  <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                    <!-- Bouton Fermer -->
                    <button type="button" class="py-2 px-3 text-sm font-medium rounded-lg border bg-white text-gray-800 hover:bg-gray-50 focus:outline-none dark:bg-neutral-800 dark:text-white" data-hs-overlay="#hs-scale-animation-{{ $image->id }}">
                      Fermer
                    </button>

                    <!-- Bouton Sauvegarder -->
                    <button type="submit" class="py-2 px-3 text-sm font-medium rounded-lg border bg-blue-600 text-white hover:bg-blue-700 focus:outline-none">
                      Sauvegarder les modifications
                    </button>
                  </div>
                </form>
              </div>


            </div>
          </div>
        </div>


        @endforeach
      </div>
    </div>
  </div>

  <div class="container mx-auto px-6 py-8">
    <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">{{ __('Manage FAQ') }}</h2>
    <button type="button" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" data-hs-overlay="#hs-subscription-with-image">
      {{ __('Add a Question') }}
    </button>



    <div id="hs-subscription-with-image" class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
      <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
        <div class="relative flex flex-col bg-white shadow-xl rounded-2xl dark:bg-gray-800 p-6 max-w-2xl mx-auto">
          <!-- Bouton de fermeture -->
          <button type="button" class="absolute top-3 right-0 inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 transition" data-hs-overlay="#hs-subscription-with-image">
            <span class="sr-only">Fermer</span>
            <svg class="w-4 h-4 text-gray-700 dark:text-gray-300" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill="currentColor" d="M0.258 1.007a.65.65 0 0 1 .964 0L3.612 3.653 6.258 1.007a.65.65 0 1 1 .924.923L4.536 4.576l2.646 2.647a.65.65 0 1 1-.924.923L3.612 5.499.965 8.146a.65.65 0 1 1-.923-.923l2.646-2.647-2.646-2.647a.65.65 0 0 1 0-.922z" />
            </svg>
          </button>

          <!-- Contenu du formulaire -->
          <div class="w-full">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">{{ __('Ajouter une Question') }}</h2>

            <form action="{{ route('admin.faqs.store') }}" method="POST">
              @csrf
              <!-- Champ Question -->
              <div class="mb-5">
                <label class="block text-gray-600 dark:text-gray-300 text-sm font-medium mb-2">{{ __('Question') }}</label>
                <input type="text" name="question" value="{{ old('question') }}" required class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-200">
                @error('question')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>

              <!-- Champ Réponse -->
              <div class="mb-5">
                <label class="block text-gray-600 dark:text-gray-300 text-sm font-medium mb-2">{{ __('Réponse') }}</label>
                <textarea name="answer" required rows="4" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-200">{{ old('answer') }}</textarea>
                @error('answer')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>

              <!-- Boutons d'action -->
              <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.faqs.index') }}" class="px-5 py-2.5 bg-gray-400 hover:bg-gray-500 text-white text-sm font-medium rounded-lg transition duration-300">
                  {{ __('Annuler') }}
                </a>
                <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition duration-300">
                  {{ __('Ajouter') }}
                </button>
              </div>
            </form>
          </div>
        </div>


      </div>
    </div>
  </div>


  <div class="overflow-x-auto mt-6">
    <table class="w-full border border-gray-300 shadow-md rounded-lg overflow-hidden">
      <thead class="bg-gray-200 dark:bg-gray-700">
        <tr class="text-left text-gray-700 dark:text-gray-200">
          <th class="py-3 px-4">{{ __('Question') }}</th>
          <th class="py-3 px-4">{{ __('Answer') }}</th>
          <th class="py-3 px-4 text-center">{{ __('Actions') }}</th>
        </tr>


      </thead>
      <tbody class="divide-y divide-gray-300 dark:divide-gray-700">
        @foreach ($faqs as $faq)
        <tr class="bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200">
          <td class="py-3 px-4 text-gray-900 dark:text-gray-200">{{ $faq->question }}</td>
          <td class="py-3 px-4 text-gray-700 dark:text-gray-300">{{ $faq->answer }}</td>
          <td class="py-3 px-4 flex justify-center space-x-3">
            <!-- Bouton pour ouvrir le modal -->
            <button type="button" class=" py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="modal-{{ $faq->id }}" data-hs-overlay="#modal-{{ $faq->id }}">

              {{__("Edit")}}
            </button>

            <!-- MODAL UNIQUE POUR CHAQUE FAQ -->
            <div id="modal-{{ $faq->id }}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="modal-title-{{ $faq->id }}">
              <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                  <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                    <h3 id="modal-title-{{ $faq->id }}" class="font-bold text-gray-800 dark:text-white">
                      {{__("Edit Question")}}
                    </h3>
                    <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#modal-{{ $faq->id }}">
                      <span class="sr-only">Fermer</span>
                      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                      </svg>
                    </button>
                  </div>
                  <div class="p-4 overflow-y-auto">
                    <div class="max-w-3xl mx-auto bg-white rounded-lg p-6">
                      <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                          <label class="block text-gray-600 text-sm font-medium mb-2"> {{__("Question")}} </label>
                          <input type="text" name="question" value="{{ old('question', $faq->question) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none">
                          @error('question')
                          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                          @enderror
                        </div>

                        <div class="mb-4">
                          <label class="block text-gray-600 text-sm font-medium mb-2"> {{__("Answer")}} </label>
                          <textarea name="answer" required rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none">{{ old('answer', $faq->answer) }}</textarea>
                          @error('answer')
                          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                          @enderror
                        </div>
                        <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                          <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#modal-{{ $faq->id }}">
                            Annuler
                          </button>
                          <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            {{__("Save")}}
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Bouton de suppression -->
            <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette question ?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-sm font-semibold py-2 px-3 rounded-md shadow-md transition duration-300">
                {{__("Delete")}}
              </button>
            </form>
          </td>
        </tr>
        @endforeach


      </tbody>
    </table>
  </div>
  </div>




</x-admin-layout>
