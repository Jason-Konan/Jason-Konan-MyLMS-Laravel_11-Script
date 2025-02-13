{{-- <div class="container">
  <h2>Pay for Course: {{ $course->name }}</h2>

<script src="https://cdn.kkiapay.me/k.js"></script>
<kkiapay-widget amount="{{ $course->price * 100 }}" key="{{ env('KKIPAY_KEY') }}" url="{{ asset('images/logo.png') }}" position="center" sandbox="true" callback="{{ route('kkiapay.callback') }}">
</kkiapay-widget>
</div> --}}
<div class="container">
  <h2>Pay for Course: {{ $course->name }}</h2>
  <script src="https://cdn.kkiapay.me/k.js"></script>
  <kkiapay-widget amount="{{ intval($course->price * config('settings.exchange_rate', 634)) }}" key="{{ $kkiapayPublicKey }}" url="{{ $siteSettings->logo_light }}" position="center" sandbox="true" callback="{{ route('kkiapay.callback') }}">
  </kkiapay-widget>
</div>
