<div class="container px-10 py-8 lg:px-20 lg:py-16 lg:my-10 my-8">
  <div class="rounded-lg bg-blue-600">
    <div class="grid grid-cols-1 items-center gap-x-28 gap-y-10 lg:grid-cols-2 p-4 lg:p-0">
      <!-- Countdown Left Block -->
      <div class="overflow-hidden rounded-lg">
        <img src="{{asset('images/frontend/funfact-image.png')}}" alt="funfact-image" width="553" height="315" class="mx-auto max-w-full" />
      </div>
      <!-- Countdown Left Block -->
      <!-- Countdown Right Block -->
      <div>
        <ul class="grid grid-cols-2 gap-x-[120px] gap-y-6 text-center sm:grid-cols-2 lg:gap-y-16 lg:text-left">
          <li>
            <div class="mb-2 font-title text-3xl lg:text-4xl font-bold text-white">
              <span class="start-number" akhi="5923">0</span>+
            </div>
            <span class="text-white/80">{{ __('students_enrolled') }}</span>
          </li>
          <li>
            <div class="mb-2 font-title text-3xl lg:text-4xl font-bold text-white" data-module="countup">
              <span class="start-number" akhi="8497">0</span>+
            </div>
            <span class="text-white/80">{{ __('classes_completed') }}</span>
          </li>
          <li>
            <div class="mb-2 font-title text-3xl lg:text-4xl font-bold text-white" data-module="countup">
              <span class="start-number" akhi="7554">0</span>+
            </div>
            <span class="text-white/80">{{ __('learners_report') }}</span>
          </li>
          <li>
            <div class="mb-2 font-title text-3xl lg:text-4xl font-bold text-white" data-module="countup">
              <span class="start-number" akhi="2755">0</span>+
            </div>
            <span class="text-white/80">{{ __('top_instructors') }}</span>
          </li>
        </ul>


      </div>
      <!-- Countdown Right Block -->
    </div>
  </div>
</div>
<!-- Section Container -->
