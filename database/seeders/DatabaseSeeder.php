<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Certification;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\SocialLink;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@ashika.com'],
            [
                'name' => 'Ashika',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Profile
        Profile::updateOrCreate(
            ['id' => 1],
            [
                'name' => 'Ashika',
                'title_en' => 'Digital Marketer & Developer',
                'title_bn' => 'ডিজিটাল মার্কেটার এবং ফুল-স্ট্যাক ডেভেলপার',
                'headline_en' => 'I Build Digital Experiences & Grow Businesses.',
                'headline_bn' => 'আমি ডিজিটাল প্রযুক্তি ও ক্রিয়েটিভ সলিউশনের মাধ্যমে ব্যবসাকে এগিয়ে নিতে কাজ করি।',
                'tagline_en' => 'Combining modern web development with data-driven marketing strategies to accelerate brand growth and build memorable digital products.',
                'tagline_bn' => 'আধুনিক ওয়েব ডেভেলপমেন্ট এবং ডাটা-চালিত মার্কেটিং কৌশলের সমন্বয়ে ব্র্যান্ড গ্রোথ ও প্রিমিয়াম ডিজিটাল এক্সপেরিয়েন্স তৈরি করি।',
                'bio_en' => 'Hi, I am Ashika, a passionate Digital Marketer and Full-Stack Developer based in Bangladesh. With over 4 years of experience, I bridge the gap between creative code and impactful marketing funnels. Whether building high-performing web applications or scaling conversion-driven ad campaigns, I deliver measurable results.',
                'bio_bn' => 'হ্যালো, আমি আশিকা — একজন প্রফেশনাল ডিজিটাল মার্কেটার এবং ফুল-স্ট্যাক ডেভেলপার। চার বছরেরও বেশি বাস্তব অভিজ্ঞতা নিয়ে আমি আধুনিক কোডিং এবং ডাটা-ড্রিভেন মার্কেটিং স্ট্র্যাটেজির মাধ্যমে যেকোনো ব্র্যান্ডের সেলস ও ডিজিটাল পরিচিতি বৃদ্ধি করতে সহায়তা করি।',
                'about_en' => 'I specialize in creating bespoke digital experiences that engage users and convert visitors into loyal customers. My dual expertise in technical engineering (Laravel, PHP, Tailwind CSS, JavaScript) and growth marketing (SEO, Meta Ads, Google Ads, AI Content Creation) empowers businesses with end-to-end digital solutions from architecture to conversion optimization.',
                'about_bn' => 'আমি এমন ডিজিটাল এক্সপেরিয়েন্স তৈরিতে বিশ্বাস করি যা গ্রাহকদের আকর্ষণ করে এবং সাধারণ ভিজিটরকে স্থায়ী ক্লায়েন্টে রূপান্তর করে। টেকনিক্যাল ইঞ্জিনিয়ারিং (লারাভেল, পিএইচপি, টেলউইন্ড) ও গ্রোথ মার্কেটিং (এসইও, মেটা অ্যাডস, গুগল অ্যাডস) এ আমার দ্বিমুখী অভিজ্ঞতা আপনার ব্যবসাকে দেবে সম্পূর্ণ ডিজিটাল সল্যুশন।',
                'career_goals_en' => 'To help global brands and high-growth ventures craft world-class software, maximize search visibility, and engineer automated marketing engines that generate sustainable revenue.',
                'career_goals_bn' => 'বিশ্বমানের সফটওয়্যার ও অটোমেটেড মার্কেটিং সিস্টেম তৈরির মাধ্যমে দেশি ও আন্তর্জাতিক ব্যবসাকে টেকসই প্রবৃদ্ধি অর্জনে সহায়তা করা।',
                'profile_image' => null,
                'hero_image' => null,
                'cv_path' => null,
                'email' => 'ashikaaktar99@gmail.com',
                'phone' => '+8801938267920',
                'whatsapp_number' => '+8801938267920',
                'whatsapp_link' => 'https://wa.me/8801938267920',
                'location_en' => 'Dhaka, Bangladesh',
                'location_bn' => 'ঢাকা, বাংলাদেশ',
                'years_of_experience' => 4,
                'completed_projects' => 50,
                'happy_clients' => 42,
                'satisfaction_rate' => 99,
            ]
        );

        // 3. Skills (Configurable proficiency percentages)
        $skills = [
            // Digital Marketing
            ['category' => 'Digital Marketing', 'name' => 'SEO', 'proficiency_percent' => 92, 'icon' => 'search', 'order' => 1],
            ['category' => 'Digital Marketing', 'name' => 'Social Media Marketing', 'proficiency_percent' => 95, 'icon' => 'share-2', 'order' => 2],
            ['category' => 'Digital Marketing', 'name' => 'Facebook Ads', 'proficiency_percent' => 96, 'icon' => 'target', 'order' => 3],
            ['category' => 'Digital Marketing', 'name' => 'Google Ads', 'proficiency_percent' => 88, 'icon' => 'bar-chart-3', 'order' => 4],
            ['category' => 'Digital Marketing', 'name' => 'Social Media Management', 'proficiency_percent' => 94, 'icon' => 'users', 'order' => 5],

            // Development
            ['category' => 'Development', 'name' => 'HTML5 / Modern Markup', 'proficiency_percent' => 98, 'icon' => 'code', 'order' => 6],
            ['category' => 'Development', 'name' => 'CSS3 / Tailwind CSS', 'proficiency_percent' => 95, 'icon' => 'palette', 'order' => 7],
            ['category' => 'Development', 'name' => 'JavaScript (ES6+ & Alpine.js)', 'proficiency_percent' => 88, 'icon' => 'cpu', 'order' => 8],
            ['category' => 'Development', 'name' => 'PHP (8.3+)', 'proficiency_percent' => 92, 'icon' => 'server', 'order' => 9],
            ['category' => 'Development', 'name' => 'Laravel (11 / 12 / 13)', 'proficiency_percent' => 94, 'icon' => 'layers', 'order' => 10],
            ['category' => 'Development', 'name' => 'MySQL / Database Architecture', 'proficiency_percent' => 90, 'icon' => 'database', 'order' => 11],
            ['category' => 'Development', 'name' => 'Livewire & Full-Stack UI', 'proficiency_percent' => 91, 'icon' => 'zap', 'order' => 12],

            // Creative Skills
            ['category' => 'Creative Skills', 'name' => 'Video Editing', 'proficiency_percent' => 90, 'icon' => 'video', 'order' => 13],
            ['category' => 'Creative Skills', 'name' => 'Graphic Design', 'proficiency_percent' => 93, 'icon' => 'image', 'order' => 14],
            ['category' => 'Creative Skills', 'name' => 'Motion Graphics', 'proficiency_percent' => 85, 'icon' => 'film', 'order' => 15],
            ['category' => 'Creative Skills', 'name' => 'AI Content Creation', 'proficiency_percent' => 94, 'icon' => 'sparkles', 'order' => 16],
        ];

        foreach ($skills as $s) {
            Skill::updateOrCreate(
                ['name' => $s['name']],
                $s + ['is_featured' => true]
            );
        }

        // 4. Services (The 8 Services required in PRD 4.4)
        $services = [
            [
                'slug' => 'website-development',
                'title_en' => 'Website Development',
                'title_bn' => 'ওয়েবসাইট ডেভেলপমেন্ট',
                'description_en' => 'High-performance, ultra-responsive modern websites crafted with clean semantic code, lightning speed, and mobile-first responsive architecture.',
                'description_bn' => 'উচ্চ গতির এবং আধুনিক রেসপনসিভ ওয়েবসাইট যা যেকোনো ডিভাইসে নিখুঁতভাবে লোড হয় এবং ব্র্যান্ড ভ্যালু বহুগুণ বৃদ্ধি করে।',
                'icon' => 'globe',
                'features_en' => ['Responsive Layouts for all screens', 'Clean SEO-friendly code', 'Lightning fast loading speeds', 'Custom interaction & animations'],
                'features_bn' => ['সকল ডিভাইসের জন্য রেসপনসিভ লেআউট', 'সার্চ ইঞ্জিন বান্ধব ক্লিন কোড', 'অসাধারণ স্পিড অপ্টিমাইজেশন', 'আধুনিক ইন্টারঅ্যাকশন ও অ্যানিমেশন'],
                'tag_en' => 'Web Architecture',
                'tag_bn' => 'ওয়েব ডিজাইন',
                'order' => 1,
            ],
            [
                'slug' => 'web-application-development',
                'title_en' => 'Web Application Development',
                'title_bn' => 'ওয়েব অ্যাপ্লিকেশন ডেভেলপমেন্ট',
                'description_en' => 'Bespoke dynamic web applications, robust client dashboards, and secure backend platforms powered by Laravel, MySQL, and modern reactive frontends.',
                'description_bn' => 'লারাভেল ও মাইএসকিউএল দিয়ে সুরক্ষিত, স্কেলেবল কাস্টম ওয়েব অ্যাপ্লিকেশন এবং অ্যাডমিন ড্যাশবোর্ড তৈরি।',
                'icon' => 'layout',
                'features_en' => ['Robust Laravel backend', 'Livewire reactive interface', 'Role-based access & authentication', 'REST APIs & payment gateway integration'],
                'features_bn' => ['শক্তিশালী লারাভেল ব্যাকএন্ড', 'লাইভওয়্যার রিঅ্যাকটিভ ইন্টারফেস', 'সুরক্ষিত অ্যাডমিন ড্যাশবোর্ড', 'এপিআই ও পেমেন্ট গেটওয়ে সংহতকরণ'],
                'tag_en' => 'Full-Stack Engineering',
                'tag_bn' => 'ফুল-স্ট্যাক সফটওয়্যার',
                'order' => 2,
            ],
            [
                'slug' => 'digital-marketing',
                'title_en' => 'Digital Marketing',
                'title_bn' => 'ডিজিটাল মার্কেটিং',
                'description_en' => 'Comprehensive 360° digital marketing plans that elevate brand awareness, generate qualified leads, and maximize your return on ad spend (ROAS).',
                'description_bn' => 'পূর্ণাঙ্গ ডিজিটাল মার্কেটিং সমাধান যা আপনার ব্র্যান্ডের পরিচিতি বৃদ্ধি করে এবং বিক্রয় ও আরওআই বহুগুণ বাড়িয়ে তোলে।',
                'icon' => 'trending-up',
                'features_en' => ['Data-driven marketing funnel', 'Audience research & targeting', 'Competitor benchmarking', 'Performance analytics & reporting'],
                'features_bn' => ['ডাটা-চালিত মার্কেটিং ফানেল', 'টার্গেটেড অডিয়েন্স রিসার্চ', 'প্রতিযোগী বিশ্লেষণ', 'পারফরম্যান্স অ্যানালিটিক্স রিপোর্ট'],
                'tag_en' => 'Growth & Reach',
                'tag_bn' => 'গ্রোথ স্ট্র্যাটেজি',
                'order' => 3,
            ],
            [
                'slug' => 'social-media-management',
                'title_en' => 'Social Media Management',
                'title_bn' => 'সোশ্যাল মিডিয়া ম্যানেজমেন্ট',
                'description_en' => 'Strategic content curation, scheduling, community engagement, and brand storytelling across Facebook, Instagram, LinkedIn, and YouTube.',
                'description_bn' => 'ফেসবুক, ইনস্টাগ্রাম, লিংকডইন পেজের সার্বিক কনটেন্ট প্ল্যানিং, ব্র্যান্ডিং এবং নিয়মিত কমিউনিটি এনগেজমেন্ট পরিচালনা।',
                'icon' => 'message-circle',
                'features_en' => ['Monthly content calendar', 'Engaging visual posts & copy', 'Audience interaction & messaging', 'Growth metrics monitoring'],
                'features_bn' => ['মাসিক কনটেন্ট ক্যালেন্ডার', 'আকর্ষণীয় পোস্ট ডিজাইন ও কপিরাইটিং', 'নিয়মিত কাস্টমার কমিউনিকেশন', 'ফলোয়ার ও রিচ গ্রোথ ট্র্যাকিং'],
                'tag_en' => 'Brand Presence',
                'tag_bn' => 'সোশ্যাল ব্র্যান্ডিং',
                'order' => 4,
            ],
            [
                'slug' => 'video-editing',
                'title_en' => 'Video Editing',
                'title_bn' => 'ভিডিও এডিটিং',
                'description_en' => 'High-retention commercial video editing, social reels, YouTube videos, and brand promos featuring smooth cuts, dynamic color grading, and sound design.',
                'description_bn' => 'সোশ্যাল মিডিয়া রিলস, বিজ্ঞাপনী ভিডিও এবং ইউটিউব কনটেন্টের আধুনিক ও হাই-রিটেনশন ভিডিও এডিটিং।',
                'icon' => 'film',
                'features_en' => ['4K commercial editing', 'Sound effects & music mastering', 'Color correction & grading', 'Dynamic transitions & captions'],
                'features_bn' => ['৪কে কমার্শিয়াল এডিটিং', 'সাউন্ড ইফেক্ট ও ব্যাকগ্রাউন্ড মিউজিক', 'কালার গ্রেডিং', 'আকর্ষণীয় ট্রানজিশন ও ক্যাপশন'],
                'tag_en' => 'Visual Storytelling',
                'tag_bn' => 'ভিডিও প্রোডাকশন',
                'order' => 5,
            ],
            [
                'slug' => 'graphic-design',
                'title_en' => 'Graphic Design',
                'title_bn' => 'গ্রাফিক ডিজাইন',
                'description_en' => 'Creative brand visual identities, marketing collateral, promotional banners, social graphics, and professional packaging concepts.',
                'description_bn' => 'লোগো, ব্র্যান্ড আইডেন্টিটি, বিজ্ঞাপনী ব্যানার ও সোশ্যাল মিডিয়া পোস্টের দৃষ্টিনন্দন গ্রাফিক ডিজাইন।',
                'icon' => 'pen-tool',
                'features_en' => ['Brand style guides & logos', 'Ad banners & campaign creatives', 'Social media templates', 'Print-ready marketing assets'],
                'features_bn' => ['ব্র্যান্ড লোগো ও গাইডলাইন', 'অ্যাড ব্যানার ও ক্যাম্পেইন ক্রিয়েটিভ', 'সোশ্যাল মিডিয়া টেমপ্লেট', 'প্রিন্ট-রেডি মার্কেটিং ডিজাইন'],
                'tag_en' => 'Brand Identity',
                'tag_bn' => 'ক্রিয়েটিভ ডিজাইন',
                'order' => 6,
            ],
            [
                'slug' => 'advertising-campaign-management',
                'title_en' => 'Advertising Campaign Management',
                'title_bn' => 'বিজ্ঞাপন ক্যাম্পেইন পরিচালনা',
                'description_en' => 'High-conversion paid campaigns on Meta Ads (Facebook & Instagram) and Google Ads designed to scale revenue with precision targeting and A/B testing.',
                'description_bn' => 'মেটা ও গুগল প্ল্যাটফর্মে হাই-কনভার্টিং পেইড বিজ্ঞাপন পরিচালনা, অডিয়েন্স টেস্টিং এবং সেলস বাড়ানো।',
                'icon' => 'pie-chart',
                'features_en' => ['Laser-targeted audience setups', 'Multi-variant A/B ad testing', 'Pixel & CAPI tracking setup', 'Continuous budget optimization'],
                'features_bn' => ['টার্গেটেড অডিয়েন্স সেটআপ', 'মাল্টি-ভ্যারিয়েন্ট এ/বি টেস্টিং', 'পিক্সেল ও কনভার্সন ট্র্যাকিং', 'বাজেট অপ্টিমাইজেশন ও আরওআই বৃদ্ধি'],
                'tag_en' => 'Paid Advertising',
                'tag_bn' => 'টার্গেটেড অ্যাডস',
                'order' => 7,
            ],
            [
                'slug' => 'ai-video-creation',
                'title_en' => 'AI Video Creation',
                'title_bn' => 'এআই ভিডিও ক্রিয়েশন',
                'description_en' => 'Cutting-edge AI-generated video avatars, photorealistic product showcases, automated storytelling, and multi-lingual voiceover productions.',
                'description_bn' => 'লেটেস্ট কৃত্রিম বুদ্ধিমত্তা (AI) প্রযুক্তির সাহায্যে ডিজিটাল অবতার, প্রডাক্ট শোকেস ও মাল্টি-ল্যাঙ্গুয়েজ ভয়েসওভার ভিডিও তৈরি।',
                'icon' => 'sparkles',
                'features_en' => ['Hyper-realistic AI avatars', 'Automated voiceovers & lip-syncing', 'Script writing & storyboarding', 'High-speed viral content creation'],
                'features_bn' => ['রিয়ালিস্টিক এআই অবতার ভিডিও', 'অটোমেটেড ভয়েসওভার ও স্ক্রিপ্ট', 'উচ্চ মানের ভাইরাল ভিডিও কনটেন্ট', 'দ্রুত ডেলিভারি ও লো-কস্ট প্রোডাকশন'],
                'tag_en' => 'Futuristic Tech',
                'tag_bn' => 'এআই টেকনোলজি',
                'order' => 8,
            ],
        ];

        foreach ($services as $srv) {
            Service::updateOrCreate(
                ['slug' => $srv['slug']],
                $srv
            );
        }

        // 5. Project Categories
        $pCategories = [
            ['name_en' => 'Web Development', 'name_bn' => 'ওয়েব ডেভেলপমেন্ট', 'slug' => 'web-development', 'order' => 1],
            ['name_en' => 'Digital Marketing', 'name_bn' => 'ডিজিটাল মার্কেটিং', 'slug' => 'digital-marketing', 'order' => 2],
            ['name_en' => 'Branding & Design', 'name_bn' => 'ব্র্যান্ডিং ও ডিজাইন', 'slug' => 'branding-design', 'order' => 3],
            ['name_en' => 'Video Production', 'name_bn' => 'ভিডিও প্রোডাকশন', 'slug' => 'video-production', 'order' => 4],
        ];

        $catMap = [];
        foreach ($pCategories as $pc) {
            $catMap[$pc['slug']] = ProjectCategory::updateOrCreate(['slug' => $pc['slug']], $pc);
        }

        // 6. Portfolio Projects
        $projects = [
            [
                'category_id' => $catMap['web-development']->id,
                'title_en' => 'E-Commerce Fashion Boutique Platform',
                'title_bn' => 'ই-কমার্স ফ্যাশন বুটিক প্ল্যাটফর্ম',
                'slug' => 'ecommerce-fashion-boutique',
                'short_description_en' => 'Full-stack online clothing and lifestyle store built with Laravel, Livewire, Tailwind CSS, and automated payment gateways.',
                'short_description_bn' => 'লারাভেল ও লাইভওয়্যার দিয়ে তৈরি আধুনিক ই-কমার্স ওয়েবসাইট যাতে রয়েছে দ্রুত চেকআউট এবং মোবাইল বান্ধব ইন্টারফেস।',
                'description_en' => 'A robust fashion e-commerce web platform engineered for extreme speed and effortless customer journeys. Features dynamic inventory tracking, instant search filtering, automated order invoice generation, and seamless local and international payment gateway integration.',
                'description_bn' => 'একটি শক্তিশালী ও আকর্ষণীয় ই-কমার্স পোর্টাল যাতে গ্রাহকরা সহজে পণ্য ব্রাউজ এবং অর্ডার সম্পন্ন করতে পারেন। অ্যাডমিন ড্যাশবোর্ড থেকে সেলস ও ইনভেন্টরি ট্র্যাকিং পরিচালনা করা যায়।',
                'cover_image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1200&q=80',
                'technologies' => ['Laravel 13', 'Livewire', 'Tailwind CSS', 'MySQL', 'Alpine.js'],
                'client' => 'Moda Luxe Fashion',
                'live_url' => 'https://example.com/demo/fashion-boutique',
                'github_url' => 'https://github.com/ashika/ecommerce-fashion',
                'is_featured' => true,
                'order' => 1,
                'completion_date' => '2026-03-15',
            ],
            [
                'category_id' => $catMap['digital-marketing']->id,
                'title_en' => 'E-Commerce 450% ROAS Meta Ads Campaign',
                'title_bn' => 'ই-কমার্স ৪৫০% আরওআই মেটা বিজ্ঞাপন ক্যাম্পেইন',
                'slug' => 'ecommerce-meta-ads-scaling',
                'short_description_en' => 'Data-driven Facebook & Instagram conversion campaign scaling a local cosmetic brand from zero to 100k USD monthly sales.',
                'short_description_bn' => 'টার্গেটেড ফেসবুক ও ইনস্টাগ্রাম বিজ্ঞাপনের মাধ্যমে বিউটি ব্র্যান্ডের ৪৫০% আরওআই ও বিপুল সেলস বৃদ্ধি।',
                'description_en' => 'Executed deep audience segmentation and dynamic product catalog ads with lookalike modeling. Integrated Conversions API (CAPI) for lossless attribution. Scaled customer acquisition by 450% while reducing CPA by 38%.',
                'description_bn' => 'উচ্চমানের বিজ্ঞাপন ক্রিয়েটিভ এবং লেজার টার্গেটেড অডিয়েন্স স্ট্র্যাটেজি প্রয়োগের মাধ্যমে ব্র্যান্ডটির সেলস রেকর্ড পরিমাণ বাড়ানো সম্ভব হয়েছে।',
                'cover_image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80',
                'technologies' => ['Meta Ads Manager', 'Pixel & CAPI', 'Google Analytics 4', 'A/B Testing'],
                'client' => 'Glow Cosmetics',
                'live_url' => 'https://example.com/case-study/glow-cosmetics',
                'github_url' => null,
                'is_featured' => true,
                'order' => 2,
                'completion_date' => '2026-06-20',
            ],
            [
                'category_id' => $catMap['web-development']->id,
                'title_en' => 'SaaS Project & Team Workflow Dashboard',
                'title_bn' => 'সাস প্রজেক্ট ও টিম ওয়ার্কফ্লো ড্যাশবোর্ড',
                'slug' => 'saas-team-workflow-dashboard',
                'short_description_en' => 'Sleek dark-mode collaborative task tracker with Kanban boards, live milestone charts, and automated team reminders.',
                'short_description_bn' => 'ডার্ক-থিম সমৃদ্ধ টিম কোলাবোরেশন ও প্রজেক্ট ম্যানেজমেন্ট সফটওয়্যার ড্যাশবোর্ড।',
                'description_en' => 'Engineered a real-time reactive management software tailored for agile digital marketing agencies. Included custom time logging, drag-and-drop task reorganizing, notification websockets, and comprehensive productivity metrics.',
                'description_bn' => 'মার্কেটিং ও সফটওয়্যার টিমের কাজের গতি বাড়াতে তৈরি করা হয়েছে এই রিয়েল-টাইম কানবান ড্যাশবোর্ড।',
                'cover_image' => 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&w=1200&q=80',
                'technologies' => ['Laravel 13', 'Livewire', 'Tailwind CSS', 'Chart.js', 'Alpine.js'],
                'client' => 'Apex Digital Labs',
                'live_url' => 'https://example.com/demo/workflow-dashboard',
                'github_url' => 'https://github.com/ashika/saas-dashboard',
                'is_featured' => true,
                'order' => 3,
                'completion_date' => '2026-08-10',
            ],
            [
                'category_id' => $catMap['branding-design']->id,
                'title_en' => 'FinTech Neo-Bank Visual Identity & UI Kit',
                'title_bn' => 'ফিনটেক নিও-ব্যাংক ভিজ্যুয়াল আইডেন্টিটি ও ডিজাইন',
                'slug' => 'fintech-neobank-identity',
                'short_description_en' => 'Futuristic cybernetic visual branding, logo system, mobile UI kit, and social marketing brand book for a next-gen finance startup.',
                'short_description_bn' => 'ফিউচারিস্টিক ও মিনিমাল ফিনটেক ব্র্যান্ডিং, লোগো ডিজাইন এবং মোবাইল অ্যাপ UI কিট।',
                'description_en' => 'Designed a complete design system with custom typography guidelines, glassmorphism component libraries, brand illustration sets, and promotional templates for multi-channel launch.',
                'description_bn' => 'ডিজিটাল ব্যাংকিং স্টার্টআপের জন্য একটি আকর্ষণীয় ভিজ্যুয়াল সিস্টেম যা গ্রাহকদের আস্থা ও বিশ্বাস তৈরি করে।',
                'cover_image' => 'https://images.unsplash.com/photo-1559526324-4b87b5e36e44?auto=format&fit=crop&w=1200&q=80',
                'technologies' => ['Figma', 'Adobe Illustrator', 'Photoshop', 'Brand System'],
                'client' => 'PaySphere Global',
                'live_url' => 'https://example.com/case-study/paysphere',
                'github_url' => null,
                'is_featured' => false,
                'order' => 4,
                'completion_date' => '2026-09-05',
            ],
            [
                'category_id' => $catMap['video-production']->id,
                'title_en' => 'Viral AI Avatar Product Launch Video Series',
                'title_bn' => 'ভাইরাল এআই অবতার প্রডাক্ট লঞ্চ ভিডিও সিরিজ',
                'slug' => 'viral-ai-avatar-campaign',
                'short_description_en' => 'Multi-lingual AI generated promotional video series generating over 1.2M impressions across TikTok and Instagram Reels.',
                'short_description_bn' => 'এআই অবতার ও সিন্থেটিক ভয়েসওভার দিয়ে তৈরি হাই-ইমপ্যাক্ট সোশ্যাল ভিডিও সিরিজ।',
                'description_en' => 'Leveraged advanced AI video generators, synthetic neural voices, and Premiere Pro motion graphics to produce 15 short-form high-engagement product reveal videos in English and Bengali.',
                'description_bn' => 'আধুনিক এআই টুলস ব্যবহার করে দ্রুততম সময়ে প্রফেশনাল বিজ্ঞাপনী ভিডিও তৈরি ও সোশ্যাল ক্যাম্পেইন পরিচালনা।',
                'cover_image' => 'https://images.unsplash.com/photo-1536240478700-b869070f9279?auto=format&fit=crop&w=1200&q=80',
                'technologies' => ['AI Video Tools', 'Premiere Pro', 'After Effects', 'Audition'],
                'client' => 'Nova Gadgets',
                'live_url' => 'https://example.com/demo/ai-videos',
                'github_url' => null,
                'is_featured' => true,
                'order' => 5,
                'completion_date' => '2026-10-12',
            ],
            [
                'category_id' => $catMap['digital-marketing']->id,
                'title_en' => 'Global Organic Search (SEO) Expansion',
                'title_bn' => 'গ্লোবাল অর্গানিক সার্চ (SEO) এক্সপানশন',
                'slug' => 'global-organic-search-seo',
                'short_description_en' => 'Technical and on-page SEO campaign ranking 40+ commercial keywords in Google Top 3 and tripling organic leads.',
                'short_description_bn' => 'গুগলের শীর্ষস্থানে ৪০টির বেশি কিওয়ার্ড র্যাঙ্কিং এবং অর্গানিক ট্রাফিক তিনগুণ বৃদ্ধি।',
                'description_en' => 'Comprehensive keyword intent mapping, technical core web vitals optimization, high-authority backlink architecture, and search intent content optimization.',
                'description_bn' => 'সার্চ ইঞ্জিনের নিয়ম মেনে টেকনিক্যাল ও অন-পেজ অপ্টিমাইজেশনের মাধ্যমে দীর্ঘমেয়াদী ফ্রি ট্রাফিক নিশ্চিতকরণ।',
                'cover_image' => 'https://images.unsplash.com/photo-1432888498266-38ffec3eaf0a?auto=format&fit=crop&w=1200&q=80',
                'technologies' => ['Ahrefs', 'Semrush', 'Google Search Console', 'Technical SEO'],
                'client' => 'CloudScale Host',
                'live_url' => 'https://example.com/case-study/seo-cloudscale',
                'github_url' => null,
                'is_featured' => false,
                'order' => 6,
                'completion_date' => '2026-11-01',
            ],
        ];

        foreach ($projects as $proj) {
            Project::updateOrCreate(
                ['slug' => $proj['slug']],
                $proj
            );
        }

        // 7. Work Experiences
        $experiences = [
            [
                'company_en' => 'NextGen Digital Agency',
                'company_bn' => 'নেক্সটজেন ডিজিটাল এজেন্সি',
                'role_en' => 'Senior Digital Marketer & Lead Web Developer',
                'role_bn' => 'সিনিয়র ডিজিটাল মার্কেটার ও লিড ওয়েব ডেভেলপার',
                'location_en' => 'Dhaka / Remote',
                'location_bn' => 'ঢাকা / রিমোট',
                'type_en' => 'Full-Time',
                'type_bn' => 'ফুল-টাইম',
                'period_en' => '2024 - Present',
                'period_bn' => '২০২৪ - বর্তমান',
                'start_date' => '2024-01-01',
                'is_current' => true,
                'description_en' => 'Leading technical web development and performance ad campaigns for enterprise clients across fintech, e-commerce, and SaaS verticals.',
                'description_bn' => 'ই-কমার্স ও করপোরেট ক্লায়েন্টদের জন্য কাস্টম ওয়েব ডেভেলপমেন্ট পরিচালনা এবং পারফরম্যান্স মার্কেটিং ক্যাম্পেইনের নেতৃত্ব দেওয়া।',
                'achievements_en' => [
                    'Delivered 25+ successful Laravel and Livewire web applications on time',
                    'Scaled ad spend across client accounts with sustained 3.8x+ ROAS',
                    'Spearheaded the internal transition to AI video workflows, cutting production time by 50%',
                ],
                'achievements_bn' => [
                    '২৫টিরও বেশি সফল ওয়েব অ্যাপ্লিকেশন সফলভাবে সম্পন্ন ও ডেলিভারি',
                    'ক্লায়েন্টদের বিজ্ঞাপনী বাজেটে গড়ে ৩.৮ গুণ সেলস নিশ্চিতকরণ',
                    'এআই ভিডিও প্রোডাকশন প্রসেস চালু করে প্রোডাকশন সময় অর্ধেকে নামিয়ে আনা',
                ],
                'order' => 1,
            ],
            [
                'company_en' => 'Creative Pulse Media',
                'company_bn' => 'ক্রিয়েটিভ পালস মিডিয়া',
                'role_en' => 'Digital Marketing Specialist & Frontend Developer',
                'role_bn' => 'ডিজিটাল মার্কেটিং স্পেশালিস্ট ও ফ্রন্টএন্ড ডেভেলপার',
                'location_en' => 'Dhaka, Bangladesh',
                'location_bn' => 'ঢাকা, বাংলাদেশ',
                'type_en' => 'Full-Time',
                'type_bn' => 'ফুল-টাইম',
                'period_en' => '2022 - 2023',
                'period_bn' => '২০২২ - ২০২৩',
                'start_date' => '2022-03-01',
                'end_date' => '2023-12-31',
                'is_current' => false,
                'description_en' => 'Managed end-to-end paid search and paid social campaigns while designing responsive landing pages that boosted conversion rates by 42%.',
                'description_bn' => 'পেইড সার্চ ও ফেসবুক ক্যাম্পেইন পরিচালনা এবং হাই-কনভার্টিং ল্যান্ডিং পেজ ডিজাইন।',
                'achievements_en' => [
                    'Designed and launched 30+ responsive campaign landing pages',
                    'Managed over $150K in annual digital ad spend with positive ROI',
                    'Grew total brand social followings by over 120,000 active users',
                ],
                'achievements_bn' => [
                    '৩০টিরও বেশি আকর্ষণীয় ল্যান্ডিং পেজ ডিজাইন ও ডেভেলপমেন্ট',
                    '১.৫ লাখ ডলারের বেশি অ্যাড বাজেট কার্যকরভাবে পরিচালনা',
                    'সোশ্যাল মিডিয়া পেজে ১ লাখ ২০ হাজার নতুন অডিয়েন্স যুক্তকরণ',
                ],
                'order' => 2,
            ],
            [
                'company_en' => 'Freelance & Independent Consultant',
                'company_bn' => 'ফ্রিল্যান্স কনসালট্যান্ট ও ডেভেলপার',
                'role_en' => 'Web Developer & Digital Strategist',
                'role_bn' => 'ওয়েব ডেভেলপার ও ডিজিটাল স্ট্র্যাটেজিস্ট',
                'location_en' => 'Worldwide Remote',
                'location_bn' => 'আন্তর্জাতিক রিমোট',
                'type_en' => 'Contract',
                'type_bn' => 'কন্ট্রাক্ট',
                'period_en' => '2021 - 2022',
                'period_bn' => '২০২১ - ২০২২',
                'start_date' => '2021-01-01',
                'end_date' => '2022-02-28',
                'is_current' => false,
                'description_en' => 'Provided international businesses with modern websites, conversion rate optimization, and search engine visibility strategies.',
                'description_bn' => 'বিশ্বব্যাপী ছোট ও মাঝারি উদ্যোক্তাদের জন্য ওয়েবসাইট তৈরি এবং অর্গানিক এসইও কনসালটেন্সি প্রদান।',
                'achievements_en' => [
                    'Completed 20+ freelance web and branding projects with 5-star ratings',
                    'Ranked multiple local businesses in top 3 Google local map pack',
                ],
                'achievements_bn' => [
                    '২০টির বেশি ফ্রিল্যান্স প্রজেক্টে ফাইভ-স্টার রিভিউ লাভ',
                    'লোকাল এসইও এর মাধ্যমে ব্যবসাগুলোর গুগল র্যাঙ্কিং নিশ্চিতকরণ',
                ],
                'order' => 3,
            ],
        ];

        foreach ($experiences as $exp) {
            Experience::updateOrCreate(
                ['company_en' => $exp['company_en'], 'role_en' => $exp['role_en']],
                $exp
            );
        }

        // 8. Education
        $educations = [
            [
                'institution_en' => 'University of Dhaka',
                'institution_bn' => 'ঢাকা বিশ্ববিদ্যালয়',
                'degree_en' => 'Bachelor of Science in Computer Science & Engineering',
                'degree_bn' => 'বিএসসি ইন কম্পিউটার সায়েন্স অ্যান্ড ইঞ্জিনিয়ারিং',
                'field_of_study_en' => 'Software Engineering & Web Technologies',
                'field_of_study_bn' => 'সফটওয়্যার ইঞ্জিনিয়ারিং ও ওয়েব টেকনোলজি',
                'period_en' => '2019 - 2023',
                'period_bn' => '২০১৯ - ২০২৩',
                'start_date' => '2019-01-01',
                'end_date' => '2023-12-01',
                'grade' => 'First Class Honors',
                'description_en' => 'Graduated with strong foundations in object-oriented programming, relational database systems, web architectures, and algorithms.',
                'description_bn' => 'সফটওয়্যার আর্কিটেকচার, ডেটাবেস সিস্টেম এবং অ্যালগরিদমে প্রথম শ্রেণীতে ডিগ্রি সম্পন্ন।',
                'order' => 1,
            ],
            [
                'institution_en' => 'Digital Marketing Institute (DMI)',
                'institution_bn' => 'ডিজিটাল মার্কেটিং ইনস্টিটিউট',
                'degree_en' => 'Professional Diploma in Digital Marketing',
                'degree_bn' => 'প্রফেশনাল ডিপ্লোমা ইন ডিজিটাল মার্কেটিং',
                'field_of_study_en' => 'Search Marketing, Social Ads & Analytics',
                'field_of_study_bn' => 'সার্চ মার্কেটিং, সোশ্যাল অ্যাডস ও অ্যানালিটিক্স',
                'period_en' => '2023',
                'period_bn' => '২০২৩',
                'start_date' => '2023-01-01',
                'end_date' => '2023-09-01',
                'grade' => 'Distinction',
                'description_en' => 'Comprehensive practical mastery of multichannel campaigns, conversion funnels, and marketing analytics.',
                'description_bn' => 'মাল্টি-চ্যানেল ডিজিটাল বিজ্ঞাপন, কনভার্সন অপ্টিমাইজেশন ও অ্যানালিটিক্সে ডিস্টিংকশন সহ সম্পন্ন।',
                'order' => 2,
            ],
        ];

        foreach ($educations as $edu) {
            Education::updateOrCreate(
                ['institution_en' => $edu['institution_en'], 'degree_en' => $edu['degree_en']],
                $edu
            );
        }

        // 9. Certifications
        $certifications = [
            [
                'title_en' => 'Meta Certified Digital Marketing Associate',
                'title_bn' => 'মেটা সার্টিফাইড ডিজিটাল মার্কেটিং অ্যাসোসিয়েট',
                'issuer_en' => 'Meta (Facebook)',
                'issuer_bn' => 'মেটা (ফেসবুক)',
                'issue_date' => '2024-02-15',
                'credential_id' => 'META-DM-892401',
                'credential_url' => 'https://www.credly.com',
                'order' => 1,
            ],
            [
                'title_en' => 'Google Ads Search & Measurement Certified',
                'title_bn' => 'গুগল অ্যাডস সার্চ ও মেজারমেন্ট সার্টিফিকেশন',
                'issuer_en' => 'Google Skillshop',
                'issuer_bn' => 'গুগল স্কিলশপ',
                'issue_date' => '2024-04-10',
                'credential_id' => 'GOOG-SEARCH-77319',
                'credential_url' => 'https://skillshop.exceedlms.com',
                'order' => 2,
            ],
            [
                'title_en' => 'HubSpot Inbound & Content Marketing Certified',
                'title_bn' => 'হাবস্পট ইনবাউন্ড ও কনটেন্ট মার্কেটিং সার্টিফিকেশন',
                'issuer_en' => 'HubSpot Academy',
                'issuer_bn' => 'হাবস্পট একাডেমি',
                'issue_date' => '2023-11-20',
                'credential_id' => 'HS-INB-66291',
                'credential_url' => 'https://academy.hubspot.com',
                'order' => 3,
            ],
            [
                'title_en' => 'Advanced Laravel & REST APIs',
                'title_bn' => 'অ্যাডভান্সড লারাভেল ও রেস্ট এপিআই',
                'issuer_en' => 'Laravel Ecosystem Guild',
                'issuer_bn' => 'লারাভেল ইকোসিস্টেম গিল্ড',
                'issue_date' => '2023-08-05',
                'credential_id' => 'LARAVEL-DEV-4102',
                'credential_url' => 'https://laracasts.com',
                'order' => 4,
            ],
        ];

        foreach ($certifications as $cert) {
            Certification::updateOrCreate(
                ['title_en' => $cert['title_en']],
                $cert
            );
        }

        // 10. Blog Categories
        $bCategories = [
            ['name_en' => 'Digital Marketing', 'name_bn' => 'ডিজিটাল মার্কেটিং', 'slug' => 'digital-marketing', 'order' => 1],
            ['name_en' => 'Web Development', 'name_bn' => 'ওয়েব ডেভেলপমেন্ট', 'slug' => 'web-development', 'order' => 2],
            ['name_en' => 'AI & Technology', 'name_bn' => 'এআই ও প্রযুক্তি', 'slug' => 'ai-technology', 'order' => 3],
        ];

        $bCatMap = [];
        foreach ($bCategories as $bc) {
            $bCatMap[$bc['slug']] = Category::updateOrCreate(['slug' => $bc['slug']], $bc);
        }

        // 11. Blog Posts
        $posts = [
            [
                'category_id' => $bCatMap['digital-marketing']->id,
                'title_en' => 'How to Maximize Meta Ads ROAS for E-Commerce in 2026',
                'title_bn' => '২০২৬ সালে ই-কমার্স বিজনেসে মেটা বিজ্ঞাপনে সর্বোচ্চ আরওআই অর্জনের কৌশল',
                'slug' => 'maximize-meta-ads-roas-2026',
                'excerpt_en' => 'Discover the proven creative testing matrix, conversion API setup, and post-purchase retention strategies that deliver consistent 4x+ return on ad spend.',
                'excerpt_bn' => 'মেটা বিজ্ঞাপনে ক্রিয়েটিভ টেস্টিং, কনভার্সন এপিআই ও কাস্টমার রিটেনশনের মাধ্যমে কিভাবে সেলস বহুগুণ বাড়ানো যায় জানুন এই ব্লগে।',
                'content_en' => "Digital advertising has shifted dramatically towards algorithmic machine learning and creative-first targeting. In this comprehensive guide, we unpack the exact blueprint I use to scale e-commerce stores profitably:\n\n1. Creative Diversity: Rather than testing audiences only, focus on hook variations, user-generated content (UGC), and product benefit demonstrations.\n\n2. First-Party Tracking: Setting up Meta Conversions API (CAPI) alongside the browser pixel is mandatory to counter ad blockers and browser privacy restrictions.\n\n3. High-Converting Landing Pages: Sending cold traffic to standard homepages wastes ad spend. Always route paid clicks to dedicated, fast-loading, mobile-optimized landing pages.",
                'content_bn' => "ডিজিটাল বিজ্ঞাপন জগতে ক্রিয়েটিভ ডিজাইন ও অ্যালগরিদমিক অপ্টিমাইজেশন সবচেয়ে গুরুত্বপূর্ণ ভূমিকা পালন করছে। এই ব্লগে আমরা জানব মেটা বিজ্ঞাপনে ভালো ফলাফল পাওয়ার মূল উপায়সমূহ:\n\n১. ক্রিয়েটিভ বৈচিত্র্য: একাধিক আকর্ষণীয় হুক ও ভিডিও ভ্যারিয়েশন তৈরি করা।\n২. কনভার্সন এপিআই: ডাটা লস রোধে সার্ভার-সাইড ট্র্যাকিং নিশ্চিত করা।\n৩. ফাস্ট ল্যান্ডিং পেজ: দ্রুত লোড হওয়া এবং সহজে অর্ডার সম্পন্ন করার উপযোগী পেজ তৈরি করা।",
                'featured_image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80',
                'reading_time' => '6 min read',
                'is_published' => true,
                'published_at' => now()->subDays(5),
                'meta_title' => 'Maximize Meta Ads ROAS for E-Commerce | Ashika',
                'meta_description' => 'Proven creative testing matrix and conversion API strategies to deliver 4x+ return on ad spend for your e-commerce brand.',
            ],
            [
                'category_id' => $bCatMap['web-development']->id,
                'title_en' => 'Why Laravel with Livewire is the Ultimate Full-Stack Solution',
                'title_bn' => 'কেন লারাভেল এবং লাইভওয়্যার আধুনিক ফুল-স্ট্যাক ওয়েবের সেরা পছন্দ',
                'slug' => 'why-laravel-livewire-fullstack',
                'excerpt_en' => 'Build dynamic, reactive modern interfaces without the complexity of separate Single Page Applications (SPAs) or API synchronization headaches.',
                'excerpt_bn' => 'জটিল এসপিএ বা আলাদা এপিআই ছাড়াই অত্যন্ত দ্রুত এবং ডায়নামিক ওয়েবসাইট তৈরি করতে লাইভওয়্যার কেন অতুলনীয়।',
                'content_en' => "Laravel continues to evolve as the most elegant backend PHP framework in the world. When paired with Livewire, developers gain reactive single-page app feeling without writing thousands of lines of boilerplate state-management code in frontend frameworks.\n\nKey Advantages:\n- Single Codebase: Write PHP and Blade templates while getting real-time reactive UI.\n- Integrated Security: Laravel's CSRF, validation, and authorization run natively on every component interaction.\n- Rapid Time-to-Market: Ship client products in weeks rather than months.",
                'content_bn' => "লারাভেল এবং লাইভওয়্যারের মেলবন্ধন বর্তমান সময়ের সবচেয়ে শক্তিশালী ওয়েব স্ট্যাকগুলোর একটি। এটি ডেভেলপারদের রিয়েল-টাইম ইন্টারঅ্যাকটিভিটি দেয় এবং ডেভেলপমেন্টের গতি দ্বিগুণ করে দেয়।\n\nপ্রধান সুবিধাসমূহ:\n- একক কোডবেস: পিএইচপি ও ব্লেড টেমপ্লেট দিয়ে সম্পূর্ণ ডায়নামিক পেজ তৈরি।\n- শীর্ষস্থানীয় নিরাপত্তা: প্রতিটি রিকোয়েস্টে সুরক্ষিত ভ্যালিডেশন।\n- দ্রুত প্রজেক্ট ডেলিভারি।",
                'featured_image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1200&q=80',
                'reading_time' => '5 min read',
                'is_published' => true,
                'published_at' => now()->subDays(12),
                'meta_title' => 'Why Laravel Livewire is the Ultimate Web Stack | Ashika',
                'meta_description' => 'Explore the speed, security, and developer joy of building modern web applications with Laravel and Livewire.',
            ],
            [
                'category_id' => $bCatMap['ai-technology']->id,
                'title_en' => 'Unlocking Business Growth with AI Video Production',
                'title_bn' => 'এআই ভিডিও প্রোডাকশনের মাধ্যমে ব্যবসার বিক্রি বাড়ানোর উপায়',
                'slug' => 'business-growth-ai-video-production',
                'excerpt_en' => 'How hyper-realistic AI avatars, automated voiceovers, and dynamic video tools allow brands to produce high-volume content at a fraction of the cost.',
                'excerpt_bn' => 'কৃত্রিম বুদ্ধিমত্তার সাহায্যে কম খরচে ও দ্রুততম সময়ে আকর্ষণীয় বিজ্ঞাপনী ভিডিও তৈরি করে সোশ্যাল মিডিয়া ব্র্যান্ডিং কীভাবে দ্রুত বাড়ানো যায়।',
                'content_en' => "Video content is king across modern social platforms, but traditional studio production has always been expensive and slow. Enter generative AI video tools.\n\nFrom localized multi-language video ads to personalized email outreach videos, brands can now scale visual communication across dozens of markets within hours rather than weeks.",
                'content_bn' => 'বর্তমান সময়ে ভিডিও কনটেন্টের গুরুত্ব অপরিসীম। এআই ভিডিও প্রযুক্তির সাহায্যে স্টুডিও বা ক্যামেরা ছাড়াই বিশ্বমানের প্রডাক্ট শোকেস ও বিজ্ঞাপন তৈরি করা সম্ভব, যা যেকোনো ব্যবসার সেলস বাড়াতে অত্যন্ত কার্যকর।',
                'featured_image' => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=1200&q=80',
                'reading_time' => '4 min read',
                'is_published' => true,
                'published_at' => now()->subDays(18),
                'meta_title' => 'Unlocking Business Growth with AI Video Production | Ashika',
                'meta_description' => 'Learn how generative AI video tools empower businesses to scale short-form video content rapidly.',
            ],
        ];

        foreach ($posts as $post) {
            Post::updateOrCreate(
                ['slug' => $post['slug']],
                $post
            );
        }

        // 12. Social Links
        $socials = [
            ['platform' => 'WhatsApp', 'url' => 'https://wa.me/8801938267920', 'icon' => 'message-circle', 'order' => 1, 'is_active' => true],
            ['platform' => 'LinkedIn', 'url' => 'https://linkedin.com/in/ashika', 'icon' => 'linkedin', 'order' => 2, 'is_active' => true],
            ['platform' => 'GitHub', 'url' => 'https://github.com/ashika', 'icon' => 'github', 'order' => 3, 'is_active' => true],
            ['platform' => 'Facebook', 'url' => 'https://facebook.com/ashika.digital', 'icon' => 'facebook', 'order' => 4, 'is_active' => true],
            ['platform' => 'Instagram', 'url' => 'https://instagram.com/ashika.dev', 'icon' => 'instagram', 'order' => 5, 'is_active' => true],
            ['platform' => 'Twitter', 'url' => 'https://x.com/ashika_dev', 'icon' => 'twitter', 'order' => 6, 'is_active' => true],
        ];

        foreach ($socials as $soc) {
            SocialLink::updateOrCreate(
                ['platform' => $soc['platform']],
                $soc
            );
        }

        // 13. Settings
        $settings = [
            ['key' => 'site_name', 'value' => 'ASHIKA', 'group' => 'general'],
            ['key' => 'site_title', 'value' => 'Ashika – Digital Marketer & Developer', 'group' => 'general'],
            ['key' => 'primary_email', 'value' => 'ashikaaktar99@gmail.com', 'group' => 'contact'],
            ['key' => 'whatsapp_number', 'value' => '+8801938267920', 'group' => 'contact'],
            ['key' => 'whatsapp_link', 'value' => 'https://wa.me/8801938267920', 'group' => 'contact'],
            ['key' => 'meta_description', 'value' => 'Official portfolio of Ashika – Digital Marketer & Developer. Custom Laravel web applications, SEO, Facebook & Google Ads, and AI Video solutions.', 'group' => 'seo'],
            ['key' => 'meta_keywords', 'value' => 'Ashika, Digital Marketer, Laravel Developer, SEO Specialist, Facebook Ads, Video Editing, Dhaka Bangladesh', 'group' => 'seo'],
        ];

        foreach ($settings as $st) {
            Setting::updateOrCreate(['key' => $st['key']], $st);
        }
    }
}
