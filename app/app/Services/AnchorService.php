<?php

namespace App\Services;

use App\Models\Anchor;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AnchorService
{
    /**
     * @param array $data
     * @return Anchor
     * @throws \Throwable
     */
    public function create(array $data ): Anchor {
        $model = new Anchor;
        $model->fill($data);
        $model->slug = Str::random(8);
        $model->saveOrFail();
        return $model;
    }

    /**
     * @param string $slug
     * @return Anchor|null
     */
    public function getFollowing(string $slug): Anchor|null {
        $anchor = null;
        DB::beginTransaction();
        try {
            $anchor = Anchor::lockForUpdate()->slug($slug)->firstOrFail();
            if($this->isExpired($anchor) || $this->isOutOfFollows($anchor)){
                $anchor = null;
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
//            throw $e;
        }
        return $anchor;
    }

    /**
     * @param Anchor $anchor
     * @return bool
     */
    public function isExpired(Anchor $anchor): bool {
        return Carbon::now()->gt($anchor->ttl_date);
    }

    /**
     * @param Anchor $anchor
     * @return bool
     */
    public function isOutOfFollows(Anchor $anchor): bool {
        if(
            $anchor->max_follows !== 0 &&
            ($anchor->max_follows - $anchor->followed) <= 0
        ) {
            return true;
        }
        return false;
    }

    /**
     * @param Anchor $anchor
     * @return void
     */
    public function increaseFollowedTo(Anchor $anchor): void {
        DB::transaction(function () use ($anchor) {
            $anchor->lockForUpdate()->update([
                'followed' => ++ $anchor->followed
            ]);
        });
    }
}
