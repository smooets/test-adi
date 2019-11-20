<?php

namespace App\Modules\Product\Repositories;

use App\Modules\Product\Repositories\Contracts\ProductRepositoryInterface;
use Cache;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use stdClass;

class ProductRepository implements ProductRepositoryInterface {

    protected $cacheTime;

    /**
     * ProductRepository constructor.
     *
     * @param int $cacheTime
     */
    public function __construct(int $cacheTime = 60)
    {
        $this->cacheTime = $cacheTime;
    }

    /**
     * Get all products
     *
     * @return Collection
     */
    public function productsWithCategories()
    {
        $data = Cache::get('data');
        if(is_null($data) || collect($data[$this::CATEGORY])->isEmpty() || collect($data[$this::CATEGORY])->isEmpty()) {
            $data = Cache::remember('data', $this->cacheTime, function () {
                try {
                    $client = new Client();
                    $request = $client->get($this::URL);
                    $response = $request->getBody()->getContents();
                    return collect(json_decode($response)[0]->data);
                } catch (Exception $e) {
                    return collect([
                        $this::CATEGORY => new stdClass(),
                        $this::PRODUCT => new stdClass(),
                    ]);
                }
            });

            if($this->cacheTime > 0) {
                Cache::put($this::CATEGORY, collect($data[$this::CATEGORY]), $this->cacheTime);
                Cache::put($this::PRODUCT, collect($data[$this::PRODUCT]), $this->cacheTime);
            }
        }

        return $data;
    }

    /**
     * Get all products
     *
     * @return Collection
     */
    public function products()
    {
        $products = Cache::get($this::PRODUCT);
        if(is_null($products) || $products->isEmpty()) {
            $products = collect($this->productsWithCategories()[$this::PRODUCT]);
        }
        return $products;
    }

    /**
     * Get product by id
     *
     * @param int $id
     * @return Collection
     */
    public function productById(int $id)
    {
        $products = Cache::get($this::PRODUCT);
        if(is_null($products) || $products->isEmpty()) {
            $products = $this->products();
        }
        return $products->where('id', $id)->first();
    }

    /**
     * Get product by name
     *
     * @param string $name
     * @return Collection
     */
    public function productByName(string $name)
    {
        $products = Cache::get($this::PRODUCT);
        if(is_null($products) || $products->isEmpty()) {
            $products = $this->products();
        }
        return $products->filter(function($product) use ($name) {
            return false != stristr($product->title, $name);
        });
    }

    /**
     * Buy product by id and store to session
     *
     * @param int $id
     * @return Collection
     */
    public function productBuyById(int $id)
    {
        $product = $this->productById($id);
        session()->push($this::PRODUCT, $product);
    }

    /**
     * Get all categories
     *
     * @return Collection
     */
    public function categories()
    {
        $categories = Cache::get($this::PRODUCT);
        if(is_null($categories) || $categories->isEmpty()) {
            $products = collect($this->productsWithCategories()[$this::CATEGORY]);
        }
        return $products;
    }

    /**
     * Get cache time
     *
     * @return int
     */
    public function getCacheTime(): int
    {
        return $this->cacheTime;
    }

    /**
     * Set cache time
     *
     * @param int $cacheTime
     * @return void
     */
    public function setCacheTime(int $cacheTime): void
    {
        $this->cacheTime = $cacheTime;
    }
}