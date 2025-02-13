<div data-hs-carousel='{
  "loadingClasses": "opacity-0",
  "dotsItemClasses": "hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500",
  "isAutoPlay": false
}' class="relative">
  <div class="hs-carousel relative overflow-hidden w-full min-h-[600px] bg-white rounded-lg">
    <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
      @foreach ($carouselImages as $image)
      <div class="hs-carousel-slide">
        <div class="flex flex-col space-y-8 lg:space-y-10 justify-center h-full bg-local bg-opacity-50 p-6 dark:bg-neutral-900 bg-center bg-cover relative" style="background-image:url('{{ asset('storage/' . $image->image_path ?? 'default-image.jpg') ?? ('default-image.jpg') }}'); background-repeat:no-repeat">
          <div class="absolute inset-0 bg-black opacity-50"></div>
          <div class="max-w-3xl mx-auto flex flex-col items-center justify-center gap-y-6">
            <span class="self-center font-title font-bold text-white text-3xl text-center lg:text-4xl transition duration-700 dark:text-white z-50">
              {{ $image['title_' . App::getLocale()] ?? 'Title not set' }}
            </span>
            <p class="text-lg lg:text-xl text-gray-50 self-center text-center font-sans z-50">
              {!! $image['description_' . App::getLocale()] ?? 'No description available.' !!}
            </p>
          </div>

          <div class="flex items-center justify-center pt-3 gap-6">
            <a href="{{route('courses')}}" class="group relative inline-flex h-12 items-center justify-center overflow-hidden rounded-md bg-blue-500 px-6 font-medium text-neutral-200 text-lg"><span>View Courses</span></a>
            <a href="{{route('register')}}" role="link" class="relative text-white text-lg bg-[linear-gradient(#262626,#262626),linear-gradient(#3b82f6,#3b82f6)] bg-[length:100%_2px,0_2px] bg-[position:100%_100%,0_100%] bg-no-repeat transition-[background-size] duration-300 hover:bg-[0_2px,100%_2px] inline-flex items-center gap-x-2">Signup free</a>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>

  <button type="button" class="hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 focus:outline-none focus:bg-gray-800/10 rounded-s-lg dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
    <span class="text-2xl" aria-hidden="true">
      <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="m15 18-6-6 6-6"></path>
      </svg>
    </span>
    <span class="sr-only">Previous</span>
  </button>
  <button type="button" class="hs-carousel-next hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 focus:outline-none focus:bg-gray-800/10 rounded-e-lg dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
    <span class="sr-only">Next</span>
    <span class="text-2xl" aria-hidden="true">
      <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="m9 18 6-6-6-6"></path>
      </svg>
    </span>
  </button>

  <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 space-x-2"></div>
</div>
