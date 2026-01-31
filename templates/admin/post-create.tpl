{extends file="layout.tpl"}

{block name="title"}Create Post{/block}

{block name="content"}
    <h1>Create New Post</h1>

    {if isset($error)}
        <div style="padding: 15px; background: #fee; color: #c33; border-radius: 4px; margin-bottom: 20px;">
            {$error}
        </div>
    {/if}

    <form method="POST" action="/admin/post/store" enctype="multipart/form-data"
          style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 500;">Title:</label>
            <input type="text" name="title" required
                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 500;">Description:</label>
            <textarea name="description" rows="3" required
                      style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;"></textarea>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 500;">Content:</label>
            <textarea name="content" rows="10" required
                      style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;"></textarea>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 500;">Image:</label>
            <input type="file" name="image" accept="image/*"
                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
            <small style="color: #999;">Max 5MB. Formats: JPG, PNG, GIF, WebP</small>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 10px; font-weight: 500;">Categories:</label>
            {foreach from=$categories item=category}
                <label style="display: block; margin-bottom: 8px;">
                    <input type="checkbox" name="categories[]" value="{$category.id}">
                    {$category.name}
                </label>
            {/foreach}
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">Create Post</button>
            <a href="/admin/dashboard" class="btn" style="background: #95a5a6; color: white;">Cancel</a>
        </div>
    </form>
{/block}