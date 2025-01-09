<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseRequest;
use App\Interfaces\Pos\PurchaseInterface;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    protected $purchaseRepository;

    public function __construct(PurchaseInterface $purchaseRepository)
    {
        $this->purchaseRepository = $purchaseRepository;
    }

    public function purchaseAll(){
        return $this->purchaseRepository->purchaseAll();
    }

    public function purchaseAdd(){
        return $this->purchaseRepository->purchaseAdd();
    }

    public function purchaseStore(PurchaseRequest $request){
        return $this->purchaseRepository->purchaseStore($request);
    }

    public function purchaseDelete($id){
        return $this->purchaseRepository->purchaseDelete($id);
    }

    public function purchasePending(){
        return $this->purchaseRepository->purchasePending();
    }

    public function purchaseApprove($id){
        return $this->purchaseRepository->purchaseApprove($id);
    }
}
