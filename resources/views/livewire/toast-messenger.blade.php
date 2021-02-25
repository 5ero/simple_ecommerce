{{-- Toast Success --}}
<div 
        x-data="{ show: false, message: '' }" 
        x-on:success.window=" show = true, message = $event.detail, setTimeout(() => {show = false},  2500) " 
        x-show="show"
        x-transition:enter="transform ease-out duration-300 transition"
        x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
        x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
         class="fixed z-10 right-0 m-12 top-32 shadow-md text-sm  rounded-lg border border-gray-300 w-80 h-14 bg-gray-100 font-semibold flex items-center px-4 text-gray-500"
        >
    <i class="fas fa-check-circle text-green-500"></i>
    <div x-text="message" class="ml-2"></div>
    <div class="flex-1 text-right text-gray-400">
        <button x-on:click="show=false" class="inline-flex focus:outline-none ">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>

{{-- Toast Warning --}}
<div 
        x-data="{ show: false, message: '' }" 
        x-on:warning.window=" show = true, message = $event.detail, setTimeout(() => {show = false},  2500) " 
        x-show="show"
        x-transition:enter="transform ease-out duration-300 transition"
        x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
        x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
         class="fixed z-50 right-10 top-16 shadow-md text-sm  rounded-lg border border-gray-900 w-80 h-14 bg-gray-800 font-semibold flex items-center px-4 text-gray-100"
        >
    <i class="fas fa-exclamation-circle text-yellow-500"></i>
    <div x-text="message" class="ml-2"></div>
    <div class="flex-1 text-right text-gray-400">
        <button x-on:click="show=false" class="inline-flex focus:outline-none ">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>

{{-- Toast Info --}}
<div 
        x-data="{ show: false, message: '' }" 
        x-on:info.window=" show = true, message = $event.detail, setTimeout(() => {show = false},  2500) " 
        x-show="show"
        x-transition:enter="transform ease-out duration-300 transition"
        x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
        x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
         class="fixed z-50 right-10 top-16 shadow-md text-sm  rounded-lg border border-gray-900 w-80 h-14 bg-gray-800 font-semibold flex items-center px-4 text-gray-100"
        >
    <i class="fas fa-info-circle text-blue-400"></i>
    <div x-text="message" class="ml-2"></div>
    <div class="flex-1 text-right text-gray-400">
        <button x-on:click="show=false" class="inline-flex focus:outline-none ">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>

{{-- Toast Danger --}}
<div 
        x-data="{ show: false, message: '' }" 
        x-on:danger.window=" show = true, message = $event.detail, setTimeout(() => {show = false},  2500) " 
        x-show="show"
        x-transition:enter="transform ease-out duration-300 transition"
        x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
        x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
         class="fixed z-50 right-10 top-16 shadow-md text-sm  rounded-lg border border-gray-900 w-80 h-14 bg-gray-800 font-semibold flex items-center px-4 text-gray-100"
        >
    <i class="fas fa-times-circle text-red-500"></i>
    <div x-text="message" class="ml-2"></div>
    <div class="flex-1 text-right text-gray-400">
        <button x-on:click="show=false" class="inline-flex focus:outline-none ">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>



