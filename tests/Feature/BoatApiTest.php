<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BoatApiTest extends TestCase
{
    use RefreshDatabase;

    public function testBoatIndex(): void
    {
        $response = $this->get('/api/boats');

        $response->assertStatus(200);
    }

    public function testBoatShow(): void
    {
        $response = $this->get('/api/boats/1');

        $response->assertStatus(200);
    }

    public function testBoatStore(): void
    {
        $response = $this->post('/api/boats', [
            'name' => 'Test Boat',
            'description' => 'Test Description',
            'image_path' => 'Test Image Path',
        ]);

        $response->assertStatus(201);
    }

    public function testBoatUpdate(): void
    {
        $response = $this->put('/api/boats/1', [
            'name' => 'Test Boat',
            'description' => 'Test Description',
            'image_path' => 'Test Image Path',
        ]);

        $response->assertStatus(200);
    }

    public function testBoatDestroy(): void
    {
        $response = $this->delete('/api/boats/1');

        $response->assertStatus(200);
    }

    public function testBoatIndexJson(): void
    {
        $response = $this->get('/api/boats');

        $response->assertJsonStructure([
            '*' => [
                'id',
                'name',
                'description',
                'image_path',
                'created_at',
                'updated_at',
            ],
        ]);
    }

    public function testBoatShowJson(): void
    {
        $response = $this->get('/api/boats/1');

        $response->assertJsonStructure([
            'id',
            'name',
            'description',
            'image_path',
            'created_at',
            'updated_at',
        ]);
    }

    public function testBoatStoreJson(): void
    {
        $response = $this->post('/api/boats', [
            'name' => 'Test Boat',
            'description' => 'Test Description',
            'image_path' => 'Test Image Path',
        ]);

        $response->assertJsonStructure([
            'id',
            'name',
            'description',
            'image_path',
            'created_at',
            'updated_at',
        ]);
    }

    public function testBoatUpdateJson(): void
    {
        $response = $this->put('/api/boats/1', [
            'name' => 'Test Boat',
            'description' => 'Test Description',
            'image_path' => 'Test Image Path',
        ]);

        $response->assertJsonStructure([
            'id',
            'name',
            'description',
            'image_path',
            'created_at',
            'updated_at',
        ]);
    }

    public function testBoatDestroyJson(): void
    {
        $response = $this->delete('/api/boats/1');

        $response->assertJsonStructure([
            'id',
            'name',
            'description',
            'image_path',
            'created_at',
            'updated_at',
        ]);
    }

    public function testBoatIndexJsonCount(): void
    {
        $response = $this->get('/api/boats');

        $response->assertJsonCount(10);
    }

    public function testBoatStoreJsonCount(): void
    {
        $response = $this->post('/api/boats', [
            'name' => 'Test Boat',
            'description' => 'Test Description',
            'image_path' => 'Test Image Path',
        ]);

        $response->assertJsonCount(1);
    }

    public function testBoatUpdateJsonCount(): void
    {
        $response = $this->put('/api/boats/1', [
            'name' => 'Test Boat',
            'description' => 'Test Description',
            'image_path' => 'Test Image Path',
        ]);

        $response->assertJsonCount(1);
    }

    public function testBoatDestroyJsonCount(): void
    {
        $response = $this->delete('/api/boats/1');

        $response->assertJsonCount(1);
    }


}
