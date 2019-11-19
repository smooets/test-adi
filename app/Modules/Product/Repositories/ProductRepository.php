<?php

namespace App\Modules\Product\Repositories;

use App\Modules\Product\Repositories\Contracts\ProductRepositoryInterface;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use stdClass;

class ProductRepository implements ProductRepositoryInterface {

    const URL = 'https://private-4639ce-ecommerce56.apiary-mock.com/home';
    const PRODUCT = 'productPromo';
    const CATEGORY = 'category';

    /**
     * Get all products
     *
     * @return object
     */
    public function productsWithCategories()
    {
        try {
            $client = new Client();
            $request = $client->get(self::URL);
            $response = $request->getBody()->getContents();
            $data = collect(json_decode($response)[0]->data);
        } catch (Exception $e) {
            $data = collect([
                self::CATEGORY => new stdClass(),
                self::PRODUCT => new stdClass(),
            ]);
        }
        session([self::CATEGORY => collect($data[self::CATEGORY])]);
        session([self::PRODUCT => collect($data[self::PRODUCT])]);

        return $data;
    }

    /**
     * Get product by id
     *
     * @param string $id
     * @return object
     */
    public function productById(string $id)
    {
        $products = request()->session()->get(self::PRODUCT);
        if(is_null($products) || $products->isEmpty()) {
            $products = $this->products();
        }
        return $products->where('id', $id)->first();
    }

    /**
     * Get all products
     *
     * @return object
     */
    public function products()
    {
        return $this->productsWithCategories()[self::PRODUCT];
    }

    /**
     * Get all categories
     *
     * @return object
     */
    public function categories()
    {
        return $this->productsWithCategories()[self::CATEGORY];
    }
}