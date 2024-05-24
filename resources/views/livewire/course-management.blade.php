<div class="container mx-auto p-6 bg-hackerBg text-white">
    <h1 class="text-3xl font-bold mb-6 text-hackerViolet">Cursos</h1>
    @if(Auth::user()->role != 'student')
    <button class="bg-hackerBlue text-white px-4 py-2 rounded hover:bg-hackerPurple focus:outline-none focus:ring-2 focus:ring-hackerBlue" wire:click="create">Crear Curso</button>
    @endif
    @if($isModalOpen)
    <div class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center">
        <div class="bg-hackerBg p-6 rounded shadow-lg w-1/2 border border-hackerViolet">
            <form wire:submit.prevent="store">
                <div class="mb-4">
                    <input type="text" class="w-full px-3 py-2 border border-hackerViolet rounded bg-hackerBg text-white" wire:model="title" placeholder="Title">
                </div>
                <div class="mb-4">
                    <textarea class="w-full px-3 py-2 border border-hackerViolet rounded bg-hackerBg text-white" wire:model="description" placeholder="Description"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-hackerGreen text-black px-4 py-2 rounded hover:bg-green-700 mr-2">Save Course</button>
                    <button type="button" class="bg-red-500 text-black px-4 py-2 rounded hover:bg-red-700" wire:click="closeModalPopover()">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    @endif

    <div class="mt-6 space-y-4">
        @foreach($courses as $course)
        @if(Auth::user()->role === 'admin' || Auth::user()->role === 'teacher')
        <div class="bg-hackerBg p-4 rounded shadow border border-hackerViolet">
            <h4 class="text-xl font-semibold text-hackerPurple">{{ $course->title }}</h4>
            <p class="text-hackerBlue">{{ $course->description }}</p>
            <div class="flex justify-end space-x-2 mt-2">
                <button class="bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-700" wire:click="edit({{ $course->id }})">Edit</button>
                <button class="bg-red-500 text-black px-4 py-2 rounded hover:bg-red-700" wire:click="delete({{ $course->id }})">Delete</button>
            </div>
        </div>
        @elseif(Auth::user()->role === 'student')
        <div class="bg-hackerBg p-4 rounded shadow border border-hackerViolet">
            <h4 class="text-xl font-semibold text-hackerPurple">{{ $course->title }}</h4>
            <p class="text-hackerBlue">{{ $course->description }}</p>
        </div>
        @endif
        @endforeach
    </div>
</div>
