<?php
namespace BRM\Tenants\app\Middleware;

use Closure;
use Illuminate\Http\Response;

class Provisioning
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($tenant = app(\Hyn\Tenancy\Environment::class)->hostname()) {
            if ($tenant->status ==='provisioning') {
                session_start();
                // Tenant account Provisioning
                if ($request->post('password')) {
                    $password = @implode('', $request->post('password'));
                    if ($password === $tenant->passcode) {
                        $_SESSION["authorised"] = true;
                        $request->setMethod('get');
                    }
                }
                if ($request->get('logoff')) {
                    session_unset();
                    session_destroy();
                }
                if (!isset($_SESSION["authorised"])) {
                    return new Response(view('tenants::gated.gated'), 401);
                }
            } elseif ($tenant->status ==='suspended') {
                // Tenant account suspended
                return new Response(view('tenants::suspended.suspended'), 402);
            }
        } else {
            // Domain parked with no active tenant
            return new Response(view('tenants::parked.parked'), 200);
        }
        return $next($request);
    }
}
