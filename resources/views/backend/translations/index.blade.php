<x-admin-layout title="Translations">
    <form method="POST" action="{{ route('translations.update') }}" class="space-y-4">
        @csrf
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="text-left">Key</th>
                    @foreach ($locales as $locale)
                        <th class="text-left">{{ strtoupper($locale) }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                {{-- Existant --}}
                @foreach ($translations as $key => $translationGroup)
                    <tr>
                        <td>
                            <input type="text" name="new_translation_key_{{ $key }}"
                                value="{{ $key }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </td>
                        @foreach ($locales as $locale)
                            <td>
                                <input type="text" name="translations[{{ $key }}][{{ $locale }}]"
                                    value="{{ $translationGroup[$locale] ?? '' }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </td>
                        @endforeach
                    </tr>
                @endforeach

                {{-- Nouvelle clé --}}
                <tr>
                    <td>
                        <input type="text" name="new_translation_key" placeholder="New Key"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </td>
                    @foreach ($locales as $locale)
                        <td>
                            <input type="text" name="new_translation[{{ $locale }}]"
                                placeholder="{{ strtoupper($locale) }} translation"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </td>
                    @endforeach
                </tr>
            </tbody>
        </table>

        <div class="flex justify-end">
            <button type="submit"
                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600
            py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none
            focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Save
            </button>
        </div>
    </form>

</x-admin-layout>
