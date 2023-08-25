<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Reservation_status;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Reservation_statusTest extends TestCase
{
    use  RefreshDatabase;

    protected $endpoint = '/api/reservation_statuses';
    protected $tableName = 'reservation_statuses';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateReservation_status(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = Reservation_status::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllReservation_statusesSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Reservation_status::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(Reservation_status::first(rand(1, 5))->name);
    }

    public function testViewAllReservation_statusesByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Reservation_status::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateReservation_statusValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewReservation_statusData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Reservation_status::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(Reservation_status::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateReservation_status(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Reservation_status::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteReservation_status(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Reservation_status::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, Reservation_status::count());
    }
    
    public function testRestoreReservation_status(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Reservation_status::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->json('GET', $this->endpoint.'/1/restore')
             ->assertStatus(200);

        $this->assertDatabaseHas($this->tableName, [
            'id'         => 1,
            'deleted_at' => null,
        ]);
    }

    public function testPermanentReservation_status(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Reservation_status::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->json('DELETE', $this->endpoint.'/1/permanent-delete')
             ->assertStatus(204);

        $this->assertDatabaseMissing($this->tableName, ['id' => 1]);
    }
}
