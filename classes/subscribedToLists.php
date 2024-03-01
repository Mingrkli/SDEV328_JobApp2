<?php

class SubscribedToLists extends Applicant {
    private $_selectionsJobs;
    private $_selectionsVerticals;

    /**
     * @param $_selectionsJobs
     * @param $_selectionsVerticals
     */
    public function __construct($_fname, $_lname, $_email, $_state, $_phone, $_github, $_experience, $_relocate, $_bio, $selectionsJobs, $selectionsVerticals)
    {
        parent::__construct($_fname, $_lname, $_email, $_state, $_phone, $_github, $_experience, $_relocate, $_bio);
        $this->_selectionsJobs = $selectionsJobs;
        $this->_selectionsVerticals = $selectionsVerticals;
    }

    /**
     * @return mixed
     */
    public function getSelectionsJobs()
    {
        return $this->_selectionsJobs;
    }

    /**
     * @param mixed $selectionsJobs
     */
    public function setSelectionsJobs($selectionsJobs)
    {
        $this->_selectionsJobs = $selectionsJobs;
    }

    /**
     * @return mixed
     */
    public function getSelectionsVerticals()
    {
        return $this->_selectionsVerticals;
    }

    /**
     * @param mixed $selectionsVerticals
     */
    public function setSelectionsVerticals($selectionsVerticals)
    {
        $this->_selectionsVerticals = $selectionsVerticals;
    }

}