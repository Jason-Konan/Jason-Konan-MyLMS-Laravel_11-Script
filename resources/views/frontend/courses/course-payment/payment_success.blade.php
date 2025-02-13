<x-default-layout>
  <div class="min-h-screen flex items-center justify-center">
    <div class="bg-green-100 p-8 rounded-lg shadow-md w-96">
      <h2 class="text-2xl font-bold text-center text-green-800">Paiement Réussi !</h2>
      <p class="mt-4 text-gray-700 text-center">Votre paiement pour le cours <span class="font-bold">{{ $payment->course->name }}</span> a été complété avec succès.</p>
      <p class="mt-2 text-sm text-gray-600 text-center">Un email contenant les détails de votre achat a été envoyé à <span class="font-semibold">{{ $payment->user->email }}</span>.</p>
      <div class="mt-6 text-center">
        <a href="{{ route('course.show', ['course' => $payment->course->id]) }}" class="bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700">
          Voir le cours
        </a>
      </div>
    </div>
  </div>
</x-default-layout>
