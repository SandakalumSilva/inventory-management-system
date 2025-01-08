<?php 
namespace App\Interfaces\Pos;

interface UnitInterface{
    public function unitAll();
    public function unitAdd();
    public function unitStore($request);
    public function unitEdit($id);
    public function unitUpdate($request);
    public function unitDelete($id);
}