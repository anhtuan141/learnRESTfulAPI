<?php

namespace App\Interfaces;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

interface ProductInterface
{
    /**
     * Display a listing of the resource.
     * @return mixed
     */
    public function index();

    /**
     * Store a newly created resource in storage.
     * @param StoreProductRequest $request
     * @return mixed
     */
    public function store(StoreProductRequest $request);

    /**
     * Display the specified resource.
     * @param int $id
     * @return mixed
     */
    public function show(int $id);

    /**
     * Update the specified resource in storage.
     * @param UpdateProductRequest $request
     * @param int $id
     * @return mixed
     */
    public function update(UpdateProductRequest $request, int $id);

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return mixed
     */
    public function delete(int $id);

}
