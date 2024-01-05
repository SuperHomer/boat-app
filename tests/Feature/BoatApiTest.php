<?php

namespace Tests\Feature;

use App\Models\Boat;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BoatApiTest extends TestCase
{
    use RefreshDatabase;

    protected int $validId;

    /**
     * Setup
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
        $this->validId = Boat::all()->first()->id;
    }

    public function testBoatIndex(): void
    {
        $response = $this->get('/api/boats');

        $response->assertStatus(200);
    }

    public function testBoatShow(): void
    {
        $response = $this->get('/api/boats/' . $this->validId);

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
        $response = $this->put('/api/boats/' . $this->validId, [
            'name' => 'Test Boat',
            'description' => 'Test Description',
            'image_path' => 'Test Image Path',
        ]);

        $response->assertStatus(200);
    }

    public function testBoatDestroy(): void
    {
        $response = $this->delete('/api/boats/' . $this->validId);

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
        $response = $this->get('/api/boats/' . $this->validId);

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
        $response = $this->put('/api/boats/' . $this->validId, [
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

    public function testBoatIdNotExists(): void
    {
        $response = $this->get('/api/boats/XXX');

        $response->assertStatus(404);
    }

    public function testBoatStoreRequiredFields(): void
    {
        $response = $this->post('/api/boats', [
            'name' => '',
            'description' => '',
            'image_path' => '',
        ]);

        $response->assertStatus(422);
    }

    public function testBoatUpdateRequiredFields(): void
    {
        $response = $this->put('/api/boats/' . $this->validId, [
            'name' => '',
            'description' => '',
            'image_path' => '',
        ]);

        $response->assertStatus(422);
    }

}
