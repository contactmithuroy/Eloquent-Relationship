<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;

use App\Models\User;

class RoleController extends Controller
{
    public function addRole(){
        $roles = [
            ['name'=>'Administrator'],
            ['name'=>'Editor'],
            ['name'=>'Author'],
            ['name'=>'Contributor'],
            ['name'=>'Subscribers'],

        ];

        Role::insert($roles);
        return "Role are created Successfully";
    }

    public function addUser(){
        $user = new User();
        $user->name  = 'Mithu Roy';
        $user->email = 'mithu@gamil.com';
        $user->password  = encrypt('123');

        $user->save();

        $roleids = [2,3,5];
        $user->roles()->attach($roleids);


        return "Record Has Been Record Successfully!";
    }


    // get what are role an user.
    public function getAllRolesByUser($id){
        $user = User::find($id);
        $roles = $user->roles;
        return $roles;
    }

    // get which person are adminstator like that or which persons are author like
    public function getAllUsersByRole($id){
        $role= Role::find($id);
        $users = $role->users;
        return $users;
    }

}
