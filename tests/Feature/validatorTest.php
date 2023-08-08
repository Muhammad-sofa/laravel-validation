<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class validatorTest extends TestCase
{
    // #Validator
    public function testValidator()
    {
        $data = [
            "username" => "admin",
            "password" => "123456"
        ];

        $rules = [
            "username" => "required",
            "password" => "required"
        ];

        $validator = Validator::make($data, $rules);
        self::assertNotNull($validator);
    }
}
