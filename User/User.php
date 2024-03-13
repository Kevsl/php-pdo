<?php
namespace User;


class User{

    private $id_user;
    private $firstName_user;
    private $lastName_user;
    private $email_user;
    private $password_user;
    private $role_user;
    private $gdpr_user;



   
    function __construct(array $datas){ 
        foreach ($datas as $key => $value) {
            $this->$key = $value;
        }

    }

    

    /**
     * Get the value of id_user
     */ 
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of firstName_user
     */ 
    public function getFirstName_user()
    {
        return $this->firstName_user;
    }

    /**
     * Set the value of firstName_user
     *
     * @return  self
     */ 
    public function setFirstName_user($firstName_user)
    {
        $this->firstName_user = $firstName_user;

        return $this;
    }

    /**
     * Get the value of lastName_user
     */ 
    public function getLastName_user()
    {
        return $this->lastName_user;
    }

    /**
     * Set the value of lastName_user
     *
     * @return  self
     */ 
    public function setLastName_user($lastName_user)
    {
        $this->lastName_user = $lastName_user;

        return $this;
    }

    /**
     * Get the value of email_user
     */ 
    public function getEmail_user()
    {
        return $this->email_user;
    }

    /**
     * Set the value of email_user
     *
     * @return  self
     */ 
    public function setEmail_user($email_user)
    {
        $this->email_user = $email_user;

        return $this;
    }

    /**
     * Get the value of password_user
     */ 
    public function getPassword_user()
    {
        return $this->password_user;
    }

    /**
     * Set the value of password_user
     *
     * @return  self
     */ 
    public function setPassword_user($password_user)
    {
        $this->password_user = $password_user;

        return $this;
    }

    /**
     * Get the value of role_user
     */ 
    public function getRole_user()
    {
        return $this->role_user;
    }

    /**
     * Set the value of role_user
     *
     * @return  self
     */ 
    public function setRole_user($role_user)
    {
        $this->role_user = $role_user;

        return $this;
    }

    /**
     * Get the value of gdpr_user
     */ 
    public function getGdpr_user()
    {
        return $this->gdpr_user;
    }

    /**
     * Set the value of gdpr_user
     *
     * @return  self
     */ 
    public function setGdpr_user($gdpr_user)
    {
        $this->gdpr_user = $gdpr_user;

        return $this;
    }
    }