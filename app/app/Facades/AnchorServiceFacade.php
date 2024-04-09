<?php

namespace App\Facades;

use App\Services\AnchorService;
use Illuminate\Support\Facades\Facade;

/**
 * AnchorServiceFacade
 *
 * Facade for handling anchor entities, including creation, retrieval based on slug,
 * and follow count management.
 *
 * @see \App\Services\AnchorService
 *
 * @method static \App\Models\Anchor create(array $data) Creates a new Anchor entity with the provided data, generates a unique slug, and persists it to the database.
 * @method static \App\Models\Anchor|null getFollowing(string $slug) Retrieves an anchor based on its slug if it hasn't expired or exceeded its maximum follow count. Locks the anchor row for update to ensure consistency.
 * @method static bool isExpired(\App\Models\Anchor $anchor) Determines whether the given anchor has passed its TTL.
 * @method static bool isOutOfFollows(\App\Models\Anchor $anchor) Checks if the anchor has been followed the maximum number of times.
 * @method static void increaseFollowedTo(\App\Models\Anchor $anchor) Increments the follow count for the given anchor within a transaction.
 *
 * @throws \Throwable Throws an exception if the create operation fails.
 */
class AnchorServiceFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return AnchorService::class;
    }
}
