<?php

namespace App\Http\Middleware;

use App\Facades\AnchorServiceFacade;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SlugMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $anchor = AnchorServiceFacade::getFollowing($request->slug);
        if ($anchor) {
            AnchorServiceFacade::increaseFollowedTo($anchor);
            return redirect($anchor->url);
        } else {
            throw new NotFoundHttpException();
        }
    }
}
