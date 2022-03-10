<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Validator;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function apiNewAccount(Request $request){
        $request->merge(['password' => Hash::make($request->password)]);
        $data = $request->only('username','name', 'nip', 'position_id', 'division_id', 'password');
        $validation = Validator::make($data, Account::RULE, Account::RULE_MESSAGE);
        if($validation->fails()){
            return $this->response->invalidation($validation->errors()->first());
        }
        
        $newData = Account::create($data);
        return $this->response->success("Berhasil menambahkan akun baru", $newData);
    }

    public function apiLogin(Request $request){
        $account = Account::where('username', $request->username)->first();
        if ($account) {
            //Check Password
            if(Hash::check($request->password, $account->password)){
                return $this->response->success("Berhasil masuk" ,$account);    
            }else{
                return $this->response->error("Kata Sandi tidak sesuai");
            }   
        }
        return $this->response->error("Akun tidak ditemukan");
    }
    
}
