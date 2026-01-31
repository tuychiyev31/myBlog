{extends file="layout.tpl"}
{block name="title"}Admin Dashboard{/block}
{block name="content"}
    <div style="margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
        <h1>Posts Management</h1>
        <a href="/admin/post/create" class="btn btn-primary">Create New Post</a>
    </div>
    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
            <tr style="border-bottom: 2px solid #ddd;">
                <th style="padding: 12px; text-align: left;">ID</th>
                <th style="padding: 12px; text-align: left;">Title</th>
                <th style="padding: 12px; text-align: left;">Views</th>
                <th style="padding: 12px; text-align: left;">Date</th>
                <th style="padding: 12px; text-align: left;">Actions</th>
            </tr>
            </thead>
            <tbody>
            {foreach from=$posts item=post}
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 12px;">{$post.id}</td>
                    <td style="padding: 12px;">{$post.title}</td>
                    <td style="padding: 12px;">{$post.views}</td>
                    <td style="padding: 12px;">{$post.created_at|date_format:"%d.%m.%Y"}</td>
                    <td style="padding: 12px;">
                        <a href="/post/{$post.id}" target="_blank"
                           style="color: #3498db; text-decoration: none;">View</a>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>
{/block}