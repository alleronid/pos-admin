<?php

namespace App\Repositories;

use Abedin\Maker\Repositories\Repository;
use App\Models\RecoveryPasswordCode;
use App\Models\User;
use Illuminate\Support\Str;

class VerificationRepository extends Repository
{
    public static function model()
    {
        return RecoveryPasswordCode::class;
    }

    public static function storeByRequest(User $user): RecoveryPasswordCode
    {
        return self::create([
            'user_id' => $user->id,
            'email' => $user->email,
            'code' => random_int(100000, 999999),
            'token' => Str::random(64),
        ]);
    }

    public static function updateByRequest(RecoveryPasswordCode $recoveryPasswordCode): RecoveryPasswordCode
    {
        $token = Str::random(64);
        self::update($recoveryPasswordCode, [
            'token' => $token
        ]);

        return $recoveryPasswordCode;
    }
}
