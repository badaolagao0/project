<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class AdminPermissionController extends Controller
{
    
    public function createPermissions(){
        return view('admin.permission.add');
    } 

    public function store(Request $request){
        $permission = Permission::create([
            'name' => $request->module_parent,
            'display_name' => $request->module_parent,
            'parent_id' => 0
        ]);

        foreach ($request->module_children as $value){
            Permission::create([
                'name' => $value,
                'display_name' => $value,
                'parent_id' => $permission->id,
                'key_code' => $value . '_' .$request -> module_parent 
            ]);
        }
    }
}