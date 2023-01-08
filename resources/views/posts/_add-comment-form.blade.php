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

            <x-form.textarea name="body" class="text-sm" placeholder="Think of something"/>

            <div class="flex justify-end mt-6 border-t border-gray-200">
                <x-form.button  class="text-xs px-10">
                    Post
                </x-form.button>
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
