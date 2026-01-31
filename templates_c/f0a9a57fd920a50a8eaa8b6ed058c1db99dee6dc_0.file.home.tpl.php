<?php
/* Smarty version 4.5.6, created on 2026-01-31 16:51:45
  from '/var/www/html/templates/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_697e3321651279_48537618',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0a9a57fd920a50a8eaa8b6ed058c1db99dee6dc' => 
    array (
      0 => '/var/www/html/templates/home.tpl',
      1 => 1769877241,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_697e3321651279_48537618 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1107464607697e33216462a0_77984036', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_948306566697e33216476d3_03613865', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "title"} */
class Block_1107464607697e33216462a0_77984036 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1107464607697e33216462a0_77984036',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Home - My Blog<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_948306566697e33216476d3_03613865 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_948306566697e33216476d3_03613865',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>

    <h1 class="page-title">Welcome to our blog</h1>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categoriesWithPosts']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
        <section class="category-section">
            <div class="category-header">
                <h2 class="category-title"><?php echo $_smarty_tpl->tpl_vars['item']->value['category']['name'];?>
</h2>

                <p class="category-description"><?php echo $_smarty_tpl->tpl_vars['item']->value['category']['description'];?>
</p>
            </div>

            <?php if ($_smarty_tpl->tpl_vars['item']->value['posts']) {?>
                <div class="posts-grid">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['posts'], 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
                        <article class="post-card">
                            <?php if ($_smarty_tpl->tpl_vars['post']->value['image']) {?>
                                <div class="post-image">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['post']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
">
                                </div>
                            <?php }?>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="/post/<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</a>
                                </h3>
                                <p class="post-description"><?php echo $_smarty_tpl->tpl_vars['post']->value['description'];?>
</p>
                                <div class="post-meta">
                                    <span class="post-views">👁 <?php echo $_smarty_tpl->tpl_vars['post']->value['views'];?>
 views</span>
                                    <span class="post-date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['post']->value['created_at'],"%d.%m.%Y %H:%M");?>
</span>
                                </div>
                            </div>
                        </article>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
                <div class="category-footer">
                    <a href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['category']['id'];?>
" class="btn btn-primary">All articles</a>
                </div>
            <?php }?>
        </section>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    <?php if (!$_smarty_tpl->tpl_vars['categoriesWithPosts']->value) {?>
        <div class="empty-state">
            <p>There are no articles yet. Interesting content coming soon!</p>
        </div>
    <?php }
}
}
/* {/block "content"} */
}
