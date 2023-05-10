<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Note') }}
        </h2>
    </x-slot>
     <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="dark:bg-gray-800 overflow-hidden sm:rounded-lg my-2 ml-4">
                
                <form method="POST" action="{{ route('notes.update', $note->id) }}">
                @csrf
                @method('PUT')

                <div>
                    <p><i class="fa-solid fa-flag mr-2"></i><b>タイトル</b></p>
                    <input type="textarea" name="name" value="{{ $note->name }}" class="p-2" size="80">
                </div>
                
                <div class="mt-3">
                    <p><i class="fa-solid fa-book mr-2"></i><b>説明文</b></p>
                    <input type="textarea" name="description" value="{{ $note->description }}" class="p-2" size="80">
                </div>
                
                <div class="mt-3">
                    <p><i class="fa-solid fa-code mr-2"></i><b>Cord / HowTo</b></p>
                    <textarea name="cord_txt" class="p-2 form-control" rows="8" placeholder="コード例、使い方例を入力" >{{ $note->cord_txt }}</textarea>
                </div>

                <div class="mt-3">
                    <p><i class="fa-solid fa-book mr-2"></i><b>参考URL</b></p>
                    <input type="textarea" name="url_txt" value="{{ $note->url_txt }}" class="p-2" size="80" placeholder="https://example.com">
                </div>
                
                <div class="form-group mt-3">
                    <p><i class="fa-solid fa-hashtag mr-2"></i><b class="mr-3">タグ</b></p>
                    <select name="tags[]" class="form-control" style="width:30%">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ $note->tags->contains($tag->id) ? 'selected' : '' }}>{{ $tag->name }}</option>
                    @endforeach
                    </select>
                </div> 
                
                <div class="form-group mt-3">
                    <p><i class="fa-solid fa-key mr-2"></i><b class="mr-3">公開設定</b></p>
                    <select name="public_status" class="form-control"  style="width:30%">
                        <option value="1">公開</option>
                        <option value="0">非公開</option>
                    </select>
                </div>
                
                <div class="mt-4 d-flex">
                    <button type="submit" class="btn text-white btn-success bg-success">Update!!</button>
                    <div class="btn ml-3"><a href="/notes/{{$note->id}}">戻る</a></div>
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
      height:200px;
    }
</style>