<div class="p-6 sm:px-5 bg-white border-b border-gray-200">
    <div>
        <x-jet-application-logo class="block h-12 w-auto" />
    </div>


</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6">
        <div class="flex items-center">
            <i class="fas fa-box text-gray-500 fa-lg"></i>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Products</div>
        </div>

        <div class="ml-12">
            <livewire:product-snapshot />
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">
            <i class="fas fa-chart-line fa-lg text-gray-500"></i>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Orders</div>
        </div>

        <div class="ml-12">
            <livewire:order-snapshot />
        </div>
    </div>

    {{-- <div class="p-6 border-t border-gray-200">
        <div class="flex items-center">
            <i class="fas fa-users fa-lg text-gray-500"></i>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Customers</div>
        </div>

        <div class="ml-12">
            <livewire:customer-snapshot />
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-l">
        <div class="flex items-center text-gray-500">
            <i class="fas fa-money-bill-wave fa-lg"></i>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Sales</div>
        </div>

        <div class="ml-12">
           <livewire:sales-snapshot />
        </div>
    </div> --}}
</div>
