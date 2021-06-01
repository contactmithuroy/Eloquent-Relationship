<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Phone;
use App\Models\User;

class UserController extends Controller
{
    public function insertRecord(){
        $phone = new Phone();
        $phone->phone = '12455533';
        
        $user = new User();
        $user->name  = 'Ethan Hunt';
        $user->email = 'ethan@gamil.com';
        $user->password  = encrypt('secret');

        $user->save();
        $user->Phone()->save($phone);

        return "Record Has Been Record Successfully!";
    }
}
