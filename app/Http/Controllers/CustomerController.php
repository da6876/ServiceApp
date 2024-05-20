<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
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
            return view('config.customer.customer_info');
        } catch (\Exception $e) {

            return view('errorpage.database_error');
        }
    }

    public function store(Request $request){
        try {
            if ($request['Customer_Id']==""){
                $data = array();
                $data['Customer_Name'] = $request['Customer_Name'];
                $data['Customer_Type'] = $request['Customer_Type'];
                $data['Address'] = $request['Address'];
                $data['License_No'] = $request['License_No'];
                $data['Business_Attn'] = $request['Business_Attn'];
                $data['Business_Number'] = $request['Business_Number'];
                $data['Business_Address'] = $request['Business_Address'];
                $data['Business_Email'] = $request['Business_Email'];
                $data['Billing_Address'] = $request['Billing_Address'];
                $data['Financial_Attn'] = $request['Financial_Attn'];
                $data['Financial_Number'] = $request['Financial_Number'];
                $data['Financial_Email'] = $request['Financial_Email'];
                $data['VAT_REG_No'] = $request['VAT_REG_No'];
                $data['Account_Manager_Name'] = $request['Account_Manager_Name'];
                $data['Account_Manager_Number'] = $request['Account_Manager_Number'];
                $data['Account_Manager_Email'] = $request['Account_Manager_Email'];
                $data['Status'] = 'Active';
                $data['Create_By'] = Session::get('user_info_id');
                $data['Create_Date'] = $this->getDates();

                $result = DB::table('customerinfo')->insert($data);
                return json_encode(array(
                    "statusCode" => 200,
                    "statusMsg" => "Customer Added Successfully"
                ));

            }else{

                $data = array();
                $data['Customer_Name'] = $request['Customer_Name'];
                $data['Customer_Type'] = $request['Customer_Type'];
                $data['Address'] = $request['Address'];
                $data['License_No'] = $request['License_No'];
                $data['Business_Attn'] = $request['Business_Attn'];
                $data['Business_Number'] = $request['Business_Number'];
                $data['Business_Address'] = $request['Business_Address'];
                $data['Business_Email'] = $request['Business_Email'];
                $data['Billing_Address'] = $request['Billing_Address'];
                $data['Financial_Attn'] = $request['Financial_Attn'];
                $data['Financial_Number'] = $request['Financial_Number'];
                $data['Financial_Email'] = $request['Financial_Email'];
                $data['VAT_REG_No'] = $request['VAT_REG_No'];
                $data['Account_Manager_Name'] = $request['Account_Manager_Name'];
                $data['Account_Manager_Number'] = $request['Account_Manager_Number'];
                $data['Account_Manager_Email'] = $request['Account_Manager_Email'];
                $data['Status'] = 'Active';
                $data['Update_By'] = Session::get('user_info_id');
                $data['Update_Date'] = $this->getDates();

                DB::table('customerinfo')
                    ->where('Customer_Id', $request['Customer_Id'])
                    ->update($data);

                return json_encode(array(
                    "statusCode" => 200,
                    "statusMsg" => "Customer Update Successfully"
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
            $singleDataShow = DB::table('customerinfo')
                ->where('Customer_Id', $id)
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
            DB::table('customerinfo')
                ->where('Customer_Id', $id)
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


    public function getAllcustomer_info()
    {
        $customer_info = DB::select('select Customer_Id,Customer_Name,Customer_Type,Address,License_No,
        Business_Attn,Business_Number,Business_Address,Business_Email,Billing_Address,Financial_Attn,
        Financial_Number,Financial_Email,VAT_REG_No,Account_Manager_Name,Account_Manager_Number,Account_Manager_Email,
        Status,Create_By,Create_Date,Update_By,Update_Date 
        from customerinfo
        where Status!="Delete"');

        return DataTables::of($customer_info)
            ->addColumn('action', function ($customer_info) {
                $buttton = '
                <div class="button-list">
                    <a onclick="showcustomer_infoData(' . $customer_info->Customer_Id  . ')" role="button" href="#" class="btn btn-success btn-sm">Edit</a>
                    <a onclick="deletecustomer_infoData(' . $customer_info->Customer_Id  . ')" role="button" href="#" class="btn btn-danger btn-sm">Delete</a>
                </div>
                ';
                return $buttton;
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    public function CustomerInfoFetch(Request $request){


        try {
            if ($request->get('query')) {
                $query = $request->get('query');
                $data = DB::table('customer_info')
                    ->where('customer_phone', 'LIKE', "%{$query}%")
                    ->get();
                $output = '<ul id="myid" class="list-group" style="display:block; position:relative">';

                foreach ($data as $row) {
                    $output .= '<li class="list-group-item list-group-item-action list-group-item-light" onclick="setData(' ."' $row->customer_info_id'". ','."' $row->customer_name'".','."' $row->customer_phone'".','."' $row->customer_address'".')" id=' . $row->customer_info_id . '><a href="#">' . $row->customer_name . '</a></li>';
                }
                $output .= '<li class="list-group-item list-group-item-action list-group-item-success" onclick="showModal()"><a href="#">Add Customer</a></li>';
                $output .= '</ul>';
                echo $output;
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return ["o_status_message" => $e->getMessage()];
        }

    }

    public function getDates(){
        $Date = "";
        date_default_timezone_set("Asia/Dhaka");
        return $Date = date("d/m/Y-h:i:sa");
    }
}
