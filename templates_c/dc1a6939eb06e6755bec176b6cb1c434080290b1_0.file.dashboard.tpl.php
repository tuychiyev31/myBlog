<?php
/* Smarty version 4.5.6, created on 2026-01-31 15:57:48
  from '/var/www/html/templates/admin/dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_697e267c9d02f6_19465628',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dc1a6939eb06e6755bec176b6cb1c434080290b1' => 
    array (
      0 => '/var/www/html/templates/admin/dashboard.tpl',
      1 => 1769873882,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_697e267c9d02f6_19465628 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_514288187697e267c9cb6d7_79323312', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_702281510697e267c9cc4c1_94499127', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "title"} */
class Block_514288187697e267c9cb6d7_79323312 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_514288187697e267c9cb6d7_79323312',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Admin Dashboard<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_702281510697e267c9cc4c1_94499127 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_702281510697e267c9cc4c1_94499127',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>

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
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 12px;"><?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
</td>
                    <td style="padding: 12px;"><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</td>
                    <td style="padding: 12px;"><?php echo $_smarty_tpl->tpl_vars['post']->value['views'];?>
</td>
                    <td style="padding: 12px;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['post']->value['created_at'],"%d.%m.%Y");?>
</td>
                    <td style="padding: 12px;">
                        <a href="/post/<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
" target="_blank"
                           style="color: #3498db; text-decoration: none;">View</a>
                    </td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </div>
<?php
}
}
/* {/block "content"} */
}
