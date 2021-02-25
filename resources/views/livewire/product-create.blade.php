

<div>
   <div class="p-4">
   	Create a product
   </div>
   <hr>

<form wire:submit.prevent="submitForm" method="POST" enctype="multipart/formdata">
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
                  <!-- <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                    http://
                  </span> -->
                  <input wire:model="product_name" type="text" name="product_name" id="product_name" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300 @error('product_name') border-red-500 @enderror" placeholder="Product name">
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
                <textarea wire:model="product_description" id="product_description" name="product_description" rows="5" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md @error('product_description') border-red-500 @enderror" placeholder="Describe the product here"></textarea>
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
             	
             	@if($photo)
              		<div class="border border-gray-300 mt-4 rounded w-48 h-48">
              			<img src="{{ $tempUrl }}" class="object-cover h-full w-full" alt="">
              		</div>
              	@else
              		<div class="border border-gray-300 mt-4 rounded w-48 h-48 text-center pt-20 text-gray-500 font-semibold">
              			Preview image
              		</div>
              	@endif
             	



           			
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
                	<input wire:model="product_qty" type="text" name="product_qty" id="product_qty" autocomplete="Qty" class="@error('product_qty') border-red-500 @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-16 shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ $product_qty }}">
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
                <input wire:model="product_price" type="text" name="product_price" id="product_price" autocomplete="Product Price" class="@error('product_price') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-0 block rounded-none rounded-r-md sm:text-sm border-gray-300">
                </div>
                @error('product_price')
                	<p class="text-red-500">
                		{{ $message }}
                	</p>
                @enderror
              </div>

              <!-- <div >
                <label for="email_address" class="block text-sm font-medium text-gray-700">Email address</label>
                <input type="text" name="email_address" id="email_address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div>
                <label for="country" class="block text-sm font-medium text-gray-700">Country / Region</label>
                <select id="country" name="country" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  <option>United States</option>
                  <option>Canada</option>
                  <option>Mexico</option>
                </select>
              </div>
 -->
             <!--  <div class="col-span-6">
                <label for="street_address" class="block text-sm font-medium text-gray-700">Street address</label>
                <input type="text" name="street_address" id="street_address" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                <input type="text" name="city" id="city" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="state" class="block text-sm font-medium text-gray-700">State / Province</label>
                <input type="text" name="state" id="state" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="postal_code" class="block text-sm font-medium text-gray-700">ZIP / Postal</label>
                <input type="text" name="postal_code" id="postal_code" autocomplete="postal-code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div> -->
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
