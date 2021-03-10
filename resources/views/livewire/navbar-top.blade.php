<div>
	<nav  x-data="{ mobile: false }" class="relative bg-blue-400" >
		<div class="sm:border-0 max-w-7xl mx-auto">
		<div class="flex">
			<div class="flex flex-grow">
				<livewire:navbar-brand />
				<div class="hidden md:block w-96 pt-5 mt-1 ml-16">
					<div class="flex justify-between">
							<livewire:navbar-link slot="Home" :active="request()->routeIs('home')" />
							<livewire:navbar-link slot="About" :active="request()->routeIs('about')"/>
							<livewire:navbar-link slot="Products" :active="request()->routeIs(['products', 'product','viewbasket','delivery','checkout'])"/>
							<livewire:navbar-link slot="FAQ" :active="request()->routeIs('faq')"/>
							<livewire:navbar-link slot="Contact" :active="request()->routeIs('contact')"/>
					</div>
				</div>
	
			</div>
			<div class="pr-2 flex items-center md:hidden">
				<button x-on:click="mobile = !mobile" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" id="main-menu" aria-haspopup="true">
				  <span class="sr-only">Open main menu</span>
				  <!-- Heroicon name: outline/menu -->
				  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
				  </svg>
				</button>
			  </div>
			<div class="hidden md:block">
				<div class="px-4 py-1 text-sm text-white bg-gradient-to-t from-blue-600 to-blue-500 rounded-b h-8 mr-2">	
					<livewire:basket-notification />
				</div>
			</div>
		</div>
	
			<!-- Mobile menu -->
			<div 	
				x-show.transition.duration.1000ms="mobile" 
				class="flex-none w-full border-t space-y-1"
				>
				<div class="bg-white border-b border-gray-200 text-blue-800">
					<a href="{{ route('home') }}" class="block px-10 py-4 ">Home</a>
				</div>
				<div class="bg-gray-50 border-b border-gray-200 text-blue-800">
					<a href="{{ route('about') }}" class="px-10 py-4 block">About</a>
				</div>
				<div class="bg-white border-b border-gray-200 text-blue-800">
					<a href="{{ route('products') }}" class="px-10 py-4 block">Products</a>
				</div>
				<div class="bg-gray-50 border-b border-gray-200 text-blue-800">
					<a href="{{ route('contact') }}t" class="px-10 py-4 block">Contact</a>
				</div>
				<div class="bg-blue-400 text-white border-b border-gray-200">
					<a href="{{ route('viewbasket') }}" class="px-10 py-4 block"><i class="fas fa-shopping-basket"></i>&nbsp;View basket</a>
				</div>
			</div>
	
			
				
		</div>
			
				<div  class="md:hidden text-center bg-blue-700 p-4 text-white">
					<livewire:basket-notification />
				</div>
	
				
				
	
	</nav>
	
</div>

<div class="p-2 text-gray-600 text-sm bg-blue-100 shadow-md border-t border-b border-gray-400">
	<div class="flex items-center border max-w-7xl justify-between mx-auto ">
		<div class="sm:border-0">
			{!! \App\Helpers\Breadcrumbs::make() !!}
		</div>
		<div class="hidden md:block top-16 text-gray-500 mr-2">
			<i class="fas fa-phone fa-rotate-90"></i> 01234 567890
		</div>
	</div>
	
</div>
<br>