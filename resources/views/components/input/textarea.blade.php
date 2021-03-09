<div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">

    <label for="{{ $attributes['id'] }}" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
        {{ ucfirst(str_replace('_',' ', $attributes['id'])) }}
    </label>
    <div class="flex rounded-md shadow-sm">
        <div>
            <textarea wire:model="msg" 
            {{ $attributes }}
            cols="50"
            rows="7"
            class="@error($attributes['id'])  border-red-500 @enderror border-gray-300 form-input w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"></textarea>
            
        </div>
    </div>
    @error($attributes['id'])
            <br><span class=" flex-none text-red-500">{{ $message }}</span>
    @enderror
</div>