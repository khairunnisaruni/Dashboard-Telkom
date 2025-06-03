<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class RedirectHelper
{
    public static function to(string $baseRoute)
    {
        $user = Auth::user();
        $routeName = $user && $user->is_admin
            ? $baseRoute
            : $baseRoute . '-user';

        return redirect()->route($routeName);
    }
}
