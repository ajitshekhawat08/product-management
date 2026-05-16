<?php

namespace App\Http\Controllers;



use App\Http\Requests\ProductRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
       
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $search = $request->search;

        $products = $this->productService->getProducts($search);

        return view('products.index', compact('products'));
    }
    

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        $this->productService->createProduct($request->validated());

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully');
    }

    public function edit($id)
    {
        $product = $this->productService->findProduct($id);

        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $this->productService->updateProduct($id, $request->validated());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $this->productService->deleteProduct($id);

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}