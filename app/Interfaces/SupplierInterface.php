<?php 
namespace App\Interfaces;

interface SupplierInterface{
    public function supplierAll();
    public function supplierAdd();
    public function supplierStore($request);
    public function supplierEdit($id);
    public function supplierUpdate($request);
    public function supplierDelete($id);
}