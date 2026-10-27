<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    public function test_user_can()
    {
        $user = User::factory()->create([
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
        ]);
        $this->assertDatabaseHas('users', [
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
        ]);
    }
    public function test_user_cant()
    {
        User::factory()->create([
            'email' => 'second@example.com',
        ]);
        $this->expectException(\Illuminate\Database\QueryException::class);

        User::factory()->create([
            'email' => 'second@example.com',
        ]);
    }
}
