<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\articles;
use App\Cicles;
use Laravel\Passport\ClientRepository;


class RegisterTest extends TestCase
{
    use RefreshDatabase;

         /** @test */
         public function register_test() {

            $response = $this->post('/register', [
                'name' => 'usuario',
                'surname' => 'registro',
                'email' => 'emailregistro@gmail.com',
                'cicle_id' => '1',
                'password' => '12345678',
            ]);
    
            $response->assertStatus(302);
            $response->assertRedirect('/home');
            $this->assertAuthenticated();
    
        }
}
