<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Models\Category;
use Livewire\Component;


class ProductCreate extends Component
{
	use WithFileUploads;

	public $product_name;
	public $product_description;
	public $product_qty = 0;
	public $product_price;
	public $successMsg;
	public $photo;
	public $categories;
	public $category;
	public $addCategory;
	public $tempUrl;

	public function increment()
	{
		return $this->product_qty++;
	}

	public function decrement()
	{
		return $this->product_qty--;
	}

	protected $rules = [
		'product_name' => 'required|min:6',
		'product_description' => 'required|min:10',
		'product_qty' => 'required|integer',
		'product_price' => 'required|numeric',
		'photo' => 'nullable|image',
		'category' => 'required|integer|unique:categories,name'
	];

	protected $listeners = ['categoryUpdated' => 'updateCategories'];

	public function updateCategories()
	{
		$this->categories = Category::orderBy('name')->get();
	}

	public function mount()
	{
		$this->categories = Category::orderBy('name')->get();
	
	}

	public function  updated($propertyName)
	{	
		if($this->photo){
			try {
				$this->tempUrl  = $this->photo->temporaryUrl();
			} catch (\Exception $e){
				$this->tempUrl = '';
			}
		}
		

		$this->validateOnly($propertyName);
	}

	public function saveCategory()
	{
		Category::create([
			'name' => $this->addCategory,
			'description' => ''
		]);
		$cat = Category::orderBy('id', 'desc')->first();
		$this->category = $cat->id;
		$this->emit('categoryUpdated');
		$this->addCategory = '';
	}

	public function submitForm()
	{
			$this->validate();

			$isImage = $this->photo ? $this->photo->storeAs('images', Str::slug($this->product_name).'.'.$this->photo->extension()) : null;

			$formData = [
				'product_name' => $this->product_name,
				'product_description' => $this->product_description,
				'product_qty' => $this->product_qty,
				'product_price' => $this->product_price,
				'photo' => $isImage,
				'category_id' => $this->category
			];


			// Needs refactoring to use model directly instead of api.
			try {
				$response = Http::post(config('app.url') . '/api/products', $formData);

			} catch (Exception $e){
				$this->successMsg = 'Error: '. $e;
			}
			
			$this->dispatchBrowserEvent('success', 'Product created!');			
			$this->clearForm();
	}

	public function clearForm()
	{
		$this->product_name = '';
		$this->product_description = '';
		$this->product_qty = 0;
		$this->product_price = '';
		$this->photo = '';
		
	}


    public function render()
    {
        return view('livewire.product-create');
    }
}
