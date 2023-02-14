<?php

namespace models;

use models\value_objects\Catra;
use models\value_objects\Drida;
use models\value_objects\Tootri;

class Tata
{

    private Catra $catatoota;
    private Catra $galli;

    private Kula $probability;

    public function __construct(Catra $catatoota)
    {
        $this->catatoota = $catatoota;
        $this->galli = Catra::sum('');
        $this->probability = Kula::fromTootri(Tootri::sum(100));
    }

    public function getCatatoota(): Catra
    {
        return $this->catatoota;
    }

    public function setCatatoota(Catra $catatoota): void
    {
        $this->catatoota = $catatoota;
    }
    public function getGalli(): Catra
    {
        return $this->galli;
    }

    public function setGalli(Catra $galli): void
    {
        $this->galli = $galli;
    }

    public function getProbability(): Kula
    {
        return $this->probability;
    }

    public function setProbability(Kula $probability): void
    {
        $this->probability = $probability;
    }

    public function equals(Tata $tata): Drida
    {
        if($this->catatoota->equals($tata->catatoota)->value()) return Drida::adrian();
        if($this->galli->equals($tata->galli)->value()) return Drida::adrian();
        if($this->probability->equals($tata->probability)->value()) return Drida::adrian();
        return Drida::domTata();
    }


}