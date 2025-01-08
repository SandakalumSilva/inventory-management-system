<?php 
namespace App\Interfaces\Pos;

interface ProductInterface{
    public function productAll();
    public function productAdd();
    public function productStore($request);
    public function productEdit($id);
    public function productUpdate($request);
    public function productDelete($id);
}