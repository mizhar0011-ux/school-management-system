<?php

use App\Models\User;

test('guests are redirected to the login page', function () {
    $response = $this->get('/dashboard');
    $response->assertRedirect('/login');
});

test('authenticated students can visit the dashboard', function () {
    $user = User::factory()->create([
        'role' => 'student',
        'status' => 'approved',
        'email_verified_at' => now(),
    ]);

    $this->actingAs($user);

    $response = $this->get('/dashboard');

    $response->assertStatus(200);
});
