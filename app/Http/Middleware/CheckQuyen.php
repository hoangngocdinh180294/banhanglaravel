<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use App\Permission;
use App\User;
use App\Role;

class CheckQuyen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
        public function handle($request, Closure $next, $permission =  null)
    {
                            //dd($permission);
        //-------------------lẤY RA TẤT CẢ CÁC QUYỀN KHI USER ĐĂNG NHẬP VÀO HỆ THỐNG------------------------------------
        //B1: Lấy tất cả các role của User đã login vào hệ thống
            //$listRoleOfUser = DB::table('users')
                            //->join('role_user', 'users.id', '=', 'role_user.user_id')
                            //->join('roles', 'role_user.role_id', '=', 'roles.id')
                            //->where('users.id',auth()->id())//Lấy ra người dùng đang login trong hệ thống
                            //->select('roles.*')
                            //->get()->pluck('id')->toArray();    
                            //--CÁCH 2 
                            $listRoleOfUser =User::find(auth()->id())->roles()->select('roles.id')->pluck('id')->toArray();// dùng phương thức trung gian trong Model User  ;                      
                            //dd($listRoleOfUser);
        //B2: Lấy ra tất cả các quyền (permissions) khi user login vào hệ thống
            $listRoleOfUser = DB::table('roles')
                            ->join('permission_role', 'roles.id', '=', 'permission_role.role_id')
                            ->join('permissions', 'permission_role.permission_id', '=', 'permissions.id')
                            ->whereIn('roles.id',$listRoleOfUser)//Lấy ra mảng quyền qua whereIn
                            ->select('permissions.*')
                            ->get()->pluck('id')->unique();//chỉ lấy ra id phương thức pluck
                            //--CÁCH 2 
                            //$listRoleOfUser =Role::find(auth()->id())->permissions()->select('permissions.id')->pluck('id')->unique();
                            //dd($listRoleOfUser);    
        //-----------------------kẾT THÚC lẤY RA TẤT CẢ CÁC QUYỀN KHI USER ĐĂNG NHẬP VÀO HỆ THỐNG---------------------
        
        //------------------------lẤY RA MÃ MÀN HÌNH TƯƠNG ỨNG VỚI TỪNG QUYỀN ĐỂ PHÂN QUYỀN-------------
            $checkPermission = Permission::where('name',$permission)->value('id');//lấy ra mã quyền màn hình theo id
                            //dd($checkPermission);
                           //Kiểm tra xem user có dc phép vào màn hình này ko
                           if($listRoleOfUser->contains($checkPermission)){
                            return $next($request);
                           } 
                           return abort(401);

        //------------------------ KẾT THÚC lẤY RA MÃ MÀN HÌNH TƯƠNG ỨNG VỚI TỪNG QUYỀN ĐỂ PHÂN QUYỀN ------      
    }
}
  
