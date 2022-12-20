@extends ('layout')

@section('title')
    <title>Create Post</title>
@endsection

@section('content')
    <section class="px-6 py-8 border border-gray-200 p-6 rounded-xl max-w-sm mx-auto">
        <form action="/admin/posts/create" method="post">
            @csrf
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">Title</label>
                <input class="border border-gray-400 p-2 w-full" type="text" name="title" id="title"
                    value="{{ old('title') }}" required>
                @error('title')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">Slug</label>
                <input class="border border-gray-400 p-2 w-full" type="text" name="slug" id="slug"
                    value="{{ old('slug') }}" required>
                @error('slug')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">Excerpt</label>
                <textarea class="border border-gray-400 p-2 w-full" name="excerpt" id="excerpt" required>{{ old('excerpt') }}</textarea>
                @error('excerpt')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">Body</label>
                <textarea class="border border-gray-400 p-2 w-full" name="body" id="body" required>{{ old('body') }}</textarea>
                @error('body')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <button
                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5"
                type="submit">Publish</button>
        </form>
    </section>
@endsection
