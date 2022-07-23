<?php

namespace App\Services;

use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ShopService
{
    /**
     * @throws \Exception
     */
    public function create(array $shop_data): Shop
    {
        $shop = new Shop();
        $shop->fill($shop_data);
        $shop->fill([
            'user_id' => Auth::id(),
            'hash' => $this->randomHash('hash'),
            'status' => Shop::$STATUS_ACTIVE,
        ]);

        if (!$shop->save())
            throw new \Exception('Error creating shop', 500);

        return $shop;
    }

    /**
     * @throws \Exception
     */
    public function update(Shop $shop, array $shop_data): Shop
    {
        if (!$shop->update($shop_data))
            throw new \Exception('Error updating shop', 500);

        return $shop;
    }

    public function randomHash($field): string
    {
        $hash = Str::random(30);

        $verify = Shop::where($field, $hash)->first();

        if($verify){
            return self::randomHash($field);
        }else{
            return $hash;
        }
    }
}
