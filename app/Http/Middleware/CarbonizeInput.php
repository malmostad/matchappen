<?php

namespace Matchappen\Http\Middleware;

use Carbon\Carbon;
use Closure;

/*
 * Parses input data in the request through Carbon datetime.
 * Define fields with : and comma-separated list of fieldnames (dot-notated).
 *
 * Example for route definition:
 * 'middleware' => 'input.carbonize:birthday,date.start,date.end'
 *
 * Example for controller:
 * $this->middleware('input.carbonize:birthday,date.start,date.end');
 *
 */

class CarbonizeInput
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param string ,... $date_field
     * @return mixed
     */
    public function handle($request, Closure $next, $date_field)
    {
        $input = $request->input();
        foreach (array_slice(func_get_args(), 2) as $date_field) {
            if (array_has($input, $date_field)) {
                $carbon = Carbon::parse(array_get($input, $date_field));
                array_set($input, $date_field, $carbon->toDateTimeString());
            }
        }
        $request->replace($input);

        return $next($request);
    }
}
