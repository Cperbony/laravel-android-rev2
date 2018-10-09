<?php
/**
 * Created by PhpStorm.
 * User: Claus Perbony
 * Date: 09/10/2018
 * Time: 15:45
 */

namespace App\Tenant;


use Illuminate\Support\Facades\Facade;

class TenantFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return TenantManager::class;
    }

}