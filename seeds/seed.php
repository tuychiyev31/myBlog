<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Database\Database;
use App\Models\Category;
use App\Models\Post;

echo "==========================================\n";
echo "  DATABASE SEEDING STARTED\n";
echo "==========================================\n\n";

$db = Database::getInstance();
$categoryModel = new Category();
$postModel = new Post();


$categories = [
    [
        'name' => 'Technology',
        'description' => 'News about modern technologies and innovations'
    ],
    [
        'name' => 'Programming',
        'description' => 'Educational materials about programming languages and web development'
    ],
    [
        'name' => 'Design',
        'description' => 'Articles about web design, UI/UX, and graphic design'
    ],
    [
        'name' => 'Business',
        'description' => 'Tips on business development and entrepreneurship'
    ],
    [
        'name' => 'Marketing',
        'description' => 'Digital marketing strategies and tools'
    ],
];

$categoryIds = [];

foreach ($categories as $category) {
    $id = $categoryModel->create($category);
    $categoryIds[] = $id;
    echo "✓ Category created: {$category['name']} (ID: {$id})\n";
}

echo "\n";

$images = [
    'https://images.unsplash.com/photo-1677442136019-21780ecad995?w=800&h=600&fit=crop', // AI/Tech
    'https://images.unsplash.com/photo-1629654297299-c8506221ca97?w=800&h=600&fit=crop', // Code
    'https://images.unsplash.com/photo-1558655146-9f40138edfeb?w=800&h=600&fit=crop', // Design
    'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&h=600&fit=crop', // Business
    'https://images.unsplash.com/photo-1533750349088-cd871a92f312?w=800&h=600&fit=crop', // Marketing
    'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=800&h=600&fit=crop', // Tech
    'https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=800&h=600&fit=crop', // Laptop
    'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=800&h=600&fit=crop', // UI/UX
    'https://images.unsplash.com/photo-1553877522-43269d4ea984?w=800&h=600&fit=crop', // Startup
    'https://images.unsplash.com/photo-1432888622747-4eb9a8f2c5a4?w=800&h=600&fit=crop', // Content
];

