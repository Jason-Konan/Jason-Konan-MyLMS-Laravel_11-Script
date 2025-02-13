<x-default-layout title="Checkout">
  <div class="py-4 my-6 lg:my-10 bg-gradient-to-r from-sky-600 to blue-500">
    <h1 class="text-center text-xl md:text-3xl font-bold text-white dark:text-neutral-200">{{$course->name}}</h1>
  </div>

  <!-- Features -->
  <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="relative p-6 md:p-16">
      <!-- Grid -->
      <div class="relative z-10 lg:grid lg:grid-cols-12 lg:gap-16 lg:items-center">
        <div class="mb-10 lg:mb-0 lg:col-span-6 lg:col-start-8 lg:order-2">
          <h2 class="text-2xl text-gray-800 font-bold sm:text-3xl dark:text-neutral-200">
            You can choose here your payment method.
          </h2>

          <!-- Tab Navs -->
          <nav class="grid gap-4 mt-5 md:mt-10" aria-label="Tabs" role="tablist" aria-orientation="vertical">
            <button type="button" class="hs-tab-active:bg-white hs-tab-active:shadow-md hs-tab-active:hover:border-transparent text-start hover:bg-gray-200 focus:outline-none focus:bg-gray-200 p-4 md:p-5 rounded-xl dark:hs-tab-active:bg-neutral-700 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 active" id="tabs-with-card-item-1" aria-selected="true" data-hs-tab="#tabs-with-card-1" aria-controls="tabs-with-card-1" role="tab">
              <span class="flex items-center  gap-x-6">
                <i class="fa-brands fa-stripe shrink-0 mt-2 size-6 md:size-7 hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-neutral-200"></i>
                <span class="grow">
                  <span class="block text-lg font-semibold hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-neutral-200">Stripe</span>

                </span>
              </span>
            </button>

            <button type="button" class="hs-tab-active:bg-white hs-tab-active:shadow-md hs-tab-active:hover:border-transparent text-start hover:bg-gray-200 focus:outline-none focus:bg-gray-200 p-4 md:p-5 rounded-xl dark:hs-tab-active:bg-neutral-700 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" id="tabs-with-card-item-2" aria-selected="false" data-hs-tab="#tabs-with-card-2" aria-controls="tabs-with-card-2" role="tab">
              <span class="flex items-center  gap-x-6">
                <i class="fa-brands fa-paypal shrink-0 mt-2 size-6 md:size-7 hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-neutral-200"></i>
                <span class="grow">
                  <span class="block text-lg font-semibold hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-neutral-200">Paypal</span>

                </span>
              </span>
            </button>

            <button type="button" class="hs-tab-active:bg-white hs-tab-active:shadow-md hs-tab-active:hover:border-transparent text-start hover:bg-gray-200 focus:outline-none focus:bg-gray-200 p-4 md:p-5 rounded-xl dark:hs-tab-active:bg-neutral-700 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" id="tabs-with-card-item-3" aria-selected="false" data-hs-tab="#tabs-with-card-3" aria-controls="tabs-with-card-3" role="tab">
              <span class="flex items-center gap-x-6">
                <span class=" shrink-0 mt-2 size-6 md:size-7 text-slate-900 dark:hs-tab-active:text-blue-950 dark:text-slate-100 font-bold">Kkia</span>


                <span class="grow">
                  <span class=" mt-2 size-6 md:size-7 text-slate-900 dark:hs-tab-active:text-blue-950 dark:text-slate-100 font-bold">Kkia<span class=" mt-2 size-6 md:size-7 text-red-500 dark:hs-tab-active:text-red-400 dark:text-red-100 font-bold text-xl">pay</span></span>

                </span>
              </span>
            </button>
            <button type="button" class="hs-tab-active:bg-white hs-tab-active:shadow-md hs-tab-active:hover:border-transparent text-start hover:bg-gray-200 focus:outline-none focus:bg-gray-200 p-4 md:p-5 rounded-xl dark:hs-tab-active:bg-neutral-700 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" id="tabs-with-card-item-4" aria-selected="false" data-hs-tab="#tabs-with-card-4" aria-controls="tabs-with-card-4" role="tab">
              <span class="flex items-center  gap-x-6">
                <i class="fa-brands fa-square shrink-0 mt-2 size-6 md:size-7 hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-neutral-200"></i>
                <span class="grow">
                  <span class="block text-lg font-semibold hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-neutral-200">Square</span>

                </span>
              </span>
            </button>
            <button type="button" class="hs-tab-active:bg-white hs-tab-active:shadow-md hs-tab-active:hover:border-transparent text-start hover:bg-gray-200 focus:outline-none focus:bg-gray-200 p-4 md:p-5 rounded-xl dark:hs-tab-active:bg-neutral-700 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" id="tabs-with-card-item-5" aria-selected="false" data-hs-tab="#tabs-with-card-5" aria-controls="tabs-with-card-5" role="tab">
              <span class="flex items-center  gap-x-6">
                <i class="fa-brands fa-razorpay shrink-0 mt-2 size-6 md:size-7 hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-neutral-200"></i>
                <span class="grow">
                  <span class="block text-lg font-semibold hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-neutral-200">Razorpay</span>

                </span>
              </span>
            </button>
            <button type="button" class="hs-tab-active:bg-white hs-tab-active:shadow-md hs-tab-active:hover:border-transparent text-start hover:bg-gray-200 focus:outline-none focus:bg-gray-200 p-4 md:p-5 rounded-xl dark:hs-tab-active:bg-neutral-700 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" id="tabs-with-card-item-6" aria-selected="false" data-hs-tab="#tabs-with-card-6" aria-controls="tabs-with-card-6" role="tab">
              <span class="flex items-center  gap-x-6">
                <i class="fa-brands fa-authorize shrink-0 mt-2 size-6 md:size-7 hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-neutral-200"></i>
                <span class="grow">
                  <span class="block text-lg font-semibold hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-neutral-200">Authorize Net</span>

                </span>
              </span>
            </button>
            <button type="button" class="hs-tab-active:bg-white hs-tab-active:shadow-md hs-tab-active:hover:border-transparent text-start hover:bg-gray-200 focus:outline-none focus:bg-gray-200 p-4 md:p-5 rounded-xl dark:hs-tab-active:bg-neutral-700 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" id="tabs-with-card-item-7" aria-selected="false" data-hs-tab="#tabs-with-card-7" aria-controls="tabs-with-card-7" role="tab">
              <span class="flex items-center  gap-x-6">
                <i class="fa-brands fa-flutter shrink-0 mt-2 size-6 md:size-7 hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-neutral-200"></i>
                <span class="grow">
                  <span class="block text-lg font-semibold hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-neutral-200">FlutterWave</span>

                </span>
              </span>
            </button>
            <button type="button" class="hs-tab-active:bg-white hs-tab-active:shadow-md hs-tab-active:hover:border-transparent text-start hover:bg-gray-200 focus:outline-none focus:bg-gray-200 p-4 md:p-5 rounded-xl dark:hs-tab-active:bg-neutral-700 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" id="tabs-with-card-item-8" aria-selected="false" data-hs-tab="#tabs-with-card-8" aria-controls="tabs-with-card-8" role="tab">
              <span class="flex items-center  gap-x-6">
                <i class="fa-brands fa-paystack shrink-0 mt-2 size-6 md:size-7 hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-neutral-200"></i>
                <span class="grow">
                  <span class="block text-lg font-semibold hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-neutral-200">PayStack</span>

                </span>
              </span>
            </button>
          </nav>
          <!-- End Tab Navs -->
        </div>
        <!-- End Col -->

        <div class="lg:col-span-6">
          <div class="relative">
            <!-- Tab Content -->
            <div>
              <div id="tabs-with-card-1" role="tabpanel" aria-labelledby="tabs-with-card-item-1">
                <div class="w-full">
                  <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="p-6">
                      <!-- Message de succès -->
                      @if (session('ok'))
                      <div class="text-green-600 border border-green-600 text-center p-3 mb-6 rounded-md">
                        <p>Payment Successful!</p>
                      </div>
                      @endif

                      <!-- Formulaire de paiement -->
                      <form id="checkout-form" method="post" action="{{ route('stripe.create-charge', $course) }}">
                        @csrf
                        <input type="hidden" name="stripeToken" id="stripe-token-id">

                        <!-- Nom -->
                        <x-input type="text" id="name" name="name" label="Full Name" value="{{ Auth::user()->name ?? '' }}" />

                        <!-- Email -->
                        <x-input type="email" id="email" name="email" label="Email Address" value="{{ Auth::user()->email ?? '' }}" />

                        <!-- Formulaire de paiement -->
                        <label for="card-element" class="block text-sm font-medium mt-3 mb-1">Credit Card Information</label>
                        <div id="card-element" class="border border-indigo-300 rounded-md p-4 mb-6"></div>

                        <!-- Bouton de paiement -->
                        <button id="pay-btn" class="w-full py-4 mt-4 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300" type="button" onclick="createToken()">
                          Pay ${{ $course->price }}
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <div id="tabs-with-card-2" class="hidden" role="tabpanel" aria-labelledby="tabs-with-card-item-2">
                @include('frontend.courses.course-payment.paypal')
              </div>

              <div id="tabs-with-card-3" class="hidden" role="tabpanel" aria-labelledby="tabs-with-card-item-3">
                @include('frontend.courses.course-payment.kkiapay')
              </div>

              <div id="tabs-with-card-4" class="hidden" role="tabpanel" aria-labelledby="tabs-with-card-item-4">
                @include('frontend.courses.course-payment.moonero')
              </div>

              <div id="tabs-with-card-5" class="hidden" role="tabpanel" aria-labelledby="tabs-with-card-item-5">
                Razorpay
              </div>

              <div id="tabs-with-card-6" class="hidden" role="tabpanel" aria-labelledby="tabs-with-card-item-6">
                Authorize Net
              </div>

              <div id="tabs-with-card-7" class="hidden" role="tabpanel" aria-labelledby="tabs-with-card-item-7">
                Flutter Wave
              </div>

              <div id="tabs-with-card-8" class="hidden" role="tabpanel" aria-labelledby="tabs-with-card-item-8">
                PayStack
              </div>
            </div>
            <!-- End Tab Content -->

            <!-- SVG Element -->
            <div class="hidden absolute top-0 end-0 translate-x-20 md:block lg:translate-x-20">
              <svg class="w-16 h-auto text-orange-500" width="121" height="135" viewBox="0 0 121 135" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 16.4754C11.7688 27.4499 21.2452 57.3224 5 89.0164" stroke="currentColor" stroke-width="10" stroke-linecap="round" />
                <path d="M33.6761 112.104C44.6984 98.1239 74.2618 57.6776 83.4821 5" stroke="currentColor" stroke-width="10" stroke-linecap="round" />
                <path d="M50.5525 130C68.2064 127.495 110.731 117.541 116 78.0874" stroke="currentColor" stroke-width="10" stroke-linecap="round" />
              </svg>
            </div>
            <!-- End SVG Element -->
          </div>
        </div>
        <!-- End Col -->
      </div>
      <!-- End Grid -->

      <!-- Background Color -->
      <div class="absolute inset-0 grid grid-cols-12 size-full">
        <div class="col-span-full lg:col-span-7 lg:col-start-6 bg-gray-100 w-full h-5/6 rounded-xl sm:h-3/4 lg:h-full dark:bg-neutral-800"></div>
      </div>
      <!-- End Background Color -->
    </div>
  </div>
  <!-- End Features -->
  <script src="https://js.stripe.com/v3/"></script>
  <script>
    // Utiliser la clé publique Stripe passée depuis le contrôleur
    var stripe = Stripe(@json($stripePublicKey));
    var elements = stripe.elements();
    var cardElement = elements.create('card');
    cardElement.mount('#card-element');

    function createToken() {
      document.getElementById("pay-btn").disabled = true;
      stripe.createToken(cardElement).then(function(result) {
        if (typeof result.error != 'undefined') {
          document.getElementById("pay-btn").disabled = false;
          alert(result.error.message);
        }

        if (typeof result.token != 'undefined') {
          document.getElementById("stripe-token-id").value = result.token.id;
          document.getElementById('checkout-form').submit();
        }
      });
    }

  </script>
</x-default-layout>
