<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Articles;
use App\Cicles;
use Laravel\Passport\ClientRepository;


class BorrarNoticiaTest extends TestCase
{
    use RefreshDatabase;

/** @test */
public function borrar_noticia_test() {

    $this->withoutExceptionHandling();

    $cicle = new Cicles;
    $cicle->name = 'Test';
    $cicle->img = 'Test.png';
    $cicle->save();
    
    Storage::fake('articleImage');
    $file = UploadedFile::fake()->image('articleImage.jpg');

    $article = new Articles;
    $article->title = 'Titulo del test';
    $article->description = 'Contenido del test';
    $article->cicle_id = $cicle->id;
    $article->image = $file;
    $article->save();

    $response = $this->delete('/noticias/' . $article->id);

    // Comprobamos que hay 0 registro en la BD (se ha insertado)
    $this->assertCount(0, Articles::all());
    $response->assertRedirect('/noticias/');
   
}

}
