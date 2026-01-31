<?php
/* Smarty version 4.5.6, created on 2026-01-31 16:03:11
  from '/var/www/html/templates/admin/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_697e27bf427fb6_10291427',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '90bdb202582fc73c053d24ee662fecdc2f6b2706' => 
    array (
      0 => '/var/www/html/templates/admin/login.tpl',
      1 => 1769875387,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_697e27bf427fb6_10291427 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_195150745697e27bf41e041_06527216', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1819575393697e27bf41ef36_67349561', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "title"} */
class Block_195150745697e27bf41e041_06527216 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_195150745697e27bf41e041_06527216',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Admin Login<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_1819575393697e27bf41ef36_67349561 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1819575393697e27bf41ef36_67349561',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div style="max-width: 400px; margin: 50px auto; padding: 30px; background: white; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
        <h1 style="text-align: center; margin-bottom: 30px;">Admin Panel</h1>

        <?php if ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
            <div style="padding: 10px; background: #fee; color: #c33; border-radius: 4px; margin-bottom: 20px;">
                <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

            </div>
        <?php }?>

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
<?php
}
}
/* {/block "content"} */
}
