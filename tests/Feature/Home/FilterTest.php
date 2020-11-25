<?php

namespace Tests\Feature\Home;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class FilterTest extends TestCase
{
    use RefreshDatabase;

     /**
     * @test
     */
    public function it_can_search_products_in_home()
    {
        factory(User::class, 20);
        $user = factory(User::class)->create();
        //$userA = factory(User::class)->create();
        factory(Product::class,20);
        $product = factory( Product::class)->create();
         

        $filters = [
             'filter' => [
                 'name' => 'nombre del producto'
             ]
        ];

        $response = $this->actingAs($user)
            ->get(route('home', $filters));

        $responseProducts = $response->getOriginalContent()['products'];
        
        dd($responseProducts->first()->id, $product->$product->id);

        $this->assertEquals($responseProducts->first()->id, $product->id);
    }
     
}
