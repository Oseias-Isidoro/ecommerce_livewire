<?php

namespace App\Http\Livewire\Shops;

use App\Models\Shop;
use Livewire\Component;
use Livewire\WithPagination;

class ShowShops extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public function render()
    {
        $shops = Shop::latest()->paginate(5);
        return view('livewire.shops.show-shops', compact(['shops']));
    }
}
