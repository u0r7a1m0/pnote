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
                <!--新規登録-->
                <p>新規投稿フォームがここにはいるよ！</p>
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
                <p>タグ投稿フォームがここにはいるよ！</p>
            </div>
        </div>

    </div>
</x-app-layout>