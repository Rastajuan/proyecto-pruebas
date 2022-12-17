<?php

namespace Proyecto\Entidades;

class Imagen
{
    private int $id; 
    private string $titulo;

    function __construct(
        int $id,
        string $titulo
    ) {
        $this->id = $id;
        $this->titulo = $titulo;
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

}