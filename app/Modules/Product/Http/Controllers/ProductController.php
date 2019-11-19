<?php

namespace App\Modules\Product\Http\Controllers;

use App\Modules\Product\Repositories\ProductRepository;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $productsWithCategories = $this->productRepository->productsWithCategories();
        $categories = $productsWithCategories[$this->productRepository::CATEGORY];
        $products = $productsWithCategories[$this->productRepository::PRODUCT];
        return view('product::index', compact('categories', 'products'));
    }

    public function show($id)
    {
        $product = $this->productRepository->productById($id);
        return view('product::show', compact('product'));
    }

    public function buy()
    {
        $id = request('pid');
        $this->productRepository->productBuyById($id);
    }

    public function history()
    {
        $products = session($this->productRepository::PRODUCT);
        return view('product::history', compact('products'));
    }
}
