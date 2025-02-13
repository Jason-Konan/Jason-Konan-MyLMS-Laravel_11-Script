<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Meta Dynamique -->
  <meta name="theme-color" content="#1bb566">
  <meta name="description" content="{{ $page->meta_description ?? ($siteSettings->meta_description ?? 'Default Meta Description') }}">
  <meta name="keywords" content="{{ $page->meta_keywords ?? ($siteSettings->meta_keywords ?? 'default, keywords') }}">
  <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
  <meta name="twitter:site" content="{{ $siteSettings->twitter_link ?? '' }}">
  <meta name="twitter:creator" content="{{ $siteSettings->twitter_username ?? '' }}">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="{{ $page->meta_title ?? ($siteSettings->meta_title ?? ($siteSettings->app_name ?? 'Default Title')) }}">
  <meta name="twitter:description" content="{{ $page->meta_description ?? ($siteSettings->meta_description ?? 'Default Description') }}">
  <meta name="twitter:image" content="{{ asset($siteSettings->twitter_image ?? 'default-image.jpg') }}">

  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:locale" content="en_US">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="{{ $siteSettings->app_name ?? 'Default Site Name' }}">
  <meta property="og:title" content="{{ $page->meta_title ?? ($siteSettings->meta_title ?? 'Default Title') }}">
  <meta property="og:description" content="{{ $page->meta_description ?? ($siteSettings->meta_description ?? 'Default Description') }}">
  <meta property="og:image" content="{{ asset($siteSettings->og_image ?? 'default-image.jpg') }}">

  <!-- Titre Dynamique -->
  <title>
    @if (isset($page))
    {{ $page->name }}
    @else
    @yield('title')
    @endif
  </title>

  <!-- Favicon -->
  <link rel="icon" href="{{ asset('storage/' . ($siteSettings->favicon ?? 'favicon.ico')) }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('build/assets/app-BZrNzzmQ.css') }}">

  <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('css/all.min.css') }}"> --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <!-- Styles -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/swiper.min.css')}}">


  {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
  <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
</head>


<body class="bg-gray-50 transition-all duration-300 lg:hs-overlay-layout-open:ps-[260px] dark:bg-neutral-900">
  <div class="hidden">
    <div id="loading-spinner" class=" fixed inset-0 flex items-center justify-center bg-gray-200 bg-opacity-90 z-50">
      <div class="w-16 h-16 border-4 border-orange-500 border-t-transparent border-solid rounded-full animate-spin"></div>
    </div>
  </div>

  @if (!empty($siteSettings->seo_google_tag_manager))
  {!! $siteSettings->seo_google_tag_manager !!}
  @endif
  @include('components.flash-messages')
  @yield('navbar')
  @yield('content')
  @yield('footer')

  <script src="{{ asset('build/assets/app-BYtU6jdN.js') }}"></script>

  <script src="{{ asset('js/tinymce.js') }}"></script>
  <script src="{{ asset('js/all.min.js') }}" defer></script>
  <script src="{{ asset('js/theme.js') }}"></script>

  <script src="{{asset('js/lodash/lodash.min.js')}}"></script>
  <script src="{{asset('js/dropzone/dist/dropzone-min.js')}}"></script>
  <script src="{{asset('js/sortablejs/Sortable.min.js')}}"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const spinner = document.getElementById('loading-spinner');

      // Montre le spinner lors du chargement d'une page
      window.addEventListener('beforeunload', () => {
        spinner.classList.remove('hidden');
      });

      // Cacher le spinner (si nécessaire après le chargement)
      window.addEventListener('load', () => {
        spinner.classList.add('hidden');
      });
    });

  </script>
  <script>
    const counters = document.querySelectorAll('.start-number');
    const speed = 200;

    counters.forEach(counter => {
      const animate = () => {
        const value = +counter.getAttribute('akhi');
        const data = +counter.innerText;

        const time = value / speed;
        if (data < value) {
          counter.innerText = Math.ceil(data + time);
          setTimeout(animate, 1);
        } else {
          counter.innerText = value;
        }

      }

      animate();
    });

  </script>
  <script type="module">
    import KeenSlider from "{{ asset('js/swiper-bundle.min.js') }}"

  const keenSliderActive = document.getElementById('keen-slider-active')
  const keenSliderCount = document.getElementById('keen-slider-count')

  const keenSlider = new KeenSlider(
    '#keen-slider',
    {
      loop: true,
      defaultAnimation: {
        duration: 750,
      },
      slides: {
        origin: 'center',
        perView: 1,
        spacing: 16,
      },
      breakpoints: {
        '(min-width: 640px)': {
          slides: {
            origin: 'center',
            perView: 1.5,
            spacing: 16,
          },
        },
        '(min-width: 768px)': {
          slides: {
            origin: 'center',
            perView: 1.75,
            spacing: 16,
          },
        },
        '(min-width: 1024px)': {
          slides: {
            origin: 'center',
            perView: 3,
            spacing: 16,
          },
        },
      },
      created(slider) {
        slider.slides[slider.track.details.rel].classList.remove('opacity-40')

        keenSliderActive.innerText = slider.track.details.rel + 1
        keenSliderCount.innerText = slider.slides.length
      },
      slideChanged(slider) {
        slider.slides.forEach((slide) => slide.classList.add('opacity-40'))

        slider.slides[slider.track.details.rel].classList.remove('opacity-40')

        keenSliderActive.innerText = slider.track.details.rel + 1
      },
    },
    []
  )

  const keenSliderPrevious = document.getElementById('keen-slider-previous')
  const keenSliderNext = document.getElementById('keen-slider-next')

  keenSliderPrevious.addEventListener('click', () => keenSlider.prev())
  keenSliderNext.addEventListener('click', () => keenSlider.next())
</script>
  @stack('js')
</body>

</html>
