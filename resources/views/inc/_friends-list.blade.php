<div class="bg-gray-200 rounded-lg py-4 px-6">
    <h3 class="font-bold text-xl mb-4">Following</h3>

    <ul>
        @forelse (auth()->user()->following()->get() as $user)
            <li class="mb-4">
                <a href="{{route('profile', $user->slug)}}" class="flex items-center text-sm">
                    <img
                            src="{{$user->avatar}}"
                            alt=""
                            class="rounded-full mr-2"
                            width="40"
                    >
                    {{$user->name}}
                </a>
            </li>
        @empty
          <p class="p-4">You have no friends yet:(</p>
        @endforelse
    </ul>
</div>
