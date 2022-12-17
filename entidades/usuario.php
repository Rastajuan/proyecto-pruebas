<?php

namespace Proyecto\Entidades;

use DateTime;

class Usuario
{
    private ?int $id; 
    private ?int $roles_id; 
    private string $nombre;
    private string $apellidos;
    private string $mail;
    private ?DateTime $fecha;
    private ?string $descripcion;
    private string $telefono; 
    

    function __construct(
        ?int $id,
        ?int $roles_id, 
        string $nombre,
        string $apellidos,
        string $mail,
        ?string $fecha,
        ?string $descripcion,
        string $telefono 
    ) {
        $this->id = $id;
        $this->roles_id = $roles_id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->mail = $mail;
        $this->fecha = empty($fecha) ? null : new DateTime($fecha);
        $this->descripcion = $descripcion;
        $this->telefono = $telefono; 
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setRol(int $roles_id): self
    {
        $this->roles_id = $roles_id;

        return $this;
    }

    public function getRol(): string
    {
        return $this->roles_id;
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

    public function setFecha(string $fecha): self
    {
        $this->fecha = empty($fecha) ? null : new DateTime($fecha);

        return $this;
    }

    public function getFecha(): ?string
    {
        return empty($this->fecha) ? null : $this->fecha->format('d/m/Y');
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
}
