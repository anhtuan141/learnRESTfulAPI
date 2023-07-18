<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\ProductService;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $listProduct = $this->productService->index();

        return $this->sentSuccessResponse(
            $listProduct,
            'List Products!',
            Response::HTTP_OK
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProductRequest $request)
    {
        $create = $this->productService->store($request);

        return $this->sentSuccessResponse(
            $create,
            'Create New Product Successfully!',
            Response::HTTP_OK
        );
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $product = $this->productService->show($id);

        return $this->sentSuccessResponse(
            $product,
            'Show Product!',
            Response::HTTP_OK
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $update = $this->productService->update($request, $id);

        return $this->sentSuccessResponse(
            $update,
            'Update Successfully!',
            Response::HTTP_OK
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $delete = $this->productService->delete($id);

        return $this->sentSuccessResponse(
            $delete,
            'Delete Successfully!',
            Response::HTTP_OK
        );
    }
}
