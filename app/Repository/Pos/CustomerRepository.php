<?php

namespace App\Repository\Pos;

use App\Interfaces\Pos\CustomerInterface;
use App\Models\Customer;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CustomerRepository implements CustomerInterface
{

    public function customerAll()
    {
        $customers = Customer::latest()->get();
        return view('backend.customer.customer_all', compact('customers'));
    }

    public function customerAdd()
    {
        return view('backend.customer.customer_add');
    }

    public function customerStore($request)
    {
        $manager = new ImageManager(new Driver());

        if ($request->file('customer_image')) {
            $image = $request->file('customer_image');
            $nameGen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $file = $manager->read($image);
            $file->resize(300, 300)->save('upload/customer/' . $nameGen);

            $saveUrl = 'upload/customer/' . $nameGen;
        } else {
            $saveUrl = '';
        }

        Customer::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'customer_image' => $saveUrl,
            'created_by' => Auth::user()->id,
            'created_at' =>  Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Customer Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);
    }

    public function customerEdit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('backend.customer.customer_edit', compact('customer'));
    }

    public function customerUpdate($request)
    {
        $cusId = $request->id;

        $manager = new ImageManager(new Driver());

        if ($request->file('customer_image')) {
            $image = $request->file('customer_image');
            $nameGen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $file = $manager->read($image);
            $file->resize(300, 300)->save('upload/customer/' . $nameGen);

            $saveUrl = 'upload/customer/' . $nameGen;

            $cusImg = Customer::findOrFail($cusId);

            Customer::findOrFail($cusId)->update([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'address' => $request->address,
                'customer_image' => $saveUrl,
                'updated_by' => Auth::user()->id,
                'updated_at' =>  Carbon::now(),
            ]);

            unlink($cusImg->customer_image);
        } else {
            Customer::findOrFail($cusId)->update([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'address' => $request->address,
                'updated_by' => Auth::user()->id,
                'updated_at' =>  Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Customer Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);
    }

    public function customerDelete($id)
    {
        $cusImg = Customer::findOrFail($id);
        unlink($cusImg->customer_image);

        Customer::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Customer Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);
    }
}
