   <div class="max-w-3xl mx-auto py-12">
     <div class="bg-white shadow-md rounded p-6">
       <h1 class="text-2xl font-semibold mb-6 text-center">Paiement Moneroo</h1>

       <form action="{{ route('moneroo.initiate', $course) }}" method="POST" class="space-y-6">
         @csrf
         <div>
           <label for="name" class="block text-sm font-medium text-gray-700">Nom complet</label>
           <input type="text" id="name" name="name" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
         </div>

         <div>
           <label for="email" class="block text-sm font-medium text-gray-700">Adresse Email</label>
           <input type="email" id="email" name="email" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
         </div>

         <div>
           <label for="payment_method" class="block text-sm font-medium text-gray-700">Méthode de Paiement</label>
           <select id="payment_method" name="payment_method" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
             <option value="">-- Sélectionnez une méthode --</option>
             <option value="mtn_ng">MTN (NGN)</option>
             <option value="orange_ci">Orange (Côte d'Ivoire)</option>
             <option value="card_usd">Carte (USD)</option>
             <!-- Ajoutez d'autres méthodes si nécessaire -->
           </select>
         </div>

         <div class="bg-gray-100 p-4 rounded">
           <h2 class="text-lg font-medium text-gray-800 mb-2">Détails du cours</h2>
           <p class="text-gray-700"><strong>Nom du cours:</strong> {{ $course->name }}</p>
           <p class="text-gray-700"><strong>Prix de base:</strong> {{ number_format($course->price, 2) }} {{ config('settings.default_currency', 'XOF') }}</p>
         </div>

         <div>
           <button type="submit" class="w-full bg-indigo-600 text-white p-3 rounded-md font-medium shadow-md hover:bg-indigo-700 focus:outline-none">
             Payer maintenant
           </button>
         </div>
       </form>
     </div>
   </div>
