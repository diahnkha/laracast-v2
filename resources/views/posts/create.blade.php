<x-layout>
    <section class="py-8 max-w-md mx-auto">
        <h1 class="text-lg font-bold mb-4">
            Publish New Post
        </h1>
        <x-panel>
            <form action="/admin/posts" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                        Title
                    </label>
                    <input class="border border-gray-400 p-2 w-full"
                            value="{{ old('title') }}"
                            type="text"
                            name="title"
                            id="title"
                            required
                            >

                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">
                        slug
                    </label>
                    <input class="border border-gray-400 p-2 w-full"
                            type="text"
                            value="{{ old('slug') }}"
                            name="slug"
                            id="slug"
                            required
                            >

                    @error('slug')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="thumbnail">
                        thumbnail
                    </label>
                    <input class="border border-gray-400 p-2 w-full"
                            type="file"
                            value="{{ old('thumbnail') }}"
                            name="thumbnail"
                            id="thumbnail"
                            required
                            >

                    @error('thumbnail')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                    for="excerpt">
                        Excerpt
                    </label>

                    <textarea 
                    name="excerpt" 
                    class="border border-gray-400 p-2 w-full" 
                    id="excerpt"
                    required
                    >{{ old('excerpt') }}</textarea>

                    @error('excerpt')
                        <span class="text-xs text-red-500 mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                    for="body">
                        Body
                    </label>
                    <textarea class="border border-gray-400 p-2 w-full"
                            name="body"
                            id="body"
                            required
                    >{{ old('body') }}</textarea>

                    @error('body')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                    for="category_id">
                        Category
                    </label>
                    <select name="category_id" id="category_id">
                        @php
                            $categories = \App\Models\Category::all();
                        @endphp

                        @foreach (\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}" 
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                            >{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>

                    @error('category')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <x-submit-button>Publish</x-submit-button>

            </form>
    </x-panel>
    </section>
</x-layout>