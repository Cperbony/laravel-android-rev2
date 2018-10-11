<?php
/**
 * Created by PhpStorm.
 * User: Claus Perbony
 * Date: 11/10/2018
 * Time: 14:57
 */

namespace App\Tenant;

use Illuminate\Database\Eloquent\Model;

trait TenantModels
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new TenantScope());

        static::creating(function (Model $model) {
            if (\Tenant::getTenant()) {
                $userId = \Tenant::getTenant()->id;
                $model->user_id = $userId;
            }
        });
    }
}