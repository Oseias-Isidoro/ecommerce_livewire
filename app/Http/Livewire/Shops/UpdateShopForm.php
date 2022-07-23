<?php

namespace App\Http\Livewire\Shops;

use App\Services\ShopService;
use Livewire\Component;

class UpdateShopForm extends Component
{
    public $name;
    public $subdomain;
    public $shop;

    protected function rules()
    {
        return [
            'name' =>  ['required', 'max:255', 'string'],
            'subdomain' =>  ['required', 'max:255', 'string', 'unique:shops,subdomain,'.$this->shop->id],
        ];
    }

    public function mount($shop)
    {
        $this->name = $shop->name;
        $this->subdomain = $shop->subdomain;
    }

    /**
     * @throws \Exception
     */
    public function submit()
    {
        (new ShopService())->update($this->shop, $this->validate());
        $this->redirect(route('shops.index'));
    }

    public function render()
    {
        return view('livewire.shops.update-shop-form');
    }
}
