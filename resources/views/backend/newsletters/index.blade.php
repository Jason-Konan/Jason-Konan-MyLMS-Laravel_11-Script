<x-admin-layout title="Newsletters">
  <div class="flex items-center justify-center bg-blue-600 dark:bg-sky-500/50 h-64">
    <h1 class="text-3xl lg:text-4xl text-white font-bold mb-5">{{__("Newsletters Management")}} </h1>
  </div>

  <div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200">
      <table class="min-w-full">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider"> {{__("ID")}} </th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider"> {{__("Email")}} </th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider"> {{__("Actions")}} </th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @foreach($subscribers as $subscriber)
          <tr class="hover:bg-gray-50 transition duration-200">
            <td class="px-6 py-4 text-sm text-gray-700">{{ $subscriber->id }}</td>
            <td class="px-6 py-4 text-sm text-gray-700">{{ $subscriber->email }}</td>
            <td class="px-6 py-4">
              <button onclick="openMessageModal('{{ $subscriber->email }}')" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                {{__("Send")}}
              </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal pour écrire un message -->
  <div id="messageModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center p-4 transition-opacity duration-300">
    <!-- Contenu du modal -->
    <div class="bg-white rounded-lg w-full max-w-4xl p-6 transform transition-all duration-300 scale-95 opacity-0 shadow-lg" id="modalContent" style="max-height: 90vh; overflow-y: auto;">
      <div>
        <h2 class="text-xl font-bold mb-4 text-gray-800"> {{__("Send Message")}} </h2>
        <form id="messageForm" action="{{ route('admin.newsletters.send-message') }}" method="POST">
          @csrf
          <input type="hidden" id="recipientEmail" name="email">
          <div class="mb-4">
            <label for="message" class="block text-sm font-medium text-gray-700 mb-2"> {{__("Message")}} </label>
            <textarea id="tinymce" name="message" rows="4" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 resize-none"></textarea>
          </div>
          <div class="flex justify-end">
            <button type="button" onclick="closeMessageModal()" class="bg-gray-500 text-white px-4 py-2 rounded-lg mr-2 hover:bg-gray-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
              {{__("Cancel")}}
            </button>
            <button type="submit" class="bg-blue-600 flex items-center justify-center gap-2 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
              {{__("Send")}}
              <x-lucide-send-horizontal />
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>




  <script>
    function openMessageModal(email) {
      const modal = document.getElementById('messageModal');
      const modalContent = document.getElementById('modalContent');

      // Afficher le modal
      modal.classList.remove('hidden');
      setTimeout(() => {
        modal.classList.remove('opacity-0');
        modalContent.classList.remove('scale-95', 'opacity-0');
      }, 10);

      // Définir l'e-mail du destinataire
      document.getElementById('recipientEmail').value = email;
    }

    function closeMessageModal() {
      const modal = document.getElementById('messageModal');
      const modalContent = document.getElementById('modalContent');

      // Masquer le modal avec une animation
      modalContent.classList.add('scale-95', 'opacity-0');
      modal.classList.add('opacity-0');
      setTimeout(() => {
        modal.classList.add('hidden');
      }, 300);
    }

  </script>
</x-admin-layout>
