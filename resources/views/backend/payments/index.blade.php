<x-admin-layout title="All Payments">
 <div class="flex items-center justify-center bg-blue-600 dark:bg-sky-500/50 h-64"><h1 class="text-3xl lg:text-4xl text-white font-bold mb-5">{{__("Payments Management")}}</h1></div>
    <div class="min-h-screen bg-gray-50 py-8 px-4">
        <div class="max-w-7xl mx-auto bg-white shadow-lg rounded-lg p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100 text-sm text-gray-600 uppercase">
                        <tr>
                            <th class="px-4 py-3 border border-gray-300 text-left">#</th>
                            <th class="px-4 py-3 border border-gray-300 text-left">{{__('Users')}}</th>
                            <th class="px-4 py-3 border border-gray-300 text-left">{{__('Courses')}}</th>
                            <th class="px-4 py-3 border border-gray-300 text-right">{{__('Amount')}}</th>
                            <th class="px-4 py-3 border border-gray-300 text-right">{{__('Taxes')}}</th>
                            <th class="px-4 py-3 border border-gray-300 text-right">{{__('System Income')}}</th>
                            <th class="px-4 py-3 border border-gray-300 text-center">{{__('Status')}}</th>
                            <th class="px-4 py-3 border border-gray-300 text-center">{{__('Date')}}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($payments as $payment)
                            <tr class="text-sm text-gray-800 hover:bg-gray-50">
                                <td class="px-4 py-3">{{ $payment->id }}</td>
                                <td class="px-4 py-3">{{ $payment->user->name }}</td>
                                <td class="px-4 py-3">{{ $payment->course->name }}</td>
                                <td class="px-4 py-3 text-right font-semibold text-green-600">
                                    ${{ number_format($payment->amount, 2) }}
                                </td>
                                <td class="px-4 py-3 text-right text-gray-600">
                                    ${{ number_format($payment->tax_amount, 2) }}
                                </td>
                                <td class="px-4 py-3 text-right text-gray-600">
                                    ${{ number_format($payment->revenue_amount, 2) }}
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-bold
                                {{ $payment->status === 'paid' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ ucfirst($payment->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-center text-gray-600">
                                    {{ $payment->created_at->format('d/m/Y H:i') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-4 py-6 text-center text-gray-500">
                                    Aucun paiement trouvé.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $payments->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</x-admin-layout>
