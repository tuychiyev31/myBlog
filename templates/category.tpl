{extends file="layout.tpl"}

{block name="title"}{$category.name} - MyBlog{/block}

{block name="content"}
    <div class="category-page">
        <div class="category-info">
            <h1 class="page-title">{$category.name}</h1>
            <p class="category-description">{$category.description}</p>
        </div>

        <div class="category-controls">
            <div class="sort-controls">
                <label>Sort:</label>
                <a href="/category/{$category.id}?sort=created_at"
                   class="sort-link {if $orderBy == 'created_at'}active{/if}">
                    By date
                </a>
                <a href="/category/{$category.id}?sort=views"
                   class="sort-link {if $orderBy == 'views'}active{/if}">
                    By views
                </a>
            </div>
        </div>

        {if $posts}
            <div class="posts-grid">
                {foreach from=$posts item=post}
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
            {if $totalPages > 1}
                <div class="pagination">
                    {if $currentPage > 1}
                        <a href="/category/{$category.id}?page={$currentPage-1}&sort={$orderBy}"
                           class="pagination-link">← preview</a>
                    {/if}
                    {for $page=1 to $totalPages}
                        <a href="/category/{$category.id}?page={$page}&sort={$orderBy}"
                           class="pagination-link {if $page == $currentPage}active{/if}">
                            {$page}
                        </a>
                    {/for}
                    {if $currentPage < $totalPages}
                        <a href="/category/{$category.id}?page={$currentPage+1}&sort={$orderBy}"
                           class="pagination-link">next→</a>
                    {/if}
                </div>
            {/if}
        {else}
            <div class="empty-state">
                <p>There are no articles in this category yet.</p>
            </div>
        {/if}
    </div>
{/block}
