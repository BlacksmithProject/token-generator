<?php
/**
 * Project: token-generator
 * Created by: ngdo on 01/09/18
 */
declare(strict_types=1);

namespace BSP\TokenGenerator;

use DateInterval;
use DateTimeImmutable;

class Token
{
    private $value;

    private $generatedAt;

    private $expireAt;

    public function __construct(string $value, DateInterval $duration)
    {
        $now = new DateTimeImmutable();
        $expireAt = (new DateTimeImmutable())->add($duration);

        $this->value = $value;
        $this->generatedAt = $now;
        $this->expireAt = $expireAt;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function generatedAt(): DateTimeImmutable
    {
        return $this->generatedAt;
    }

    public function expireAt(): DateTimeImmutable
    {
        return $this->expireAt;
    }
}