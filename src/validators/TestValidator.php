<?php

/**
 * @author Masterton
 * @version 1.0.0
 * @time 2018-3-8 09:49:06
 *
 */

namespace App\Validators;

/**
 * TestValidator
 *
 */
class TestValidator extends BaseValidator
{
    // add validator
    public function add_validate(array $data)
    {
        $this->validate(
            [
                'id'  => [ $data['id'] , 'required|min(2)|max(50)' ],
                'test'  => [ $data['test'] , 'required|int' ],
            ]
        );
    }
}