<x-admin-layout title="Manage Students">
<div class="flex items-center justify-center bg-blue-600 dark:bg-sky-500/50 h-64"><h1 class="text-3xl lg:text-4xl text-white font-bold mb-5">{{__("List of all students")}} </h1></div>
    <div class="container mx-auto py-8 space-y-3">
       

        <a href="{{ route('students.create') }}"
            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 font-sans">Ajouter un Nouvel
            Eleve</a>

        <table class="min-w-full bg-white border border-gray-300 mt-5">
            <thead>
               <tr class="bg-gray-200 text-gray-600 dark:text-neutral-300 uppercase text-sm leading-normal">
          <th class="py-3 px-6 text-left font-sans"> {{__("Profil Picture")}} </th>
          <th class="py-3 px-6 text-left font-sans"> {{__("Name")}} </th>
          <th class="py-3 px-6 text-left font-sans"> {{__("Email")}} </th>
          <th class="py-3 px-6 text-left font-sans"> {{__("Profession")}} </th>
          <th class="py-3 px-6 text-left font-sans"> {{__("Roles")}} </th>
          <th class="py-3 px-6 text-center font-sans"> {{__("Actions")}} </th>
        </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($students as $student)
                <tr class="border-b border-gray-300 hover:bg-gray-100">
                    <td class="py-3 px-6">
                        <img src="{{ $student->profile_picture ? asset('storage/' . $student->profile_picture) : asset('images/default-profile.png') }}"
                            alt="Profile Picture" class="w-8 h-8 rounded-full object-cover mr-4">
                    </td>
                    <td class="py-3 px-6 font-sans text-nowrap">{{ $student->name }}</td>
                    <td class="py-3 px-6 font-sans">{{ $student->email }}</td>
                    <td class="py-3 px-6 font-sans">


                        @if (!empty($student->getRoleNames()))
                        @foreach ($student->getRoleNames() as $v)
                        <span class="bg-blue-200 text-blue-600 px-2 py-1 rounded-full text-xs text-pretty font-sans">{{
                            $v }}</span>
                        @endforeach
                        @endif
                    </td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('students.edit', $student->id) }}"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 font-sans text-nowrap">Modifier
                            User</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $students->links() }}
    </div>
</x-admin-layout>