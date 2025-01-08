<?php

namespace App\Repository\Pos;

use App\Interfaces\Pos\CategoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryInterface
{

    public function categoryAll()
    {
        $categoris = Category::latest()->get();
        return view('backend.category.category_all', compact('categoris'));
    }

    public function categoryAdd()
    {
        return view('backend.category.category_add');
    }

    public function categoryStore($request)
    {
        Category::insert([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('category.all')->with($notification);
    }

    public function categoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    }

    public function categoryUpdate($request)
    {
        $id = $request->id;
        Category::findOrFail($id)->update([
            'name' => $request->name
        ]);

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('category.all')->with($notification);
    }

    public function categoryDelete($id)
    {
        Category::findOrFail($id)->delete();


        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('category.all')->with($notification);
    }
}
