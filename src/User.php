<?php

class User
{

    private $_id;
    private $_email;
    private $_password;
    private $_roles;

    public function __construct(array $ligne)
    {
        $this->hydrate($ligne);
    }

    // Un tableau de données doit être passé à la fonction (d'où le préfixe "array").
    public function hydrate(array $ligne)
    {
        foreach ($ligne as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function __toString()
    {
        return $this->getEmail() . " (" . $this->getId() . ")";
    }

    /**
     * Get the value of _email
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * Set the value of _email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->_email = $email;

        return $this;
    }

    /**
     * Get the value of _password
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * Set the value of _password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->_password = password_hash($password, PASSWORD_BCRYPT);

        return $this;
    }

    /**
     * Get the value of _roles
     */
    public function getRoles()
    {
        return $this->_roles;
    }

    /**
     * Set the value of _roles
     *
     * @return  self
     */
    public function setRoles($roles)
    {
        $this->_roles = $roles;

        return $this;
    }

    /**
     * Get the value of _id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Set the value of _id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->_id = $id;

        return $this;
    }
}
