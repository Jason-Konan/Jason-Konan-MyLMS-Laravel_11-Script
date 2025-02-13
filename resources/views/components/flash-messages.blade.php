@if (session('ok'))
<div id="dismiss-toast" x-data="{ showAlert: true }" x-init="setTimeout(() => showAlert = false, 3000)" class="hs-removing:translate-x-5 hs-removing:opacity-0 text-sm text-teal-800 rounded-lg dark:bg-teal-800 dark:border-teal-900 dark:text-teal-100 fixed top-20 right-5 z-30 max-w-md w-full overflow-hidden border border-green-500 bg-green-50 shadow-lg transition-all duration-500 ease-in-out" role="alert" tabindex="-1" aria-labelledby="hs-toast-soft-color-teal-label">
  <div class="flex p-4">
    <div class="shrink-0">
      <svg class="shrink-0 size-4 text-teal-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z">
        </path>
      </svg>
    </div>
    <p id="hs-toast-soft-color-teal-label" class="text-sm ms-3 text-green-500">
      {!! session('ok') !!}

    </p>

    <div class="ms-auto">
      <button type="button" class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg text-gray-800 dark:text-gray-800 opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100" aria-label="Close" data-hs-remove-element="#dismiss-toast">
        <span class="sr-only">Close</span>
        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M18 6 6 18"></path>
          <path d="m6 6 12 12"></path>
        </svg>
      </button>
    </div>
  </div>
</div>
@endif

@if (session('failed'))
<div id="dismiss-failed-toast" class="hs-removing:translate-x-5 hs-removing:opacity-0 text-sm dark:bg-red-800 dark:border-red-900 dark:text-red-200 fixed top-20 right-5 z-30 max-w-md w-full overflow-hidden rounded-lg border border-red-500 bg-red-50 text-gray-900 shadow-lg transition-all duration-500 ease-in-out" role="alert" tabindex="-1" aria-labelledby="hs-toast-soft-color-red-label">
  <div class="flex p-4">
    <div class="shrink-0">
      <svg class="shrink-0 size-4 text-red-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z">
        </path>
      </svg>
    </div>
    <p id="hs-toast-soft-color-red-label" class="text-sm ms-3 text-red-500">
      {!! session('failed') !!}

    </p>

    <div class="ms-auto">
      <button type="button" class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg text-gray-800 dark:text-gray-800 opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100 " aria-label="Close" data-hs-remove-element="#dismiss-failed-toast">
        <span class="sr-only">Close</span>
        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M18 6 6 18"></path>
          <path d="m6 6 12 12"></path>
        </svg>
      </button>
    </div>
  </div>

</div>
@endif
