<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Note all') }}
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
                <table class="table">
                    <tr>
                      <th>Name</th>
                      <th>Description</th>
                      <td></td>
                    </tr>
                    @foreach($notes as $note)
                      <tr>
                        <td>{{$note->name}}</td>
                        <td>{{$note->description}}</td>
                        <td><a href="/notes/{{$note->id}}">Details</a></td>
                      </tr>
                    @endforeach
                  </table>
              
            </div>
        </div>
    </div>
</x-app-layout>