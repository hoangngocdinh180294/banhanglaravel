<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use App\Role;
use DB;
use Illuminate\Support\Facades\Log;


class RoleController extends Controller
{
    public function index()
    {
        $roles=Role::all();
        return view('admin.role.index',compact('roles'));
    }
    public function create()
    {
        $permission = Permission::all();
        return view('admin.role.add',compact('permission'));
    }
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'name'=>'required',
            'display_name'=>'required',
        ],
        [
            'name.required'=>'Bạn vui lòng nhập tên',
            'display_name.required'=>'Bạn vui lòng nhập tên đầy đủ',
        ]);
        try {
            DB::beginTransaction();
            $createrole = Role::create([
                'name' => $request->name,
                'display_name' => $request->display_name,
            ]);
            $createrole->permissions()->attach($request->permission);
            DB::commit();
            return redirect()->route('role.index')->with('thongbao','Bạn đã thêm nhóm quyền thành công');
        } catch (\Throwable $th) {
            Log::error('Loi:'.$th->getMessage().$th->getLine());
            DB::rollback();
        }
    }
    public function edit($id)
    {
        $roles=Role::findOrfail($id);
        $permission =Permission::all();
        $listPermissionOfRole=DB::table('permission_role')->where('role_id',$id)->pluck('permission_id');
        return view('admin.role.edit',compact('roles','permission','listPermissionOfRole'));
    }
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            //lưu vào bảng role
            Role::where('id',$id)->update([
                'name'=>$request->name,
                'display_name'=>$request->display_name,
            ]);
            //lưu vào bảng permissions
            //1.xóa hết dữ liêu bảng permission_role theo id
            DB::table('permission_role')->where('role_id',$id)->delete();
            $roleupdate =Role::find($id);        
            $roleupdate->permissions()->attach($request->permission);
            DB::commit();
            return redirect()->route('role.index')->with('thongbao','Bạn đã sửa nhóm quyền thành công');
        } catch (\Throwable $th) {
            Log::error('Loi:'.$th->getMessage().$th->getLine());
            DB::rollback();
        }
    }
    public function delete($id)
    {
        try {
            DB::beginTransaction();
            //xóa bảng role
            $roles = Role::find($id);
            $roles->delete();
            $roles->permissions()->detach();
            DB::commit();
            return redirect()->route('role.index')->with('thongbao','Bạn đã xóa thành công');
        } catch (\Throwable $th) {
            Log::error('Loi:'.$th->getMessage().$th->getLine());
            DB::rollback();
        }
    }

}
