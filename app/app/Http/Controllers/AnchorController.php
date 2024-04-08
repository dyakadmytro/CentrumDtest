<?php

namespace App\Http\Controllers;

use App\Facades\AnchorServiceFacade;
use App\Http\Requests\AnchorCreateRequest;
use Illuminate\Http\Request;

class AnchorController extends Controller
{
    public function store(AnchorCreateRequest $request) {
        AnchorServiceFacade::create($request->only([
            'title', 'url', 'ttl', 'max_follows'
        ]));
        return redirect(route('anchor.list'));
    }
}
