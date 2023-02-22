@auth
<x-panel>
    <form action="/posts/{{ $post->slug }}/comments" method="POST" >
        @csrf
        
        <header class="flex items-center ">
            <img src="https://i.pravatar.cc/100/60?u={{ auth()->id() }}" height="40" weight="40" alt="" class="rounded-full">
            <h2 class="ml-4">Want To Participate?</h2>
        </header>

        <div class="mt-6">
            <textarea 
            name="body" 
            class="w-full text-sm focus:outline-none focus:ring" 
            rows="5" 
            placeholder="Quick, thing of something to say!"
            required></textarea>

            @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>



        <div class="flex justify-end mt-6 border-t border-gray-200 pt-6">
            <x-form.button>Submit</x-form.button>
        </div>

    </form>
</x-panel>

@else
<p class="font-semibold">
    <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">log in</a> to leave a comment.
</p>

@endauth