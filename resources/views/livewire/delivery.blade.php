<div>
	<div class="grid md:grid-cols-5 gap-3 max-w-7xl">

		<div></div>
		
		<div class="md:col-span-4 md:border-l">
		
			<div class="text-3xl p-4 bg-white text-gray-600 border-r-2 border-l-2 border-white">
				Delivery
			</div>

            <div class=" border-l border-gray-200 pb-5 p-3">
                    
                    <div class="py-4">
                        <h2 class="text-xl text-gray-500">Your contact details</h2>
                    </div>
                    <x-input.text wire:model.lazy="name"  id="name" type="text" placeholder="Your name" />
                    <x-input.text wire:model.lazy="email" id="email" type="email" placeholder="Your email address" />
                    <x-input.text wire:model.lazy="contact_no" id="contact_no" type="text" placeholder="A contact telephone number" />
                    <hr class="mt-6">
                
                    <livewire:postcode-search />
            
                    <x-input.text wire:model="address_1" id="address_1" type="text" placeholder="First line of your address" />
                    <x-input.text wire:model="address_2"  id="address_2" type="text" placeholder="Optional address field" />
                    <x-input.text wire:model="address_3"  id="address_3" type="text" placeholder="Optional address field" />
                    <x-input.text wire:model="city"  id="city" type="text" placeholder="Your city/town" />
                    <x-input.text wire:model="county"  id="county" type="text" placeholder="Your county" />
                    <x-input.text wire:model="postcode"  id="postcode" type="text" placeholder="Your postcode" />
                    <x-input.button wire:click="save" label="Checkout"/>
                          
                </div>
          

		</div>
	</div>
</div>
</div>

