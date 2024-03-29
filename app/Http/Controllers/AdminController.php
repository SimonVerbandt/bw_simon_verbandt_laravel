<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function showAdminUsers()
    {
        return view('admin.users.index', [
            'users' => User::all(),
        ]);
    }

    public function validateUser(Request $request): array
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
            'isAdmin' => 'required|boolean',
        ]);
    }

    public function create(): View
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateUser($request);
        if($request->hasFile('avatar')){
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $avatarUrl = Storage::url($avatarPath);
        } else {
            $avatarUrl = null;
        }
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'birthday' => $request->input('birthday'),
            'avatar' => $avatarUrl,
            'isAdmin' => $validated['isAdmin'],
            'about_me' => $request->input('about_me'),
        ]);
        $user->save();
        if ($validated['isAdmin'] == true) {
            $admin = new Admin();
            $admin->user_id = $user->id;
            $admin->save();
        }
        return redirect()->route('admin.users')->with('success', 'User created successfully');
    }

    public function update(string $name): RedirectResponse
    {
        $user = User::where('name', $name)->firstOrFail();
        $user->isAdmin != $user->isAdmin;
        $user->isAdmin = true;
        $user->save();
        $admin = Admin::create([
            'name' => $name,
            'user_id' => $user->id,
        ]);
        $admin->save();

        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    }


    public function destroy($name): RedirectResponse
    {
        $user = User::where('name', $name)->firstOrFail();
        if ($user->isAdmin == true) {
            $admin = Admin::where('user_id', $user->id)->firstOrFail();
            $admin->delete();
        }
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully');
    }
}
