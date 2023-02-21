<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\articles;
use Laravel\Passport\ClientRepository;

class PostManagementTest extends TestCase
{
    use RefreshDatabase;
    // use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */

    // public function login_test() {

    //     $this->withoutExceptionHandling();

    //     $user = factory(User::class)->create([
    //         'email' => 'emailprueba@gmail.com',
    //         'password' => bcrypt('12345678'),
    //     ]);         
    
    //     $response = $this->post('/login', [
    //         'email' => 'emailprueba@gmail.com',
    //         'password' => '12345678',
    //     ]);

    //     $clientRepository = new ClientRepository();
    //     $client = $clientRepository->createPersonalAccessClient(
    //         null, 'Test Personal Access Client', 'http://localhost'
    //     );

    //     \DB::table('oauth_personal_access_clients')->insert([
    //         'client_id' => $client->id,
    //         'created_at' => new \DateTime,
    //         'updated_at' => new \DateTime,
    //     ]);
    
    //     $response->assertStatus(200);
    //     $response->assertJsonStructure([
    //         'success' => ['token']
    //     ]);

    // }

//      /** @test */
//     public function register_test() {

//         $response = $this->post('/register', [
//             'name' => 'usuario',
//             'surname' => 'registro',
//             'email' => 'emailregistro@gmail.com',
//             'cicle_id' => '1',
//             'password' => '12345678',
//         ]);

//         $response->assertStatus(302);
//         $response->assertRedirect('/home');
//         $this->assertAuthenticated();

//     }

    /** @test */
public function crear_noticia_test() {


    $this->withoutExceptionHandling();

    // create a new user
    $user = factory(User::class)->create();

    // create article data
    $articleData = [
        'title' => 'Test Article',
        'description' => 'This is a test article',
    ];

    $response = $this->actingAs($user)
                     ->post('/noticias', $articleData);

    $response->assertStatus(302);
    $this->assertDatabaseHas('articles', $articleData);

}

// /** @test */
// public function borrar_noticia_test() {
//     $this->withoutExceptionHandling();

//     $article = Articles::create([
//         'title' => 'Noticia prueba borrar',
//         'description' => 'prueba borrar',
//     ]);   

//     $response = $this->delete('/noticias/' . $article->id);

//     // Comprobamos que hay 0 registros en la BD (se ha insertado)
//     $this->assertCount(0, Articles::all());

//     $response->assertRedirect('/noticias/');
// }

}
