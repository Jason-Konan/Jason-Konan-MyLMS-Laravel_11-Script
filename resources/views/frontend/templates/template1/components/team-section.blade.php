 {{-- <div class="py-16 dark:bg-slate-950 px-8 lg:px-12">
   <!-- Title -->
   <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">

     <h2 class="font-bold text-gray-900 dark:text-slate-100 md:text-4xl md:leading-tight text-3xl lg:text-4xl">Meet <span class="text-blue-600 underline decoration-wavy decoration-yellow-400">Our team</span>
     </h2>
     <p class="mt-6 text-center text-lg text-gray-600 dark:text-gray-400">Meet our team of professionals to serve you.</p>
   </div>
   <!-- End Title -->

   <!-- Grid -->
   <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-8 md:gap-12">
     @forelse($teachers as $teacher)
     <div class="text-center">
       <img class="rounded-full w-24 h-24 mx-auto" src="{{ $teacher->profile_picture ? asset('storage/' . $teacher->profile_picture) : asset('images/default-profile.png') }}" alt="Profile Picture">
 <div class="mt-2 sm:mt-4">
   <h3 class="font-medium text-gray-800 dark:text-gray-200">
     {{$teacher->name}}
   </h3>
   <p class="text-sm text-gray-600 dark:text-gray-400">
     {{$teacher->profession??"Founder / CEO"}}
   </p>
 </div>
 </div>
 <!-- End Col -->
 @empty
 <p class="text-xl text-gray-600 dark:text-gray-400">
   No Teachers found
 </p>

 @endforelse

 </div>
 <!-- End Grid -->


 </div> --}}
 <!-- End Team -->
 <div class="py-16 dark:bg-slate-950 px-8 lg:px-12">
   <!-- Titre de la section -->
   <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
     <h2 class="text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-5xl">
       {{ __('team.meet') }}
       <span class="relative inline-block">
         <span class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-cyan-500 rounded-lg transform -skew-y-3 opacity-30"></span>
         <span class="relative text-blue-600 dark:text-blue-400">{{ __('team.our_team') }}</span>
       </span>
     </h2>

     <p class="mt-6 text-center text-lg text-gray-600 dark:text-gray-400">
       {{ __('team.meet_our_professionals') }}
     </p>
   </div>




   <!-- Fin Titre -->

   <!-- Grille des enseignants -->
   @forelse($teachers as $teacher)
   <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-8 md:gap-12">
     <!-- Carte d'un enseignant -->
     <div class="text-center">
       <img class="rounded-full w-24 h-24 mx-auto" src="{{ $teacher->profile_picture ? asset('storage/' . $teacher->profile_picture) : asset('images/default-profile.png') }}" alt="Photo de {{ $teacher->name }}">
       <div class="mt-2 sm:mt-4">
         <h3 class="font-medium text-gray-800 dark:text-gray-200">
           {{ $teacher->name }}
         </h3>
         <p class="text-sm text-gray-600 dark:text-gray-400">
           {{ $teacher->profession ?? "Founder / CEO" }}
         </p>
       </div>
     </div>
     <!-- Fin Carte -->
   </div>
   @empty
   <!-- Message en cas d'absence d'enseignants -->
   <p class="text-xl text-center text-gray-600 dark:text-gray-400">
     No Teachers found
   </p>
   @endforelse
   <!-- Fin Grille -->
 </div>
