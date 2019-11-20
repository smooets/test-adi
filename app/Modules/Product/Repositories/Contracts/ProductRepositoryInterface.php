<?php

namespace App\Modules\Product\Repositories\Contracts;

use Illuminate\Support\Collection;

interface ProductRepositoryInterface {

    const URL = 'https://private-4639ce-ecommerce56.apiary-mock.com/home';
    const CATEGORY = 'category';
    const PRODUCT = 'productPromo';

    /**
     * Get all products with categories
     *
     * @return Collection
     */
    public function productsWithCategories();

    /**
     * Get all products
     *
     * @return Collection
     */
    public function products();

    /**
     * Get product by id
     *
     * @param int $id
     * @return Collection
     */
    public function productById(int $id);

    /**
     * Get product by name
     *
     * @param string $name
     * @return Collection
     */
    public function productByName(string $name);

    /**
     * Buy product by id and store to session
     *
     * @param int $id
     * @return Collection
     */
    public function productBuyById(int $id);

    /**
     * Get all categories
     *
     * @return Collection
     */
    public function categories();

    /**
     * Get cache time
     *
     * @return int
     */
    public function getCacheTime();

    /**
     * Set cache time
     *
     * @param int $cacheTime
     * @return void
     */
    public function setCacheTime(int $cacheTime);
}