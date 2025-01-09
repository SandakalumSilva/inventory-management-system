<?php 
namespace App\Interfaces\Pos;

interface DefaultInterface{
    public function getCategory($request);
    public function getProduct($request);
}