<?php
/**
 * Project: token-generator
 * Created by: ngdo on 14/09/18
 */
declare(strict_types=1);

namespace BSP\TokenGenerator;

interface TokenInterface
{
    public function value(): string;

    public function generatedAt(): \DateTimeImmutable;

    public function expireAt(): \DateTimeImmutable;
}