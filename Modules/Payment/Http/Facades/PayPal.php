<?php

namespace Modules\Payment\Http\Facades;

/*
 * Class Facade
 * @package Crm\PayPal\Facades
 * @see Crm\PayPal\ExpressCheckout
 */

use Illuminate\Support\Facades\Facade;

class PayPal extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Modules\Payment\Http\Facades\PayPalFacadeAccessor';
    }
}