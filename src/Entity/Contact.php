<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
class Contact{
    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $firstname;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $lastname;

     /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=10)
     */

     private $message;
     /**
      * @return null|string
      */

      public function getFirstname():?string{
       return $this->firstname;
      }


      /**
       * @param null|string $firstname
       * @return Contact
       */

       public function setFirstname(?string $firstname): Contact{
        $this->firstname = $firstname;
        return $this;
       }
/**
 * @return null|string
 */
public function getLastname(): ?string {
    return $this->lastname;
}

 /**
       * @param null|string $lastname
       * @return Contact
       */

      public function setLastname(?string $firstname): Contact{
        $this->lastname = $lastname;
        return $this;
       }

/**
 * @return null|string
 */
 
public function getEmail(): ?string{
    return $this->email;
}


       /**
       * @param null|string $email
       * @return Contact
       */

      public function setEmail(?string $email): Contact{
        $this->email = $email;
        return $this;
       }

       /**
 * @return null|string
 */
 
public function getMessage(): ?string{
    return $this->message;
}


 /**
       * @param null|string $message
       * @return Contact
       */

      public function setMessage(?string $email): Contact{
        $this->message = $message;
        return $this;
       }

       /**
 * @return Property|null
 */
 
public function getProperty(): ?string{
    return $this->property;
}


       /**
       * @param null|string $property
       * @return Contact
       */

      public function setProperty(?Property $property): Contact{
        $this->property = $property;
        return $this;
       }




}