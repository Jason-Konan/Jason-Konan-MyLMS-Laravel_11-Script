<x-auth-layout title="Login" subtitle="🔐 Login" action="{{ route('login') }}" submitButtonMessage="Login" authBackMessage="Don't have an account ?" :authBackLink="route('register')" authBackLinkText="Create an account">
  <div class="block mb-4 space-y-2">
    <x-input name="email" type="email" label="Email" />
  </div>


  <div class="block mb-4 space-y-2">
    <x-input type="password" name="password" label="Password" />
  </div>
  <div class="flex justify-between mt-4">
    <div class="mb-2 flex items-center justify-center text-base text-slate-600  ">
      <input class="form-checkbox rounded mt-0 focus:ring-0" type="checkbox" name="remember">
      <span class="pl-2">Remember me</span>
    </div>

  </div>
</x-auth-layout>
