<?php 
namespace App\Interfaces\Pos;

interface CustomerInterface{

    public function customerAll();
    public function customerAdd();
    public function customerStore($request);
    public function customerEdit($id);
    public function customerUpdate($request);
    public function customerDelete($id);
}