<?php

namespace App\Http\Livewire;

use Str;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class ProductEdit extends Component
{
	use WithFileUploads;

	public $product;
	public $photo;
	public $product_name;
	public $product_description;
	public $product_qty;
	public $product_price;
	public $tempUrl;
	public $active;
	public $categories;
	public $category;
	public $addCategory;

	protected $rules = [
		'product_name' => 'required',
		'product_description' => 'required',
		'product_qty' => 'required',
		'product_price' => 'required|numeric',
		'photo' => 'nullable|image|max:5000',
		'category' => 'required|integer'
	];

	protected $listeners = ['categoryUpdated' => 'updateCategories'];

	public function updateCategories()
	{
		$this->categories = Category::orderBy('id','desc')->get();
	}

	public function saveCategory()
	{
		$cat = new Category;
		$cat->create([
			'name' => $this->addCategory,
			'description' => ''
		]);
		$this->emit('categoryUpdated');
		$this->addCategory = '';
	}

	public function increment()
	{
		return $this->product_qty++;
	}

	public function decrement()
	{
		return $this->product_qty--;
	}

	public function checkActive()
	{
			if($this->product->active == true){ 
			   $this->active = false; 
			} elseif( $this->product->active == false) {
				$this->active = true;
			}

			$this->product->update([
					'active' => $this->active
				]);
	}



	public function deleteThisProduct()
	{
		$this->dispatchBrowserEvent('delete','Are you sure?');
	}

	public function deleteProduct()
	{
		Storage::delete($this->product->photo);
		$this->product->delete();
		sleep(1);
		return redirect('/products');
	}

	public function mount(Product $product)
	{
		$this->product = $product;
		$this->product_name = $product->product_name;
		$this->product_description = $product->product_description;
		$this->product_qty = $product->product_qty;
		$this->product_price = $product->product_price;
		$this->categories = Category::all();
		$this->category = $product->category->id;
	}

	public function updatedPhoto()
	{
		// Catches the ErrorException : This driver does not support creating temporary URLs when a user attempts to upload a non image file.
		try {
			// if the uploaded file is an image display the tmp file.
			$this->tempUrl  = $this->photo->temporaryUrl();
		} catch (\Exception $e){
			// if the uploaded file is a non image file, display the existing image.
			$this->tempUrl = Storage::url($this->product->photo);
		}

		$this->validate();

	}

	public function updateProduct()
	{
		

		$this->validate();


		$this->product->update([
			'product_name' => $this->product_name,
			'product_description' => $this->product_description,
			'product_qty' => $this->product_qty,
			'product_price' => $this->product_price,
			'photo' => $this->photo ? $this->photo->storeAs('images', str::slug($this->product_name).'.'.$this->photo->extension()) : $this->product->photo,
			'category_id' => $this->category
		]);

		//toast notification via alpine
		$this->dispatchBrowserEvent('success', 'Product updated!');
		
	}

    public function render()
    {
        return view('livewire.product-edit');
    }
}
