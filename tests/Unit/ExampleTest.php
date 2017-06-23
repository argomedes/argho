<?php

namespace Tests\Unit;

use App\User;
use App\CarRally;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Faker\Factory as Faker;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testAdminLogin()
    {
        // Guest
        $response = $this
            ->get('/administrator');

        $response->assertRedirect('/logowanie');

        // Normal user
        $user = User::where('admin', 0)->first();

        $response = $this
            ->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->get('/administrator');

        $response->assertRedirect('/');

        // Admin user
        $user = User::where('admin', 1)->first();

        $response = $this
            ->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->get('/administrator');

        $response->assertStatus(200);
    }

    public function testCreatingPost()
    {
        $faker = Faker::create();

        $user = User::where('admin', 0)->inRandomOrder()->first();

        $title = $faker->name;
        $body = '<p>'.$faker->text.'</p>';

        $user->publish(
            new \App\Post([
                'car_rally_id' => $user->car_rally_id,
                'title' => $title,
                'body' => $body
            ])
        );

        $this->assertDatabaseHas('posts', [
            'car_rally_id' => $user->car_rally_id,
            'title' => $title,
            'body' => $body
        ]);
    }

}
