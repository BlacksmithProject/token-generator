<?php
/**
 * Project: token-generator
 * Created by: ngdo on 01/09/18
 */
declare(strict_types=1);

namespace BSP\TokenGenerator;

use DateInterval;
use Ramsey\Uuid\Uuid;

class TokenGenerator
{
    private const RANDOM_BYTES_LENGTH = 12;
    private const DURATION = 15;

    public static function generate(DateInterval $duration = null, int $length = null): Token
    {
        if (empty($length) || $length > 105) {
            $length = self::RANDOM_BYTES_LENGTH;
        }

        $duration = !empty($duration) ? $duration : new DateInterval(sprintf('P%1$sD', self::DURATION));

        $random = random_bytes($length);

        $token = base64_encode(sprintf('%1$s%2$s', $random, Uuid::uuid4()->toString()));

        return new Token($token, $duration);
    }
}
