@props([

		'leadingAddOn' => false,

])


<div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">

	<label for="{{ $attributes['id'] }}" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
		{{ ucfirst(str_replace('_',' ', $attributes['id'])) }}
	</label>
	<div class="flex rounded-md shadow-sm">
		
	@if($leadingAddOn)

		<span class="inline-flex items-center px-3 @error($attributes['id']) border-0 border-l border-t border-b border-red-500 border-r-gray-300 @enderror rounded-l-md border border-gray-300 border-r-0 bg-gray-50 text-gray-500 sm:text-sm ">
				@if(str_contains($leadingAddOn, '&'))
					{!! $leadingAddOn !!}
				@else
				   	{{ $leadingAddOn }}
				 @endif
		</span>

	@endif

		<input 
			{{ $attributes }}
			class="{{ $leadingAddOn ? 'rounded-none rounded-r-md' : 'rounded' }} @error($attributes['id'])  border-red-500 @enderror flex-1 border-gray-300 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
	
	@if($attributes['type'] == 'search')

		<button wire:click.prevent="{{ $attributes['id'] }}" type="button" class="text-base bg-blue-500 p-2 text-white ml-4 rounded">Search</button>

	@endif
	
	</div>
	@error($attributes['id'])
    		<br><span class=" flex-none text-red-500">{{ $message }}</span>
    @enderror
</div>
	
