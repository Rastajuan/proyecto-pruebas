<?php

namespace Proyecto\Entidades;

use DateTime;

class Pedido
{
    private int $id;    
    private int $codigopedido;
    private ?DateTime $fecha;
    private int $usuario_id;
    private int $estadopedido_id;
    private ?int $horas;
    private ?bool $pagado;
    private ?int $direccionenvio_id;
    private ?int $direccionrecogida_id;
    private ?int $transportistas_id;
    private ?float $costetransporte;
    private ?int $imagenes_id;
    private ?int $archivoscliente_id;
    private ?string $descripcion;

    function __construct(
        int $id,
        int $codigopedido,
        string $fecha, 
        int $usuario_id,
        int $estadopedido_id,
        ?int $horas,
        ?bool $pagado,
        ?int $direccionenvio_id,
        ?int $direccionrecogida_id,
        ?int $transportistas_id, 
        ?float $costetransporte,
        ?int $imagenes_id,
        ?int $archivoscliente_id,
        ?string $descripcion
    ) {
        $this->id = $id;
        $this->codigopedido = $codigopedido;
        $this->fecha = empty($fecha) ? null : new DateTime($fecha);
        $this->usuarios_id = $usuario_id;
        $this->estadopedido_id = $estadopedido_id;
        $this->horas = $horas;
        $this->pagado = $pagado;
        $this->direccionenvio_id;
        $this->direccionrecogida_id;
        $this->$transportistas_id;
        $this->costetransporte = $costetransporte;
        $this->imagenes_id = $imagenes_id;
        $this->archivoscliente_id; 
        $this->descripcion = $descripcion; 
    }

    
    public function getId(): int
    {
        return $this->id;
    }

    public function setCodigopedido(int $codigopedido): self
    {
        $this->codigopedido = $codigopedido;

        return $this;
    }

    public function getCodigopedido(): int
    {
        return $this->codigopedido;
    }

    public function getFecha(): ?string
    {
        return empty($this->fecha) ? null : $this->fecha->format('d/m/Y H:i');
    }
   
    public function setFecha(string $fecha): self
    {
        $this->fecha = empty($fecha) ? null : new DateTime($fecha);

        return $this;
    }

    public function setUsuario_id(int $usuario_id): self
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    public function getUsuario_id(): int
    {
        return $this->usuarios_id;
    }

    public function setEstadipedido_id(int $estadopedido_id): self
    {
        $this->estadopedido_id = $estadopedido_id;

        return $this;
    }

    public function getEstadopedido_id(): int
    {
        return $this->estadopedido_id;
    }

    public function setHoras(int $horas): self
    {
        $this->horas = $horas;

        return $this;
    }

    public function getHoras(): ?int
    {
        return $this->horas;
    }

    public function setPagado (bool $pagado): self
    {
        $this->pagado = $pagado;

        return $this;
    }

    public function getPagado(): ?bool
    {
        return $this->pagado;
    }

    public function setDireccionenvio_id(int $direccionenvio_id): self
    {
        $this->direccionenvio_id = $direccionenvio_id;

        return $this;
    }

    public function getDireccionenvio_id(): ?int
    {
        return $this->direccionenvio;
    }

    public function setDireccionrecogida_id(int $direccionrecogida_id): self
    {
        $this->direccionrecogida_id = $direccionrecogida_id;

        return $this;
    }

    public function getDireccionrecogida_id(): ?int
    {
        return $this->direccionrecogida_id;
    }

    public function setTransportistas_id(int $transportistas_id): self
    {
        $this->transportisas_id = $transportistas_id;

        return $this;
    }

    public function getTransportistas_id(): ?int
    {
        return $this->transportistas_id;
    }

    public function setCostetransporte(float $costetransporte): self
    {
        $this->costetransporte = $costetransporte;

        return $this;
    }

    public function getCostetransporte(): ?float
    {
        return $this->costetransporte;
    }

    public function setImagenes_id(int $imagenes_id): self
    {
        $this->imagenes_id = $imagenes_id;

        return $this;
    }

    public function getImagenes_id(): ?int
    {
        return $this->imagenes_id;
    }

    public function setArchivoscliente_id(int $archivoscliente_id): self
    {
        $this->archivoscliente_id = $archivoscliente_id;

        return $this;
    }

    public function getArchivoscliente_id(): ?int
    {
        return $this->archivoscliente_id;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descipcion = $descripcion;

        return $this;
    }
   
    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }
}