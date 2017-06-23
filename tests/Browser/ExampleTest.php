<?php

namespace Tests\Browser;

use App\CarRally;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testAddingQuestion()
    {

        // $this->browse(function (Browser $browser) {
        //     $carRally = CarRally::first();
        //
        //     $browser->visit('/'.$carRally->alias.'/kontakt')
        //         ->type('name', 'Test Name')
        //         ->type('email', 'test@question.com')
        //         ->type('topic', 'Test Title!')
        //         ->type('body', 'I need your help.')
        //         ->press('WYŚLIJ WIADOMOŚĆ');
        // });
        //
        // $carRally = CarRally::first();
        //
        // $this->assertDatabaseHas('questions', [
        //     'car_rally_id' => $carRally->id,
        //     'name' => 'Test Name',
        //     'email' => 'test@question.com',
        //     'topic' => 'Test Title!',
        //     'body' => 'I need your help.'
        // ]);
    }
}
