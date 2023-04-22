
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Post & Tag') }}
        </h2>
    </x-slot>
     <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <i class="fa-solid fa-bookmark mr-2"></i>{{ __("New Post") }}
                </div>
            </div>
            <div class="dark:bg-gray-800 overflow-hidden sm:rounded-lg my-2 ml-4">
  
                    <form action="/notes" method="POST">
                    @csrf
                    <!--新規登録-->
                    <div class="mt-2">
                        <p>タイトル</p>
                        <input type="textarea" name="name" value="" placeholder="メソッドやオブジェクト名" class="p-2" size="80" >
                    </div>
                    
                    <div class="mt-2">
                        <p>説明文</p>
                        <textarea class="p-2 form-control" rows="5" name="description" value=""></textarea>
                    </div>
                    
                    <div class="mt-2">
                        <p>Cord / HowTo</p>
                        <input type="code" name="cord_txt" value="" class="p-2" size="80" placeholder="コード例、使い方例">
                    </div>
                    
                    <div class="mt-2">
                        <p>参考URL</p>
                        <input type="textarea" name="url_txt" value="" placeholder="https://example.com" size="80" class="p-2">
                    </div>
                    
                    <div class="mt-2">
                            <input type="checkbox" name="public_status" value="" >
                            <input type="hidden" name="public_status" value="0">
                            <label>公開</label>
                            <input type="checkbox" name="public_status" value="1">
                            <label>非公開</label>
                    </div>

                    
                    <div class="mt-3">
                        <button type="submit">Note Create!!</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <i class="fa-solid fa-hashtag mr-2"></i>{{ __("New Tag") }}
                </div>
            </div>
            <div class="dark:bg-gray-800 overflow-hidden sm:rounded-lg my-2 ml-4">
                <!--タグ登録-->
                <!--<form action="/tags" method="POST">-->
                <!--    <div class="mt-3">-->
                <!--        <input type="submit" value="Tag create!" class="border py-2 px-4" />-->
                <!--    </div>-->
                <!--</form>-->
            </div>
        </div>

    </div>
</x-app-layout>


