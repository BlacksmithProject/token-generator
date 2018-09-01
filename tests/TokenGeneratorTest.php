<?php
/**
 * Project: token-generator
 * Created by: ngdo on 01/09/18
 */
declare(strict_types=1);

namespace BSP\TokenGenerator\Tests;

use BSP\TokenGenerator\Token;
use BSP\TokenGenerator\TokenGenerator;
use DateInterval;
use PHPUnit\Framework\TestCase;

class TokenGeneratorTest extends TestCase
{
    public function test generate Token without duration or length()
    {
        $token = TokenGenerator::generate();

        $this->assertInstanceOf(Token::class, $token);
        $this->assertSame(64, strlen($token->value()));
        $this->assertInstanceOf(\DateTimeImmutable::class, $token->generatedAt());
        $this->assertInstanceOf(\DateTimeImmutable::class, $token->expireAt());
        $this->assertSame(15, $token->generatedAt()->diff($token->expireAt())->days);
    }

    public function test generate Token with duration()
    {
        $token = TokenGenerator::generate(new DateInterval(sprintf('P%1$sD', 1)));

        $this->assertInstanceOf(Token::class, $token);
        $this->assertSame(64, strlen($token->value()));
        $this->assertInstanceOf(\DateTimeImmutable::class, $token->generatedAt());
        $this->assertInstanceOf(\DateTimeImmutable::class, $token->expireAt());
        $this->assertSame(1, $token->generatedAt()->diff($token->expireAt())->days);
    }

    public function test generate Token with length()
    {
        $token = TokenGenerator::generate(null, 105);

        $this->assertInstanceOf(Token::class, $token);
        $this->assertSame(188, strlen($token->value()));
        $this->assertInstanceOf(\DateTimeImmutable::class, $token->generatedAt());
        $this->assertInstanceOf(\DateTimeImmutable::class, $token->expireAt());
        $this->assertSame(15, $token->generatedAt()->diff($token->expireAt())->days);
    }

    public function test generate Token with duration and length()
    {
        $token = TokenGenerator::generate(new DateInterval(sprintf('P%1$sD', 7)), 64);

        $this->assertInstanceOf(Token::class, $token);
        $this->assertSame(136, strlen($token->value()));
        $this->assertInstanceOf(\DateTimeImmutable::class, $token->generatedAt());
        $this->assertInstanceOf(\DateTimeImmutable::class, $token->expireAt());
        $this->assertSame(7, $token->generatedAt()->diff($token->expireAt())->days);
    }

    public function test generate Token with length greater than 105()
    {
        $token = TokenGenerator::generate(null, 106);

        $this->assertInstanceOf(Token::class, $token);
        $this->assertSame(64, strlen($token->value()));
        $this->assertInstanceOf(\DateTimeImmutable::class, $token->generatedAt());
        $this->assertInstanceOf(\DateTimeImmutable::class, $token->expireAt());
        $this->assertSame(15, $token->generatedAt()->diff($token->expireAt())->days);
    }
}