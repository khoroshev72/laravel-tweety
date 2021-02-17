<div class="border border-gray-300 rounded-lg">
    @forelse($tweets as $tweet)
      @include('inc.tweet')
    @empty
      <p class="p-4">You have no tweets yet:(</p>
    @endforelse
</div>