<?php

namespace Models;

/**
 * Class PhoneNumber
 *
 * Dummy class to simulate db model
 *
 * @package Models
 */
class PhoneNumber
{
    /**
     * @param $data
     * @return bool
     */
    public function save($data)
    {
        return true;
    }

    /**
     * @param $formId
     * @return $this
     */
    public function getByFormId($formId)
    {
        return $this;
    }
}