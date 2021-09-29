<?php

namespace Modules\Payment\Http\Facades;
use Exception;
use Modules\Payment\Services\PayPal as PayPalClient;
class PayPalFacadeAccessor
{
    /**
     * PayPal API provider object.
     *
     * @var
     */
    public static $provider;

    /**
     * Get specific PayPal API provider object to use.
     *
     * @throws Exception
     *
     * @return \Crm\PayPal\Services\PayPal
     */
    public static function getProvider()
    {
        return self::$provider;
    }

    /**
     * Set PayPal API Client to use.
     *
     * @throws \Exception
     *
     * @return \Crm\PayPal\Services\PayPal
     */
    public static function setProvider()
    {
        // Set default provider. Defaults to ExpressCheckout
        self::$provider = new PayPalClient();

        return self::getProvider();
    }
}