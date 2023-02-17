<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\articles;

class PostManagementTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */

    public function login_test() {

        $this->withoutExceptionHandling();
        $user = User::create([
            'name' => 'usuario',
            'surname' => 'prueba',
            'email' => 'emailprueba@gmail.com',
            'cicle_id' => '1',
            'password' => '12345678',
        ]);        
    
        $response = $this->post('/login', [
            'email' => 'emailprueba@gmail.com',
            'password' => '12345678',
        ]);
    
        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);

    }

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

    /** @test */
public function crear_noticia_test() {
    $response = $this->post('/noticias', [
        'title' => 'Noticia prueba test',
        'descripcion' => 'prueba crear noticia'
    ]);

    // Primero comprobamos que todo ha ido bien
    $response->assertStatus(200);
    // Comprobamos que hay 1 registro en la BD (se ha insertado)
    $this->assertCount(1, Articles::all());
    // Y comprobamos que sea el que acabamos de insertar
    $article = Articles::first();
    $this->assertEquals($article->title, 'Noticia prueba test');
    $this->assertEquals($article->description, 'prueba crear noticia');
}

/** @test */
public function borrar_noticia_test() {
    $this->withoutExceptionHandling();

    $article = Articles::create([
        'title' => 'Noticia prueba borrar',
        'description' => 'prueba borrar',
    ]);   

    $response = $this->delete('/noticias/' . $article->id);

    // Comprobamos que hay 0 registros en la BD (se ha insertado)
    $this->assertCount(0, Articles::all());

    $response->assertRedirect('/noticias/');
}

}
