<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class validatorTest extends TestCase
{
    // #Validator
    public function testValidator()
    {
        $data = [
            "username" => "admin",
            "password" => "123445"
        ];

        $rules = [
            "username" => "required",
            "password" => "required"
        ];

        $validator = Validator::make($data, $rules);
        self::assertNotNull($validator);

        self::assertTrue($validator->passes()); //sukses
        self::assertFalse($validator->fails()); //gagal
    }

    public function testValidatorInvalid()
    {
        $data = [
            "username" => "",
            "password" => ""
        ];

        $rules = [
            "username" => "required",
            "password" => "required"
        ];

        $validator = Validator::make($data, $rules);
        self::assertNotNull($validator);

        self::assertFalse($validator->passes()); //sukses
        self::assertTrue($validator->fails()); //gagal

        //error message
        $message = $validator->getMessageBag();

        Log::info($message->toJson(JSON_PRETTY_PRINT));
    }
    
}
