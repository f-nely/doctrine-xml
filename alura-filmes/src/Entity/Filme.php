<?php


namespace Alura\Doctrine\Entity;


use Doctrine\Common\Collections\ArrayCollection;

class Filme
{
    private $id;
    private $titulo;
    private $anoLancamento;
    private $ultimaAtualizacao;
    private $idiomaAudio;
    private $idiomaOriginal;
    private $atores;
    private $sinopse;

    public function __construct(?int $id, string $titulo, string $anoLancamento, Idioma $idiomaAudio, Idioma $idiomaOriginal, ?string $sinopse = null)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->idiomaAudio = $idiomaAudio;
        $this->idiomaOriginal = $idiomaOriginal;
        $this->anoLancamento = $anoLancamento;
        $this->sinopse = $sinopse;
        $this->ultimaAtualizacao = new \DateTimeImmutable();
        $this->atores = new ArrayCollection();
    }

    public function addAtor(Ator $ator): void
    {
        if ($this->atores->contains($ator)) {
            return;
        }

        $this->atores->add($ator);
        $ator->addFilme($this);
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getIdiomaAudio(): Idioma
    {
        return $this->idiomaAudio;
    }

    public function getAtores(): array
    {
        return $this->atores->map(function (Ator $ator) {
            return $ator->getNome();
        })->toArray();
    }
}