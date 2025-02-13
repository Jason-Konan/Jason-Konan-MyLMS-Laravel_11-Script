<x-admin-layout title="Admin Dashboard">
  <div class="grid grid-cols-1 gap-2 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 mt-3">
    <!-- Carte Étudiants/Formateurs -->
    <div class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg transition duration-300 ease-in-out" style="background-image: url('{{asset("images/frontend/dashboard-stats-bg.jpg")}}');">
      <div class="absolute inset-0 bg-blue-600 bg-opacity-75 transition duration-300 ease-in-out"></div>
      <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center">
        <div class="w-full">
          <div class="text-white text-lg flex space-x-2 items-center justify-center">
            <div class="bg-white rounded-md p-2 flex items-center">
              <i class="fas fa-users fa-sm text-blue-600"></i>
            </div>
            <p>Utilisateurs</p>
          </div>
          <div class="grid grid-cols-2 mt-4 gap-4 text-center">
            <div>
              <h3 class="text-white text-3xl font-bold">{{ $studentCount }}</h3>
              <p class="text-white text-sm">Étudiants</p>
            </div>
            <div>
              <h3 class="text-white text-3xl font-bold">{{ $instructorCount }}</h3>
              <p class="text-white text-sm">Formateurs</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Carte Cours/Blogs -->
    <div class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg transition duration-300 ease-in-out" style="background-image: url('{{asset("images/frontend/dashboard-stats-bg.jpg")}}');">
      <div class="absolute inset-0 bg-green-600 bg-opacity-75 transition duration-300 ease-in-out"></div>
      <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center">
        <div class="w-full">
          <div class="text-white text-lg flex space-x-2 items-center justify-center">
            <div class="bg-white rounded-md p-2 flex items-center">
              <i class="fas fa-book-open fa-sm text-green-600"></i>
            </div>
            <p>Contenu</p>
          </div>
          <div class="grid grid-cols-2 mt-4 gap-4 text-center">
            <div>
              <h3 class="text-white text-3xl font-bold">{{ $courseCount }}</h3>
              <p class="text-white text-sm">Cours</p>
            </div>
            <div>
              <h3 class="text-white text-3xl font-bold">{{ $blogCount }}</h3>
              <p class="text-white text-sm">Articles</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Carte Paiements -->
    <div class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg transition duration-300 ease-in-out" style="background-image: url('{{asset("images/frontend/dashboard-stats-bg.jpg")}}');">
      <div class="absolute inset-0 bg-purple-600 bg-opacity-75 transition duration-300 ease-in-out"></div>
      <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center">
        <div class="w-full">
          <div class="text-white text-lg flex space-x-2 items-center justify-center">
            <div class="bg-white rounded-md p-2 flex items-center">
              <i class="fas fa-credit-card fa-sm text-purple-600"></i>
            </div>
            <p>Transactions</p>
          </div>
          <div class="grid grid-cols-2 mt-4 gap-4 text-center">
            <div>
              <h3 class="text-white text-3xl font-bold">{{ $completedPayments }}</h3>
              <p class="text-white text-sm">Réussis</p>
            </div>
            <div>
              <h3 class="text-white text-3xl font-bold">{{ $canceledPayments }}</h3>
              <p class="text-white text-sm">Annulés</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Admin Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          {{ __("You're logged in!") }}
        </div>
      </div>
    </div>
  </div>



  <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-2">
    <div class="rounded-lg bg-white dark:bg-gray-800 p-6 shadow-lg max-h-64">
      <h3 class="mb-4 text-xl font-bold text-gray-900 dark:text-gray-100">Évolution des Utilisateurs</h3>
      <canvas id="userEvolutionChart" class="w-full h-64"></canvas>
    </div>

    <div class="rounded-lg bg-white dark:bg-gray-800 p-6 shadow-lg">
      <h3 class="mb-4 text-xl font-bold text-gray-900 dark:text-gray-100">Évolution des Paiements</h3>
      <canvas id="paymentEvolutionChart" class="w-full h-64"></canvas>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Récupérer les données PHP de façon correcte
      const userData = {
        labels: @json($userEvolution -> keys() -> map(function($month) {
          return \Carbon\Carbon::parse($month) -> format('M Y');
        }))
        , datasets: [{
          label: 'Nouveaux utilisateurs'
          , data: @json($userEvolution -> values())
          , borderColor: '#3B82F6'
          , tension: 0.4
          , fill: false
        }]
      };

      const paymentData = {
        labels: @json($paymentEvolution -> keys() -> map(function($month) {
          return \Carbon\Carbon::parse($month) -> format('M Y');
        }))
        , datasets: [{
          label: 'Paiements (RM)'
          , data: @json($paymentEvolution -> values())
          , borderColor: '#10B981'
          , backgroundColor: '#10B98120'
          , tension: 0.4
          , fill: true
        }]
      };

      // Configuration commune des graphiques
      const chartConfig = {
        responsive: true
        , maintainAspectRatio: false
        , scales: {
          y: {
            beginAtZero: true
            , grid: {
              color: '#e5e7eb'
            }
          }
          , x: {
            grid: {
              display: false
            }
          }
        }
        , plugins: {
          legend: {
            display: true
          }
        }
      };

      // Initialisation du graphique des utilisateurs
      new Chart(document.getElementById('userEvolutionChart'), {
        type: 'line'
        , data: userData,

        options: {
          aspectRatio:2,
          scales: {
            x: {
              max: 500
            }
            , y: {
              max: 200
            }
          }
        }
      });

      // Initialisation du graphique des paiements
      new Chart(document.getElementById('paymentEvolutionChart'), {
        type: 'line', 
        data: paymentData, 
        options: {
          scales: {
            aspectRatio:2,
            x: {
              max: 800
            }
            , y: {
              max: 800
              , ticks: {
                callback: function(value) {
                  return 'RM ' + value;
                }
              }
            }
          }
        }
      });
    });

  </script>







</x-admin-layout>
