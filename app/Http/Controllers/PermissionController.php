<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\Permission\SaveRequest;
use Exception;

class PermissionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function index($id)
    {
        $role=Role::findOrFail(encryptor('decrypt',$id));
        $permission=Permission::where('role_id',encryptor('decrypt',$id))->get();
        return view('permission.index',compact('role','permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save(SaveRequest $request,$role)
    {
        try{
            // delete permission before saved
            Permission::where('role_id',encryptor('decrypt',$role))->delete();
            foreach($request->permission as $permission){
                $data=new Permission;
                $data->role_id=encryptor('decrypt',$role);
                $data->name=$permission;
                $data->save();
            }
            $this->notice::success('Permission saved');
            return redirect()->route('role.index');
        }catch(Exception $e){
            $this->notice::error('Please try again');
            dd($e);
            return redirect()->back()->withInput();
        }
    }
}