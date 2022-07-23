<?php

namespace App\Http\Livewire\Shops;

use App\Services\ShopService;
use Livewire\Component;

class CreateShopForm extends Component
{
    public $name;
    public $subdomain;

    protected $rules = [
        'name' =>  ['required', 'max:255', 'string'],
        'subdomain' =>  ['required', 'max:255', 'string', 'unique:shops'],
    ];

    /**
     * @throws \Exception
     */
    public function submit()
    {
        (new ShopService())->create($this->validate());
        $this->redirect(route('shops.index'));
    }

    public function render()
    {
        return view('livewire.shops.create-shop-form');
    }
}
