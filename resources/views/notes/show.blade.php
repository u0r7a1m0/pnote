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
                    {{$note->name}}
                    @foreach ($note->tags as $tag)
                        <span class="card-text rounded bg-info text-white px-2 text-center ml-4" style="width:140px"><i class="fa-solid fa-hashtag mr-1"></i><b>{{$tag->name}}</b></span>
                    @endforeach
                </div>
            </div>
            <div class="flex-1 text-gray-700 text-left bg-blue-100 px-4 py-2 m-2">

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
                        
                        <div>
                            
                        <a href="/notes" class="btn btn-outline-success">一覧画面へ</a>
                        <a href="/notes/{{$note->id}}/edit" class="btn btn-outline-primary">編集</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>