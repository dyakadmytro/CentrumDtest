<?php

namespace App\Facades;

use App\Services\AnchorService;
use Illuminate\Support\Facades\Facade;

class AnchorServiceFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return AnchorService::class;
    }
}
