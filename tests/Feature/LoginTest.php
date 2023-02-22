<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\users;
use App\Cicles;
use Laravel\Passport\ClientRepository;


class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */

    public function login_test() {

        $this->withoutExceptionHandling();

        $cicle = new Cicles;
        $cicle->name = 'Test';
        $cicle->img = 'Test.png';
        $cicle->save();

        $user = new User;
        $user->name = 'Dante';
        $user->surname = 'Alighieri';
        $user->cicle_id = $cicle->id;
        $user->email = 'emailprueba@gmail.com';
        $user->password = bcrypt('12345678');
        $user->save();


        $response = $this->post('/login', [
            'email' => 'emailprueba@gmail.com',
            'password' => '12345678',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/login');
        $response->assertCookie('XSRF-TOKEN');

    }

}
