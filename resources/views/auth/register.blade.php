<x-auth-layout title="Register" subtitle="🔐 Register" action="{{ route('register') }}" submitButtonMessage="Register"
    authBackMessage="Already have an account ?" :authBackLink="route('login')" authBackLinkText="Login">
    <div class="flex sm:flex-col md:flex-row  items-center justify-center gap-4">

        <div class="block md:w-1/2 lg:w-full w-full">
            <x-input name="name" label="Name" type="text" id="name" />
        </div>

        <div class="block md:w-1/2 lg:w-full w-full">
            <x-input name="email" type="email" label="Email" id="email" />
        </div>

    </div>

    <div class="block mb-4 space-y-2">
        <x-input name="password" type="password" label="Password" id="password" />
    </div>

    <div class="block mb-4 space-y-2">
        <x-input name="password_confirmation" type="password" label="Confirm Password" id="password_confirmation" />
    </div>
</x-auth-layout>
