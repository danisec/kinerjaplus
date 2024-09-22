<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$permissions)
    {
        $user = Auth::user();

        // Cek apakah pengguna memiliki direct permissions di tabel model_has_permissions
        $directPermissionsExist = $user->getDirectPermissions()->isNotEmpty();

        // Jika pengguna memiliki direct permissions, periksa apakah dia memiliki salah satu dari permissions yang diberikan
        if ($directPermissionsExist) {
            $hasDirectPermission = $user->hasAnyDirectPermission($permissions);
            
            if (!$hasDirectPermission) {
                // Jika tidak memiliki direct permission yang diperlukan, return 403
                abort(403, 'Unauthorized action.');
            }
        } else {
            // Jika tidak ada direct permissions, periksa melalui role permissions
            $hasRolePermission = $user->hasAnyPermission($permissions);
            
            if (!$hasRolePermission) {
                // Jika tidak memiliki permissions baik secara langsung maupun melalui role, return 403
                abort(403, 'Unauthorized action.');
            }
        }

        return $next($request);
    }
}
