<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Method to destroy the session and logout the user
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function Profile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        if($id == null || $id == "")
        {
            return redirect('/login');
        }
        return view('admin.admin_profile_view', compact('adminData'));
    }
    public function EditProfile()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        if($id == null || $id == "")
        {
            return redirect('/login');
        }
        return view('admin.admin_profile_edit', compact('editData'));
    }
}
