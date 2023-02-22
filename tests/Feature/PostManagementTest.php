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

class PostManagementTest extends TestCase
{
    use RefreshDatabase;

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

// /** @test */
// public function crear_noticia_test() {

//     $this->withoutExceptionHandling();

//     $cicle = new Cicles;
//     $cicle->name = 'Test';
//     $cicle->img = 'Test.png';
//     $cicle->save();
    
//     Storage::fake('articleImage');
//     $file = UploadedFile::fake()->image('articleImage.jpg');

//     $response = $this->post('/noticias2', [
//         'title' => 'Título del test',
//         'description' => 'Contenido del test',
//         'cicle_id' => $cicle->id,
//         'image' => $file
//     ]);

//     // Primero comprobamos que todo ha ido bien
//     $response->assertStatus(302);
//     // Comprobamos que hay 1 registro en la BD (se ha insertado)
//     $this->assertCount(1, Articles::all());
//     // Y comprobamos que sea el que acabamos de insertar
//     $article = Articles::first();
//     $this->assertEquals($article->title, 'Título del test');
//     $this->assertEquals($article->description, 'Contenido del test');
//     $this->assertEquals($article->cicle_id, $cicle->id);
// }

/** @test */
public function borrar_noticia_test() {

    $this->withoutExceptionHandling();

    // $cicle = new Cicles;
    // $cicle->name = 'Test';
    // $cicle->img = 'Test.png';
    // $cicle->save();
    
    // Storage::fake('articleImage');
    // $file = UploadedFile::fake()->image('articleImage.jpg');

    // $article = $this->post('/noticias2', [
    //     'title' => 'Título del test',
    //     'description' => 'Contenido del test',
    //     'cicle_id' => $cicle->id,
    //     'image' => $file
    // ]);

    $article = factory(Articles::class)->create();

    $response = $this->delete('/noticias2/' . $article->id);

    // Comprobamos que hay 0 registro en la BD (se ha insertado)
    $this->assertCount(0, Articles::all());
    $response->assertRedirect('/noticias2/');
   
}

}
