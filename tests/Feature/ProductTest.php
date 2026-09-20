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