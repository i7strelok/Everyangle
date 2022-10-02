<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    protected function successfulLoginRoute()
    {
        return route('home');
    }

    protected function loginPostRoute()
    {
        return route('login');
    }

    public function testListOfCategories()
    {
        $user = User::factory()->create([
            'password' => Hash::make($password = 'i-love-laravel'),
        ]);

        $response = $this->post($this->loginPostRoute(), [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect($this->successfulLoginRoute());
        $this->assertAuthenticatedAs($user);
        $this->get('/categories')
        ->assertStatus(200)
        ->assertSee('List of Categories');
    }
}
