<div>
    @if(auth()->user()->isFollowing($user))
        <form action="{{route('follow.delete', $user->slug)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs">
                Unfollow
            </button>
        </form>
    @else
        <form action="{{route('follow.store', $user->slug)}}" method="POST">
            @csrf
            <button type="submit"
                    class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs">
                Follow
            </button>
        </form>
    @endif
</div>