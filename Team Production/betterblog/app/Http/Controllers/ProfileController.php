<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Blog;
use App\Like;

class ProfileController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function showProfile($id) {
        $user = User::find($id);

        $blogCount = Blog::where('author_id', '=', $id)->count();

        $likes = Like::where('user_id', '=', $id)->count();

        //dd($likes);

        return view('pages.profile', compact('user', 'blogCount', 'likes'));
    }

    public function showBlogs($id) {
        $blogs = Blog::where('author_id', '=', $id)->orderBy('created_at', 'desc')->paginate(10);
        $user = User::find($id);
        Session::flash('author-name', $user->name);
        return view('pages.user-blogs', compact('blogs'));
    }

    public function editInfo() {
        $user = User::find(Auth::user()->id);

        return view('pages.edit-account', compact('user'));
    }

    public function updateInfo(Request $request, $id) {
        $user = User::find($id);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();

        return redirect()->route('show-profile', [$user])->with('info-updated', 'Your information has been successfully updated!');
    }
}
