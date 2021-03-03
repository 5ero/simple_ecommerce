
    {{-- Add to basket --}}
<div 
        x-data="{ show: @entangle('show'), message: '' }" 
        
        x-on:basket.window=" show = true, message = $event.detail /*, setTimeout(() => {show = false},  5000)*/" 
        x-show="show"
        x-transition:enter="transform ease-out duration-300 transition"
        x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
        x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
         class="fixed top-0 left-0 z-40 bg-gray-900 w-full h-full bg-opacity-75"
        >
    <div class="z-10 w-10/12 md:w-6/12 mx-auto mt-10 md:mt-40 shadow-lg text-sm border border-gray-300 bg-gray-50 font-semibold text-gray-500">
        <div class="md:flex items-center justify-around">
            <div class="w-full md:w-1/3 shadow-md">
                <img :src="`/storage/${message.photo}`"  class="object-cover w-full h-full" alt="`${message.title}">
            </div>
            <div class="w-2/3 p-4">
                <div x-text="message.title" class="text-lg text-gray-700"></div>
                <div x-text="message.description" class="font-normal"></div>
                <div class="font-semibold" x-text="message.price"></div>
                <div class="mt-2">Select Quantity:</div>
            
                <div class="flex items-center mb-1">
                    <input wire:model="qty" id="qty"  pattern="[0-9]*" type="text" name="qty" class="text-xs w-16 border border-gray-200 m-1">
                    <button wire:click="decrement" class="w-8 h-8 rounded bg-gray-200 m-1">-</button>
                    <button wire:click="increment" class="w-8 h-8 rounded bg-gray-200 m-1">+</button>
                </div>
                <hr>
        
                <div class="mt-2">
                    <button x-on:click="$wire.addtobasket(message.id)" class="bg-gradient-to-t from-blue-800 to-blue-500 text-xs font-semibold px-2 py-1 rounded text-white">Add to basket</button>
                    <button x-on:click="show=false" class=" text-xs font-semibold px-2 py-1 rounded bg-gray-100 ml-2 border border-gray-300">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    
</div>
