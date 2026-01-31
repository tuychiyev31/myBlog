{extends file="layout.tpl"}

{block name="title"}Home - My Blog{/block}

{block name="content"}
    <h1 class="page-title">Welcome to our blog</h1>
    {foreach from=$categoriesWithPosts item=item}
        <section class="category-section">
            <div class="category-header">
                <h2 class="category-title">{$item.category.name}</h2>

                <p class="category-description">{$item.category.description}</p>
            </div>

            {if $item.posts}
                <div class="posts-grid">
                    {foreach from=$item.posts item=post}
                        <article class="post-card">
                            {if $post.image}
                                <div class="post-image">
                                    <img src="{$post.image}" alt="{$post.title}">
                                </div>
                            {/if}
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="/post/{$post.id}">{$post.title}</a>
                                </h3>
                                <p class="post-description">{$post.description}</p>
                                <div class="post-meta">
                                    <span class="post-views">👁 {$post.views} views</span>
                                    <span class="post-date">{$post.created_at|date_format:"%d.%m.%Y %H:%M"}</span>
                                </div>
                            </div>
                        </article>
                    {/foreach}
                </div>
                <div class="category-footer">
                    <a href="/category/{$item.category.id}" class="btn btn-primary">All articles</a>
                </div>
            {/if}
        </section>
    {/foreach}

    {if !$categoriesWithPosts}
        <div class="empty-state">
            <p>There are no articles yet. Interesting content coming soon!</p>
        </div>
    {/if}
{/block}