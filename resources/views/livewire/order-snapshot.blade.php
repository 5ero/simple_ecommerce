<div>
    <table class="table-auto w-full mt-2 text-sm font-semibold text-gray-500">
       @foreach($orders as $order)
        <tr class="border-b">
            <td valign="top" class="pt-1">
                <a href="{{ route('admin.orders.show', ['order' => $order->order_no]) }}" class="text-blue-400 underline">{{  $order->order_no }}</a>
            </td>
            <td valign="top" class="pt-1">
                <table>
                    @foreach($order->products as $product)
                        <tr>
                            <td valign="top">
                                {{ $product['product'] }} x {{ $product['product_qty'] }} @ {{ $product['product_price'] }}
                            </td>
                        </tr>
                    @endforeach
                </table>
               
            </td>
            <td>
                &pound;{{ $order->order_value }}
            </td>
            <td>
               {{ \Carbon\Carbon::parse($order->created_at)->diffForHumans() }}
            </td>
        </tr>
        @endforeach
    </table>
</div>
