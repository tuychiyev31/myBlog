<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{block name="title"}My Blog{/block}</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<header class="header">
    <div class="container">
        <nav class="nav">
            <a href="/" class="logo">MyBlog</a>
            <div class="nav-links">
                <a href="/" class="nav-link">Home</a>
            </div>
        </nav>
    </div>
</header>

<main class="main">
    <div class="container">
        {block name="content"}{/block}
    </div>
</main>

<footer class="footer">
    <div class="container">
        <p>&copy; 2025 My Blog. All rights reserved.</p>
    </div>
</footer>
</body>
</html>