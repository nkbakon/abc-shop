<form method="POST" wire:submit.prevent="update">
    @method('PUT')
    @csrf
    <div>
        <label for="category_id">Select Category</label><br>
        <select name="category_id" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" wire:model="category_id" required>
            <option value="" disabled selected>Select a category from here</option>
            @foreach($all_categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    @error("category_id") <span class="text-red-500 error">{{ $message }}</span><br> @enderror
    <br>
    <div>
        <label for="name">Enter Name</label><br>
        <input type="text" name="name" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="enter name" wire:model="name" required>
    </div>
    @error('name') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
    <br>
    <div>
        <label for="amount">Enter Amount</label><br>
        <input type="number" name="amount" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="amount" wire:model="amount" required>
    </div>
    @error('amount') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
    <br>
    <div>
        <label for="note">Enter Note</label><br>
        <input type="text" name="note" class="block w-96 appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="enter note" wire:model="note">
    </div>
    @error('note') <span class="text-red-500 error">{{ $message }}</span><br> @enderror
    <br>
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Update</button>                        
</form>