<?php
/* Smarty version 4.5.6, created on 2026-01-31 16:04:35
  from '/var/www/html/templates/admin/post-create.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_697e2813a8ee36_89256170',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7947c2cee329526553b97b22e2ed1ec7e4c0c927' => 
    array (
      0 => '/var/www/html/templates/admin/post-create.tpl',
      1 => 1769875447,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_697e2813a8ee36_89256170 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_706456354697e2813a88ac9_87778477', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1745917526697e2813a89432_21046376', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "title"} */
class Block_706456354697e2813a88ac9_87778477 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_706456354697e2813a88ac9_87778477',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Create Post<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_1745917526697e2813a89432_21046376 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1745917526697e2813a89432_21046376',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h1>Create New Post</h1>

    <?php if ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
        <div style="padding: 15px; background: #fee; color: #c33; border-radius: 4px; margin-bottom: 20px;">
            <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

        </div>
    <?php }?>

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
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                <label style="display: block; margin-bottom: 8px;">
                    <input type="checkbox" name="categories[]" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>

                </label>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">Create Post</button>
            <a href="/admin/dashboard" class="btn" style="background: #95a5a6; color: white;">Cancel</a>
        </div>
    </form>
<?php
}
}
/* {/block "content"} */
}
