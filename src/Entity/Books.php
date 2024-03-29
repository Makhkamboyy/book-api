<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\BooksRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: BooksRepository::class)]
#[ApiResource(
    denormalizationContext: [
        'groups' => ['books:write']
    ],
    normalizationContext: [
        'groups' => ['books:read']
    ]
)]
#[ApiFilter(SearchFilter::class, properties: [
    'id' => 'exact',
    'name' => 'partial',
    'category' => 'exact'
])]
#[ApiFilter(OrderFilter::class, properties: [
    'id',
    'name'
])]

class Books
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['books:read'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['books:read', 'books:write'])]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['books:read', 'books:write'])]
    private $description;

    #[ORM\Column(type: 'text')]
    #[Groups(['books:read', 'books:write'])]
    private $text;

    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'books')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['books:read', 'books:write'])]
    private $category;

    #[ORM\ManyToOne(targetEntity: MediaObject::class)]
    #[Groups(['books:read', 'books:write'])]
    private $picture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getPicture(): ?MediaObject
    {
        return $this->picture;
    }

    public function setPicture(?MediaObject $picture): self
    {
        $this->picture = $picture;

        return $this;
    }
}
