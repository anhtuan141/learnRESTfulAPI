<?php

namespace App\Services;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Interfaces\ProductInterface;

class ProductService
{
    /**
     * @var ProductInterface
     */
    protected $productInterface;

    /**
     * @param ProductInterface $productInterface
     */
    public function __construct(ProductInterface $productInterface)
    {
        $this->productInterface = $productInterface;
    }

    /**
     * Display a listing of the resource.
     * @return mixed
     */
    public function index()
    {
        return $this->productInterface->index();
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreProductRequest $request
     * @return mixed
     */
    public function store(StoreProductRequest $request)
    {
        return $this->productInterface->store($request);
    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return mixed
     */
    public function show(int $id)
    {
        return $this->productInterface->show($id);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateProductRequest $request
     * @param int $id
     * @return mixed
     */
    public function update(UpdateProductRequest $request, int $id)
    {
        return $this->productInterface->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        return $this->productInterface->delete($id);
    }
}
