<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Note show') }}
        </h2>
    </x-slot>
     <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Note") }}
                </div>
            </div>
            <div class="flex-1 text-gray-700 text-left bg-blue-100 px-4 py-2 m-2">

                <table>
                    <tr>
                      <th>Item Id</th>
                      <th>Name</th>
                      <th>Description</th>
                    </tr>
                      <tr>
                        <td>{{$note->name}}</td>
                        <td>{{$note->description}}</td>
                        <td>{{$note->cord_txt}}</td>
                      </tr>
                  </table>
                  <a href="/notes/{{$note->id}}/edit">Edit</a>

                  
                  <a href="/notes">Back to index</a>

            </div>
        </div>
    </div>
</x-app-layout>