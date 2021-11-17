<?php

namespace Sample;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

ini_set('error_reporting', E_ALL); // or error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

class PayPalClient
{
    /**
     * Returns PayPal HTTP client instance with environment that has access
     * credentials context. Use this instance to invoke PayPal APIs, provided the
     * credentials have access.
     */
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }

    /**
     * Set up and return PayPal PHP SDK environment with PayPal access credentials.
     * This sample uses SandboxEnvironment. In production, use LiveEnvironment.
     */
    public static function environment()
    {
        $clientId = getenv("CLIENT_ID") ?: "ATOHqVN9-apaKqqkzHMhoKZ0ZtEcSbQ6Ma_U5RYjILzOBuBV3YSOn-Inv6de6wzSMklyr2Kkrn647x-q";
        $clientSecret = getenv("CLIENT_SECRET") ?: "EIv3sS0PpSpRuGMyB6pWXHnHJBCjEYMChRHg1LxDaW6tYY2nX4KxDkchMDu_IosWyjRGze8-6zrgsiqu";
        return new SandboxEnvironment($clientId, $clientSecret);
    }
}


