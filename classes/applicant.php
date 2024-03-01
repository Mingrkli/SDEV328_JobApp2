<?php

/**
 * Applicant class for Job App IV - OOP
 * @author Tina Ostrander
 */
class Applicant {
    private $_fname;
    private $_lname;
    private $_email;
    private $_state;
    private $_phone;
    private $_github;
    private $_experience;
    private $_relocate;
    private $_bio;

    /**
     * @param $_fname
     * @param $_lname
     * @param $_email
     * @param $_state
     * @param $_phone
     * @param $_github
     * @param $_experience
     * @param $_relocate
     * @param $_bio
     */
    public function __construct($_fname, $_lname, $_email, $_state, $_phone, $_github, $_experience, $_relocate, $_bio)
    {
        $this->_fname = $_fname;
        $this->_lname = $_lname;
        $this->_email = $_email;
        $this->_state = $_state;
        $this->_phone = $_phone;
        $this->_github = $_github;
        $this->_experience = $_experience;
        $this->_relocate = $_relocate;
        $this->_bio = $_bio;
    }


    /**
     * @return mixed|string
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * @param mixed|string $fname
     */
    public function setFname(mixed $fname)
    {
        $this->_fname = $fname;
    }

    /**
     * @return mixed|string
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * @param mixed|string $lname
     */
    public function setLname(mixed $lname)
    {
        $this->_lname = $lname;
    }

    /**
     * @return mixed|string
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed|string $email
     */
    public function setEmail(mixed $email)
    {
        $this->_email = $email;
    }

    /**
     * @return mixed|string
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param mixed|string $state
     */
    public function setState(mixed $state)
    {
        $this->_state = $state;
    }

    /**
     * @return mixed|string
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param mixed|string $phone
     */
    public function setPhone(mixed $phone)
    {
        $this->_phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getGithub()
    {
        return $this->_github;
    }

    /**
     * @param mixed $github
     */
    public function setGithub($github)
    {
        $this->_github = $github;
    }

    /**
     * @return mixed
     */
    public function getExperience()
    {
        return $this->_experience;
    }

    /**
     * @param mixed $experience
     */
    public function setExperience($experience)
    {
        $this->_experience = $experience;
    }

    /**
     * @return mixed
     */
    public function getRelocate()
    {
        return $this->_relocate;
    }

    /**
     * @param mixed $relocate
     */
    public function setRelocate($relocate)
    {
        $this->_relocate = $relocate;
    }

    /**
     * @return mixed
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * @param mixed $bio
     */
    public function setBio($bio)
    {
        $this->_bio = $bio;
    }
}