<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserModuleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     use RefreshDatabase;

     public function setUp(): void
     {
    
         parent::setUp();
         $this->artisan('passport:install');
    }     

     

     public function test_if_user_registerd_or_not()
     {
         $this->post(route('user.register'),[
            'name' => "Test",
            'email' => "test@gmail.com",
            'password' => Hash::make("password"),
            "phone" => "1234567890"
         ])->assertCreated();

         $this->assertDatabaseHas('users',[
            'name' => "Test",
            'email' => "test@gmail.com",
            "phone" => "1234567890"
         ]);

        }



    public function test_if_user_is_logged_in_with_email_and_password()
    {
        $user = User::factory()->create();
        $response = $this->post(route('user.login'),[
        'email' => $user->email,
        'password' => "password",
     
         ]);

        $response->assertStatus(200);


    }

    
    public function test_logged_in_user_profile()
    {
        $user = User::factory()->create();

        $response = $this->post(route('user.login'),[
        'email' => $user->email,
        'password' => "password",
     
         ]);

         $token = $response->json()['user']['token'];

       

        // $response->assertStatus(200);

       $response = $this->withHeader(
            'Authorization' , 'Bearer ' . $token,
        )->get(route('user.profile'));

        $response->assertStatus(200);
    }
}
