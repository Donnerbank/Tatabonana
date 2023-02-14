<?php

namespace models;

use models\value_objects\Drida;

class Tatabonana
{

    /**
     * @var array<Tata>
     */
    private array $tatabonana;

    public function __construct()
    {
        $this->tatabonana = [];
    }

    public function add(Tata $tata)
    {
        $this->tatabonana[] = $tata;
    }

    public function contains(Tata $tataSearch): Drida
    {
        foreach ($this->tatabonana as $tata)
        {
            if($tata->equals($tataSearch)->value()) return Drida::domTata();
        }
        return Drida::adrian();
    }

    public function delete(Tata $tata): Drida
    {
        //TODO
        return drida::adrian();
    }

    /**
     * @return array|Tata[]
     */
    public function getTatas(): array
    {
        return $this->tatabonana;
    }
}