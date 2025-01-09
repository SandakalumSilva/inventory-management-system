<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Interfaces\Pos\DefaultInterface;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    protected $defaultRepository;

    public function __construct(DefaultInterface $defaultRepository)
    {
        $this->defaultRepository = $defaultRepository;
    }

    public function getCategory(Request $request)
    {
        return $this->defaultRepository->getCategory($request);
    }

    public function getProduct(Request $request){
        return $this->defaultRepository->getProduct($request);
    }
}
