<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Certification;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Service;
use App\Models\Skill;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $profile = Profile::first() ?? new Profile;
        $skills = Skill::orderBy('order')->get()->groupBy('category');
        $services = Service::where('is_active', true)->orderBy('order')->get();
        $featuredProjects = Project::with('category')->where('is_featured', true)->orderBy('order')->take(6)->get();
        $projectCategories = ProjectCategory::orderBy('order')->get();
        $experiences = Experience::orderBy('order')->get();
        $educations = Education::orderBy('order')->get();
        $certifications = Certification::orderBy('order')->get();
        $latestPosts = Post::with('category')->where('is_published', true)->orderByDesc('published_at')->take(3)->get();
        $socialLinks = SocialLink::where('is_active', true)->orderBy('order')->get();

        return view('portfolio.index', compact(
            'profile',
            'skills',
            'services',
            'featuredProjects',
            'projectCategories',
            'experiences',
            'educations',
            'certifications',
            'latestPosts',
            'socialLinks'
        ));
    }

    public function projects(Request $request)
    {
        $categories = ProjectCategory::orderBy('order')->get();
        $activeCategory = $request->query('category');

        $query = Project::with('category')->orderBy('order');
        if ($activeCategory) {
            $query->whereHas('category', fn ($q) => $q->where('slug', $activeCategory));
        }
        $projects = $query->paginate(9)->withQueryString();
        $profile = Profile::first();

        return view('portfolio.projects', compact('projects', 'categories', 'activeCategory', 'profile'));
    }

    public function projectDetail(string $slug)
    {
        $project = Project::with('category')->where('slug', $slug)->firstOrFail();
        $relatedProjects = Project::with('category')
            ->where('id', '!=', $project->id)
            ->where('category_id', $project->category_id)
            ->take(3)
            ->get();
        $profile = Profile::first();

        return view('portfolio.project-detail', compact('project', 'relatedProjects', 'profile'));
    }

    public function blog(Request $request)
    {
        $categories = Category::withCount('posts')->orderBy('order')->get();
        $activeCategory = $request->query('category');
        $search = $request->query('q');

        $query = Post::with('category')->where('is_published', true)->orderByDesc('published_at');

        if ($activeCategory) {
            $query->whereHas('category', fn ($q) => $q->where('slug', $activeCategory));
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title_en', 'like', "%{$search}%")
                    ->orWhere('title_bn', 'like', "%{$search}%")
                    ->orWhere('content_en', 'like', "%{$search}%")
                    ->orWhere('content_bn', 'like', "%{$search}%");
            });
        }

        $posts = $query->paginate(6)->withQueryString();
        $profile = Profile::first();

        return view('portfolio.blog', compact('posts', 'categories', 'activeCategory', 'search', 'profile'));
    }

    public function postDetail(string $slug)
    {
        $post = Post::with('category')->where('slug', $slug)->where('is_published', true)->firstOrFail();
        $relatedPosts = Post::with('category')
            ->where('id', '!=', $post->id)
            ->where('category_id', $post->category_id)
            ->where('is_published', true)
            ->take(3)
            ->get();
        $profile = Profile::first();
        $socialLinks = SocialLink::where('is_active', true)->orderBy('order')->get();

        return view('portfolio.post-detail', compact('post', 'relatedPosts', 'profile', 'socialLinks'));
    }

    public function switchLocale(string $lang)
    {
        if (in_array($lang, ['en', 'bn'])) {
            session(['locale' => $lang]);
        }

        return redirect()->back();
    }

    public function downloadCv()
    {
        $profile = Profile::first();
        if ($profile && $profile->cv_path && file_exists(storage_path('app/public/'.$profile->cv_path))) {
            return response()->download(storage_path('app/public/'.$profile->cv_path), 'Ashika_Resume.pdf');
        }

        // Return a clean printable HTML resume if PDF file has not yet been uploaded
        return view('portfolio.cv', compact('profile'));
    }

    public function sitemap()
    {
        $projects = Project::select('slug', 'updated_at')->get();
        $posts = Post::where('is_published', true)->select('slug', 'updated_at')->get();

        $content = view('portfolio.sitemap', compact('projects', 'posts'))->render();

        return response($content, 200)->header('Content-Type', 'text/xml');
    }

    public function robots()
    {
        $robots = "User-agent: *\nAllow: /\nDisallow: /admin\nSitemap: ".url('/sitemap.xml');

        return response($robots, 200)->header('Content-Type', 'text/plain');
    }
}
