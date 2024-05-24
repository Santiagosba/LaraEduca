<div class="container mx-auto p-4 bg-hackerBg text-white">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold text-hackerViolet">User Management</h2>
        <button wire:click="create()" class="bg-hackerBlue text-white px-4 py-2 rounded hover:bg-hackerPurple focus:outline-none focus:ring-2 focus:ring-hackerBlue">Create User</button>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <table class="min-w-full bg-hackerBg border border-hackerViolet">
        <thead>
            <tr class="text-hackerPurple">
                <th class="py-2 border-b border-hackerViolet">Name</th>
                <th class="py-2 border-b border-hackerViolet">Email</th>
                <th class="py-2 border-b border-hackerViolet">Role</th>
                <th class="py-2 border-b border-hackerViolet">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr class="text-hackerBlue">
                    <td class="border px-4 py-2 border-hackerViolet">{{ $user->name }}</td>
                    <td class="border px-4 py-2 border-hackerViolet">{{ $user->email }}</td>
                    <td class="border px-4 py-2 border-hackerViolet">{{ $user->role }}</td>
                    <td class="border px-4 py-2 border-hackerViolet">
                        <button wire:click="edit({{ $user->id }})" class="bg-yellow-500 text-black px-2 py-1 rounded hover:bg-yellow-700">Edit</button>
                        <button wire:click="delete({{ $user->id }})" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-700">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($isOpen)
        <div class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
                <div class="inline-block align-bottom bg-hackerBg rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-hackerViolet" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <form wire:submit.prevent="store">
                        <div class="bg-hackerBg px-4 pt-5 pb-4 sm:p-6 sm:pb-4 text-white">
                            <div>
                                <div class="mb-4">
                                    <x-label for="name" value="Name" class="text-hackerViolet" />
                                    <x-input id="name" type="text" class="mt-1 block w-full bg-hackerBg text-white border border-hackerBlue" wire:model="name" required />
                                    @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                                <div class="mb-4">
                                    <x-label for="email" value="Email" class="text-hackerViolet" />
                                    <x-input id="email" type="email" class="mt-1 block w-full bg-hackerBg text-white border border-hackerBlue" wire:model="email" required />
                                    @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                                <div class="mb-4">
                                    <x-label for="password" value="Password" class="text-hackerViolet" />
                                    <x-input id="password" type="password" class="mt-1 block w-full bg-hackerBg text-white border border-hackerBlue" wire:model="password" required />
                                    @error('password') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                                <div class="mb-4">
                                    <x-label for="role" value="Role" class="text-hackerViolet" />
                                    <select id="role" class="mt-1 block w-full bg-hackerBg text-white border border-hackerBlue" wire:model="role" required>
                                        <option value="">Select Role</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="bg-hackerBg px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse border-t border-hackerViolet">
                            <button type="submit" class="bg-hackerBlue text-white px-4 py-2 rounded hover:bg-hackerPurple">Save</button>
                            <button type="button" wire:click="closeModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
