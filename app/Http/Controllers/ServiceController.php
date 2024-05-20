<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Yajra\DataTables\DataTables;

class ServiceController extends Controller
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
            return view('config.service.service_info');
        } catch (\Exception $e) {
            return view('errorpage.database_error');
        }
    }

    public function store(Request $request){
        try {
            if ($request['service_id']==""){
                $data = array();
                $data['service_name'] = $request['service_name'];
                $data['service_unit'] = $request['service_unit'];
                $data['service_day_cost'] = $request['service_day_cost'];
                $data['service_rate'] = $request['service_rate'];
                $data['status'] = $request['status'];
                $data['create_info'] = $this->getDates().'|'.Session::get('user_info_id');
                $data['update_info'] = "A";

                $result = DB::table('service_info')->insert($data);
                return json_encode(array(
                    "statusCode" => 200,
                    "statusMsg" => "Service Added Successfully"
                ));

            }else{

                $data = array();
                $data['service_name'] = $request['service_name'];
                $data['service_unit'] = $request['service_unit'];
                $data['service_day_cost'] = $request['service_day_cost'];
                $data['service_rate'] = $request['service_rate'];
                $data['status'] = $request['status'];
                $data['update_info'] = $this->getDates().'|'.Session::get('user_info_id');

                DB::table('service_info')
                    ->where('service_id', $request['service_id'])
                    ->update($data);

                return json_encode(array(
                    "statusCode" => 200,
                    "statusMsg" => "Service Update Successfully"
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
            $singleDataShow = DB::table('service_info')
                ->where('service_id', $id)
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
            $data['status'] = "Delete";
            $data['update_info'] = $this->getDates().'|'.Session::get('user_info_id');
            DB::table('service_info')
                    ->where('service_id', $id)
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

    public function getAllService(){

        $producttype = DB::select('select service_id,service_name,service_unit,service_day_cost,service_rate,status,create_info,update_info from service_info where status!="Delete"');

        return DataTables::of($producttype)
            ->addColumn('action', function ($producttype) {
                $buttton = '
                <div class="button-list">
                    <a onclick="showproduct_type_idData(' . $producttype->service_id . ')" role="button" href="#" class="btn btn-success btn-sm">Edit</a>
                    <a onclick="deleteproduct_type_idData(' . $producttype->service_id . ')" role="button" href="#" class="btn btn-danger btn-sm">Delete</a>
                </div>
                ';
                return $buttton;
            })
            ->rawColumns(['action'])
            ->toJson();

    }

    public function getDates(){
        $Date = "";
        date_default_timezone_set("Asia/Dhaka");
        return $Date = date("d/m/Y-h:i:sa");
    }
}
