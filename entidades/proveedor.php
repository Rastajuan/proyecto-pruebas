<?php

namespace Proyecto\Entidades;

class Proveedor
{
    private int $id; 
    private string $nombre;
    private string $mail;
    private string $telefono;
    private ?string $descripcion;
    private ?string $logo;
    

    function __construct(
        int $id,
        string $nombre,
        string $mail,
        string $telefono,
        ?string $descripcion,
        ?string $logo = null
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->mail = $mail;
        $this->telefono = $telefono; 
        $this->descripcion = $descripcion;
        $this->logo = $logo;
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

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getMail(): string
    {
        return $this->mail;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getTelefono(): string
    {
        return $this->telefono;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }
}
