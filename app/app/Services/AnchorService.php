<?php

namespace App\Services;

use App\Models\Anchor;
use Illuminate\Support\Str;

class AnchorService
{
    public function create(array $data ): Anchor {
        $model = new Anchor;
        $model->fill($data);
        $model->link = Str::random(8);
        $model->saveOrFail();
        return $model;
    }
}
