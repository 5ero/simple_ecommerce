<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;
use App\Helpers\HandleResponse;
use App\Helpers\postcode;
use Livewire\Component;


class PostcodeSearch extends Component
{
    public $search;
	public $searchData = [];
	public $addresses = [];
    public $postcode;

    public function search()
	{
		
		$response = Http::get('https://api.getAddress.io/find/' . trim($this->search ). '?api-key=' . config( 'getaddress.api_key' ) . '&format=true&sort=true');
		if( $response->ok() ) {
			$this->searchData = $response->json()['addresses'];
			$this->postcode = Postcode::FormatPostcode($this->search);
		} else {
			$this->dispatchBrowserEvent('error', HandleResponse::error( 'There was an error', 422 ));
		}		
	}

	public function emitAddress()
	{
		$addr = $this->searchData[$this->addresses];
		array_push($addr, $this->postcode);
		$this->emit('address', $addr);
	}
   

    public function render()
    {
        return view('livewire.postcode-search');
    }
}
