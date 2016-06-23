<?php
/**
* \BaseController
*/
class BaseController {
    public function __construct()
    {
        
    }

    public function validate($data, $rules)
    {
         return new \Dobest\Validation\Validator($data, $rules);
    }

    public function __destruct()
    {

    }
}