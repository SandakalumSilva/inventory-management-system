<?php 
namespace App\Interfaces\Pos;

interface PurchaseInterface{
    public function purchaseAll();
    public function purchaseAdd();
    public function purchaseStore($request);
    public function purchaseDelete($id);
    public function purchasePending();
    public function purchaseApprove($id);
}