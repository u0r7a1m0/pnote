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
                  <div>
                    <a href="/notes/{{$note->id}}">
                        <h5 class="card-header mb-2"><b>{{$note->name}}</b></h5>
                    </a>
                    <div class="p-2">
                        <a href="/notes/{{$note->id}}">
                            <p class="card-text mb-2">{{$note->description}}</p>
                            @foreach ($note->tags as $tag)
                            <p class="card-text mb-2">{{$tag->name}}</p>
                            @endforeach
                        </a>
                        <form method="POST" action="{{ route('notes.destroy', $note->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-danger" onclick="return confirm('本当に削除しますか？')"><i class="fa-solid fa-trash-can"></i></button></button>
                        </form>

                    </div>

                    

                  </div>
                </div>
                @endforeach
            </div>
        </div>
        
    </div>
</x-app-layout>
