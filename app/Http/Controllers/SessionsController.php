<?php
/**
 *
 *
 * @author yangdongwei <yangdongwei@wanglv.com>
 *
 * @date 2020/01/08
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $ret = $this->validate($request, [
            'email' => 'required|max:255',
            'password' => 'required'
        ]);

        if (Auth::attempt($ret)) {
            session()->flash('success', '欢迎回来');
            return redirect()->route('users.show', [Auth::user()]);
        } else {
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }

    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出');
        return redirect('login');
    }
}
