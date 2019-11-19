<?php

namespace App\Modules\Product\Repositories\Contracts;

use Illuminate\Http\Request;

interface ProductRepositoryInterface {

    /**
     * Get all products with categories
     *
     * @return object
     */
    public function productsWithCategories();

    /**
     * Get all products
     *
     * @return object
     */
    public function products();

    /**
     * Get product by id
     *
     * @param string $id
     * @return object
     */
    public function productById(string $id);

    /**
     * Get all categories
     *
     * @return object
     */
    public function categories();
}