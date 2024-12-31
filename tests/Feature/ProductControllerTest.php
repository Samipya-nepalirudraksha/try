<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_the_products_index()
    {
        $response = $this->get('/products');

        $response->assertStatus(200);
        $response->assertViewIs('products.index');
    }

    /** @test */
    public function it_can_create_a_product()
    {
        $response = $this->post('/products', [
            'name' => 'Test Product',
            'price' => 19.99,
            'quantity' => 10,
        ]);

        $response->assertRedirect('/products');
        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'price' => 19.99,
            'quantity' => 10,
        ]);
    }

    /** @test */
    public function it_can_update_a_product()
    {
        $product = Product::create([
            'name' => 'Old Product',
            'price' => 10.00,
            'quantity' => 5,
        ]);

        $response = $this->put("/products/{$product->id}", [
            'name' => 'Updated Product',
            'price' => 15.00,
            'quantity' => 8,
        ]);

        $response->assertRedirect('/products');
        $this->assertDatabaseHas('products', [
            'name' => 'Updated Product',
            'price' => 15.00,
            'quantity' => 8,
        ]);
    }

    /** @test */
    public function it_can_delete_a_product()
    {
        $product = Product::create([
            'name' => 'Product to Delete',
            'price' => 20.00,
            'quantity' => 3,
        ]);

        $response = $this->delete("/products/{$product->id}");

        $response->assertRedirect('/products');
        $this->assertDatabaseMissing('products', [
            'name' => 'Product to Delete',
        ]);
    }
}
