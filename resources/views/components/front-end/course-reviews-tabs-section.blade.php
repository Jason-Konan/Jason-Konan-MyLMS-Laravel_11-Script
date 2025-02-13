 <div class="flex items-center justify-center">
     <div class="flex items-center justify-center gap-5 w-[600px]">
         <div class=" w-[250px] h-[250px] p-6 flex flex-col items-center justify-center gap-4 shadow-lg bg-white">
             <h4 class="text-3xl md:text-8xl font-bold text-slate-900">5.0</h4>

             <span class="flex gap-1 font-medium">
                 @for ($i = 1; $i
                 <= 5; $i++)
                     <x-lucide-star class="text-yellow-500" />
                 @endfor

             </span>
             <span class="font-bold text-lg font-mono">{{$course->comments_for_courses->count()}} reviews</span>
         </div>
         <div class="box flex flex-col gap-y-4 w-full">

             <!-- Progress 100% -->
             <div class="flex items-center gap-x-3 whitespace-nowrap">
                 <div class="inline-flex gap-2">
                     <p class="font-medium text-lg py-[1px] text-black mr-[2px]">5
                         <i class="fa-solid fa-star size-4 text-yellow-500"></i>
                     </p>
                 </div>
                 <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                     <div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-blue-500" style="width: 100%"></div>
                 </div>
                 <div class="w-10 text-end">
                     <span class="text-sm text-gray-800 dark:text-white">100%</span>
                 </div>
             </div>
             <!-- End Progress -->

             <!-- Progress -->
             <div class="flex items-center gap-x-3 whitespace-nowrap">
                 <div class="inline-flex gap-2">
                     <p class="font-medium text-lg py-[1px] text-black mr-[2px]">4
                         <i class="fa-solid fa-star size-4 text-yellow-500"></i>
                     </p>
                 </div>
                 <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                     <div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-blue-500" style="width: 75%"></div>
                 </div>
                 <div class="w-10 text-end">
                     <span class="text-sm text-gray-800 dark:text-white">75%</span>
                 </div>
             </div>
             <!-- End Progress -->

             <!-- Progress -->
             <div class="flex items-center gap-x-3 whitespace-nowrap">
                 <div class="inline-flex gap-2">
                     <p class="font-medium text-lg py-[1px] text-black mr-[2px]">3
                         <i class="fa-solid fa-star size-4 text-yellow-500"></i>
                     </p>
                 </div>
                 <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                     <div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-blue-500" style="width: 50%"></div>
                 </div>
                 <div class="w-10 text-end">
                     <span class="text-sm text-gray-800 dark:text-white">50%</span>
                 </div>
             </div>
             <!-- End Progress -->

             <!-- Progress -->
             <div class="flex items-center gap-x-3 whitespace-nowrap">
                 <div class="inline-flex gap-2">
                     <p class="font-medium text-lg py-[1px] text-black mr-[2px]">2
                         <i class="fa-solid fa-star size-4 text-yellow-500"></i>
                     </p>
                 </div>
                 <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                     <div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-blue-500" style="width: 25%"></div>
                 </div>
                 <div class="w-10 text-end">
                     <span class="text-sm text-gray-800 dark:text-white">25%</span>
                 </div>
             </div>
             <!-- End Progress -->

             <!-- Progress -->
             <div class="flex items-center gap-x-3 whitespace-nowrap">
                 <div class="inline-flex gap-2">
                     <p class="font-medium text-lg py-[1px] text-black mr-[2px]">1
                         <i class="fa-solid fa-star size-4 text-yellow-500"></i>
                     </p>
                 </div>
                 <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
                     <div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-blue-500" style="width: 15%"></div>
                 </div>
                 <div class="w-10 text-end">
                     <span class="text-sm text-gray-800 dark:text-white">15%</span>
                 </div>
             </div>
             <!-- End Progress -->
         </div>
     </div>


 </div>
 <!-- Comments Section -->

 <section class="bg-white p-6 rounded-lg shadow mt-8">
     <h3 class="text-xl font-bold text-gray-800 mb-4">Comments</h3>
     <div class="space-y-8" id="commentsContainer">
         @foreach ($course->comments_for_courses->sortByDesc('created_at') as $comment)
         <div id="commentTemplate" class="flex bg-slate-50 p-6 rounded-lg">
             <img class="w-10 h-10 sm:w-12 sm:h-12 object-cover rounded-full"
                 src=" {{Auth::user()->profile_picture}} " alt="Image de profil de {{ $comment->user->name }}">


             <div class="ml-4 flex flex-col">
                 <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                     <h2 class="font-bold text-slate-900 text-lg">{{ $comment->user->name }}</h2>
                     <time class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</time>
                 </div>
                 <div class="flex items-center mt-2">
                     @for ($i = 1; $i <= $comment->rating; $i++)
                         <i class="fa-solid fa-star text-yellow-400 text-base"></i>
                         @endfor
                         @for ($i = $comment->rating + 1; $i <= 5; $i++)
                             <i class="fa-solid fa-star text-gray-300 text-base"></i>
                             @endfor
                 </div>
                 @if ($comment->audio)
                 <audio controls src="{{ asset('storage/' . $comment->audio) }}" style="display: block; margin-top: 10px;"></audio>
                 @endif
                 <p class="mt-4 text-slate-800 sm:leading-loose">{{ $comment->content }}</p>
             </div>
         </div>
         @endforeach
     </div>

     @auth
     <form action="{{ route('course.comment', $course) }}" method="post" enctype="multipart/form-data" class="mt-6">
         @csrf
         <label for="comment" class="block text-sm font-medium text-gray-700 mb-2">Add a comment</label>
         <div class="flex items-center justify-center gap-4">
             <textarea id="content" name="content" rows="3"
                 class="form-textarea w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                 placeholder="Write your comment..."></textarea>
             <div id="audioRecorder" class="hs-tooltip inline-block space-y-4">

                 <button id="startRecording" type="button"
                     class="hs-tooltip-toggle mt-4 {{ $course->audio_enabled ? '' : 'opacity-50 cursor-not-allowed' }}"
                     {{ $course->audio_enabled ? '' : 'disabled' }}>
                     <x-lucide-mic class="size-5 {{ $course->audio_enabled ? 'text-green-600' : 'text-gray-400' }}" />
                     <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">
                         {{$course->audio_enabled ? 'Record a voice' : "Can't record"}}
                     </span>
                 </button>
                 <button id="stopRecording" type="button" style="background: red; color: white; padding: 10px; display: none;">
                     🛑 Stop Recording
                 </button>
                 <audio id="audioPreview" controls style="display: none; margin-top: 10px;"></audio>
             </div>
         </div>

         <!-- Champ audio -->
         <input type="hidden" name="audio" id="audioFile">

         <label for="rating" class="block text-sm font-medium text-gray-700 mt-4">Rate this course (1-5)</label>
         <div class="flex items-center mt-2">
             @for ($i = 1; $i <= 5; $i++)
                 <input type="radio" id="rating-{{ $i }}" name="rating" value="{{ $i }}"
                 class="hidden" @if (old('rating')==$i) checked @endif>
                 <label for="rating-{{ $i }}" class="cursor-pointer">
                     <svg class="w-6 h-6 @if (old('rating') >= $i) text-yellow-500 @else text-gray-300 @endif hover:text-yellow-500 transition-colors rating-star"
                         fill="currentColor" viewBox="0 0 20 20">
                         <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                     </svg>
                 </label>
                 @endfor
         </div>

         <button type="submit" class="mt-3 px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700">
             Post Comment and Rating
         </button>
     </form>
     @endauth
 </section>


 <script>
     document.addEventListener('DOMContentLoaded', function() {
         const startButton = document.getElementById('startRecording');
         const stopButton = document.getElementById('stopRecording');
         const audioPreview = document.getElementById('audioPreview');
         const audioFileInput = document.getElementById('audioFile');
         let mediaRecorder;
         let audioChunks = [];

         startButton.addEventListener('click', async () => {
             try {
                 const stream = await navigator.mediaDevices.getUserMedia({
                     audio: true
                 });
                 mediaRecorder = new MediaRecorder(stream);

                 mediaRecorder.ondataavailable = (event) => {
                     audioChunks.push(event.data);
                 };

                 mediaRecorder.onstop = () => {
                     const audioBlob = new Blob(audioChunks, {
                         type: 'audio/mpeg'
                     });
                     const audioUrl = URL.createObjectURL(audioBlob);

                     // Prévisualisation de l'audio
                     audioPreview.src = audioUrl;
                     audioPreview.style.display = 'block';

                     // Convertir l'audio en base64 pour l'envoyer
                     const reader = new FileReader();
                     reader.onloadend = () => {
                         audioFileInput.value = reader.result; // Insérer la base64 dans le champ caché
                     };
                     reader.readAsDataURL(audioBlob);
                 };

                 mediaRecorder.start();
                 audioChunks = [];
                 startButton.style.display = 'none';
                 stopButton.style.display = 'inline-block';
             } catch (err) {
                 console.error('Erreur d’accès au microphone :', err);
                 alert('Impossible d’accéder au microphone.');
             }
         });

         stopButton.addEventListener('click', () => {
             mediaRecorder.stop();
             stopButton.style.display = 'none';
             startButton.style.display = 'inline-block';
         });

         document.querySelector('form').addEventListener('submit', async (e) => {
             e.preventDefault();
             const form = e.target;
             const formData = new FormData(form);

             try {
                 const response = await fetch(form.action, {
                     method: 'POST',
                     headers: {
                         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                     },
                     body: formData,
                 });

                 const data = await response.json();
                 if (data.success) {
                     alert('Comment successfully added!');
                     addCommentToDOM(data.comment);
                     form.reset();
                     audioPreview.style.display = 'none';
                 } else {
                     alert('Failed to add comment.');
                 }
             } catch (error) {
                 console.error('Erreur lors de l\'ajout du commentaire:', error);
             }
         });

         function addCommentToDOM(comment) {
             const commentContainer = document.getElementById('commentsContainer');
             const commentTemplate = document.getElementById('commentTemplate').cloneNode(true);

             // Rendre visible le commentaire cloné
             commentTemplate.style.display = 'flex';

             // Remplir dynamiquement les informations du commentaire
             commentTemplate.querySelector('.comment-user-name').textContent = comment.user.fullName;
             commentTemplate.querySelector('.comment-created-at').textContent = new Date(comment.created_at).toLocaleString();

             // Ajouter les étoiles en fonction de la note
             const ratingElement = commentTemplate.querySelector('.comment-rating');
             for (let i = 1; i <= 5; i++) {
                 const star = document.createElement('i');
                 star.classList.add('fa-solid', 'fa-star', 'text-2xl');
                 star.classList.add(i <= comment.rating ? 'text-yellow-400' : 'text-gray-300');
                 ratingElement.appendChild(star);
             }

             // Ajouter le contenu du commentaire
             commentTemplate.querySelector('.comment-content').textContent = comment.content || '';

             // Si l'audio est présent, l'ajouter
             if (comment.audio) {
                 const audioElement = commentTemplate.querySelector('.comment-audio');
                 audioElement.src = `/storage/${comment.audio}`;
                 audioElement.style.display = 'block';
             }

             // Ajouter le nouveau commentaire au début de la liste
             commentContainer.prepend(commentTemplate);
         }
         //      function addCommentToDOM(comment) {
         //          const commentContainer = document.getElementById('commentsContainer');
         //          const newComment = document.createElement('div');
         //          newComment.classList.add('flex', 'bg-slate-50', 'p-6', 'rounded-lg');

         //          // Génération du contenu HTML avec les données du commentaire
         //          newComment.innerHTML = `
         //     <img class="w-10 h-10 sm:w-12 sm:h-12 object-cover rounded-full"
         //         src=""
         //         alt="Image de profil de ${comment.user.name}">
         //     <div class="ml-4 flex flex-col">
         //         <div class="flex flex-col sm:flex-row sm:items-center">
         //             <h2 class="font-bold text-slate-900 text-lg">${comment.user.name}</h2>
         //             <time class="text-sm text-gray-500">${new Date(comment.created_at).toLocaleString()}</time>
         //         </div>
         //         <div class="flex items-center mt-2">
         //             ${Array.from({ length: 5 }).map((_, i) => ` <
         //              i class = "fa-solid fa-star text-${i < comment.rating ? 'yellow-400' : 'gray-300'} text-md" > < /i>
         //          `).join('')}
         //         </div>
         //         <p class="mt-4 text-slate-800 sm:leading-loose">${comment.content || ''}</p>
         //         ${
         //             comment.audio
         //                 ? `<audio controls src="/storage/${comment.audio}" style="display: block; margin-top: 10px;"></audio>`
         //                 : ''
         //         }
         //     </div>
         // `;

         //          // Ajouter le nouveau commentaire au début de la liste
         //          commentContainer.prepend(newComment);
         //      }

     });
 </script>