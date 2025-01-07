<?php

namespace App\Http\Controllers;

use App\Interfaces\AdminInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $adminRepository;
    public function __construct(AdminInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function destroy(Request $request){
      return  $this->adminRepository->destroy($request);
    }

    public function Profile(){
      return  $this->adminRepository->Profile();
    }

    public function EditProfile(){
        return $this->adminRepository->EditProfile();
    }

    public function StoreProfile(Request $request){
        return $this->adminRepository->StoreProfile($request);
    }

    public function ChangePassword(){
        return $this->adminRepository->ChangePassword();
    }

    public function UpdatePassword(Request $request){
        return $this->adminRepository->UpdatePassword($request);
    }

}
