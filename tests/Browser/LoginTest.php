<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    
     /** @test */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'kappa@gmail.com')
                    ->type('password', 'kappa123')
                    ->press('Login')
                    ->assertPathIs('/home');
        });
    }
}
