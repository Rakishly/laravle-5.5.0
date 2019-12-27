<?php
/**
 *
 *
 * @author yangdongwei <yangdongwei@wanglv.com>
 *
 * @date 2019/12/26
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UsersController extends Controller
{

    public function show(User $user)
    {
        dump($user);exit;
        return view('users.show', compact('user'));
    }
}