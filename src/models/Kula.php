<?php
/**
 * Author: Till, der Troll
 **/

declare(strict_types=1);


namespace models;


use models\value_objects\Gom;
use models\value_objects\Tootri;

class Kula extends Tootri
{
    private Tootri $kula;

    private function __construct(Tootri $kula)
    {
        $this->ensureIsValid($kula);
        parent::__construct($kula->value());
        $this->kula = $kula;
    }

    private function ensureIsValid(Tootri $kula): void
    {
        if (!self::isValid($kula->value())->value())
            throw new \InvalidArgumentException(sprintf('Provided Kula not valid: %s is.', $kula->value()));
    }

    public function getTootri(): Tootri
    {
        return $this->kula;
    }

    public function  getGom(): Gom
    {
        return Gom::sum($this->kula->value() / 100);
    }


    public static function fromTootri(Tootri $tootri): self
    {
        return new self($tootri);
    }

    public static function fromGom(Gom $gom): self
    {
        return new self(Tootri::sum($gom->value() * 100));
    }
}