<?php
namespace App\Lib;

use PragmaRX\Google2FA\Google2FA;

class Google2FAuth
{
    protected $google2fa;

    public function __construct()
    {
        $this->google2fa = new Google2FA();
    }

    public function generateSecretKey()
    {
        return $this->google2fa->generateSecretKey();
    }

    public function enableTwoFactorAuth($user)
    {
        $secretKey = $this->generateSecretKey();
        $user->google2fa_secret = $secretKey;
        $user->save();

        return $secretKey;
    }

    public function verifyTwoFactorAuth($user, $code)
    {
        return $this->google2fa->verifyKey($user->google2fa_secret, $code);
    }
}
