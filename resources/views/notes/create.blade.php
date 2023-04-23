
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
                        <input type="textarea" name="name" placeholder="メソッドやオブジェクト名" class="p-2" size="80" >
                    </div>
                    
                    <div class="mt-2">
                        <p><i class="fa-solid fa-book mr-2"></i><b>説明文</b></p>
                        <input type="textarea" name="description" placeholder="メソッドやオブジェクトの説明を入力" class="p-2" size="80" >

                    </div>
                    
                    <div class="mt-2">
                        <p><i class="fa-solid fa-code mr-2"></i><b class="mr-3">Cord / HowTo</b><span class="text-secondary">※任意</span></p>
                        <textarea class="p-2 form-control" rows="5" name="cord_txt" placeholder="コード例、使い方例を入力" ></textarea>
                    </div>

                    
                    <div class="mt-2">
                        <p><i class="fa-solid fa-link mr-2"></i><b class="mr-3">参考URL</b><span class="text-secondary">※任意</span></p>
                        <input type="textarea" name="url_txt" placeholder="https://example.com" size="80" class="p-2">
                    </div>
                    

                    <div class="form-group mt-2">
                        <label for="tag_ids">{{ __('Tag') }}</label>
                        <div>
                            <select name="tag" id="tag" class="form-control">
                                @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
    
                    <div class="mt-2">
                        <input type="checkbox" name="public_status" value="1">
                        <label>公開</label>
                        <input type="checkbox" name="public_status" value="0">
                        <label>非公開</label>
                    </div>
                    
                    <div class="mt-3">
                        <button type="submit" class="btn text-white btn-success bg-success">Note Create!!</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>


<style>
    textarea {
      resize: auto;
      max-width: 500px;
      max-height: 500px;
      min-width: 100px;
      min-height: 100px;
      width:400px;
      height:200px
    }
</style>
