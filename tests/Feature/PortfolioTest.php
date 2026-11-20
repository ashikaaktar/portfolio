<?php

namespace Tests\Feature;

use App\Livewire\ContactForm;
use App\Mail\ContactMessageReceived;
use App\Models\Post;
use App\Models\Project;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class PortfolioTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    public function test_homepage_loads_successfully(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('ASHIKA');
        $response->assertSee('Digital Marketer & Developer');
    }

    public function test_bilingual_language_switching(): void
    {
        $response = $this->get('/locale/bn');
        $response->assertRedirect();
        $this->assertEquals('bn', session('locale'));

        $home = $this->withSession(['locale' => 'bn'])->get('/');
        $home->assertStatus(200);
        $home->assertSee('আশিকা');
    }

    public function test_projects_archive_and_detail(): void
    {
        $response = $this->get('/projects');
        $response->assertStatus(200);

        $project = Project::first();
        $this->assertNotNull($project);
        $detail = $this->get('/projects/'.$project->slug);
        $detail->assertStatus(200);
        $detail->assertSee($project->title);
    }

    public function test_blog_archive_and_detail(): void
    {
        $response = $this->get('/blog');
        $response->assertStatus(200);

        $post = Post::first();
        $this->assertNotNull($post);
        $detail = $this->get('/blog/'.$post->slug);
        $detail->assertStatus(200);
        $detail->assertSee($post->title);
    }

    public function test_livewire_contact_form_submits_message(): void
    {
        Mail::fake();

        Livewire::test(ContactForm::class)
            ->set('name', 'Hasan Mahmud')
            ->set('email', 'hasan@example.com')
            ->set('subject', 'E-Commerce Website Development')
            ->set('message', 'We would love to hire you to build an online marketplace for our retail business.')
            ->call('submit')
            ->assertHasNoErrors()
            ->assertSet('isSubmitted', true);

        $this->assertDatabaseHas('contact_messages', [
            'email' => 'hasan@example.com',
            'name' => 'Hasan Mahmud',
        ]);

        Mail::assertSent(ContactMessageReceived::class, function ($mail) {
            return $mail->hasTo('ashikaaktar99@gmail.com');
        });
    }

    public function test_contact_information_is_displayed(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('ashikaaktar99@gmail.com');
        $response->assertSee('mailto:ashikaaktar99@gmail.com', false);
        $response->assertSee('+8801938267920');
    }

    public function test_sitemap_and_robots_txt(): void
    {
        $sitemap = $this->get('/sitemap.xml');
        $sitemap->assertStatus(200);
        $this->assertStringStartsWith('text/xml', (string) $sitemap->headers->get('Content-Type'));

        $robots = $this->get('/robots.txt');
        $robots->assertStatus(200);
        $robots->assertSee('User-agent: *');
    }

    public function test_admin_panel_is_accessible(): void
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
    }
}