$postTemplates = [
    // Technology posts
    [
        'title' => 'Artificial Intelligence Trends in {year}',
        'description' => 'Exploring the latest developments in AI technology and machine learning',
        'content' => 'The field of artificial intelligence continues to evolve rapidly. Recent breakthroughs in large language models, computer vision, and neural networks are transforming industries. This article explores the cutting-edge developments shaping the future of AI technology.',
        'categories' => [0], // Technology
    ],
    [
        'title' => 'The Future of Cloud Computing',
        'description' => 'How cloud infrastructure is changing the tech landscape',
        'content' => 'Cloud computing has revolutionized how businesses operate and scale. From serverless architectures to edge computing, the cloud ecosystem continues to innovate. Learn about the latest trends and best practices in cloud infrastructure.',
        'categories' => [0], // Technology
    ],
    [
        'title' => 'Cybersecurity Best Practices',
        'description' => 'Essential security measures for modern applications',
        'content' => 'In an increasingly connected world, cybersecurity is more important than ever. This comprehensive guide covers encryption, authentication, secure coding practices, and how to protect your applications from common vulnerabilities.',
        'categories' => [0, 1], // Technology, Programming
    ],

    // Programming posts
    [
        'title' => 'Modern PHP Development with PHP {version}',
        'description' => 'Exploring new features and best practices',
        'content' => 'PHP continues to evolve with powerful new features. From JIT compilation to match expressions and union types, modern PHP offers robust tools for building scalable applications. Discover what makes PHP a great choice for web development.',
        'categories' => [1], // Programming
    ],
    [
        'title' => 'Mastering Git Workflow',
        'description' => 'Advanced version control strategies for teams',
        'content' => 'Git is essential for collaborative development. Learn advanced branching strategies, conflict resolution, and how to structure your commits for maintainable project history. Perfect for teams of any size.',
        'categories' => [1], // Programming
    ],
    [
        'title' => 'Docker and Containerization Guide',
        'description' => 'Building reproducible development environments',
        'content' => 'Docker has transformed how we build and deploy applications. This guide covers creating Dockerfiles, using docker-compose for multi-container setups, and best practices for containerized development.',
        'categories' => [0, 1], // Technology, Programming
    ],

    // Design posts
    [
        'title' => 'UI/UX Design Principles for {year}',
        'description' => 'Creating intuitive and beautiful user interfaces',
        'content' => 'Great design is invisible. Learn the fundamental principles of UI/UX design, from typography and color theory to user research and accessibility. Build interfaces that users love.',
        'categories' => [2], // Design
    ],
    [
        'title' => 'Responsive Web Design Techniques',
        'description' => 'Building sites that work on any device',
        'content' => 'Responsive design is no longer optional. Master mobile-first design, CSS Grid, Flexbox, and media queries to create beautiful experiences across all screen sizes.',
        'categories' => [2], // Design
    ],
    [
        'title' => 'Typography in Web Design',
        'description' => 'Choosing and using fonts effectively',
        'content' => 'Typography can make or break a design. Learn how to choose appropriate typefaces, create hierarchy, and use web fonts effectively. Includes practical tips for improving readability.',
        'categories' => [2], // Design
    ],

    // Business posts
    [
        'title' => 'Starting a Tech Startup in {year}',
        'description' => 'From idea to launch: a practical guide',
        'content' => 'Launching a startup is challenging but rewarding. This guide covers market research, MVP development, finding investors, and building a team. Learn from successful entrepreneurs.',
        'categories' => [3], // Business
    ],
    [
        'title' => 'Financial Planning for Businesses',
        'description' => 'Managing cash flow and growth',
        'content' => 'Sound financial management is crucial for business success. Learn budgeting, forecasting, and financial analysis techniques to keep your company healthy and growing.',
        'categories' => [3], // Business
    ],
    [
        'title' => 'Remote Team Management',
        'description' => 'Leading distributed teams effectively',
        'content' => 'Remote work is here to stay. Discover best practices for managing distributed teams, maintaining culture, and ensuring productivity across time zones.',
        'categories' => [3], // Business
    ],

    // Marketing posts
    [
        'title' => 'SEO Optimization Strategies',
        'description' => 'Improving your search engine rankings',
        'content' => 'SEO is essential for online visibility. Learn on-page and off-page optimization, keyword research, technical SEO, and how search engines rank content in the modern web.',
        'categories' => [4], // Marketing
    ],
    [
        'title' => 'Content Marketing Best Practices',
        'description' => 'Creating content that converts',
        'content' => 'Quality content attracts and retains audiences. Master content strategy, storytelling, and distribution channels to build an engaged following and drive conversions.',
        'categories' => [4], // Marketing
    ],
    [
        'title' => 'Email Marketing in {year}',
        'description' => 'Building effective email campaigns',
        'content' => 'Email remains one of the highest-ROI marketing channels. Learn segmentation, personalization, A/B testing, and automation to create campaigns that drive results.',
        'categories' => [4], // Marketing
    ],
    [
        'title' => 'Social Media Strategy Guide',
        'description' => 'Growing your brand on social platforms',
        'content' => 'Social media is crucial for brand awareness. Develop a comprehensive strategy covering content planning, community management, and analytics across major platforms.',
        'categories' => [4], // Marketing
    ],
];

$totalPosts = 0;
$currentYear = 2025;

foreach ($categoryIds as $index => $categoryId) {
    $categoryName = $categories[$index]['name'];
    echo "Creating posts for category: {$categoryName}\n";

    for ($i = 1; $i <= 15; $i++) {
        $template = $postTemplates[array_rand($postTemplates)];
        $image = $images[array_rand($images)];

        $title = str_replace(
                ['{year}', '{version}'],
                [$currentYear, '8.3'],
                $template['title']
            ) . " - Part {$i}";

        $content = $template['content']
            . "\n\nThis is post number {$i} in the {$categoryName} category. "
            . "Published in " . date('F Y') . ".";

        $postData = [
            'title' => $title,
            'description' => $template['description'],
            'content' => $content,
            'image' => $image
        ];

        $templateCategoryIds = array_map(
            fn ($catIndex) => $categoryIds[$catIndex],
            $template['categories']
        );

        try {
            $postId = $postModel->createWithCategories($postData, $image, $templateCategoryIds);
        } catch (\Throwable $e) {
            echo "✗ Error creating post: {$title} — {$e->getMessage()}\n";
        }

        $totalPosts++;

        if ($i % 5 === 0) {
            echo "  ✓ Created {$i} posts...\n";
        }
    }

    echo "  ✓ Completed: 15 posts for {$categoryName}\n\n";
}


echo "==========================================\n";
echo "  ✓ SEEDING COMPLETED SUCCESSFULLY!\n";
echo "==========================================\n";
echo "Categories created: " . count($categories) . "\n";
echo "Posts created: {$totalPosts}\n";
echo "\n";
echo "Pagination test:\n";
echo "- Each category has 15+ posts\n";
echo "- Page size: 9 posts per page\n";
echo "- Pages per category: 2 pages\n";
echo "\n";
