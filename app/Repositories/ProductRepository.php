<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll($search = null)
{
    return Product::query()

        ->when($search, function ($query) use ($search) {

            $query->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");

        })

        ->latest()
        ->paginate(10);
}

    public function findById($id)
    {
        return Product::findOrFail($id);
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update($id, array $data)
    {
        $product = $this->findById($id);
        $product->update($data);

        return $product;
    }

    public function delete($id)
    {
        $product = $this->findById($id);
        return $product->delete();
    }
}