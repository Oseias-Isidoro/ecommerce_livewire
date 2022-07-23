<?php

namespace App\Http\Livewire\Shops;

use App\Models\Shop;
use App\Services\ShopService;
use Livewire\Component;

class UpdateShopForm extends Component
{
    public $name;
    public $subdomain;
    public $status;
    public $shop;

    protected function rules()
    {
        return [
            'name' =>  ['required', 'max:255', 'string'],
            'subdomain' =>  ['required', 'max:255', 'string', 'unique:shops,subdomain,'.$this->shop->id],
            'status' =>  ['required', 'max:255', 'string', 'in:'.implode(',', Shop::$STATUS_VALUES)],
        ];
    }

    public function mount($shop)
    {
        $this->name = $shop->name;
        $this->subdomain = $shop->subdomain;
        $this->status = $shop->status;
    }

    /**
     * @throws \Exception
     */
    public function submit()
    {
        (new ShopService())->update($this->shop, $this->validate());

        return redirect()
            ->route('shops.index')
            ->with('success', __('successfully updated'));
    }

    public function render()
    {
        return view('livewire.shops.update-shop-form');
    }
}
