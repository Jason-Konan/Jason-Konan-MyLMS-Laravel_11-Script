<div x-data="{ stats: [
        { data: '35K', title: 'Customers' },
        { data: '10K+', title: 'Downloads' },
        { data: '40+', title: 'Countries' },
        { data: '30M+', title: 'Total revenue' }
    ] 
}">

  <section class="py-14 bg-gray-100 my-10">
    <div class="w-7xl mx-auto px-4 text-gray-600 md:px-8">
      <div class="max-w-2xl mx-auto text-center">
        <h2 class="text-gray-800 text-2xl font-bold md:text-4xl md:leading-tight">
          {{ __('community.join_excellence') }}
        </h2>
        <p class="mt-3">
          {{ __('community.trusted_by') }}
        </p>
      </div>
      <div class="mt-12">
        <ul class="grid grid-cols-2 lg:grid-cols-4 gap-4 items-center justify-center gap-y-10 sm:flex-row sm:flex-wrap lg:divide-x">
          <!-- Apprenants certifiés -->
          <li class="text-center px-12 md:px-16">
            <h4 class="text-4xl text-indigo-600 font-semibold">98%</h4>
            <p class="mt-3 font-medium">{{ __('community.success_rate') }}</p>
          </li>

          <!-- Parcours complets -->
          <li class="text-center px-12 md:px-16">
            <h4 class="text-4xl text-indigo-600 font-semibold">87%</h4>
            <p class="mt-3 font-medium">{{ __('community.completion_rate') }}</p>
          </li>

          <!-- Partenariats -->
          <li class="text-center px-12 md:px-16">
            <h4 class="text-4xl text-indigo-600 font-semibold">150+</h4>
            <p class="mt-3 font-medium">{{ __('community.partners') }}</p>
          </li>

          <!-- Satisfaction -->
          <li class="text-center px-12 md:px-16">
            <h4 class="text-4xl text-indigo-600 font-semibold">4,9/5</h4>
            <p class="mt-3 font-medium">{{ __('community.satisfaction') }}</p>
          </li>
        </ul>
      </div>
    </div>
  </section>



</div>
