<?php 
namespace App\Interfaces\Pos;

Interface CategoryInterface{

    public function categoryAll();
    public function categoryAdd();
    public function categoryStore($request);
    public function categoryEdit($id);
    public function categoryUpdate($request);
    public function categoryDelete($id);
}