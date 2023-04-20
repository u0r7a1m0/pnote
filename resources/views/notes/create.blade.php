
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
                        <input type="textarea" name="name" value="{{ old('name') }}" placeholder="メソッドやオブジェクト名" class="p-2" size="80" >
                        @if($errors->has('name')) 
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    
                    <div class="mt-2">
                        <p>説明文</p>
                        <input type="template" name="description" value="{{ old('description') }}" rows="10" size="80" class="p-2" placeholder="説明を入力してください！" >
                        @if($errors->has('description')) 
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    
                    <div class="mt-2">
                        <p>Cord / HowTo</p>
                        <input type="code" name="cord_txt" value="{{ old('cord_txt') }}" class="p-2" size="80" placeholder="コード例、使い方例">
                        @if($errors->has('cord_txt')) 
                            <span class="text-danger">{{ $errors->first('cord_txt') }}</span>
                        @endif
                    </div>
                    
                    <div class="mt-2">
                        <p>参考URL</p>
                        <input type="textarea" name="url_txt" value="{{ old('url_txt') }}" placeholder="https://example.com" size="80" class="p-2">
                        @if($errors->has('url_txt')) 
                            <span class="text-danger">{{ $errors->first('url_txt') }}</span>
                        @endif
                    </div>
                    
                    <div class="mt-2">
                            <input type="checkbox" name="public_status" value="{{ old('public_status') }}" >
                            <input type="hidden" name="public_status" value="0">
                            <label>公開</label>
                            <input type="checkbox" name="public_status" value="1">
                            <label>非公開</label>
                    </div>
                    
                    <div class="mt-3">
                        <input type="submit" value="Note create!" class="border py-2 px-4" />
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
                <form>
                    <!--新規登録-->
                    <div class="mt-2">
                        <p>タグ名</p>
                        <input type="textarea" name="name" value="{{ old('name') }}" placeholder="Ruby、PHP、Javaなど" class="p-2" size="80" >
                        @if($errors->has('name')) 
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mt-3">
                        <input type="submit" value="Tag create!" class="border py-2 px-4" />
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>


