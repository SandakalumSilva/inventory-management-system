<?php

namespace App\Repository\Pos;

use App\Interfaces\Pos\ProductInterface;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;

class ProductRepository implements ProductInterface
{

    public function productAll()
    {
        $product = Product::latest()->get();
        return view('backend.product.product_all', compact('product'));
    }

    public function productAdd()
    {
        $unit = Unit::all();
        $supplier = Supplier::all();
        $category = Category::all();
        return view('backend.product.product_add', compact('unit', 'supplier', 'category'));
    }

    public function productStore($request)
    {
        Product::insert([
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'name' => $request->name
        ]);

        $notification = [
            'message' => 'Product Added Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->route('product.all')->with($notification);
    }

    public function productEdit($id)
    {
        $unit = Unit::all();
        $supplier = Supplier::all();
        $category = Category::all();
        $product = Product::findOrFail($id);
        return view('backend.product.product_edit', compact('product', 'unit', 'supplier', 'category'));
    }

    public function productUpdate($request)
    {
        $productId = $request->id;

        Product::findOrFail($productId)->update([
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'name' => $request->name
        ]);

        $notification = [
            'message' => 'Product Updated Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->route('product.all')->with($notification);
    }

    public function productDelete($id)
    {
        Product::findOrFail($id)->delete();

        $notification = [
            'message' => 'Product Deleted Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->route('product.all')->with($notification);
    }
}
