<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Http\Requests\UnitRequest;
use App\Interfaces\Pos\UnitInterface;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    protected $unitRepository;

    public function __construct(UnitInterface $unitRepository)
    {
        $this->unitRepository = $unitRepository;
    }

    public function unitAll()
    {
        return $this->unitRepository->unitAll();
    }

    public function unitAdd()
    {
        return $this->unitRepository->unitAdd();
    }

    public function unitStore(UnitRequest $request)
    {
        return $this->unitRepository->unitStore($request);
    }

    public function unitEdit($id)
    {
        return $this->unitRepository->unitEdit($id);
    }

    public function unitUpdate(UnitRequest $request){
        return $this->unitRepository->unitUpdate($request);
    }

    public function unitDelete($id){
        return $this->unitRepository->unitDelete($id);
    }
}
