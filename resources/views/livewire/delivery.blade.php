<div>
    <livewire:toast-messenger />
    <livewire:navbar-top />

    <div class="hidden md:block w-full h-48 bg-gray-50  border">
	    
	</div>

    <div class="grid md:grid-cols-3 gap-3 max-w-7xl">
		<div></div>
		<div class="md:col-span-2 border-l p-2 border-gray-200">

				<livewire:add-to-basket />

				<div class="py-4">
                    <h2 class="text-3xl text-gray-600">Delivery</h2>
                </div>
            
               <div class="py-4">
                    <h2 class="text-xl text-gray-600">Contact details</h2>
                </div>
                <x-input.text wire:model.lazy="name"  id="name" type="text"  />
                <x-input.text wire:model.lazy="email" id="email" type="email"  />
                <x-input.text wire:model.lazy="contact_no" id="contact_no" type="text"  />
                <hr class="mt-6">
                
                <livewire:postcode-search />
               
                <x-input.text wire:model="address_1" id="address_1" type="text" />
                <x-input.text wire:model="address_2"  id="address_2" type="text"  />
                <x-input.text wire:model="address_3"  id="address_3" type="text" />
                <x-input.text wire:model="city"  id="city" type="text"  />
                <x-input.text wire:model="county"  id="county" type="text"  />
                <x-input.text wire:model="postcode"  id="postcode" type="text"  />
                    
                <div class="pl-4 space-y-3">
                    <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4sm:items-end sm:border-t sm:border-gray-200 sm:pt-5">
                        <div></div>
                        <div class="text-right">
                            <button wire:click="save" class="bg-gray-700 text-white p-3 rounded w-24">
                                Checkout
                            </button>
                        </div>
                        
                    </div>
                    </div>

		</div>
	</div>
    
    
</div>