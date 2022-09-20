<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class LangMiddleware
{
    public function handle($request, Closure $next)
    {
        $url_array = explode('.', parse_url($request->url(), PHP_URL_HOST));
        $subdomain = $url_array[0];

        $languages = ['en', 'vi'];

        if (in_array($subdomain, $languages)) {
            App::setLocale($subdomain);
        }

        return $next($request);
    }
}