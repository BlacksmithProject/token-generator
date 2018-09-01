<?php
/**
 * Project: token-generator
 * Created by: ngdo on 01/09/18
 */
declare(strict_types=1);

namespace BSP\TokenGenerator\Tests;

use BSP\TokenGenerator\Token;
use PHPUnit\Framework\TestCase;

class TokenTest extends TestCase
{
    public function test create Token()
    {
        $token = new Token('fake-value', new \DateInterval('P1D'));

        $this->assertInstanceOf(Token::class, $token);
        $this->assertSame('fake-value', $token->value());
        $this->assertInstanceOf(\DateTimeImmutable::class, $token->generatedAt());
        $this->assertInstanceOf(\DateTimeImmutable::class, $token->expireAt());
        $this->assertSame(1, $token->generatedAt()->diff($token->expireAt())->d);
    }
}