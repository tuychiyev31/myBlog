{extends file="layout.tpl"}

{block name="title"}{$post.title} - MyBlog{/block}
{block name="content"}
    <article class="post-page">
        <header class="post-header">
            <h1 class="post-title">{$post.title}</h1>
            <div class="post-categories">
                {foreach from=$categories item=category}
                    <a href="/category/{$category.id}" class="category-badge">
                        {$category.name}
                    </a>
                {/foreach}
            </div>
            
            <div class="post-meta">
                <span class="post-views">👁 {$post.views} views</span>
                <span class="post-date">📅 {$post.created_at|date_format:"%d.%m.%Y %H:%M"}</span>
            </div>
        </header>
        {if $post.image}
            
            <div class="post-main-image">
                <img src="{$post.image}" alt="{$post.title}">
            </div>
        {/if}
        
        <div class="post-description">
            <p><strong>{$post.description}</strong></p>
        </div>
        
        <div class="post-body">
            {$post.content|nl2br}
        </div>
        
        {if $similarPosts}
            
            <section class="similar-posts">
                <h2 class="section-title">Similar articles</h2>
                
                <div class="posts-grid">
                    {foreach from=$similarPosts item=similarPost}
                        <article class="post-card">
                            {if $similarPost.image}
                                <div class="post-image">
                                    <img src="{$similarPost.image}" alt="{$similarPost.title}">
                                </div>
                            {/if}
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="/post/{$similarPost.id}">{$similarPost.title}</a>
                                </h3>
                                <p class="post-description">{$similarPost.description}</p>
                                <div class="post-meta">
                                    <span class="post-views">👁 {$similarPost.views}</span>
                                    <span class="post-date">{$similarPost.created_at|date_format:"%d.%m.%Y %H:%M"}</span>
                                </div>
                            </div>
                        </article>
                    {/foreach}
                </div>
            </section>
        {/if}
    </article>
{/block}
