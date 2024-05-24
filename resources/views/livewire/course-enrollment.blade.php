<div class="min-h-screen flex items-center justify-center bg-hackerBg" style="background-image: url('{{ asset('images/fondo.gif') }}');">
    <div class="bg-hackerBg bg-opacity-90 p-8 rounded-lg shadow-lg max-w-lg w-full border border-hackerViolet">
        <form wire:submit.prevent="enroll" class="mb-6">
            <label for="course" class="block text-hackerViolet text-sm font-bold mb-2">Select a Course</label>
            <select wire:model="selectedCourseId" id="course" class="block w-full bg-hackerBg border border-hackerBlue rounded-md py-2 px-3 text-white mb-4 focus:outline-none focus:ring-2 focus:ring-hackerBlue focus:border-hackerBlue">
                <option value="">Select a Course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </select>
            <button type="submit" class="w-full bg-hackerBlue text-white py-2 px-4 rounded-md hover:bg-hackerPurple focus:outline-none focus:ring-2 focus:ring-hackerBlue focus:ring-opacity-50">Enroll</button>
        </form>

        @if(session()->has('message'))
            <div class="bg-green-900 border border-green-400 text-green-300 px-4 py-3 rounded relative mb-4">
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
        @endif

        <h2 class="text-xl font-semibold mb-4 text-hackerPurple">Enrollments</h2>
        <div class="space-y-4">
            @foreach($enrollments as $enrollment)
                <div class="bg-hackerBg border border-hackerBlue p-4 rounded-lg shadow">
                    <p class="text-hackerBlue"><strong>{{ $enrollment->user->name }}</strong> - {{ $enrollment->course->title }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
