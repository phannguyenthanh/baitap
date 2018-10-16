<?php

namespace App\Http\Controllers;
use App\District;

use App\Wards;
use App\Menu;

use Illuminate\Http\Request;
use App\Account;

// use App\Http\Requests;

class AccountController extends Controller
{
    public function getlist(){

        $account = Account::orderBy('id','DESC')->paginate(10);

        return view('Account.list',['account'=>$account]);
    }
    public function postseach(Request $req){

        
        session_start();
        $_SESSION['seach'] = $req->seach;

        // $se = $_SESSION['seach'];

        // $account = Account::where('name','like',"%$se%")->orderbydesc('id')->paginate(9);

        return redirect('Admin/Account/getseach');
        // return redirect('Admin/Account/getseach')->with('seach', $req->seach);

    }
    public function getseach(){

        session_start();

        // $_SESSION['seach'] = session('seach');

        $se = $_SESSION['seach'] ;

        $account = Account::where('name','like',"%$se%")->orderbydesc('id')->paginate(9);

        return view('Account.list',['account'=>$account,'seach'=>$se]);

    }

    public function getadd(){

        $district = District::orderBy('id','DESC')->get();

        $wards = Wards::orderBy('id','DESC')->get();

        return view('Account.add',['district'=>$district,'wards'=>$wards]);
    }
    public function postadd(Request $req){

        $this->validate($req,[
            'name'=>'required|min:6',
            'birthday'=> 'required',
            'addr'=> 'required',
            'wards_id'=>'required',
            'district_id'=>'required'
        ],[
            'name.required'=>'bạn chưa nhập tên',
            'birthday.required'=>'bạn chưa nhập ngày sinh',
            'addr.required'=>'bạn chưa nhập địa chỉ',
            'wards_id.required'=>'bạn chưa nhập xã/huyện',
            'district_id.required'=>'bạn chưa nhập tỉnh',
            'name.min'=>'tên quá ngắn',

        ]);

        $account = new Account;

        $account->name = $req->name;
        
        $account->birthday = $req->birthday;

        $account->addr = $req->addr;

        $account->wards_id = $req->wards_id;

        $account->district_id = $req->district_id;

        $account->save();
        
        return redirect('Admin/Account/add')->with('alert','thêm thành công');


       }
       public function getedit($id){

            $account = Account::find($id);

            $district = District::orderBy('id','DESC')->get();

            $wards = Wards::orderBy('id','DESC')->get();

            return view('Account.edit',['account'=>$account,'wards' =>$wards ,'district'=>$district]);

       }
       public function postedit(Request $req , $id){

        $this->validate($req,[
            'name'=>'required|min:6',
            'birthday'=> 'required',
            'addr'=> 'required',
            'wards_id'=>'required',
            'district_id'=>'required'
        ],[
            'name.required'=>'bạn chưa nhập tên',
            'birthday.required'=>'bạn chưa nhập ngày sinh',
            'addr.required'=>'bạn chưa nhập địa chỉ',
            'wards_id.required'=>'bạn chưa nhập xã/huyện',
            'district_id.required'=>'bạn chưa nhập tỉnh',
            'name.min'=>'tên quá ngắn',

        ]);

        $account = Account::find($id);

        $account->name = $req->name;
        
        $account->birthday = $req->birthday;

        $account->addr = $req->addr;

        $account->wards_id = $req->wards_id;

        $account->district_id = $req->district_id;

        $account->save();
        
        return redirect('Admin/Account/edit/'.$id)->with('alert','Sửa thành công');


       }
       public function getremove($id){

        $account = Account::find($id);

        $account->delete();
        
        return redirect('Admin/Account/list');

       }
}