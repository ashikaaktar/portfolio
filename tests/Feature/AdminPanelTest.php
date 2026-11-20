<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    public function test_admin_can_access_filament_dashboard_and_resources(): void
    {
        $admin = User::where('email', 'admin@ashika.com')->first();
        $this->assertNotNull($admin);

        $this->actingAs($admin);

        $resources = [
            '/admin',
            '/admin/profiles',
            '/admin/skills',
            '/admin/services',
            '/admin/project-categories',
            '/admin/projects',
            '/admin/experiences',
            '/admin/education',
            '/admin/certifications',
            '/admin/categories',
            '/admin/posts',
            '/admin/contact-messages',
            '/admin/social-links',
            '/admin/settings',
        ];

        foreach ($resources as $url) {
            $response = $this->get($url);
            $response->assertStatus(200);
        }
    }
}
