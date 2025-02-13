<x-admin-layout>
  <h1 class="text-3xl font-semibold mb-4">Add Payment Gateway</h1>
  <form action="{{ route('admin.payment-gateways.store') }}" method="POST" class="space-y-6">
    @csrf
    <div class="space-y-2">
      <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
      <input type="text" name="name" id="name" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
    </div>
    <div class="space-y-2">
      <label for="api_key" class="block text-sm font-medium text-gray-700">API Key</label>
      <input type="text" name="api_key" id="api_key" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
    </div>
    <div class="space-y-2">
      <label for="api_secret" class="block text-sm font-medium text-gray-700">API Secret</label>
      <input type="text" name="api_secret" id="api_secret" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    <div class="space-y-2">
      <label for="api_private" class="block text-sm font-medium text-gray-700">API Private</label>
      <input type="text" name="api_private" id="api_private" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Optionnal (Only for Kkiapay)">
    </div>
    <div class=""><label for="currency" class="block text-sm font-medium leading-6 text-gray-900">Currency</label>
      <select name="currency" id="currency" class="form-select rounded-sm">
        @foreach ($currencies as $currency)
        <option value="{{ $currency }}" {{ old('currency', $paymentSettings->currency ?? '') == $currency ? 'selected' : '' }}>
          {{ strtoupper($currency) }}
        </option>
        @endforeach
      </select>
    </div>
    <div class="space-y-2">
      <label for="webhook_secret" class="block text-sm font-medium text-gray-700">Webhook Secret</label>
      <input type="text" name="webhook_secret" id="webhook_secret" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    {{-- <div class="space-y-2">
      <label for="additional_data" class="block text-sm font-medium text-gray-700">Additional Data</label>
      <textarea name="additional_data" id="additional_data" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
    </div> --}}
    <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 transition duration-200">Save</button>
  </form>
</x-admin-layout>
