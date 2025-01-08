<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Interfaces\Pos\CustomerInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerRepository;

    public function __construct(CustomerInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function customerAll()
    {
        return $this->customerRepository->customerAll();
    }

    public function customerAdd()
    {
        return $this->customerRepository->customerAdd();
    }

    public function customerStore(CustomerRequest $request)
    {
        return $this->customerRepository->customerStore($request);
    }

    public function customerEdit($id)
    {
        return $this->customerRepository->customerEdit($id);
    }

    public function customerUpdate(CustomerRequest $request)
    {
        return $this->customerRepository->customerUpdate($request);
    }

    public function customerDelete($id)
    {
        return $this->customerRepository->customerDelete($id);
    }
}
