<?php

namespace App\Repositories;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Interfaces\ProductInterface;
use App\Models\Product;

class ProductRepository implements ProductInterface
{
    /**
     * @var Product
     */
    protected $product;

    /**
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     * @return mixed
     */
    public function index()
    {
        $product = $this->product->paginate(5);

        $productResource = ProductResource::collection($product)->response()->getData(true);

        return $productResource;
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreProductRequest $request
     * @return ProductResource
     */
    public function store(StoreProductRequest $request)
    {
        $dataCreate = $request->all();

        $product = $this->product->create($dataCreate);

        $productResource = new ProductResource($product);

        return $productResource;
    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return ProductResource
     */
    public function show(int $id)
    {
        $product = $this->product->findOrFail($id);

        $productResource = new ProductResource($product);

        return $productResource;
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateProductRequest $request
     * @param int $id
     * @return ProductResource
     */
    public function update(UpdateProductRequest $request, int $id)
    {
        $product = $this->product->findOrFail($id);

        $dataUpdate = $request->all();

        $product->update($dataUpdate);

        $productResource = new ProductResource($product);

        return $productResource;
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return ProductResource
     */
    public function delete(int $id)
    {
        $product = $this->product->findOrFail($id);

        $product->delete();

        $productResource = new ProductResource($product);

        return $productResource;

    }
}
