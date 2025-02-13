  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
      <!-- Category: Development -->
      @foreach ($categories as $category)
          <div
              class="bg-slate-100 shadow-lg rounded-lg p-6 transition hover:bg-blue-600 hover:text-white group text-center transform hover:scale-105 duration-300 ease-in-out ">
              <div>
                  <h3 class="text-xl font-semibold group-hover:text-white">{{ $category->name }}</h3>
                  <p class="md:text-xs text-sm group-hover:text-white">{{ $category->description }}</p>
              </div>
          </div>
      @endforeach


  </div>
