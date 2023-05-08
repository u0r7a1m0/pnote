<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Note show') }}
        </h2>
    </x-slot>
     <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <p class="card-text p-6"><i class="fa-brands fa-pagelines mr-2" style="color: #1f5127;"></i>{{$note->name}}
                @foreach ($note->tags as $tag)
                    <span class="card-text text-white text-center ml-4" style="width:140px">
                    @if ($tag->name == "Ruby")
                    <span class="bg-danger rounded px-2"><i class="fa-solid fa-hashtag mr-1"></i>{{$tag->name}}</span>
                    @elseif ($tag->name == "PHP")
                    <span class="bg-primary rounded px-2"><i class="fa-solid fa-hashtag mr-1"></i>{{$tag->name}}</span>
                    @elseif ($tag->name == "JavaScript")
                    <span class="bg-success rounded px-2"><i class="fa-solid fa-hashtag mr-1"></i>{{$tag->name}}</span>
                    @elseif ($tag->name == "Laravel")
                    <span class="bg-secondary rounded px-2"><i class="fa-solid fa-hashtag mr-1"></i>{{$tag->name}}</span>
                    @else
                    <span class="bg-info rounded px-2"><i class="fa-solid fa-hashtag mr-1"></i>{{$tag->name}}</span>
                    @endif
                    </b></span>
                @endforeach
                </p>
                    
            </div>
            <div class="flex-1 text-gray-700 text-left px-4 py-2 m-2">

                <div class="card">
                    <div class="card-body">
                        <!--説明文-->
                        <div class="card-text mb-2">
                            <p class="mb-2"><i class="fa-solid fa-book mr-2"></i><b>説明</b></p>
                            {{$note->description}}
                        </div>
                        
                        <!--コード/Howto-->
                        <div class="card-text mb-2 border-top pt-3">
                            <p class="mb-2"><i class="fa-solid fa-code mr-2"></i><b>コード & Howto</b></p>
                            <p>{!! nl2br(e($note->cord_txt)) !!}</p>
                        </div>
                        
                        <!--参考URL-->
                        <div class="card-text mb-4 border-top pt-3">
                            <p class="mb-2"><i class="fa-solid fa-link mr-2"></i><b>参考URL</b></p>
                            <a href="{{$note->url_txt}}" target=”_blank”>{{$note->url_txt}}</a>
                        </div>

                        
                        <div class="d-flex">
                            <div class="mr-2">
                                <a href="/notes" class="btn btn-outline-success">一覧画面へ</a>
                            </div>

                            @if(Auth::id() == $note->user_id)
                            <div class="mr-4">
                                <a href="/notes/{{$note->id}}/edit" class="btn btn-outline-primary">編集</a>
                            </div>
                            
                            <form method="POST" action="{{ route('notes.destroy', $note->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-danger mt-2" onclick="return confirm('本当に削除しますか？')"><i class="fa-solid fa-trash-can"></i></button>
                            </form>

                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>