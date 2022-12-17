<?php

namespace Proyecto\Entidades;

class Usuario
{
    private int $id; 
    private string $calle;
    private int $numero;
    private ?int $piso;
    private int $cp;
    private string $ciudad;
    private string $pais;

    function __construct(
        int $id,
        string $calle,
        int $numero,
        ?int $piso,
        int $cp,
        string $ciudad,
        string $pais
    ) {
        $this->id = $id;
        $this->calle = $calle;
        $this->numero = $numero;
        $this->piso = $piso;
        $this->cp = $cp; 
        $this->ciudad = $ciudad;
        $this->pais = $pais;
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setCalle(string $calle): self
    {
        $this->calle = $calle;

        return $this;
    }

    public function getCalle(): string
    {
        return $this->calle;
    }

     public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

     public function setPiso(int $piso): self
    {
        $this->piso = $piso;

        return $this;
    }

    public function getPiso(): ?int
    {
        return $this->piso;
    }
   
    public function setCp(int $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getCp(): int
    {
        return $this->cp;
    }

    public function setCiudad(string $ciudad): self
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    public function getCiudad(): string
    {
        return $this->ciudad;
    }

    public function setPais(string $pais): self
    {
        $this->pais = $pais;

        return $this;
    }

    public function getPais(): string
    {
        return $this->pais;
    }

    public function getDireccion($calle, $numero, $piso, $cp, $ciudad, $pais): string
    {
        return "c/ " . $calle . ", " . $numero . ", " . $piso . "<br> CP: " . $cp . $ciudad . "(" . $pais . ")"; 
    }
}