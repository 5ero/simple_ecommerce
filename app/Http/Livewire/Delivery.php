<?php


namespace App\Http\Livewire;

use App\Models\Customer;

use Livewire\Component;
use App\Models\Basket;




class Delivery extends Component
{

	public $name;
	public $email;
	public $contact_no;
	public $address_1 = '';
	public $address_2 = '';
	public $address_3 = '';
	public $city = '';
	public $postcode = '';
	public $county = '';
	public $addresses=[];
	
	protected $rules = [
		
		'name' => 'required',
		'email' => 'required|email',
		'contact_no' => 'required|numeric',
		'address_1' => 'required',
		'city' => 'required',
		'county' => 'required',
	];

	protected $messages = [
		'name.required' => 'You need to provide your name',
		'email.required' => 'You need to provide your email address',
		'email.email' => 'Please provide a valid email address',
		'contact_no.required' => 'Please provide a contact telephone number'
	];

	protected $listeners = ['address', 'addresses'];

	public function address($address)
	{
		$this->address_1 = $address[0];
		$this->address_2 = $address[1];
		$this->address_3 = $address[2];
		$this->city = $address[3];
		$this->county = $address[4];
		$this->postcode = $address[5];

	}

	public function updated($propertyName)
	{
		$this->validateOnly($propertyName);
	}

	

	public function save()
	{
		$this->validate();

		$customer = Customer::updateOrCreate(
			[
				'email' => $this->email,
				'name' => $this->name
			],
			[
			'name' => $this->name,
			'email' => $this->email,
			'telephone' => $this->contact_no,
			'address_1' => $this->address_1,
			'address_2' =>$this->address_2,
			'address_3' => $this->address_3,
			'city' => $this->city,
			'county' => $this->county,
			'postcode' => $this->postcode

		]);

		$baskets = Basket::where('session_id', session('_token'))->get();
			foreach($baskets as $basket){
				$basket->update([
							'customer_id' => $customer->id
						]);
				}
		return redirect(route('checkout'));			
	}
    
    public function render()
    {
        return view('livewire.delivery')
        	->layout('layouts.base');
    }
}
