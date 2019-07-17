<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Http\Requests\UserRequest;
use DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.add',compact('roles'));
    }
    public function store(UserRequest $request)
    {
        try {
            DB::beginTransaction();
            //lưu vào user
            $data=$request->all();
            $data['password']=bcrypt($request->password);
            $usercreate = User::create($data);
            //lưu vào bảng role_user
            $usercreate->roles()->attach($request->roles);
            DB::commit();
            return redirect()->route('user.index')->with('thongbao','Bạn đã thêm tài khoản admin thành công. Vui lòng thực hiện đúng quyền hạn của mình');
        } catch (\Exception $exception){
            Log::error('Loi:'.$exception->getMessage().$exception->getLine());
            DB::rollback();
        }
    }
    public function edit($id)
    {
        $roles =Role::all();
        $user =User::findOrfail($id);
        $listRoleOfUser =DB::table('role_user')->where('user_id',$id)->pluck('role_id');
        //dd($listRoleOfUser);
        return view('admin.user.edit',compact('roles','user','listRoleOfUser'));
    }
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            //lưu vào update
            $user=User::find($id);
            $user->update($request->all());
            //lưu vào bảng role_user
            DB::table('role_user')->where('user_id',$id)->delete();//xóa hết dữ liêu của role_user theo user đó
            $userupdate =User::find($id);//lấy id của user để dùng cho phương thức trung gian
            $userupdate->roles()->attach($request->roles);
            DB::commit();
            return redirect()->route('user.index')->with('thongbao','Bạn đã sửa thành công. Vui lòng thực hiện đúng quyền hạn của mình');
        } catch (\Exception $exception){
            Log::error('Loi:'.$exception->getMessage().$exception->getLine());
            DB::rollback();
        }
    }
    public function delete($id)
    {
        try {
            DB::beginTransaction();
            //delete user
            $user=User::find($id);
            $user->delete();

            //delete user_id của bảng role_user
            $user->roles()->detach();
            DB::commit();
            return redirect()->route('user.index')->with('thongbao','Bạn đã xóa thành công');
        } catch (\Exception $exception){
            Log::error('Loi:'.$exception->getMessage().$exception->getLine());
            DB::rollback();
        }
    }
}
