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
                    {{ __("Edit Note") }}
                </div>
            </div>
            <div class="dark:bg-gray-800 overflow-hidden sm:rounded-lg my-2 ml-4">
  
                    <form action="{{ route('notes.update', $note->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!--新規登録-->
                    <div class="mt-4">
                        
                        <p><i class="fa-solid fa-flag mr-2"></i><b>タイトル</b></p>
                        <input type="textarea" name="name" class="p-2" size="80" >
                    </div>
                    
                    <div class="mt-3">
                        <p><i class="fa-solid fa-book mr-2"></i><b>説明文</b></p>
                        <input type="textarea" name="description" class="p-2" size="80" >

                    </div>
                    
                    <div class="mt-3">
                        <p><i class="fa-solid fa-code mr-2"></i><b class="mr-3">Cord / HowTo</b><span class="text-secondary">※任意</span></p>
                        <textarea class="p-2 form-control" rows="5" name="cord_txt"></textarea>
                    </div>

                    
                    <div class="mt-3">
                        <p><i class="fa-solid fa-link mr-2"></i><b class="mr-3">参考URL</b><span class="text-secondary">※任意</span></p>
                        <input type="textarea" name="url_txt" size="80" class="p-2">
                    </div>
                    
                    <div class="form-group mt-3">
                        <p><i class="fa-solid fa-hashtag mr-2"></i><b class="mr-3">タグ</b></p>

                    <label for="tag">Tag</label>
                    <select name="tag[]" multiple>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}"
                                {{ in_array($tag->id, $note_tags->pluck('tag_id')->toArray()) ? 'selected' : '' }}>
                                {{ $tag->name }}
                            </option>
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
                    
                    <div class="mt-3">
                        <button type="submit" class="btn text-white btn-success bg-success">Note Create!!</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</x-app-layout>