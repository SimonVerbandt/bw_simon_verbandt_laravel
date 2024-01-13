<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    public function showAdminUsers()
    {
        return view('admin.users');
    }
    public function create(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'isAdmin' => 'required|boolean',
        ]);
        if (!$validated['name'] || !$validated['isAdmin']) {
            return redirect()->route('admin.users')->withErrors(['error' => 'Name and admin status are required']);
        } else {
            $user = new User();
            $user->name = $validated['name'];
            $user->isAdmin = $validated['isAdmin'];
            $admin = new Admin();
            $admin->user_id = $user->id;
            $admin->name = $validated['name'];
            $admin->save();
            return redirect()->route('admin.users');
        }

    }
    public function edit(Request $request, int $id): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'isAdmin' => 'required|boolean',
        ]);
        if (!$validated['name'] || !$validated['isAdmin']) {
            return redirect()->route('admin.users')->withErrors(['error' => 'Name and admin status are required']);
        } else {
            $user = User::find($id);
            if($user->isAdmin == true){
                $admin = Admin::where('user_id', $id)->first();
                $admin->delete();
            }
            $user->name = $validated['name'];
            $user->isAdmin = $validated['isAdmin'];
            $user->save();
            $admin = new Admin();
            $admin->user_id = $user->id;
            $admin->save();
            return redirect()->route('admin.users');
        }
    }
    public function destroy()
    {
        return view('admin.users');
    }
}
