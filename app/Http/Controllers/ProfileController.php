<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        if($user->id == Auth::user()->id) {
            $posts = $user->posts()->get();
            $url = route('profile', ['user'=>$user->id]);
            $url = basename(dirname($url));
            return view($url, ["posts"=>$posts]);
        } else {
            $url = basename(route('posts'));
            return redirect($url);
        }
    }
}
