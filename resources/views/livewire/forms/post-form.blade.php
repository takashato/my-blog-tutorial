<div>
    <h1 class="text-lg bold">{{ $post->title }}</h1>

    @if ($message = session()->get('post.edit.success'))
        <div class="bold text-green-600 my-2">{{ $message }}</div>
    @endif

    <form class="flex flex-col space-y-2" wire:submit.prevent="save">
        <div class="flex flex-col">
            <label>Title</label>
            <input type="text" wire:model.debounce.500ms="title" id="title">
            <div>
                Slug: {{ \Illuminate\Support\Str::slug($title) }}
            </div>
            @error('title')
            <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col">
            <label>Content</label>
            <textarea wire:model="content"></textarea>
            @error('content')
            <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <button type="submit" class="bg-blue-500 text-white p-4 rounded hover:bg-blue-800">Save</button>
        </div>
    </form>
</div>
