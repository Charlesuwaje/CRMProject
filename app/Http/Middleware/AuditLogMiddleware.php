<?php

namespace App\Http\Middleware;

use App\Models\AuditLog;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuditLogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // $user = Auth::user();
        // $userId = $user ? $user->id : null;

        AuditLog::create([
            'action' => $request->method(),
            // 'user_id' => $userId,
            'entity' => $request->path(),
            'entity_id' => $request->route('id') ?? null,
            'request_data' => json_encode($request->all()),
            'response_data' => $response->getContent(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
        ]);

        return $response;
    }
}
