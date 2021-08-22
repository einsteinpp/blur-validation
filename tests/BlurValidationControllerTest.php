<?php

namespace Vincentkos\BlurValidation\Tests;

use Illuminate\Support\Facades\Route;

class BlurValidationControllerTest extends TestCase
{
    /** @test */
    public function routes_are_exposed()
    {
        $this->assertTrue(Route::has('blurvalidation.validate'));
    }

    /** @test */
    public function it_require_a_rules_field()
    {
        $this->postJson(route('blurvalidation.validate'), [])
            ->assertJsonValidationErrors('_rules');
    }

    /** @test */
    public function it_require_a_field_field()
    {
        $this->postJson(route('blurvalidation.validate'), [])
            ->assertJsonValidationErrors('_field');
    }

    /** @test */
    public function it_can_validate_a_given_field()
    {
        $this->postJson(route('blurvalidation.validate'), [
            '_rules' => 'required|string|min:8',
            '_field' => 'password',
            'password' => 'mypassword',
        ])
            ->assertOk();
    }

    /** @test */
    public function it_return_errors()
    {
        $this->postJson(route('blurvalidation.validate'), [
            '_rules' => 'required|email',
            '_field' => 'email',
            'email' => 'invalid-email',
        ])
            ->assertJsonValidationErrors('email');
    }
}
