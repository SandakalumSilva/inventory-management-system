<?php

namespace App\Repository\Pos;

use App\Interfaces\Pos\UnitInterface;
use App\Models\Unit;

class UnitRepository implements UnitInterface
{
    public function unitAll()
    {
        $units = Unit::latest()->get();
        return view('backend.unit.unit_all', compact('units'));
    }

    public function unitAdd()
    {
        return view('backend.unit.unit_add');
    }

    public function unitStore($request)
    {

        Unit::insert([
            'name' => $request->name
        ]);

        $notification = [
            'message' => 'Unit Inserted Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->route('unit.all')->with($notification);
    }

    public function unitEdit($id)
    {
        $unit = Unit::findOrFail($id);
        return view('backend.unit.unit_edit', compact('unit'));
    }

    public function unitUpdate($request)
    {
        $unitId = $request->id;

        Unit::findOrFail($unitId)->update([
            'name' => $request->name
        ]);

        $notification = [
            'message' => 'Unit Updated Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->route('unit.all')->with($notification);
    }

    public function unitDelete($id)
    {
        Unit::findOrFail($id)->delete();

        $notification = [
            'message' => 'Unit Deleted Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->route('unit.all')->with($notification);
    }
}
