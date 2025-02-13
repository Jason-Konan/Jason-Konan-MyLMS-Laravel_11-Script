<x-default-layout title="My cart">
    <div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-semibold mb-4">Mon Panier</h2>

        @if ($cartItems->isEmpty())
            <p class="text-gray-600">Votre panier est vide.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-700">Cours</th>
                            <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-700">Prix</th>
                            <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                            <tr class="hover:bg-gray-100">
                                <td class="px-6 py-4 border-b text-gray-800">{{ $item->course->name }}</td>
                                <td class="px-6 py-4 border-b text-gray-800">
                                    ${{ number_format($item->course->price, 2) }}</td>
                                <td class="px-6 py-4 border-b text-gray-800">
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

            <div class="text-right mt-4">
                <h4 class="text-xl font-semibold">Total général :
                    ${{ number_format($cartItems->sum(function ($item) {return $item->course->price;}),2) }}
                </h4>
            </div>
        @endif
    </div>

</x-default-layout>
