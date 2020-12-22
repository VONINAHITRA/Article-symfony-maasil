<?php

namespace App\Entity;

use App\Repository\AuteurEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=AuteurEntityRepository::class)
 * @ORM\Table(name="auteur_entity")
 * @UniqueEntity(
 *     fields={"nomAuteur"},
 *     message="Ce auteur existe déjà dans la base, veuillez essayer un autre"
 * )
 */
class AuteurEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * 
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $nomAuteur;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=ArticleEntity::class, mappedBy="auteurArticle")
     */
    private $articleEntities;

    public function __construct()
    {
        $this->articleEntities = new ArrayCollection();
    }

    public function __toString()
    {
    return (string) $this->getNomAuteur();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAuteur(): ?string
    {
        return $this->nomAuteur;
    }

    public function setNomAuteur(string $nomAuteur): self
    {
        $this->nomAuteur = $nomAuteur;

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

    /**
     * @return Collection|ArticleEntity[]
     */
    public function getArticleEntities(): Collection
    {
        return $this->articleEntities;
    }

    public function addArticleEntity(ArticleEntity $articleEntity): self
    {
        if (!$this->articleEntities->contains($articleEntity)) {
            $this->articleEntities[] = $articleEntity;
            $articleEntity->setAuteurArticle($this);
        }

        return $this;
    }

    public function removeArticleEntity(ArticleEntity $articleEntity): self
    {
        if ($this->articleEntities->removeElement($articleEntity)) {
            // set the owning side to null (unless already changed)
            if ($articleEntity->getAuteurArticle() === $this) {
                $articleEntity->setAuteurArticle(null);
            }
        }

        return $this;
    }
}
