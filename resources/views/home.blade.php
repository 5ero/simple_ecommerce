<x-layouts.base >
	
	<div id="app" class="max-w-7xl mx-auto">
    	<livewire:toast-messenger />
    
    	<livewire:navbar-top /> 

    	

	    <div class="hidden md:block md:w-full h-72 bg-gray-50 border">
	        <img src="/img/banner.png" class="object-cover w-full h-full" alt="">
	    </div>

	    <div class="grid md:grid-cols-3 gap-3 max-w-7xl">
	        <div class="md:col-span-2 border-l border-gray-200">

	             <livewire:add-to-basket />

	             <livewire:products />

	        </div>
	    </div>
    
    
   	</div>
    <livewire:scripts />

</x-layouts.base>