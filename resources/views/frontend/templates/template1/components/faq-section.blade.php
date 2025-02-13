 <!-- FAQ -->
 <div class="max-w-[85rem] py-16 dark:bg-slate-900 px-8 lg:px-12">
   <!-- Grid -->
   <div class="grid md:grid-cols-5 space-y-8  gap-10">
     <div class="md:col-span-2">
       <div class="max-w-xs">
         <h2 class="text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-5xl">
           {{ __('faq.questions') }}
           <span class="relative inline-block">
             <span class="absolute -inset-1 bg-gradient-to-r from-yellow-400 to-blue-500 rounded-lg transform -skew-y-3 opacity-40"></span>
             <span class="relative text-blue-600 dark:text-blue-400">{{ __('faq.frequently_asked') }}</span>
           </span>
         </h2>
         <p class="mt-6 text-lg text-gray-600 dark:text-gray-400">
           {{ __('faq.find_answers') }}
         </p>
       </div>

     </div>

     <div class="md:col-span-3">
       <!-- Accordion -->
       {{-- <div class="hs-accordion-group divide-y divide-gray-200 dark:divide-gray-700">

         <!-- Question 1 -->
         <div class="hs-accordion pb-3 active" id="hs-basic-with-title-and-arrow-stretched-heading-one">
           <button class="hs-accordion-toggle group pb-3 inline-flex items-center justify-between gap-x-3 w-full md:text-lg font-semibold text-left text-gray-800 transition hover:text-gray-500 dark:text-gray-200 dark:hover:text-gray-400" aria-controls="hs-basic-with-title-and-arrow-stretched-collapse-one">
             Puis-je annuler mon abonnement à tout moment ?
             <!-- Icônes SVG inchangées -->
           </button>
           <div id="hs-basic-with-title-and-arrow-stretched-collapse-one" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-basic-with-title-and-arrow-stretched-heading-one">
             <p class="text-gray-600 dark:text-gray-400">
               Oui, vous pouvez résilier à tout moment sans justification. Vos cours restent accessibles jusqu'à la fin de la période payée. Un formulaire de feedback facultatif vous sera proposé pour améliorer notre offre.
             </p>
           </div>
         </div>

         <!-- Question 2 -->
         <div class="hs-accordion pt-6 pb-3" id="hs-basic-with-title-and-arrow-stretched-heading-two">
           <button class="hs-accordion-toggle group pb-3 inline-flex items-center justify-between gap-x-3 w-full md:text-lg font-semibold text-left text-gray-800 transition hover:text-gray-500 dark:text-gray-200 dark:hover:text-gray-400" aria-controls="hs-basic-with-title-and-arrow-stretched-collapse-two">
             Comment utiliser les crédits de formation de mon établissement ?
             <!-- Icônes SVG inchangées -->
           </button>
           <div id="hs-basic-with-title-and-arrow-stretched-collapse-two" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-basic-with-title-and-arrow-stretched-heading-two">
             <p class="text-gray-600 dark:text-gray-400">
               L'administrateur de votre organisation peut attribuer vos crédits via l'espace gestion. Ces crédits permettent d'accéder à des parcours certifiants ou des options premium, selon la convention établie avec votre établissement.
             </p>
           </div>
         </div>

         <!-- Question 3 -->
         <div class="hs-accordion pt-6 pb-3" id="hs-basic-with-title-and-arrow-stretched-heading-three">
           <button class="hs-accordion-toggle group pb-3 inline-flex items-center justify-between gap-x-3 w-full md:text-lg font-semibold text-left text-gray-800 transition hover:text-gray-500 dark:text-gray-200 dark:hover:text-gray-400" aria-controls="hs-basic-with-title-and-arrow-stretched-collapse-three">
             Quelles sont les options d'abonnement disponibles ?
             <!-- Icônes SVG inchangées -->
           </button>
           <div id="hs-basic-with-title-and-arrow-stretched-collapse-three" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-basic-with-title-and-arrow-stretched-heading-three">
             <p class="text-gray-600 dark:text-gray-400">
               Nous proposons 3 formules : Étudiant (accès basique), Premium (tous les cours + certification) et Institutionnel (gestion multi-apprenants). Les tarifs dégressifs s'appliquent pour les engagements annuels.
             </p>
           </div>
         </div>

         <!-- Question 4 -->
         <div class="hs-accordion pt-6 pb-3" id="hs-basic-with-title-and-arrow-stretched-heading-four">
           <button class="hs-accordion-toggle group pb-3 inline-flex items-center justify-between gap-x-3 w-full md:text-lg font-semibold text-left text-gray-800 transition hover:text-gray-500 dark:text-gray-200 dark:hover:text-gray-400" aria-controls="hs-basic-with-title-and-arrow-stretched-collapse-four">
             Quelles mesures de sécurité protègent mes données ?
             <!-- Icônes SVG inchangées -->
           </button>
           <div id="hs-basic-with-title-and-arrow-stretched-collapse-four" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-basic-with-title-and-arrow-stretched-heading-four">
             <p class="text-gray-600 dark:text-gray-400">
               Nous utilisons un chiffrement AES-256 et sommes certifiés RGPD. Les paiements sont sécurisés via PCI DSS Level 1. Vos résultats et travaux ne sont jamais partagés sans consentement explicite.
             </p>
           </div>
         </div>

         <!-- Question 5 -->
         <div class="hs-accordion pt-6 pb-3" id="hs-basic-with-title-and-arrow-stretched-heading-five">
           <button class="hs-accordion-toggle group pb-3 inline-flex items-center justify-between gap-x-3 w-full md:text-lg font-semibold text-left text-gray-800 transition hover:text-gray-500 dark:text-gray-200 dark:hover:text-gray-400" aria-controls="hs-basic-with-title-and-arrow-stretched-collapse-five">
             Comment accéder à une formation que j'ai achetée ?
             <!-- Icônes SVG inchangées -->
           </button>
           <div id="hs-basic-with-title-and-arrow-stretched-collapse-five" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-basic-with-title-and-arrow-stretched-heading-five">
             <p class="text-gray-600 dark:text-gray-400">
               Toutes vos formations apparaissent dans votre espace personnel. Vous recevrez également un email de confirmation avec les accès directs. En cas de difficulté, notre support réactif intervient sous 2h ouvrées.
             </p>
           </div>
         </div>

         <!-- Question 6 -->
         <div class="hs-accordion pt-6 pb-3" id="hs-basic-with-title-and-arrow-stretched-heading-six">
           <button class="hs-accordion-toggle group pb-3 inline-flex items-center justify-between gap-x-3 w-full md:text-lg font-semibold text-left text-gray-800 transition hover:text-gray-500 dark:text-gray-200 dark:hover:text-gray-400" aria-controls="hs-basic-with-title-and-arrow-stretched-collapse-six">
             Puis-je modifier mon type de licence ultérieurement ?
             <!-- Icônes SVG inchangées -->
           </button>
           <div id="hs-basic-with-title-and-arrow-stretched-collapse-six" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-basic-with-title-and-arrow-stretched-heading-six">
             <p class="text-gray-600 dark:text-gray-400">
               Oui, toute modification de licence applique un prorata temporis. Notre équipe peut vous proposer une simulation personnalisée via le chat en direct ou par email à billing@votreplateforme.com.
             </p>
           </div>
         </div>
       </div>
        --}}
       <div class="hs-accordion-group divide-y divide-gray-200 dark:divide-gray-700">
         @foreach ([
         'cancel_subscription',
         'use_credits',
         'subscription_options',
         'data_security',
         'access_purchased_course',
         'modify_license'
         ] as $question)
         <div class="hs-accordion pt-6 pb-3">
           <button class="hs-accordion-toggle group pb-3 inline-flex items-center justify-between gap-x-3 w-full md:text-lg font-semibold text-left text-gray-800 transition hover:text-gray-500 dark:text-gray-200 dark:hover:text-gray-400">
             {{ __('faq.' . $question . '_q') }}
           </button>
           <div class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
             <p class="text-gray-600 dark:text-gray-400">
               {{ __('faq.' . $question . '_a') }}
             </p>
           </div>
         </div>
         @endforeach
       </div>

     </div>
   </div>
 </div>
 <!-- End FAQ -->
