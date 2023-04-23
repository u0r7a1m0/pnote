
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Tag') }}
        </h2>
    </x-slot>
     <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <i class="fa-solid fa-bookmark mr-2"></i>{{ __("New Tag") }}
                </div>
            </div>
            <div class="dark:bg-gray-800 overflow-hidden sm:rounded-lg my-2 ml-4">
  
                    <form action="/tags" method="POST">
                    @csrf
                    <!--新規登録-->
                    <div class="mt-2">
                        <p>タグ名</p>
                        <input type="textarea" name="name" placeholder="メソッドやオブジェクト名" class="p-2" size="80" >
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn text-white btn-success bg-success">Note Create!!</button>
                    </div>
                </form>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <i class="fa-solid fa-hashtag mr-2"></i>{{ __("Tags") }}
                </div>
            </div>
            <div class="m-4">
               
                @if ($tags->isEmpty())
                    <p>登録がありません。</p>
                @else
                    @foreach ($tags as $tag)
                        <p class="card-text mb-2">{{$tag->name}}</p>
                    @endforeach
                @endif
            </div>
        </div>

    </div>
</x-app-layout>

