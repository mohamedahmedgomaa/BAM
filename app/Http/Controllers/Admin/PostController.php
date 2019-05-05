<?php

namespace App\Http\Controllers\Admin;

use App\Model\Product;
use App\Role;
use App\User;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Seession;
use Image;

class PostController extends Controller
{

    public function admin()
    {
        $users = User::all();
        return view('admin/admin', compact('users'));
    }

    public function addRole(Request $request)
    {

        foreach ($request['email'] as $email) {
            if ($user = User::where('email', $email)->first()) {
                $user->roles()->detach();

                $userRole = $request['role_user'][$email] ?? null;
                $roleAdminShop = $request['role_admin_shop'][$email] ?? null;
                if ($userRole) {
                    $role = Role::where('name', 'user')->first();
                    $user->roles()->attach($role);
                }

                if ($roleAdminShop) {
                    $role = Role::where('name', 'admin_shop')->first();
                    $user->roles()->attach($role);
                }
            }

        }


        // if ($request['role_admin']) {
        //     $user()->roles()->attach(Role::where('name', 'admin')->first());
        // }

        return redirect()->back();
    }

    public function admin_shop()
    {
        return view('admin_shop');
    }



    
}
