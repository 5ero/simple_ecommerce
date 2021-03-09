<div>
    <div>
        <div class="p-4">
            Customers
        </div>
        <hr>
        <div class="flex items-center">
            <div class="p-4 w-96">
                <label for="search">Search for customers</label>
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 pl-3 pt-3 items-center pointer-events-none text-gray-500">
                        <span>
                            <i class='fas fa-search'></i>
                        </span>
                    </div>
                    <input wire:model="search" type="search" class="block w-full pl-10 pr-3  border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:ouline-none focus:placeholder-gray-300 focus:border-blue-300 focus:shadow-outline-blue sm:text-sm transition duration-150 ease-in-out"
                placeholder="Customer name" autocomplete="off">
                </div>	
            </div>
            
        </div>
        
        <hr>
        <table class="table w-full m-3 text-gray-600 font-semibold">
            <tr>
                <th>Customer name</th>
                <th>Customer address</th>
                <th>City</th>
                <th>County</th>
                <th>Postcode</th>
                <td>Orders placed</td>
                {{-- <th><Prod></Prod>ucts Ordered</th>
                <th>Order Value</th>
                <th>Date Ordered</th> --}}
            </tr>
            @forelse($customers as $customer)
                <tr class="text-center border-b">
                    <td class="py-8">
                        <a href="{{ route('admin.customers.show', ['customer' => $customer->id]) }}" class="text-blue-500 underline">{{  $customer->name }}</a>
                    </td>
                    <td>{{ $customer->address_1 }}</td>
                    <td>{{ $customer->city }}</td>
                    <td>{{ $customer->county }}</td>
                    <td>{{ $customer->postcode }}</td>
                    <td>{{ count($customer->order) }}</td>
              
            </tr>
        @empty 
            <tr>
                <td colspan="5 p-4 text-lg">
                    No customers!
                </td>
            </tr>
        @endforelse
        </table>
       
        <div class="py-4 px-2">
           
        </div>
    </div>
    
</div>
