<?php

namespace App\Http\Middleware;

use App\Models\Configs;
use Closure;
use Illuminate\Support\Facades\Config;

class AutoConfig
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
        $cc = Configs::first();

        if ($cc) {
            list($cols, $values) = array_divide($cc->toArray());
            foreach ($cols as $index => $col) {
                Config::set('config.' . $col, $values[$index]);
            }
        }

        return $next($request);
    }
}
