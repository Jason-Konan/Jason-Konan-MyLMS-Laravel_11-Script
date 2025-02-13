<section class="px-10 py-8 lg:px-20 lg:py-16 my-10">
  <div class="container mx-auto">
    <!-- Section Block -->
    <div class="mb-10 flex flex-wrap items-center justify-between gap-8 lg:mb-[60px]" data-aos="fade-up">
      <div class="max-w-xl">
        <span class="mb-5 block text-md uppercase dark:text-gray-300">
          {{ __('course_categories') }}
        </span>
        <h2 class="text-3xl font-bold dark:text-white">
          {{ __('top_categories_to_learn') }}
        </h2>
      </div>

      <div class=" inline-block">
        <a class="group relative inline-flex h-14 items-center justify-center overflow-hidden bg-indigo-600 px-10 py-3 font-medium text-neutral-200 duration-500 rounded-full shadow-md hover:shadow-lg">
          <!-- Texte principal -->
          <span class="relative z-10 group-hover:pr-2 pr-6 transition-transform group-hover:translate-x-6">
            {{ __('find_courses') }}

          </span>

          <!-- Flèche gauche -->
          <div class="absolute left-0 transform opacity-0 transition-all group-hover:translate-x-2 group-hover:opacity-100 rounded-full p-2 bg-slate-50">
            <x-lucide-arrow-right class="text-yellow-500 size-6" />
          </div>

          <!-- Flèche droite -->
          <div class="absolute right-2 transform opacity-100 transition-all group-hover:translate-x-3 group-hover:opacity-0 rounded-full p-2 bg-slate-50">
            <x-lucide-arrow-right class="text-yellow-500 size-6" />
          </div>
        </a>
      </div>
    </div>
    <!-- Section Block -->

    <!-- Course Category List -->
    <ul class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
      <!-- Course Category Item -->
      @forelse($categories as $category)
      <li class="">
        <a href="course-1.html" class="flex items-center gap-6 rounded-[100px] bg-white p-[10px] transition-all duration-300 hover:shadow-lg" data-aos="zoom-in">
          <div class="inline-flex h-[72px] w-[72px] items-center justify-center rounded-[50%] bg-[#DE1EF9]/10">
            <img src="{{ str_starts_with($category->image, 'http') ? $category->image : asset('storage/' . $category->image) }}" alt="category-icon-1" width="30" height="30" />
          </div>
          <div class="flex-1">
            <span class="mb-1 block font-title text-xl font-bold text-colorBlackPearl">{{$category->name}}</span>
            <span class="text-sm">{{$category->courses->count()}} Courses</span>
          </div>
        </a>
      </li>
      @empty
      <p class="text-3xl font-medium text-center">No categories Found</p>
      @endforelse


      <!-- Course Category Item -->
    </ul>
    <!-- Course Category List -->
  </div>
</section>
<!--...::: Course Category Section End :::... -->
