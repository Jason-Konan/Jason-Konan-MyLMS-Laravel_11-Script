<x-admin-layout>
  <h1 class="text-3xl font-semibold mb-4">Payment Gateways</h1>
  <a href="{{ route('admin.payment-gateways.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200 mb-4 inline-block">Add Gateway</a>
  <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
    <thead>
      <tr class="bg-gray-100">
        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Name</th>
        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">API Key</th>
        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($gateways as $gateway)
      <tr class="border-t">
        <td class="px-6 py-4 text-sm text-gray-800">{{ $gateway->name }}</td>
        <td class="px-6 py-4 text-sm text-gray-800">{{ $gateway->api_key }}</td>
        <td class="px-6 py-4">
          <a href="{{ route('admin.payment-gateways.edit', $gateway->id) }}" class="text-yellow-500 hover:text-yellow-600 mr-2">Edit</a>
          <form action="{{ route('admin.payment-gateways.destroy', $gateway->id) }}" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 hover:text-red-600">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</x-admin-layout>
