<?php

namespace App\Entity;

use App\Repository\ArticleEntityRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=ArticleEntityRepository::class)
 */
class ArticleEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titreArticle;

    /**
     * @ORM\Column(type="text")
     */
    private $texteArticle;

    /**
     * @ORM\ManyToOne(targetEntity=AuteurEntity::class, inversedBy="articleEntities")
     */
    
    private $auteurArticle;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    public function __toString()
    {
    return (string) $this->getAuteurArticle();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreArticle(): ?string
    {
        return $this->titreArticle;
    }

    public function setTitreArticle(string $titreArticle): self
    {
        $this->titreArticle = $titreArticle;

        return $this;
    }

    public function getTexteArticle(): ?string
    {
        return $this->texteArticle;
    }

    public function setTexteArticle(string $texteArticle): self
    {
        $this->texteArticle = $texteArticle;

        return $this;
    }

    public function getAuteurArticle(): ?AuteurEntity
    {
        return $this->auteurArticle;
    }


    public function setAuteurArticle(?AuteurEntity $auteurArticle): self
    {
        $this->auteurArticle = $auteurArticle;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
