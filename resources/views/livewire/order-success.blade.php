<div>
	<div class="grid md:grid-cols-5 gap-3 max-w-7xl">

		<div></div>
		
		<div class="md:col-span-4 md:border-l">
			
			<div class="text-3xl p-4 bg-white text-gray-600 border-r-2 border-l-2 border-white">
				Thank you, your order is complete.
			</div>
            <div class="p-4 text-gray-500 leading-relaxed">
                You will receive an email confirmation from us shortly. If you have any queries then please
                contact us on 0207 100 6063, quoting your invoice number below:
            </div>
            <div class="p-4 text-gray-500 leading-relaxed">
                <span class="text-lg">Invoice No: {{ $invoice }}</span> <br>
                <p class="py-2 font-semibold">
                    We will be delivering to the address specified below:
                </p>
                {{ $order->customer->name }} <br>
                {{ $order->customer->address_1 }} <br>
                {{ $order->customer->city }} <br>
                {{ $order->customer->county }} <br>
                {{ $order->customer->postcode }} <br>
                
            </div>
		</div>
	</div>
</div>
