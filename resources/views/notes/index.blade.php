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
            <div class="d-flex flex-wrap text-gray-700 text-left bg-blue-100 px-4 py-2 m-2">
                @foreach($notes as $note)
                <div class="card m-2" style="width: 20rem;">
                  <div class="card-body">
                    <h5 class="card-title mb-2"><b>{{$note->name}}</b></h5>
                    <p class="card-text mb-2">{{$note->description}}</p>

                    @foreach ($note->tags as $tag)
                    <p class="card-text mb-2">{{$tag->name}}</p>
                    @endforeach
                    <a href="/notes/{{$note->id}}" class="btn btn-outline-primary">show</a>
                    <a href="/notes/{{$note->id}}" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></a>
                  </div>
                </div>
                @endforeach
            </div>
        </div>
        
    </div>
</x-app-layout>
