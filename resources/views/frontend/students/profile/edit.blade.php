<x-default-layout title="My Profile">
    <div class="bg-blue-500 py-8 mt-8 ">
        <h2
            class="text-2xl md:text-3xl text-center font-title font-semibold leading-tight text-white dark:text-gray-200 w-full">
            {{ __('Student Profile') }}
        </h2>
    </div>

    <div class="flex flex-wrap py-8 md:py-12 lg:py-20 md:px-8">
        <div class="border-e border-gray-200 dark:border-neutral-700">
            <nav class="flex flex-col space-y-2" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                <button type="button"
                    class="hs-tab-active:border-blue-500 hs-tab-active:text-blue-600 font-title dark:hs-tab-active:text-blue-600 py-1 pe-4 inline-flex items-center gap-x-2 border-e-2 border-transparent hs-tab-active:text-base whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500 active"
                    id="vertical-tab-with-border-profile-infos" aria-selected="true"
                    data-hs-tab="#vertical-tab-with-border-1" aria-controls="vertical-tab-with-border-1" role="tab">
                    Profile Infos
                </button>
                <button type="button"
                    class="hs-tab-active:border-blue-500 hs-tab-active:text-blue-600 dark:hs-tab-active:text-blue-600 py-1 pe-4 inline-flex items-center gap-x-2 border-e-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500"
                    id="vertical-tab-with-border-security" aria-selected="false"
                    data-hs-tab="#vertical-tab-with-border-2" aria-controls="vertical-tab-with-border-2" role="tab">
                    Security
                </button>
                <button type="button"
                    class="hs-tab-active:border-blue-500 hs-tab-active:text-blue-600 dark:hs-tab-active:text-blue-600 py-1 pe-4 inline-flex items-center gap-x-2 border-e-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500"
                    id="vertical-tab-with-border-cart" aria-selected="false" data-hs-tab="#vertical-tab-with-border-3"
                    aria-controls="vertical-tab-with-border-3" role="tab">
                    Cart
                </button>
                <button type="button"
                    class="hs-tab-active:border-blue-500 hs-tab-active:text-blue-600 dark:hs-tab-active:text-blue-600 py-1 pe-4 inline-flex items-center gap-x-2 border-e-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500"
                    id="vertical-tab-with-border-my-courses" aria-selected="false"
                    data-hs-tab="#vertical-tab-with-border-4" aria-controls="vertical-tab-with-border-4" role="tab">
                    My Courses
                </button>
            </nav>
        </div>

        <div class="flex-1 ms-6">
            <div id="vertical-tab-with-border-1" role="tabpanel"
                aria-labelledby="vertical-tab-with-border-profile-infos">
                <div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('frontend.students.profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>
            <div id="vertical-tab-with-border-2" class="hidden" role="tabpanel"
                aria-labelledby="vertical-tab-with-border-security">
                <div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('frontend.students.profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('frontend.students.profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
            <div id="vertical-tab-with-border-3" class="hidden" role="tabpanel"
                aria-labelledby="vertical-tab-with-border-cart">
                <div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
                    <h2 class="text-2xl font-semibold mb-4">Mon Panier</h2>

                    @if ($cartItems->isEmpty())
                    <p class="text-gray-600">Votre panier est vide.</p>
                    @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-700">Cours
                                    </th>
                                    <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-700">Prix</th>
                                    <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-700">Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                <tr class="hover:bg-gray-100">
                                    <td class="px-6 py-4 border-b text-gray-800">{{ $item->course->name }}</td>
                                    <td class="px-6 py-4 border-b text-gray-800">
                                        ${{ number_format($item->course->price, 2) }}</td>
                                    <td class="px-6 py-4 border-b text-gray-800">
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                                Supprimer
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                    <div class="text-right mt-4">
                        <h4 class="text-xl font-semibold">Total général :
                            ${{ number_format($cartItems->sum(function ($item) {return $item->course->price;}),2) }}
                        </h4>
                    </div>
                    @endif
                </div>

            </div>
            <div id="vertical-tab-with-border-4" class="hidden" role="tabpanel"
                aria-labelledby="vertical-tab-with-border-my-courses">
                <!-- Afficher le total de progression -->
                <p class="text-lg font-medium mb-4">
                    Completed Courses: {{ $completedCourses }} / {{ $totalCourses }}
                </p>

                <!-- Tableau des cours -->
                <table class="w-full border-collapse border border-gray-300 bg-white text-left text-sm text-gray-700">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">Course Name</th>
                            <th class="border border-gray-300 px-4 py-2">Category</th>
                            <th class="border border-gray-300 px-4 py-2">Progress</th>
                            <th class="border border-gray-300 px-4 py-2">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($courses->isNotEmpty())
                        @foreach ($courses as $course)
                        <tr>
                            <!-- Nom du cours -->
                            <td class="border border-gray-300 px-4 py-2 font-medium">
                                {{ $course->name }}
                            </td>

                            <!-- Catégorie -->
                            <td class="border border-gray-300 px-4 py-2">
                                @if ($course->categories_for_course)
                                {{ $course->categories_for_course->name }}
                                @else
                                N/A
                                @endif
                            </td>

                            <!-- Progression -->
                            {{-- <td class="border border-gray-300 px-4 py-2">
                                {{ $course->completedLessons }} / {{ $course->totalLessons }}
                                ({{ number_format($course->progress, 1) }}%)
                            </td> --}}
                            <td class="border border-gray-300 px-4 py-2">
                                <div class="w-full bg-gray-200 rounded-full h-4">
                                    <div class="bg-green-300 h-4 rounded-full" style="width: {{ $course->progress }}%;">
                                    </div>
                                </div>
                                <p class="text-sm text-gray-700 mt-1">
                                    {{ $course->completedLessons }} / {{ $course->totalLessons }}
                                    ({{ number_format($course->progress, 1) }}%)
                                </p>
                            </td>

                            <!-- Lien vers les détails -->
                            <td class="border border-gray-300 px-4 py-2">
                                <a href="{{ route('course.show', $course) }}"
                                    class="text-blue-600 font-semibold hover:text-blue-800 hover:underline">
                                    View Details →
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="4" class="border border-gray-300 px-4 py-2 text-center text-gray-500">
                                No courses yet.
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-default-layout>