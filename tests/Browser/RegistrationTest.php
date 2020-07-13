<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistrationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

      /** @test */

    public function registrationTest()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('register')
                    ->type('firstName', 'Sujan')
                    ->type('lastName','Maharjan')
                    ->type('email','zexcu008@gmail.com')
                    ->type('kappa123','password')
                    ->select('1','userType')
                    ->type('345','companName')
                    ->select('Private','orgianizationType')
                    ->type('Kathmandu','address')
                    ->type('Nepal','country')
                    ->select('Kathmandu','city')
                    ->type('9808081317','phone')
                    ->type('okay.com','website')
                    ->type('Nothing','companyDescription')
                    ->click('.submit')
                    ->assertPathIs('/login');
        });
    }
}
