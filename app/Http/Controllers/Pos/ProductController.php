<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Interfaces\Pos\ProductInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function productAll()
    {
        return $this->productRepository->productAll();
    }

    public function productAdd()
    {
        return $this->productRepository->productAdd();
    }

    public function productStore(ProductRequest $request)
    {
        return $this->productRepository->productStore($request);
    }

    public function productEdit($id)
    {
        return $this->productRepository->productEdit($id);
    }

    public function productUpdate(ProductRequest $request)
    {
        return $this->productRepository->productUpdate($request);
    }

    public function productDelete($id){
        return $this->productRepository->productDelete($id);
    }
}
