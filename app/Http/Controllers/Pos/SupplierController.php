<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;
use App\Interfaces\SupplierInterface;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    protected $supplierRepository;

    public function __construct(SupplierInterface $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function supplierAll()
    {
        return $this->supplierRepository->supplierAll();
    }

    public function supplierAdd()
    {
        return $this->supplierRepository->supplierAdd();
    }

    public function supplierStore(SupplierRequest $request)
    {
        return $this->supplierRepository->supplierStore($request);
    }

    public function supplierEdit($id)
    {
        return $this->supplierRepository->supplierEdit($id);
    }

    public function supplierUpdate(SupplierRequest $request)
    {
        return $this->supplierRepository->supplierUpdate($request);
    }

    public function supplierDelete($id){
        return $this->supplierRepository->supplierDelete($id);
    }
}
