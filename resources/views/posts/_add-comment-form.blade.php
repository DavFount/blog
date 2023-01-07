@auth()
    <x-panel class="bg-gray-50">
        <form method="POST" action="/posts/{{$post->slug}}/comments">
            @csrf
            <header class="flex items-center">
                <img class="rounded-xl"
                     src="https://i.pravatar.cc/100?u={{ auth()->user()->email }}"
                     width="60" height="60" alt="profile-picture">
                <h2 class="ml-4">Want to participate?</h2>
            </header>

            <div class="mt-6">
                                <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" id=""
                                          rows="5" placeholder="Think of something!" required></textarea>
                @error('body')
                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <button type="submit"
                        class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-xl hover:bg-blue-600">
                    Post
                </button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="text-blue-800 hover:text-blue-900 hover:underline">Register</a>
        or <a href="/login" class="text-blue-800 hover:text-blue-900 hover:underline">Log In</a> to
        leave a comment!
    </p>
@endauth
