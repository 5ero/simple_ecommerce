@props([
	'searchData' => false
])

dd($searchData)

@if($searchData)
    	
    		<select  wire:model="addresses" name="" id="" class="border-gray-300 rounded">
	    		@foreach($searchData as $key => $data)
	    			<option  value="{{ $key }}">{{ $data[0] }}</option>
	    		@endforeach
   			</select>
    		
    	
@endif