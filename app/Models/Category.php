<?php

namespace App\Models;

use App\Tenant\TenantScope;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new TenantScope());
    }
}
