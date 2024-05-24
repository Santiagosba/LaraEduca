<div class="p-6 bg-hackerBg text-white">
    <h2 class="text-3xl font-bold text-hackerViolet mb-4">Progress in Course: {{ $courseId }}</h2>

    <h3 class="text-2xl font-semibold text-hackerPurple mb-3">Assignments</h3>
    @foreach($assignments as $assignment)
        <div class="bg-hackerBg border border-hackerViolet p-4 rounded-lg mb-4 shadow">
            <p class="text-lg text-hackerBlue">{{ $assignment->title }}</p>
            @php
                $submission = $submissions->where('assignment_id', $assignment->id)->first();
            @endphp
            @if($submission)
                <p class="text-hackerGreen">Grade: {{ $submission->grade ?? 'Not graded yet' }}</p>
            @else
                <p class="text-red-500">Status: Not submitted</p>
            @endif
        </div>
    @endforeach

    <h3 class="text-2xl font-semibold text-hackerPurple mb-3">Game Participation</h3>
    @foreach($gameScores as $gameScore)
        <div class="bg-hackerBg border border-hackerViolet p-4 rounded-lg mb-4 shadow">
            <p class="text-lg text-hackerBlue">Game: {{ $gameScore->game->title }} - Score: {{ $gameScore->score }}</p>
        </div>
    @endforeach
</div>
