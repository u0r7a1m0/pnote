<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Page') }}
        </h2>
    </x-slot>
     <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--ログインユーザーの投稿一覧-->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <i class="fa-brands fa-pagelines mr-2" style="color: #1f5127;"></i>{{ __("My Notes") }}
                </div>
            </div>
            <div class="mt-4 ml-3 d-flex flex-wrap">
                @if ($notes->isEmpty())
                    <p>登録がありません。</p>
                @else
                    @foreach ($notes as $note)
                    <div class="card m-2" style="width: 20rem;">
                        <a href="/notes/{{$note->id}}">
                            <div class="card-header d-flex justify-content-between">
                                
                            <p><b>{{$note->name}}</b></p>
                            <div class="d-flex">
                                @if ($note->public_status)
                                <i class="fa-solid fa-lock-open mr-2 mt-1" style="color: #4eb75a;"></i>
                                @else
                                <i class="fa-solid fa-lock mr-2 mt-1" style="color: #b5bab6;"></i>
                                @endif
                                <form method="POST" action="{{ route('notes.destroy', $note->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-danger" onclick="return confirm('本当に削除しますか？')"><i class="fa-solid fa-trash-can"></i></button></button>
                                </form>
                            </div>
     
                            </div>
                        </a>
                        <div class="p-2">
                            <a href="/notes/{{$note->id}}">
                                <p class="card-text mb-2">{{$note->description}}</p>
                                @foreach ($note->tags as $tag)
                                    <span class="card-text rounded bg-info text-white px-2 text-center" style="width:140px"><i class="fa-solid fa-hashtag mr-1"></i><b>{{$tag->name}}</b></span>
                                @endforeach
                            </a>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
            
            
            <!--ログインユーザーのブックマーク-->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <i class="fa-brands fa-pagelines mr-2" style="color: #1f5127;"></i>{{ __("Bookmark") }}
                </div>
            </div>
            <div class="mt-4 ml-3">
                <p>データが入ります。</p>
            </div>
        </div>
    </div>
    
    
 
</x-app-layout>