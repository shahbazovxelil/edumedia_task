<?php

namespace Tests\Feature;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use DatabaseMigrations, WithFaker,DatabaseTransactions;


    public function test_index_redirects_to_login_for_unauthenticated_user()
    {
        // Make a GET request to the index route
        $response = $this->get(route('backend.users.index'));

        // Assert that the response status is 302
        $response->assertStatus(302);

        // Assert that the response redirects to the login page
        $response->assertRedirect(route('backend.login'));
    }

    public function test_index_returns_view_for_authenticated_user()
    {
        // Create a user and authenticate
        $user = User::factory()->create();
        $this->actingAs($user);

        // Make a GET request to the index route
        $response = $this->get(route('backend.users.index'));

        // Assert that the response status is 200
        $response->assertStatus(200);

        // Assert that the response view is 'backend.users.index'
        $response->assertViewIs('backend.users.index');
    }

    public function test_create_redirects_to_login_for_unauthenticated_user()
    {
        // Make a GET request to the index route
        $response = $this->get(route('backend.users.create'));

        // Assert that the response status is 302
        $response->assertStatus(302);

        // Assert that the response redirects to the login page
        $response->assertRedirect(route('backend.login'));
    }

    public function test_create_returns_view_for_authenticated_user()
    {
        // Create a user and authenticate
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'username' => 'admin',
            'phone' => '1234567890',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
        $this->actingAs($user);

        // Make a GET request to the index route
        $response = $this->get(route('backend.users.create'));

        // Assert that the response status is 200
        $response->assertStatus(200);

        // Assert that the response view is 'backend.users.index'
        $response->assertViewIs('backend.users.create');
    }

    public function testStoreMethodCreatesNewUserAndRedirectsToIndexPage()
    {
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'username' => 'admin',
            'phone' => '1234567890',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
        $this->actingAs($user);
        $this->withoutExceptionHandling();

        $requestData = [
            'name' => 'John Doe',
            'username' => 'test',
            'phone' => '121212',
            'role' => 'user',
            'email' => 'johndoe@example.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ];

        $userRequest = new StoreUserRequest($requestData);
        $userRepositoryMock = $this->mock(UserRepositoryInterface::class);
        $userRepositoryMock->shouldReceive('create')->once();

        $response = $this->post(route('backend.users.store'), $requestData);

        $response->assertStatus(302);
        $response->assertRedirect(route('backend.users.index'));
        $response->assertSessionHas('success', 'əlave etdiniz');
    }
    public function testEditMethodShowsUserForEditing()
    {
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'username' => 'admin',
            'phone' => '1234567890',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
        $this->actingAs($user);

        $userRepositoryMock = $this->mock(UserRepositoryInterface::class);
        $userRepositoryMock->shouldReceive('find')->once()->andReturn($user);

        // Edit an existing user
        $response = $this->get(route('backend.users.edit', ['user' => $user->id]));

        if (!$user) {
            $response->assertStatus(404);
            return;
        }

        $response->assertStatus(200);
        $response->assertViewIs('backend.users.edit');
        $response->assertViewHas('user', $user);
    }
    public function testUpdateMethodUpdatesUserAndRedirectsToIndexPage()
    {
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'username' => 'admin',
            'phone' => '1234567890',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
        $this->actingAs($user);

        $requestData = [
            'name' => 'Updated Name',
            'username' => 'updated_username',
            'phone' => '123456',
            'role' => 'user',
            'email' => 'updated-email@example.com',
            'password' => 'new-password',
            'password_confirmation' => 'new-password'
        ];

        $response = $this->put(route('backend.users.update', ['user' => $user->id]), $requestData);

        $response->assertRedirect(route('backend.users.index'));
        $response->assertSessionHas('success', 'yeniləmə etdiniz');
        // Verify that user has been updated with the new data
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => $requestData['name'],
            'username' => $requestData['username'],
            'phone' => $requestData['phone'],
            'role' => $requestData['role'],
            'email' => $requestData['email']
        ]);
    }
    public function testDestroyMethodDeletesUserAndReturnsJsonResponse()
    {
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'username' => 'admin',
            'phone' => '1234567890',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
        $this->actingAs($user);

        $userRepositoryMock = $this->mock(UserRepositoryInterface::class);
        $userRepositoryMock->shouldReceive('delete')->once();

        $response = $this->delete(route('backend.users.destroy', ['user' => $user->id]));

        $response->assertStatus(200);
        $response->assertJson(['success' => '1']);
    }


}
