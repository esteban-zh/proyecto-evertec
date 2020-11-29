<?php

namespace Tests\Feature\Products;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile as HttpUploadedFile;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Tests\TestCase;

class ImportTest extends TestCase
{
   use RefreshDatabase;

   /**
     * @test
     */
   public function it_can_import_products()
   {
       $this->withoutMiddleware();
       //$this->withoutExceptionHandling();
       $importFile = $this->getUploadedFile();

       $response = $this->post($this->getRoute(), ['importFile' => $importFile]);
       $response->assertOk();
       $response->assertRedirect(route('panel'));
       //$response->assertViewIs('panel');

   }
 
   private function getRoute(): string
   {
       return route('products.import');
   }

   private function getUploadedFile(): UploadedFile
   {
       $filePath = base_path('tests/stubs/products-import.xlsx');
       return new UploadedFile($filePath, 'products-import.xlsx', null, null, true);
   }
}
