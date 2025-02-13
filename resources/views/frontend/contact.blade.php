<x-default-layout title="Contact">
  <div class="relative flex flex-1 w-full flex-col items-center justify-center text-center px-4 py-20 bg-gradient-to-r from-green-50/50 via-teal-50 to-green-50/50 dark:from-gray-800 dark:via-gray-700 dark:to-gray-800">
    <svg xmlns="http://www.w3.org/2000/svg" class="text-orange-500 animate-bounce animate-twice size-24 absolute bottom-0 right-8" fill="#8008" viewBox="0 0 480 480">
      <path d="M0 0h230c138 0 250 112 250 250v230H250C112 480 0 368 0 230V0Z"></path>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" class="text-orange-500 size-24 absolute top-10 left-8" viewBox="0 0 480 480" fill="#0808">
      <path d="M480 0H240A240 240 0 0 0 0 240v240h240a240 240 0 0 0 240-240V0ZM360 240a120 120 0 0 1-120 120H120V240a120 120 0 0 1 120-120h120v120ZM480 0H240A240 240 0 0 0 0 240v240h240a240 240 0 0 0 240-240V0ZM360 240a120 120 0 0 1-120 120H120V240a120 120 0 0 1 120-120h120v120Z"></path>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" class="text-orange-500 size-24 absolute bottom-10 left-8" viewBox="0 0 480 480" fill="#808">
      <path d="M240 480H0V240l240 240zM480 480H240V240l240 240zM240 240H0V0l240 240zM480 240H240V0l240 240z"></path>
    </svg>
    <p class="border border-white-700 dark:border-gray-300 rounded-lg py-2 px-4 text-white-400 dark:text-gray-300 text-sm mb-5 transition duration-300 ease-in-out hover:text-gray-500 dark:hover:text-gray-400">
      {{ __('accelerate_your_development') }}
    </p>
    <h1 class="mx-auto max-w-4xl font-display text-5xl font-bold tracking-normal text-white-300 dark:text-gray-300 sm:text-7xl">
      {{ __('transform_your') }}
      <span class="relative whitespace-nowrap text-white-600 dark:text-gray-300">{{ __('experience') }}</span>
      <span class="relative whitespace-nowrap text-orange-500 dark:text-orange-300">
        <svg aria-hidden="true" viewBox="0 0 418 42" class="absolute top-2/3 left-0 h-[0.58em] w-full fill-orange-500 dark:fill-orange-300/60" preserveAspectRatio="none">
          <path d="M203.371.916c-26.013-2.078-76.686 1.963-124.73 9.946L67.3 12.749C35.421 18.062 18.2 21.766 6.004 25.934 1.244 27.561.828 27.778.874 28.61c.07 1.214.828 1.121 9.595-1.176 9.072-2.377 17.15-3.92 39.246-7.496C123.565 7.986 157.869 4.492 195.942 5.046c7.461.108 19.25 1.696 19.17 2.582-.107 1.183-7.874 4.31-25.75 10.366-21.992 7.45-35.43 12.534-36.701 13.884-2.173 2.308-.202 4.407 4.442 4.734 2.654.187 3.263.157 15.593-.780 35.401-2.686 57.944-3.488 88.365-3.143 46.327.526 75.721 2.23 130.788 7.584 19.787 1.924 20.814 1.98 24.557 1.332l.066-.011c1.201-.203 1.53-1.825.399-2.335-2.911-1.31-4.893-1.604-22.048-3.261-57.509-5.556-87.871-7.36-132.059-7.842-23.239-.254-33.617-.116-50.627.674-11.629.540-42.371 2.494-46.696 2.967-2.359.259 8.133-3.625 26.504-9.810 23.239-7.825 27.934-10.149 28.304-14.005 .417-4.348-3.529-6-16.878-7.066Z"></path>
        </svg>
        <span class="relative">{{ __('learning') }}</span>
      </span>
    </h1>
    <p class="mx-auto mt-12 max-w-xl text-lg sm:text-white-400 text-white-500 dark:text-gray-300 leading-7">
      {{ __('discover_future_education') }}
    </p>
    <a class="bg-orange-600 dark:bg-gray-800 rounded-xl text-white dark:text-gray-300 font-medium px-4 py-3 sm:mt-10 mt-8 hover:bg-orange-500 dark:hover:bg-gray-600 transition" href="{{route('courses')}}">
      {{ __('start_now') }}
    </a>


  </div>

  <div class="mt-32 px-4 py-12 bg-gradient-to-r from-blue-300 to-indigo-500">
    <div class="grid sm:grid-cols-2 items-center gap-16 my-6 mx-auto max-w-5xl">
      <div class="">
        <h2 class="md:text-4xl text-3xl font-extrabold text-white">{{ __('collaborate_with_us') }}</h2>
        <p class="mt-6">{{ __('have_an_educational_project') }}</p>





        <div class="mt-12">
          <h2 class="text-xl font-semibold">{{ __('our_social_networks') }}</h2>

          <ul class="flex mt-4 space-x-4">
            <li class="bg-[#e6e6e6cf] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
              <a href="{{$siteSettings->facebook_link??''}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill='#007bff' viewBox="0 0 24 24">
                  <path d="M6.812 13.937H9.33v9.312c0 .414.335.75.75.75l4.007.001a.75.75 0 0 0 .75-.75v-9.312h2.387a.75.75 0 0 0 .744-.657l.498-4a.75.75 0 0 0-.744-.843h-2.885c.113-2.471-.435-3.202 1.172-3.202 1.088-.13 2.804.421 2.804-.75V.909a.75.75 0 0 0-.648-.743A26.926 26.926 0 0 0 15.071 0c-7.01 0-5.567 7.772-5.74 8.437H6.812a.75.75 0 0 0-.75.75v4c0 .414.336.75.75.75zm.75-3.999h2.518a.75.75 0 0 0 .75-.75V6.037c0-2.883 1.545-4.536 4.24-4.536.878 0 1.686.043 2.242.087v2.149c-.402.205-3.976-.884-3.976 2.697v2.755c0 .414.336.75.75.75h2.786l-.312 2.5h-2.474a.75.75 0 0 0-.75.75V22.5h-2.505v-9.312a.75.75 0 0 0-.75-.75H7.562z" data-original="#000000" />
                </svg>
              </a>
            </li>
            <li class="bg-[#e6e6e6cf] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
              <a href="{{$siteSettings->linkedin_link??''}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill='#007bff' viewBox="0 0 511 512">
                  <path d="M111.898 160.664H15.5c-8.285 0-15 6.719-15 15V497c0 8.285 6.715 15 15 15h96.398c8.286 0 15-6.715 15-15V175.664c0-8.281-6.714-15-15-15zM96.898 482H30.5V190.664h66.398zM63.703 0C28.852 0 .5 28.352.5 63.195c0 34.852 28.352 63.2 63.203 63.2 34.848 0 63.195-28.352 63.195-63.2C126.898 28.352 98.551 0 63.703 0zm0 96.395c-18.308 0-33.203-14.891-33.203-33.2C30.5 44.891 45.395 30 63.703 30c18.305 0 33.195 14.89 33.195 33.195 0 18.309-14.89 33.2-33.195 33.2zm289.207 62.148c-22.8 0-45.273 5.496-65.398 15.777-.684-7.652-7.11-13.656-14.942-13.656h-96.406c-8.281 0-15 6.719-15 15V497c0 8.285 6.719 15 15 15h96.406c8.285 0 15-6.715 15-15V320.266c0-22.735 18.5-41.23 41.235-41.23 22.734 0 41.226 18.495 41.226 41.23V497c0 8.285 6.719 15 15 15h96.403c8.285 0 15-6.715 15-15V302.066c0-79.14-64.383-143.523-143.524-143.523zM466.434 482h-66.399V320.266c0-39.278-31.953-71.23-71.226-71.23-39.282 0-71.239 31.952-71.239 71.23V482h-66.402V190.664h66.402v11.082c0 5.77 3.309 11.027 8.512 13.524a15.01 15.01 0 0 0 15.875-1.82c20.313-16.294 44.852-24.907 70.953-24.907 62.598 0 113.524 50.926 113.524 113.523zm0 0" data-original="#000000" />
                </svg>
              </a>
            </li>
            <li class="bg-[#e6e6e6cf] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
              <a href="{{$siteSettings->instagram_link??''}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill='#007bff' viewBox="0 0 24 24">
                  <path d="M12 9.3a2.7 2.7 0 1 0 0 5.4 2.7 2.7 0 0 0 0-5.4Zm0-1.8a4.5 4.5 0 1 1 0 9 4.5 4.5 0 0 1 0-9Zm5.85-.225a1.125 1.125 0 1 1-2.25 0 1.125 1.125 0 0 1 2.25 0ZM12 4.8c-2.227 0-2.59.006-3.626.052-.706.034-1.18.128-1.618.299a2.59 2.59 0 0 0-.972.633 2.601 2.601 0 0 0-.634.972c-.17.44-.265.913-.298 1.618C4.805 9.367 4.8 9.714 4.8 12c0 2.227.006 2.59.052 3.626.034.705.128 1.18.298 1.617.153.392.333.674.632.972.303.303.585.484.972.633.445.172.918.267 1.62.3.993.047 1.34.052 3.626.052 2.227 0 2.59-.006 3.626-.052.704-.034 1.178-.128 1.617-.298.39-.152.674-.333.972-.632.304-.303.485-.585.634-.972.171-.444.266-.918.299-1.62.047-.993.052-1.34.052-3.626 0-2.227-.006-2.59-.052-3.626-.034-.704-.128-1.18-.299-1.618a2.619 2.619 0 0 0-.633-.972 2.595 2.595 0 0 0-.972-.634c-.44-.17-.914-.265-1.618-.298-.993-.047-1.34-.052-3.626-.052ZM12 3c2.445 0 2.75.009 3.71.054.958.045 1.61.195 2.185.419A4.388 4.388 0 0 1 19.49 4.51c.457.45.812.994 1.038 1.595.222.573.373 1.227.418 2.185.042.96.054 1.265.054 3.71 0 2.445-.009 2.75-.054 3.71-.045.958-.196 1.61-.419 2.185a4.395 4.395 0 0 1-1.037 1.595 4.44 4.44 0 0 1-1.595 1.038c-.573.222-1.227.373-2.185.418-.96.042-1.265.054-3.71.054-2.445 0-2.75-.009-3.71-.054-.958-.045-1.61-.196-2.185-.419A4.402 4.402 0 0 1 4.51 19.49a4.414 4.414 0 0 1-1.037-1.595c-.224-.573-.374-1.227-.419-2.185C3.012 14.75 3 14.445 3 12c0-2.445.009-2.75.054-3.71s.195-1.61.419-2.185A4.392 4.392 0 0 1 4.51 4.51c.45-.458.994-.812 1.595-1.037.574-.224 1.226-.374 2.185-.419C9.25 3.012 9.555 3 12 3Z">
                  </path>
                </svg>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="py-8 px-6 max-w-md bg-white bg-opacity-30 rounded-lg shadow-lg backdrop-blur-xl backdrop-filter">
        <form action="{{ route('contact.submit') }}" method="post" class="ml-auto space-y-4">
          @csrf
          <input type='text' placeholder='Nom' name="name" class="w-full rounded-md py-3 px-4 bg-[#f8f9ff] outline-cyan-900" />
          <input type='email' placeholder='Email professionnel' name="email" class="w-full rounded-md py-3 px-4 bg-[#f8f9ff] outline-cyan-900" />
          <textarea placeholder='Votre message pédagogique...' rows="6" name="message" class="w-full rounded-md px-4 bg-[#f8f9ff] pt-3 outline-cyan-900"></textarea>
          <button type='submit' class="w-full mt-6 px-6 py-3 rounded-xl text-white bg-cyan-900 transition-all hover:bg-cyan-800">Envoyer la demande</button>
        </form>
      </div>
    </div>
  </div>
</x-default-layout>
