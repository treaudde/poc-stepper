<?php

namespace Models;

/**
 * Class Preferences
 *
 * Dummy class to simulate db model
 *
 * @package Models
 */
class Preferences
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