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


class CrearNoticiaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function crear_noticia_test() {

        $this->withoutExceptionHandling();

        $cicle = new Cicles;
        $cicle->name = 'Test';
        $cicle->img = 'Test.png';
        $cicle->save();
        
        Storage::fake('articleImage');
        $file = UploadedFile::fake()->image('articleImage.jpg');

        $response = $this->post('/noticias', [
            'title' => 'Título del test',
            'description' => 'Contenido del test',
            'cicle_id' => $cicle->id,
            'image' => $file
        ]);

        // Primero comprobamos que todo ha ido bien
        $response->assertStatus(302);
        // Comprobamos que hay 1 registro en la BD (se ha insertado)
        $this->assertCount(1, Articles::all());
        // Y comprobamos que sea el que acabamos de insertar
        $article = Articles::first();
        $this->assertEquals($article->title, 'Título del test');
        $this->assertEquals($article->description, 'Contenido del test');
        $this->assertEquals($article->cicle_id, $cicle->id);
    }

}
