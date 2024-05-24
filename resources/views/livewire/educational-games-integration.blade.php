<div class="container mx-auto p-4 bg-hackerBg text-white">
    <h3 class="text-2xl font-bold mb-4 text-hackerViolet">Available Games</h3>
    <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($games as $game)
            <li class="bg-hackerBg shadow-lg rounded-lg overflow-hidden border border-hackerViolet hover:border-hackerPurple">
                <a href="{{$game->url}}" class="block p-4">
                    <h4 class="text-lg font-semibold text-hackerPurple">{{ $game->title }}</h4>
                </a>
            </li>
        @endforeach
    </ul>
</div>
