<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserIsAdmin
{

    public function isAdmin(User $user): bool
    {
        $isAdmin = DB::table('users')->where('id', $user->id)->value('isAdmin', true);
        return $isAdmin;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        $admin = $this->isAdmin($user);
        if (!$admin) {
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
