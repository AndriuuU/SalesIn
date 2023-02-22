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

            $clientRepository = new ClientRepository();
            $client = $clientRepository->createPersonalAccessClient(
                null, 'Test Personal Access Client', 'http://localhost'
            );

            \DB::table('oauth_personal_access_clients')->insert([
                'client_id' => $client->id,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime,
            ]);
            

            $response = $this->post('/register', [
                'name' => 'usuario',
                'surname' => 'registro',
                'email' => 'emailregistro@gmail.com',
                'cicle_id' => '1',
                'password' => '12345678',
            ]);
    
            $response->assertStatus(200)
                 ->assertJsonStructure([
                     'success' => [
                         'token',
                         'name',
                     ],
                 ]);
    
        }
}
