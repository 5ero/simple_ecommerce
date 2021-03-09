<div>
	{{-- Toast Delete --}}
<div 
        x-data="{ show: false, message: '' }" 
        x-on:delete.window=" show = true, message = $event.detail" 
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
    <button  wire:click="deleteProduct" x-on:click="show=false" class="ml-10 bg-green-500 m-2 rounded w-6 h-6">
    	<i class="fas fa-check"></i>
    </button>
     <button x-on:click="show=false" class="bg-red-500  m-2 rounded w-6 h-6">
     	<i class="fas fa-times"></i>
     </button>
    <div class="flex-1 text-right text-gray-400 ">
        <button x-on:click="show=false" class="inline-flex focus:outline-none ">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>

	<div class="flex items-center">
		 <div class="p-4 font-semibold text-2xl">
		   	Editing: {{ $product->product_name }} <span class=" text-sm ml-4 font-semibold text-gray-500">Status:</span>
		   	@if ($active == true || $product->active == true) 
		   	 <span class="text-sm bg-green-100 border border-green-600 p-1 px-2 rounded text-gray-500">Active</span>
		   	@else
		   	<span class="text-sm bg-red-100 border border-red-600 p-1 px-2 rounded text-gray-500">Disabled</span>
		   	@endif
		   </div>
		   <div class="flex-1 text-right mr-4">
		   		<button wire:model="active" wire:click="checkActive" class="bg-gray-200 border border-gray-600 rounded p-2 mr-2">
		   			@if ($active == true || $product->active == true) 
		   				Disable
		   			@else
		   				Enable
		   			@endif
		   		</button>
		   		<button wire:click="deleteThisProduct" class="bg-red-200 border border-red-600 rounded p-2 text-red-600">
		   			 Delete
		   		</button>
		   </div>
	</div>
  
   @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
   <hr>

<form wire:submit.prevent="updateProduct" method="POST" enctype="multipart/formdata">
<div class="p-4">
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Product</h3>
        <p class="mt-1 text-sm text-gray-600">
          Product information section, add the main details for your product here.
        </p>
      </div>
    </div> 
    <div class="mt-5 md:mt-0 md:col-span-2">
     
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label for="product_name" class="block text-sm font-medium text-gray-700">
                  Product name
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input wire:model="product_name" type="text" name="product_name" id="product_name" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300 @error('product_name') border-red-500 @enderror" placeholder="Product name" value="{{ $product->product_name }}">
                </div>
                @error('product_name')
                	<p class="text-red-500">
                		{{ $message }}
                	</p>
                @enderror
              </div>
            </div>

            <div>
              <label for="product_description" class="block text-sm font-medium text-gray-700">
               Product description
              </label>
              <div class="mt-1">
                <textarea wire:model="product_description" id="product_description" name="product_description" rows="5" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md @error('product_description') border-red-500 @enderror" placeholder="Describe the product here">
                	{{ $product->product_description }}
                </textarea>
              </div>
              <p class="mt-2 text-sm text-gray-500">
                Brief description of the product.
              </p>
              @error('product_description')
                	<p class="text-red-500">
                		{{ $message }}
                	</p>
                @enderror
            </div>

            <div>
     
              <div class="mt-2 flex items-center">
                <span class="inline-block h-16 w-16 rounded-full overflow-hidden bg-gray-100 text-gray-500">
                  <i class="fas fa-box-open fa-2x px-3 py-4"></i>
                </span>
                <label for="photo" class="ml-5 bg-gray-100 text-gray-600 py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 @error('photo') border-red-500 @enderror">
				    <i class="fas fa-arrow-up"></i> Upload a photo
				</label>
				<input wire:model="photo" id="photo" name="photo" type="file" class="hidden" />
              </div>

              	@error('photo') <span class="text-red-500">{{ $message }}</span> @enderror

    
				<div class="border border-gray-300 mt-4 rounded w-48 h-48">
						@if ($photo)
							<img src="{{ $tempUrl }}" class="object-cover h-full w-full" alt="{{ $product->product_name }}">
						@elseif ($product->photo)
							<img src="{{ Storage::url($product->photo) }}" class="object-cover h-full w-full" alt="{{ $product->product_name }}">
						@endif
				</div>
           			
              </div>
          </div>
        </div>
    </div>
  </div>
</div>

<div class="hidden sm:block" aria-hidden="true">
  <div class="py-0">
    <div class="border-t border-gray-200"></div>
  </div>
</div>

<div class="mt-10 sm:mt-0 p-4 bg-gray-50">
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Product attributes</h3>
        <p class="mt-1 text-sm text-gray-600">
          Add price, quantity available and postage attributes here.
        </p>
      </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div>
              <div>
                <label for="first_name" class="block text-sm font-medium text-gray-700">Product quantity</label>
                <div class="flex items-center">
                	<input wire:model="product_qty" type="text" name="product_qty" id="product_qty" autocomplete="Qty" class="@error('product_qty') border-red-500 @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-16 shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $product_qty }}" value="{{ $product->product_qty }}">
	                <button type="button" wire:click="decrement" class="px-2 bg-gray-200 h-6 m-1">-</button>
	                <button type="button" wire:click="increment" class="px-2 bg-gray-200 h-6">+</button>
	           	</div>
	           	@error('product_qty')
                	<p class="text-red-500">
                		{{ $message }}
                	</p>
                @enderror
              </div>

              <div class="mt-5">
                <label for="product_price" class="block text-sm font-medium text-gray-700">Product price</label>
                <div class="mt-1 flex rounded-md shadow-sm block w-16">
                	<span class="@error('product_price') border-red-500 @enderror  inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                    &pound;
                  </span>
                <input wire:model="product_price" type="text" name="product_price" id="product_price" autocomplete="Product Price" class="@error('product_price') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-0 block rounded-none rounded-r-md sm:text-sm border-gray-300" value="{{ $product->product_price }}">
                </div>
                @error('product_price')
                	<p class="text-red-500">
                		{{ $message }}
                	</p>
                @enderror
              </div>
             
            </div>
          </div>

          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button  type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Save
            </button>
          </div>
        </div>
     	
    </div>
  </div>
</div>

</form>
</div>
