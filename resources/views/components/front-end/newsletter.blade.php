<form action="{{ route('newsletter.subscribe') }}" method="POST">
  @csrf
  <div class="mt-4 flex flex-col items-center gap-2 sm:flex-row sm:gap-3 bg-white rounded-lg p-2 dark:bg-neutral-900">
    <div class="w-full">
      <label for="hero-input" class="sr-only">Subscribe</label>
      <input type="email" name="email" class="py-3 px-4 block w-full border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter your email">
    </div>
    <button class="w-full sm:w-auto whitespace-nowrap p-3 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" type="submit">
      Subscribe
    </button>
  </div>
  @if($errors->any())
  <p class="mt-2 text-red-500">Veuillez fournir une adresse e-mail valide.</p>
  @endif
</form>
