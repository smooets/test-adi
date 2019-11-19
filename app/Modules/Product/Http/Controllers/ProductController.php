<?php

namespace App\Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Product\Repositories\ProductRepository;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->productRepository->setCacheTime(10);
    }

    public function index()
    {
        $productsWithCategories = $this->productRepository->productsWithCategories();
        $categories = $productsWithCategories[$this->productRepository::CATEGORY];
        $products = $productsWithCategories[$this->productRepository::PRODUCT];
        return view('product::index', compact('categories', 'products'));
    }

    public function search()
    {
        if(request()->ajax()) {
            $query = request('q');
            $products = $this->productRepository->productByName($query);
            return view('product::partials.card-horizontal', compact( 'products'))->render();
        }
        return redirect()->route('product.index');
    }

    public function show($id)
    {
        $product = $this->productRepository->productById($id);
        $title = $product->title;
        return view('product::show', compact('title', 'product'));
    }

    public function buy()
    {
        if(request()->ajax()) {
            $id = request('pid');
            $this->productRepository->productBuyById($id);
        }
        return response()->json([
            'message' => 'error'
        ]);
    }

    public function history()
    {
        $title = 'Purchased History';
        $products = session($this->productRepository::PRODUCT);
        return view('product::history', compact('title', 'products'));
    }
}
