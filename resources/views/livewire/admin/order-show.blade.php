<div>
   <div class="border p-3 shadow">
       <div class="py-2 flex items-center justify-between">
            <h1 class="text-2xl">Order: #{{ $order->order_no }}</h1>
            <div>
               Status: 
                <span class="text-green-700 font-semibold">{{ $order->status }}</span>
            </div>

           <div>
              
                <button 
                    @if($order->shipped == '') wire:click="shipped" @endif
                    class="@if($order->shipped == true) bg-green-600 @else bg-blue-600 @endif text-white rounded-sm p-2 font-semibold">
                    {!! $order->shipped == true ? '<i class="fas fa-check-circle"></i> Shipped' : 'Mark as shipped' !!}
                </button>
           </div>
       </div>
       <hr>
       <div class="flex items-center font-semibold justify-between bg-gray-100 px-1">
            <div class="font-semibold text-sm text-gray-600 pt-2">
                Ordered on: {{ \Carbon\Carbon::parse($order->created_at)->format('d M Y, H:i') }}
            </div>
            
            <div class="font-semibold text-sm text-gray-600 pt-2">
               {{ $order->shipped_date != '' ? 'Shipped on: ' . \Carbon\Carbon::parse($order->shipped_date)->format('d M Y, H:i') : '' }}
            </div>
       </div>
       
       <div class="py-8">
            <h2 class="text-2xl mb-4">Items</h2>
            <table class="w-full">
                <tr class="bg-gray-700 text-white">
                    <th class="text-left p-2">Product</th>
                    <th class="text-left p-2">Quantity</th>
                    <th class="text-left p-2">Price per item</th>
                    <th class="text-left p-2">Total price</th>
                    
                </tr>
                @foreach($order->products as $product)
                    <tr>
                        <td class="p-2">
                            {{ $product['product'] }}
                        </td>
                        <td class="p-2">
                            {{ $product['product_qty'] }}
                        </td>
                        <td class="p-2">
                            &pound;{{ $product['product_price'] }}
                        </td>
                        <td class="p-2">
                            &pound;{{ number_format($product['product_qty']*$product['product_price'], 2, '.', '') }}
                        </td>
                        
                    </tr>
                @endforeach
                <tr>
                    <td class="p-2"></td>
                    <td class="p-2"></td>
                    <td class="p-2 text-right">VAT</td>
                    <td class="p-2 ">&pound;{{ $vat }}</td>
                </tr>
                <tr>
                    <td class="p-2"></td>
                    <td class="p-2"></td>
                    <td class="p-2 text-right font-bold">Total</td>
                    <td class="p-2 font-bold">&pound;{{ $total }}</td>
                </tr>
            </table>
       </div>
       <hr>
       <div class="flex justify-around">
        <div class="py-8">
            <h1 class="text-2xl mb-4">Delivery details</h1>
            <p class="leading-8 font-semibold  text-gray-700">
                {{ $order->customer->name }}
            </p>
            <p class="leading-8 font-semibold  text-gray-600">
                 {{ $order->customer->address_1 }} <br>
                 @if(!empty($order->customer->address_2))
                     {{ $order->customer->address_2 }} <br>
                 @endif
                 @if(!empty($order->customer->address_3))
                     {{ $order->customer->address_3 }} <br>
                 @endif
                 {{ $order->customer->city }} <br>
                 {{ $order->customer->county }} <br>
                 {{ $order->customer->postcode }} <br>
            </p>
 
        </div>
        <div class="py-8">
            <h1 class="text-2xl mb-4">Contact information</h1>
            <p class="leading-8 font-semibold  text-gray-700">
                Tel: {{ $order->customer->telephone }}
            </p>
            <p class="leading-8 font-semibold  text-gray-700">
                Email: <a href="mailto:{{ $order->customer->email }}" class="text-blue-500 underline">{{ $order->customer->email }}</a>
            </p>
        </div>
       </div>
       
   </div>
</div>
