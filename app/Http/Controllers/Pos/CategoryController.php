<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Interfaces\Pos\CategoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function categoryAll()
    {
        return $this->categoryRepository->categoryAll();
    }

    public function categoryAdd()
    {
        return $this->categoryRepository->categoryAdd();
    }

    public function categoryStore(CategoryRequest $request)
    {
        return $this->categoryRepository->categoryStore($request);
    }

    public function categoryEdit($id)
    {
        return $this->categoryRepository->categoryEdit($id);
    }

    public function categoryUpdate(CategoryRequest $request)
    {
        return $this->categoryRepository->categoryUpdate($request);
    }

    public function categoryDelete($id)
    {
        return $this->categoryRepository->categoryDelete($id);
    }
}
