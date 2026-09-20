<?php

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

it('displays the products page', function () {
    Product::factory()->create([
        'name' => 'MacBook Pro',
        'price' => 1999.99,
    ]);

    $response = $this->get('/products');

    $response
        ->assertOk()
        ->assertSee('MacBook Pro');
});

it('displays multiple products', function () {
    Product::factory()->count(3)->create();

    $response = $this->get('/products');

    $response->assertOk();

    expect(Product::count())->toBe(3);
});

it('can create a product through the crud form', function () {
    $response = $this->post('/products', [
        'name' => 'Laravel Book',
        'price' => 49.90,
        'active' => true,
    ]);

    $response->assertRedirect('/products');
    $this->assertDatabaseHas('products', [
        'name' => 'Laravel Book',
        'price' => 49.90,
    ]);
});

it('can update a product through the crud form', function () {
    $product = Product::factory()->create([
        'name' => 'Old name',
        'price' => 10.00,
    ]);

    $response = $this->put('/products/'.$product->id, [
        'name' => 'New name',
        'price' => 25.50,
        'active' => true,
    ]);

    $response->assertRedirect('/products');
    $this->assertDatabaseHas('products', [
        'id' => $product->id,
        'name' => 'New name',
        'price' => 25.50,
    ]);
});

it('can delete a product', function () {
    $product = Product::factory()->create();

    $response = $this->delete('/products/'.$product->id);

    $response->assertRedirect('/products');
    $this->assertDatabaseMissing('products', [
        'id' => $product->id,
    ]);
});

uses(RefreshDatabase::class);

it('can create a product in database', function () {
    $product = Product::factory()->create([
        'name' => 'Laravel Book',
        'price' => 49.90,
    ]);

    expect($product)
        ->name->toBe('Laravel Book');

    $this->assertDatabaseHas('products', [
        'name' => 'Laravel Book',
        'price' => 49.90,
    ]);
});