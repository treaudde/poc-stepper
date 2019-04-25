<?php
namespace Services;

use Models\Email;
use Models\Address;
use Models\PhoneNumber;
use Models\Preferences;

/**
 * Class StepperService
 *
 * @package Services
 */
class StepperService
{
    /**
     * @var Email
     */
    private $email;

    /**
     * @var Address
     */
    private $address;

    /**
     * @var PhoneNumber
     */
    private $phoneNumber;

    /**
     * @var Preferences
     */
    private $preferences;

    /**
     * StepperService constructor.
     *
     *
     *
     * @param Email $email
     * @param Address $address
     * @param PhoneNumber $phoneNumber
     * @param Preferences $preferences
     */
    public function __construct()
    {
        $this->email = new Email();
        $this->address = new Address();
        $this->phoneNumber = new PhoneNumber();
        $this->preferences = new Preferences();
    }

    /**
     * @param $formId
     */
    public function getCurrentStep($formId)
    {
       //to be determined, need this service to provide steps to frontend so we can order them in the service
    }

    /**
     * @param $data
     * @return array
     */
    public function saveEmail($data)
    {
        if($this->email->save($data))
        {
            return ['nextStep' => 2];
        }
    }

    /**
     * @param $data
     * @return array
     */
    public function saveAddress($data)
    {
        if($this->address->save($data))
        {
            return ['nextStep' => 2];
        }
    }

    /**
     * @param $data
     * @return array
     */
    public function savePhoneNumber($data)
    {
        if($this->phoneNumber->save($data)) {
            return ['nextStep' => 2];
        }
    }

    /**
     * @param $data
     * @return array
     */
    public function savePreferences($data)
    {
        if ($this->preferences->save($data)) {
            return ['nextStep' => 2];
        }
    }
}