<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class UserIsAdmin
{

    public function isAdmin(User $user): bool
    {
        return $user->isAdmin;
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
            return Redirect::route('login');
        }

        $admin = $this->isAdmin($user);
        if (!$admin) {
            return Redirect::route('dashboard');
        }
        return $next($request);
    }
}
