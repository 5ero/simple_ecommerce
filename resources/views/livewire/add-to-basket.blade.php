
    {{-- Add to basket --}}
<div 
        x-data="{ show: @entangle('show'), message: '' }" 
        
        x-on:basket.window="show = true, message = $event.detail" 
        x-show="show"
        x-transition:enter="transform ease-out duration-300 transition"
        x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
        x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
         class="fixed top-0 left-0 z-40 bg-gray-900 w-full h-full bg-opacity-25"
        >
        
            <div class="z-10 w-8/12 md:w-6/12 mx-auto mt-10 md:mt-40 shadow-lg text-sm border border-gray-300 bg-gray-50 font-semibold text-gray-500">
                <div class="md:flex">
                    <div class="w-full md:w-5/12 rounded-t-md shadow-lg">
                        <img :src="`/storage/${message.photo}`"  class="object-cover w-full h-full rounded-t-md" alt="`${message.title}">
                    </div>
                    <div class="ml-4 pt-4 md:flex-grow">
                        <div x-text="message.title" class="text-xl text-gray-700"></div>
                        <div x-text="message.description" class="hidden md:block font-normal"></div>
                        <div class="font-normal mt-2"><span class="font-semibold">Dimensions</span>: 370 x 370 x 250</div>
                        <div class="font-semibold" x-text="message.price"></div>
                        <div class="text-sm text-gray-400">Price shown is excluding VAT</div>
                        <div class="mt-4">Select Quantity:</div>
                       
                        <div class="flex items-center mb-1">
                            <input wire:model="qty" id="qty"  pattern="[0-9]*" type="text" name="qty" class="text-sm w-16 border border-gray-200 mr-1">
                            <button wire:click="decrement" @if($qty == 0) disabled @endif class="w-10 h-10 rounded bg-gray-200 text-2xl m-1 border border-gray-300">-</button>
                            <button wire:click="increment" class="w-10 h-10 rounded bg-gray-200 text-2xl m-1 border border-gray-300">+</button>
                        </div>
                        <hr class="md:py-3">
                
                        <div class="mt-2 mb-2">
                            <button x-on:click="$wire.addtobasket(message.id)" class="bg-gradient-to-t from-blue-500 to-blue-600 font-semibold p-2 rounded text-white">Add to basket</button>
                            <button x-on:click="show=false" class="font-semibold p-2 rounded bg-white ml-2 border border-gray-300">Cancel</button>
                        </div>
                    </div>
                    <div class="hidden md:block text-right p-2"><i x-on:click="show=false" class="fas fa-times-circle fa-2x text-gray-400 cursor-pointer"></i></div>
                </div>
            </div>
        
</div>
