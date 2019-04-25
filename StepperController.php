<?php
/**
 * This class simulates a form stepper backend API
 */

/**
 * Class StepperController
 */
class StepperController
{
    /**
     * Hash table of steps that can be ordered however
     *
     * @var array
     */
    private $steps;

    /**
     * Numerically indexed array of steps for the request
     *
     * @var array
     */
    private $orderedSteps;

    /**
     * @var StepperService
     */
    private $stepperService;

    /**
     * User form id
     *
     * @var int
     */
    private $formId;

    /**
     * StepperController constructor.
     * @param $stepperService
     */
    public function __construct($stepperService)
    {
        $this->stepperService = $stepperService;

        $this->steps = [];

        $this->setupSteps();

        $this->orderedSteps = [
            $this->steps['email'],
            $this->steps['address'],
            $this->steps['phone-number'],
            $this->steps['preferences']
        ];

        $this->formId = 1; //this would come from the user session
    }

    /**
     * GET route /form/get-current-step
     *
     * @param string $request
     * @return string
     */
    public function getCurrentStep(string $request) : string
    {
        $currentStep = $this->stepperService->getCurrentStep($this->formId);

        if ($currentStep) {
            return json_encode([
                'statusCode' => 200,
                'message' => 'Step not saved.',
                'data' => $currentStep
            ]);
        }

        //simulate json response
        return json_encode([
            'statusCode' => 400,
            'message' => 'Retrieve current step'
        ]);
    }

    /**
     * PUT route /form/save-step/{stepId}
     *
     * @param object $request
     * @return string
     */
    public function saveStep(object $request) : string
    {
        //simulate data that came from form
        $data = $request->data;
        $step = $request->step; //in laravel this would be a url part

        //if there is a st
        if (isset($this->orderedSteps[($step - 1)])) {
            $stepResult = $this->orderedSteps[($step - 1)]($this->stepperService, $data);

            if ($stepResult) {
                return json_encode([
                    'statusCode' => 200,
                    'message' => 'Step not saved.',
                    'data' => $stepResult
                ]);
            }
        }

        //simulate json response
        return json_encode([
            'statusCode' => 400,
            'message' => 'Step not saved.'
        ]);
    }

    /**
     * Set up the steps to be run
     *
     */
    private function setupSteps()
    {
        $this->steps['email'] = function ($stepperService, $data) {
            return $stepperService->saveEmail($data);
        };

        $this->steps['address'] = function ($stepperService, $data) {
            return $stepperService->saveAddress($data);
        };

        $this->steps['phone-number'] = function ($stepperService, $data) {
            return $stepperService->savePhoneNumber($data);
        };

        $this->steps['preferences'] = function ($stepperService, $data) {
            return $stepperService->savePreferences($data);
        };
    }
}
