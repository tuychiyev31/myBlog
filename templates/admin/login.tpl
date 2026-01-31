{extends file="layout.tpl"}

{block name="title"}Admin Login{/block}

{block name="content"}
    <div style="max-width: 400px; margin: 50px auto; padding: 30px; background: white; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
        <h1 style="text-align: center; margin-bottom: 30px;">Admin Panel</h1>

        {if isset($error)}
            <div style="padding: 10px; background: #fee; color: #c33; border-radius: 4px; margin-bottom: 20px;">
                {$error}
            </div>
        {/if}

        <form method="POST" action="/admin/authenticate">
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Username:</label>
                <input type="text" name="username" required
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Password:</label>
                <input type="password" name="password" required
                       style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
            </div>

            <button type="submit"
                    style="width: 100%; padding: 12px; background: #3498db; color: white; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;">
                Login
            </button>
        </form>

        <p style="text-align: center; margin-top: 20px; color: #999; font-size: 14px;">
            Test: admin / admin123
        </p>
    </div>
{/block}