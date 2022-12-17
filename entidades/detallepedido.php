<?php

namespace Proyecto\Entidades;

class DetallePedido
{
    private int $id; 
    private int $pedido_id;
    private int $servicios_id;
    private int $horas;
    private float $precio;
    private float $IVA;
    private ?string $descripcion;

    function __construct(
        int $id,
        int $pedido_id,
        int $servicios_id,
        int $horas,
        float $precio,
        float $IVA,
        ?string $descripcion
    ) {
        $this->id = $id;
        $this->pedido_id = $pedido_id;
        $this->servicios_id = $servicios_id;
        $this->horas = $horas;
        $this->precio = $precio;
        $this->IVA = $IVA;
        $this->descripcion = $descripcion; 
    }

    
    public function getId(): int
    {
        return $this->id;
    }

     public function setPedido_id(int $pedido_id): self
    {
        $this->pedido_id = $pedido_id;

        return $this;
    }

    public function getPedido_id(): string
    {
        return $this->pedido_id;
    }

     public function setServicios_id(int $servicios_id): self
    {
        $this->servicios_id = $servicios_id;

        return $this;
    }

    public function getServicios_id(): string
    {
        return $this->servicios_id;
    }
   
    public function setHoras(int $horas): self
    {
        $this->horas = $horas;

        return $this;
    }

    public function getHoras(): string
    {
        return $this->horas;
    }

 public function setPrecio(int $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function setIVA(float $IVA): self
    {
        $this->IVA = $IVA;

        return $this;
    }

    public function getIva(): string
    {
        return $this->IVA;
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
}