<div>
    <!-- header -->
    <header class="flex items-center justify-between mb-4 border-b pb-4">
        <h2 class="text-xl text-slate-600">Contacts</h2>
        <button wire:click="add()" type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5">
            Add Contact
        </button>
    </header>
    @if(session()->has('success'))
        <div class="bg-green-400 text-green-50 py-5 px-2 rounded-md my-4">
            <p>{{ session('success') }}</p>
        </div>
    @endif
    <table class="w-full text-sm text-left text-slate-500">
        <thead class="text-xs text-slate-700 uppercase bg-slate-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $index => $contact)
            <tr class="bg-white border-b  border-slate-200">
                <td class="px-6 py-4">
                    <input wire:model="contacts.{{ $index }}.name" type="text" class="bg-gray-50 border border-slate-300 @error('contacts.' . $index . '.name') border-pink-500 @enderror text-slate-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placholder="Name...">
                    @error('contacts.' . $index . '.name') <span class="font-medium text-sm text-pink-500">{{ $message }}</span> @enderror
                </td>
                <td class="px-6 py-4">
                    <input wire:model="contacts.{{ $index }}.email" type="text" class="bg-gray-50 border border-slate-300 @error('contacts.' . $index . '.email') border-pink-500 @enderror text-slate-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placholder="Email...">
                    @error('contacts.' . $index . '.email') <span class="font-medium text-sm text-pink-500">{{ $message }}</span> @enderror
                </td>
                <td class="px-6 py-4">
                    <button wire:click="delete({{ $index }})" type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5">
                        Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button wire:click="save()" type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-4">
        Save
    </button>
</div>
