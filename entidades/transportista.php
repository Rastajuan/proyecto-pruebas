<?php

namespace Proyecto\Entidades;

class Transportista
{
    private ?int $id; 
    private string $nombre;

    function __construct(
        ?int $id,
        string $nombre
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

}