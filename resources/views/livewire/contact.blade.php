<div>
	<div class="grid md:grid-cols-5 gap-3 max-w-7xl">

		<div></div>
		
		<div class="md:col-span-4 md:border-l">
			
			<div class="text-3xl p-4 bg-white text-gray-600 border-r-2 border-l-2 border-white">
				Contact My Shop

				<x-input.text wire:model.lazy="name"  id="name" type="text" placeholder="Your name" />
                <x-input.text wire:model.lazy="email" id="email" type="email" placeholder="Your email address" />
				<x-input.text wire:model.lazy="subject" id="subject" type="text" placeholder="Give your message a subject" />
				<x-input.textarea wire.model.lazy="msg" id="message" />
				
				<x-input.button wire:click="sendMessage" label="Send message"/>


			</div>
			
		</div>
	</div>
</div>