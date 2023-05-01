<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('dashboard') }}
        </h2>
    </x-slot>
     <div class="m-5">
        <div class="d-flex flex-wrap text-gray-700 text-left px-4 py-2 m-2">
            <a href="/notes/">
                <div class="card m-2" style="width: 18rem;">
                    <img src="{{ asset('/images/book02.jpg') }}" class="card-img-top">
                    <h5 class="card-header"><i class="fa-solid fa-book mr-2"></i><b>【Note】一覧画面</b></h5>
                </div>
            </a>
            
            <a href="/notes/create">
                <div class="card m-2" style="width: 18rem;">
                    <img src="{{ asset('/images/book04.jpg') }}" class="card-img-top">
                    <h5 class="card-header"><i class="fa-solid fa-file-pen mr-2"></i><b>【Note】新規投稿</b></h5>
                    <!--<p class="card-text p-2">ノート新規投稿ページはこちら</p>-->
                </div>
            </a>
            
            <a href="/tags/create">
                <div class="card m-2" style="width: 18rem;">
                    <img src="{{ asset('/images/tag01.jpg') }}" class="card-img-top">
                    <h5 class="card-header"><i class="fa-solid fa-tags mr-2"></i><b>【Tag】新規投稿画面</b></h5>
                </div>
            </a>
            
            <a href="/bookmarks">
                <div class="card m-2" style="width: 18rem;">
                    <img src="{{ asset('/images/bookmark01.jpg') }}" class="card-img-top">
                    <h5 class="card-header"><i class="fa-solid fa-book-bookmark mr-2"></i><b>【Note】マイページ</b></h5>
                </div>
            </a>
        </div>
    </div>

</x-app-layout>