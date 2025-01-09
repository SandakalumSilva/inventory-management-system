<?php

namespace App\Repository\Pos;

use App\Interfaces\Pos\PurchaseInterface;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;

class PurchaseRepository implements PurchaseInterface
{

    public function purchaseAll()
    {
        $allData = Purchase::orderBy('date', 'desc')->orderBy('id', 'desc')->get();
        return view('backend.purchase.purchase_all', compact('allData'));
    }

    public function purchaseAdd()
    {
        $supplier = Supplier::all();
        return view('backend.purchase.purchase_add', compact('supplier'));
    }

    public function purchaseStore($request)
    {
        $countCategory = count($request->category_id);
        for ($i = 0; $i < $countCategory; $i++) {
            Purchase::insert([
                'date' => date('Y-m-d', strtotime($request->date[$i])),
                'purchase_no' => $request->purchase_no[$i],
                'supplier_id' => $request->supplier_id[$i],
                'category_id' => $request->category_id[$i],
                'product_id' => $request->product_id[$i],
                'buying_qty' => $request->buying_qty[$i],
                'unit_price' => $request->unit_price[$i],
                'buying_price' => $request->buying_price[$i],
                'description' => $request->description[$i],
                'created_by' => Auth::user()->id,
            ]);
        }

        $notification = [
            'message' => "Product  Purchase Successfully",
            'alert-type' => 'success'
        ];

        return redirect()->route('purchase.all')->with($notification);
    }

    public function purchaseDelete($id)
    {
        Purchase::findOrFail($id)->delete();
        $notification = [
            'message' => "Product Purchase Deleted Successfully",
            'alert-type' => 'success'
        ];
        return redirect()->route('purchase.all')->with($notification);
    }

    public function purchasePending()
    {
        $allData = Purchase::orderBy('date', 'desc')->orderBy('id', 'desc')->where('status', '0')->get();
        return view('backend.purchase.purchase_pending', compact('allData'));
    }

    public function purchaseApprove($id)
    {
        $purchase = Purchase::findOrFail($id);
        $product = Product::where('id', $purchase->product_id)->first();

        $purchaseQty = ((float)($purchase->buying_qty) + (float)($product->quantity));
        $product->quantity = $purchaseQty;

        if ($product->save()) {
            Purchase::findOrFail($id)->update([
                'status' => '1'
            ]);

            $notification = [
                'message' => "Product Purchase Status changed Successfully",
                'alert-type' => 'success'
            ];
            return redirect()->route('purchase.all')->with($notification);
        }
    }
}
