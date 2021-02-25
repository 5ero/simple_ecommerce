<div>
	<a href="/view-basket" class="hover:text-blue-100" sr="viewbasket">
		<i class="fas fa-shopping-basket"></i> {{ $basket }} {{ $basket > 1 ? 'Items' : 'Item' }}, &pound{{ number_format($total, 2, '.','') }}
	</a>
</div>	
	
