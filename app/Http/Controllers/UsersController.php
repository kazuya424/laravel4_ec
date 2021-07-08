<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\ExhibitorStoreRequest;
use App\Http\Requests\ApplyExhibitorRequest;
use App\Mail\ApplicantMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        //ログインしているアカウント出ない場合検索画面にリダイレクト
        if ($user->id != Auth::id()) {
            return redirect()->route('product.index')->with('message', '不適切なURLです');
        }
        return view('users.show', ['user'=> $user]);
    }

    public function getEdit($id)
    {
        $user = User::findOrFail($id);
        if ($user->id != Auth::id()) {
            return redirect()->route('product.index')->with('message', '不適切なURLです');
        }
        return view('users.edit', ['user'=>$user]);
    }

    public function postEdit(UserRequest $request, $id)
    {

        $user = User::find($request->id);

        if ($user->id != Auth::id()) {
            return redirect()->route('product.index')->with('message', '不適切なURLです');
        }
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->zipcode = $request->zipcode;
        $user->prefecture = $request->prefecture;
        $user->municipality = $request->municipality;
        $user->address = $request->address;
        $user->apartments = $request->apartments;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->save();

        return redirect()->route('user.show', $user->id);
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return view('top');
    }

    /**
     * 出品者登録申請画面
     */
    public function signupApplicant()
    {
        return view('users.applicant');
    }

    /**
     * 出品者登録申請処理
     */
    public function applyExhibitor(ApplyExhibitorRequest $request)
    {
        while (true) {
            $auth_code = Str::random(16);
            if (!Applicant::where('auth_code', $auth_code)->exists()) {
                break;
            }
        }

        Applicant::create([
            'auth_code' => $auth_code,
            'email' => $request->email,
        ]);

        $url = url('exhibitor/signup')."/".$auth_code;

        Mail::to($request->email)
            ->send(new ApplicantMail($url));

        return redirect('/')->with('message', 'メールを送信しましたので、ご確認ください。');
    }

    /**
     * 出品者登録画面
     */
    public function signupExhibitor($auth_code)
    {
        if (!Applicant::where('auth_code', $auth_code)->exists()) {
            return redirect('/')->with('error', 'このURLは利用できません。');
        }

        return view('users.exhibitor_signup', ['auth_code'=>$auth_code]);
    }

    /**
     * 出品者登録処理
     */
    public function postExhibitor(ExhibitorStoreRequest $request)
    {
        User::create([
            'company_name'=>$request['company_name'],
            'last_name'=>$request['last_name'],
            'first_name'=>$request['first_name'],
            'zipcode'=>$request['zipcode'],
            'prefecture'=>$request['prefecture'],
            'municipality'=>$request['municipality'],
            'address'=>$request['address'],
            'apartments'=>$request['apartments'],
            'email' => $request['email'],
            'phone_number'=>$request['phone_number'],
            'password' => Hash::make($request['password']),
            'user_classification_id'=>config('consts.common.USER_CLASSIFICATIONS.exhibitor.value'),
        ]);

        Applicant::where('auth_code', $request['auth_code'])->delete();

        return redirect()->route('auth.login');
    }
}
