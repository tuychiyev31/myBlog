<?php
/* Smarty version 4.5.6, created on 2026-01-31 16:34:13
  from '/var/www/html/templates/post.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_697e2f056ca3b9_94179223',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f68fcdff66ccaaf4e7be6dbbca6b37401fbadd28' => 
    array (
      0 => '/var/www/html/templates/post.tpl',
      1 => 1769877035,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_697e2f056ca3b9_94179223 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1537673794697e2f056bd3d9_54468559', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1645017081697e2f056bf2e7_14261942', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "title"} */
class Block_1537673794697e2f056bd3d9_54468559 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1537673794697e2f056bd3d9_54468559',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
 - MyBlog<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_1645017081697e2f056bf2e7_14261942 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1645017081697e2f056bf2e7_14261942',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>

    <article class="post-page">
        <header class="post-header">
            <h1 class="post-title"><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</h1>
            <div class="post-categories">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                    <a href="/category/<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
" class="category-badge">
                        <?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>

                    </a>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
            
            <div class="post-meta">
                <span class="post-views">👁 <?php echo $_smarty_tpl->tpl_vars['post']->value['views'];?>
 views</span>
                <span class="post-date">📅 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['post']->value['created_at'],"%d.%m.%Y %H:%M");?>
</span>
            </div>
        </header>
        <?php if ($_smarty_tpl->tpl_vars['post']->value['image']) {?>
            
            <div class="post-main-image">
                <img src="<?php echo $_smarty_tpl->tpl_vars['post']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
">
            </div>
        <?php }?>
        
        <div class="post-description">
            <p><strong><?php echo $_smarty_tpl->tpl_vars['post']->value['description'];?>
</strong></p>
        </div>
        
        <div class="post-body">
            <?php echo nl2br((string) $_smarty_tpl->tpl_vars['post']->value['content'], (bool) 1);?>

        </div>
        
        <?php if ($_smarty_tpl->tpl_vars['similarPosts']->value) {?>
            
            <section class="similar-posts">
                <h2 class="section-title">Similar articles</h2>
                
                <div class="posts-grid">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['similarPosts']->value, 'similarPost');
$_smarty_tpl->tpl_vars['similarPost']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['similarPost']->value) {
$_smarty_tpl->tpl_vars['similarPost']->do_else = false;
?>
                        <article class="post-card">
                            <?php if ($_smarty_tpl->tpl_vars['similarPost']->value['image']) {?>
                                <div class="post-image">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['similarPost']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['similarPost']->value['title'];?>
">
                                </div>
                            <?php }?>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="/post/<?php echo $_smarty_tpl->tpl_vars['similarPost']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['similarPost']->value['title'];?>
</a>
                                </h3>
                                <p class="post-description"><?php echo $_smarty_tpl->tpl_vars['similarPost']->value['description'];?>
</p>
                                <div class="post-meta">
                                    <span class="post-views">👁 <?php echo $_smarty_tpl->tpl_vars['similarPost']->value['views'];?>
</span>
                                    <span class="post-date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['similarPost']->value['created_at'],"%d.%m.%Y %H:%M");?>
</span>
                                </div>
                            </div>
                        </article>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </section>
        <?php }?>
    </article>
<?php
}
}
/* {/block "content"} */
}
