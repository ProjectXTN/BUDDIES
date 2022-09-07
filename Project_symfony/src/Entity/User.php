<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $country = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $city = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $language = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Picture = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Biography = null;

    #[ORM\Column (nullable: true)]
    private ?bool $isExpat = null;

    #[ORM\Column (nullable: true)]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\ManyToMany(targetEntity: Group::class, inversedBy: 'users')]
    private Collection $groupe;



    #[ORM\ManyToMany(targetEntity: Publication::class, inversedBy: 'users')]
    private Collection $Publication;

    #[ORM\ManyToMany(targetEntity: Form::class, inversedBy: 'users')]
    private Collection $Form;

    #[ORM\ManyToMany(targetEntity: Review::class, inversedBy: 'users')]
    private Collection $Reviews;

    public function __construct()
    {
        $this->groupe = new ArrayCollection();
        $this->Form = new ArrayCollection();
        $this->Publication = new ArrayCollection();
        $this->Reviews = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->Picture;
    }

    public function setPicture(?string $Picture): self
    {
        $this->Picture = $Picture;

        return $this;
    }

    public function getBiography(): ?string
    {
        return $this->Biography;
    }

    public function setBiography(?string $Biography): self
    {
        $this->Biography = $Biography;

        return $this;
    }

    public function isIsExpat(): ?bool
    {
        return $this->isExpat;
    }

    public function setIsExpat(bool $isExpat): self
    {
        $this->isExpat = $isExpat;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    // Ne marche pas pour edite le crud
    public function __toString()
    {
        return $this->firstName.' '.$this->lastName.' '.$this->country.' '.$this->city.' '.$this->language.' '.$this->Picture.' '.$this->Biography;
    }

    /**
     * @return Collection<int, Group>
     */
    public function getGroupe(): Collection
    {
        return $this->groupe;
    }

    public function addGroupe(Group $groupe): self
    {
        if (!$this->groupe->contains($groupe)) {
            $this->groupe->add($groupe);
        }

        return $this;
    }

    public function removeGroupe(Group $groupe): self
    {
        $this->groupe->removeElement($groupe);

        return $this;
    }

/*     public function deleteImage(){
        if(unlink('../data/')){

        }
    } */



    /**
     * @return Collection<int, Publication>
     */
    public function getPublication(): Collection
    {
        return $this->Publication;
    }

    public function addPublication(Publication $publication): self
    {
        if (!$this->Publication->contains($publication)) {
            $this->Publication->add($publication);
        }

        return $this;
    }

    public function removePublication(Publication $publication): self
    {
        $this->Publication->removeElement($publication);

        return $this;
    }

    /**
     * @return Collection<int, Form>
     */
    public function getForm(): Collection
    {
        return $this->Form;
    }

    public function addForm(Form $form): self
    {
        if (!$this->Form->contains($form)) {
            $this->Form->add($form);
        }

        return $this;
    }

    public function removeForm(Form $form): self
    {
        $this->Form->removeElement($form);

        return $this;
    }

    /**
     * @return Collection<int, Review>
     */
    public function getReviews(): Collection
    {
        return $this->Reviews;
    }

    public function addReview(Review $review): self
    {
        if (!$this->Reviews->contains($review)) {
            $this->Reviews->add($review);
        }

        return $this;
    }

    public function removeReview(Review $review): self
    {
        $this->Reviews->removeElement($review);

        return $this;
    }
}
