<?php

use App\Clients\Tickets\ITickets;
use Database\Factories\Tickets\EventFactory;
use Database\Factories\Tickets\PlaceFactory;
use Database\Factories\Tickets\ReserveFactory;
use Database\Factories\Tickets\ShowFactory;

uses(Tests\TestCase::class);

test('GET /api/v1/ticket/shows get list 200', function () {
    $count = 3;
    $showListResponse = ShowFactory::new()->makeListResponse(count: $count);

    $this->mock(ITickets::class)->allows([
        'shows' => $showListResponse->get('data'),
    ]);

    $this->get('/api/v1/ticket/shows')
        ->assertStatus(200)
        ->assertJsonCount($count, 'data')
        ->assertJsonPath('data.0.id', $showListResponse->get('data')[0]->id);
});

test('GET /api/v1/ticket/shows/{showId}/events get list 200', function () {
    $showId = 123;
    $count = 3;
    $eventListResponse = EventFactory::new()
        ->makeListResponse(
            ['showId' => $showId],
            $count,
        );

    $this->mock(ITickets::class)->allows([
        'events' => $eventListResponse->get('data'),
    ]);

    $this->get('/api/v1/ticket/shows/' . $showId . '/events')
        ->assertStatus(200)
        ->assertJsonCount($count, 'data')
        ->assertJsonPath('data.0.show_id', $showId);
});

test('GET /api/v1/ticket/events/{eventId}/places get list 200', function () {
    $eventId = 123;
    $showListResponse = PlaceFactory::new()
        ->makeListResponse();

    $this->mock(ITickets::class)->allows([
        'places' => $showListResponse->get('data'),
    ]);

    $this->get('/api/v1/ticket/events/' . $eventId . '/places')
        ->assertStatus(200);
});

test('POST /api/v1/ticket/events/{eventId}/reserve 200', function () {
    $eventId = 123;
    $placeResponse = ReserveFactory::new()
        ->makeResponse();

    $this->mock(ITickets::class)->allows([
        'reserve' => $placeResponse->get('data'),
    ]);

    $request = [
        'name' => 'customer',
        'places' => [1, 2, 3],
    ];

    $this->post('/api/v1/ticket/events/' . $eventId . '/reserve', $request)
        ->assertStatus(200);
});

test('POST /api/v1/ticket/events/{eventId}/reserve 400', function () {
    $eventId = 123;
    $placeResponse = ReserveFactory::new()
        ->makeResponse();

    $this->mock(ITickets::class)->allows([
        'reserve' => $placeResponse->get('data'),
    ]);

    $this->post('/api/v1/ticket/events/' . $eventId . '/reserve')
        ->assertStatus(400);
});
