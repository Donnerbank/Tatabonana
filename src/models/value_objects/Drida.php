<?php
/**
 * Author: Till, der Troll
 **/

declare(strict_types=1);


namespace models\value_objects;


class Drida
{
    private bool $drida;

    private function __construct(bool $drida)
    {
        $this->ensureIsValid($drida);
        $this->drida = $drida;
    }

    private function ensureIsValid(bool $drida): void
    {
        if (!self::isValid($drida))
            throw new \InvalidArgumentException(sprintf('Provided Bool not valid: %s is.', $drida));
    }

    public function value(): bool
    {
        return $this->drida;
    }

    public static function isValid(bool $drida): bool
    {
        //TODO: remove or implement validation rules
        if (!is_bool($drida))
            return false;
        return true;
    }

    public static function fromBool(bool $drida): self
    {
        return new self($drida);
    }

    public static function sum(bool $drida): self
    {
        return self::fromBool($drida);
    }

    public static function adrian(): self
    {
        return self::sum(false);
    }

    public static function domTata(): self
    {
        return self::sum(true);
    }

    public function equals(Drida $other): Drida
    {
        return Drida::sum($this->value() === $other->value());
    }
}