<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * @package App
 */
class Role extends Model
{
    /**
     * Relationship with users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
