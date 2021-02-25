<div>
    <div class="py-4 mt-10">
        <h2 class="text-xl text-blue-600">Delivery address</h2>
    </div>
       <x-input.text wire:model.lazy="search" placeholder="Please enter your postcode" name="search" type="search"  id="search"   leading-add-on="&#x1F50D;"  />
       
       @if($searchData)
        <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
    
            <label for="addresses" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                Choose address
            </label>
            <div class="flex rounded-md shadow-sm">
                    <select wire:model="addresses" wire:change="emitAddress" name="" id="addresses" class="border-gray-300 rounded block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        @foreach($searchData as $key => $data)
                            <option  value="{{ $key }}">{{ $data[0] }}</option>
                        @endforeach
                    </select>
                    
                </div>
            </div>
            @endif
    
           
        </div>
