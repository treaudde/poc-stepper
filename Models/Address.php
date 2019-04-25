<?php

namespace Models;
/**
 * Class Address
 *
 * Dummy class to simulate db model
 *
 * @package Models
 */
class Address
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