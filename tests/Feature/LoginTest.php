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


class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */

    public function login_test() {

        $this->withoutExceptionHandling();

        $user = factory(User::class)->create([
            'email' => 'emailprueba@gmail.com',
            'password' => bcrypt('12345678'),
        ]);         
    
        $response = $this->post('/login', [
            'email' => 'emailprueba@gmail.com',
            'password' => '12345678',
        ]);

        $clientRepository = new ClientRepository();
        $client = $clientRepository->createPersonalAccessClient(
            null, 'Test Personal Access Client', 'http://localhost'
        );

        \DB::table('oauth_personal_access_clients')->insert([
            'client_id' => $client->id,
            'created_at' => new \DateTime,
            'updated_at' => new \DateTime,
        ]);
    
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success' => ['token']
        ]);

    }

}