<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Signup;
use App\Models\Menu;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        if (session()->has("isLoged")) {
            return redirect('/admin');
        } else {
            $resp['error'] = false;
            $data = compact('resp');
            return view("admin.login")->with($data);
        }
    }

    public function logins(Request $request)
    {
        $request->validate(
            [
                "username" => "required",
                "password" => "required",
            ]
        );
        $username = $request->username;
        $password = $request->password;
        $users = Signup::where('username', '=', $username)->get()->toArray();
        if (count($users) > 0) {
            $test = $users[0];
            if ($test['actnum'] == "0") {
                if ($test['password'] == md5($password)) {
                    $resp['error'] = false;

                    session([
                        'isLoged' => true,
                        'usersl' => $test['sl'],
                        'username' => $test['username'],
                        'name' => $test['name'],
                        'designation' => $test['designation'],
                        'userlevel' => $test['userlevel'],
                        'mobile' => $test['mobile'],
                        'words' => $test['words'],
                    ]);
                } else {
                    $resp['error'] = true;
                    $resp['message'] = "Incorrect password";
                }
            } else {
                $resp['error'] = true;
                $resp['message'] = "Account Deactivated";
            }
        } else {
            $resp['error'] = true;
            $resp['message'] = "Not registered";
        }
        if ($resp['error']) {
            $data = compact('resp');
            return view("admin.login")->with($data);
        } else {
            return redirect("/admin");
        }
    }

    public function dashboard(Request $request){
        $page_title="Dashboard";
        $menus=session()->get("menu");
        $data=compact('page_title','menus');
        return view('admin.index')->with($data);
    }


}
