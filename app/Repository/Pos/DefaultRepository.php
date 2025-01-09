<?php

namespace App\Repository\Pos;

use App\Interfaces\Pos\DefaultInterface;
use App\Models\Product;
use function Laravel\Prompts\select;

class DefaultRepository implements DefaultInterface
{

    public  function getCategory($request)
    {
        $supplier_id = $request->supplier_id;
        $allCategory = Product::with(['category'])->select('category_id')->where('supplier_id', $supplier_id)->groupBy('category_id')->get();
        return response()->json($allCategory);
    }

    public function getProduct($request)
    {
        $supplier_id = $request->supplier_id;
        $category_id = $request->category_id;
        $allProduct = Product::where('supplier_id', $supplier_id)->where('category_id', $category_id)->get();
        return response()->json($allProduct);
    }
}
