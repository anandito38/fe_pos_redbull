<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Pastikan hanya halaman dashboard yang akan di-handle oleh middleware ini
        if ($request->path() === 'dashboard') {
            // Cek apakah token ada dalam session
            if ($request->session()->has('sanctum_token')) {
                $user = Auth::user();

                // Ambil token pengguna dari database
                $existingToken = DB::table('personal_access_tokens')
                    ->where('tokenable_type', 'App\Models\User')
                    ->where('tokenable_id', $user->id)
                    ->value('token');

                // Periksa apakah token dalam session cocok dengan token di database
                if ($request->session()->get('sanctum_token') === $existingToken) {
                    // Jika cocok, izinkan pengguna melanjutkan ke dashboard
                    return $next($request);
                }
            }

            // Jika token tidak ada dalam session atau tidak cocok, arahkan kembali ke halaman login
            return redirect('/login');
        }

        // Lanjutkan ke middleware berikutnya jika bukan halaman dashboard
        return $next($request);
    }
}
