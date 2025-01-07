<?php 
namespace App\Interfaces;

interface AdminInterface{
    public function destroy($request);
    public function Profile();
    public function EditProfile();
    public function StoreProfile($request);
    public function ChangePassword();
    public function UpdatePassword($request);
}