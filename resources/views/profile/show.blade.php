<x-app>

    <header class="mb-6 relative">
            <img
                    src="{{ $user->avatar }}"
                    alt=""
                    class="mb-2"
                    width="40"
            >

            <div class="flex justify-between items-center mb-4">
                <div>
                    <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                    <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
                </div>

                <div>

                  @can('edit', $user)
                    <a
                      href="{{route('profile.edit', $user->slug)}}"
                      class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2">
                      Edit Profile
                    </a>
                  @endif

                  @if(auth()->user()->isNot($user))
                    <x-toggle-follow :user="$user"></x-toggle-follow>
                  @endcan

                </div>
            </div>

            <p class="text-sm">
                The name’s Bugs. Bugs Bunny. Don’t wear it out. Bugs is an anthropomorphic gray
                and white rabbit or hare who is famous for his flippant, insouciant personality.
                He is also characterized by a Brooklyn accent, his portrayal as a trickster,
                and his catch phrase "Eh...What's up, doc?"
            </p>

        </header>

    @include('inc._timeline', ['tweets' => $user->tweets])

</x-app>


