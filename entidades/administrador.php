<?php

namespace Proyecto\Entidades;

class Administrador
{
    private ?int $id; 
    private string $nombre;
    private string $apellidos;
    private string $mail;

    function __construct(
        ?int $id,
        string $nombre,
        string $apellidos,
        string $mail
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->mail = $mail;
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

    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getApellidos(): string
    {
        return $this->apellidos;
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


}
