<x-default-layout>
  <h1>Effectuer un paiement</h1>

  <!-- Section pour le formulaire de carte -->
  <div id="card-container"></div>

  <!-- Bouton pour soumettre le paiement -->
  <button id="payment-button">Payer</button>

  <!-- Message de statut -->
  <p id="payment-status" style="display: none; color: red;"></p>

  <script>
    document.addEventListener('DOMContentLoaded', async () => {
      // Initialisation de Square Payments
      const applicationId = "{{ env('SQUARE_APPLICATION_ID') }}";
      const environment = "{{ env('SQUARE_ENVIRONMENT') }}";

      const payments = Square.payments(applicationId, environment);
      const card = await payments.card();

      // Attacher le conteneur de carte au DOM
      await card.attach('#card-container');

      // Gérer l'événement de clic sur le bouton de paiement
      document.getElementById('payment-button').addEventListener('click', async () => {
        const statusElement = document.getElementById('payment-status');
        statusElement.style.display = 'none'; // Réinitialise le message de statut

        try {
          // Tokenisation de la carte pour obtenir le nonce
          const result = await card.tokenize();
          if (result.status === 'OK') {
            // Envoyer le nonce au backend
            const response = await fetch('/process-payment', {
              method: 'POST'
              , headers: {
                'Content-Type': 'application/json'
                , 'X-CSRF-TOKEN': "{{ csrf_token() }}"
              }
              , body: JSON.stringify({
                nonce: result.token
                , amount: 1000
              })
            , });


            const data = await response.json();
            if (response.ok) {
              alert('Paiement réussi !');
            } else {
              statusElement.textContent = data.error || 'Une erreur est survenue.';
              statusElement.style.display = 'block';
            }
          } else {
            statusElement.textContent = 'Échec de la tokenisation : ' + result.errors.map(e => e.message).join(', ');
            statusElement.style.display = 'block';
          }
        } catch (error) {
          console.error('Erreur lors du paiement :', error);
          statusElement.textContent = 'Une erreur s\'est produite. Veuillez réessayer.';
          statusElement.style.display = 'block';
        }
      });
    });

  </script>

</x-default-layout>
