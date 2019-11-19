<?php

namespace App\Modules\Product\Repositories\Contracts;

use Illuminate\Support\Collection;

interface ProductRepositoryInterface {

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
}