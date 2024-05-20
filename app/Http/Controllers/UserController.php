<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function AuthCheck(){
        $name = Session::get('email');
        if ($name) {
            return;
        } else {
            return Redirect::to('UserLogin')->send();;
        }
    }

    public function index(){
        $this->AuthCheck();
        try {
            DB::connection()->getPdo();
            return view('config.user.user_info');
        } catch (\Exception $e) {
            return view('errorpage.database_error');
        }
    }

    public function Login(){
        return view('login');
    }

    public function changePasswordsPG(){
        //$this->AuthCheck();
        return view('change_password');
    }

    public function store(Request $request){
        try {
            if ($request['id']==""){
                $data = array();
                $data['password'] = md5($request['password']);
                $data['name'] = $request['name'];
                $data['email'] = $request['email'];
                $data['phone'] = $request['phone'];
                $data['Status'] = $request['Status'];
                $data['UserType'] = $request['UserType'];

                $result = DB::table('users')->insert($data);
                return json_encode(array(
                    "statusCode" => 200,
                    "statusMsg" => "User Added Successfully"
                ));

            }else{

                $data = array();
                $data['password'] = md5($request['password']);
                $data['name'] = $request['name'];
                $data['email'] = $request['email'];
                $data['phone'] = $request['phone'];
                $data['Status'] = $request['Status'];
                $data['UserType'] = $request['UserType'];

                DB::table('users')
                    ->where('id', $request['id'])
                    ->update($data);

                return json_encode(array(
                    "statusCode" => 200,
                    "statusMsg" => "User Update Successfully"
                ));
            }

        } catch (\Exception $e) {

            return json_encode(array(
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ));;
        }
    }

    public function show($id){
        try {
            $singleDataShow = DB::table('users')
                ->where('id', $id)
                ->get();
            return $singleDataShow;
        } catch (\Exception $e) {

            return json_encode(array(
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ));;
        }
    }

    public function destroy($id){
        try {
            $data['Status'] = "Delete";
            DB::table('users')
                    ->where('id', $id)
                    ->update($data);
            return json_encode(array(
                "statusCode" => 200
            ));
        } catch (\Exception $e) {

            return json_encode(array(
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ));;
        }
    }

    public function getAllUserInfo(){

        $UserInfo = DB::select("SELECT id,name,email,phone FROM users;");

        return DataTables::of($UserInfo)
            ->addColumn('action', function ($UserInfo) {
                $buttton = '
                <div class="button-list">
                    <a onclick="showUserInfoData(' . $UserInfo->id . ')" role="button" href="#" class="btn btn-success btn-sm">Edit</a>
                    <a onclick="deleteUserInfoData(' . $UserInfo->id . ')" role="button" href="#" class="btn btn-danger btn-sm">Delete</a>
                </div>
                ';
                return $buttton;
            })
            ->rawColumns(['action'])
            ->toJson();

    }

    public function changePasswords(Request $request){
        try {
            $user_info_id = Session::get('id');

                $old_password = md5($request['inoldpassword']);
                $new_password = md5($request['innewpassword']);

            $invoice_ext_sql = DB::select("SELECT COUNT(id) as UserID  FROM users 
                        WHERE password = '$old_password' and id = '$user_info_id';");
            $user_info_ids = $invoice_ext_sql[0]->UserID;

            if ($user_info_ids == "1") {
                $data = array();
                $data['password'] = $new_password;
                DB::table('users')
                    ->where('id', $user_info_id)
                    ->update($data);
                Session::flush();
                return json_encode(array(
                    "statusCode" => 200,
                    "statusMsg" => "Password Change Successfully !!"
                ));
            } else {
                return json_encode(array(
                    "statusCode" => 205,
                    "statusMsg" => "Old Password Don't Match !!"
                ));
            }
        } catch (\Exception $e) {
            return json_encode(array(
                "statusCode" => 400,
                "statusMsg" => $e->getMessage()
            ));;
        }
    }

    public function userLogin(Request $request){
        try {
            $userName = $request['email'];
            $userPassword = md5($request['password']);
            


            $UserInfo = DB::select("SELECT id,name,email,phone FROM users
                                WHERE email = '$userName'
                                AND password = '$userPassword'
                                ");

            if ($UserInfo) {
                Session::put('id', $UserInfo[0]->id);
                Session::put('name', $UserInfo[0]->name);
                Session::put('email', $UserInfo[0]->email);
                Session::put('phone', $UserInfo[0]->phone);

                return json_encode(array(
                    "statusCode" => 200
                ));

            } else {
                return json_encode(array(
                    "statusCode" => 201,
                    "RealPass" => $request['password'],
                    "EncPass" => "SELECT id,name,email,phone FROM users WHERE email = '$userName' AND password = '$userPassword'",
                ));
            }

        } catch (\Exception $e) {
            DB::rollBack();
            return json_encode(array(
                "statusCode" => 201,
                "statusMsg" => $e->getMessage()
            ));
        }
    }

    public function usersLogOut(){
        Session::flush();
        return Redirect::to('UserLogin');
    }

    public function getDates(){
        $Date = "";
        date_default_timezone_set("Asia/Dhaka");
        return $Date = date("d/m/Y h:m");
    }
}
