<x-default-layout>
  <div class="min-h-screen flex items-center justify-center">
    <div class="bg-red-100 p-8 rounded-lg shadow-md w-96">
      <h2 class="text-2xl font-bold text-center text-red-800">Paiement Échoué</h2>
      <p class="mt-4 text-gray-700 text-center">Nous sommes désolés, mais votre paiement pour le cours <span class="font-bold">{{ $payment->course->name ?? 'N/A' }}</span> a échoué.</p>
      <p class="mt-2 text-sm text-gray-600 text-center">Veuillez réessayer ou contacter le support si le problème persiste.</p>
      <div class="mt-6 text-center">
        <a href="{{ route('course.show', ['course' => $payment->course->id]) }}" class="bg-gray-600 text-white py-2 px-4 rounded-lg hover:bg-gray-700">
          Retour au cours
        </a>
      </div>
    </div>
  </div>
</x-default-layout>
