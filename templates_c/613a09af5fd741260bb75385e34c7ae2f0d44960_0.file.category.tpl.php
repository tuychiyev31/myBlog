<?php
/* Smarty version 4.5.6, created on 2026-01-31 16:34:04
  from '/var/www/html/templates/category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_697e2efcdf3c61_25116704',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '613a09af5fd741260bb75385e34c7ae2f0d44960' => 
    array (
      0 => '/var/www/html/templates/category.tpl',
      1 => 1769877241,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_697e2efcdf3c61_25116704 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1827974024697e2efcde4fe8_36086273', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1170579362697e2efcde66d8_89020942', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "title"} */
class Block_1827974024697e2efcde4fe8_36086273 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1827974024697e2efcde4fe8_36086273',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
 - MyBlog<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_1170579362697e2efcde66d8_89020942 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1170579362697e2efcde66d8_89020942',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>

    <div class="category-page">
        <div class="category-info">
            <h1 class="page-title"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</h1>
            <p class="category-description"><?php echo $_smarty_tpl->tpl_vars['category']->value['description'];?>
</p>
        </div>

        <div class="category-controls">
            <div class="sort-controls">
                <label>Sort:</label>
                <a href="/category/<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
?sort=created_at"
                   class="sort-link <?php if ($_smarty_tpl->tpl_vars['orderBy']->value == 'created_at') {?>active<?php }?>">
                    By date
                </a>
                <a href="/category/<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
?sort=views"
                   class="sort-link <?php if ($_smarty_tpl->tpl_vars['orderBy']->value == 'views') {?>active<?php }?>">
                    By views
                </a>
            </div>
        </div>

        <?php if ($_smarty_tpl->tpl_vars['posts']->value) {?>
            <div class="posts-grid">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
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
            <?php if ($_smarty_tpl->tpl_vars['totalPages']->value > 1) {?>
                <div class="pagination">
                    <?php if ($_smarty_tpl->tpl_vars['currentPage']->value > 1) {?>
                        <a href="/category/<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
?page=<?php echo $_smarty_tpl->tpl_vars['currentPage']->value-1;?>
&sort=<?php echo $_smarty_tpl->tpl_vars['orderBy']->value;?>
"
                           class="pagination-link">← preview</a>
                    <?php }?>
                    <?php
$_smarty_tpl->tpl_vars['page'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['page']->step = 1;$_smarty_tpl->tpl_vars['page']->total = (int) ceil(($_smarty_tpl->tpl_vars['page']->step > 0 ? $_smarty_tpl->tpl_vars['totalPages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['totalPages']->value)+1)/abs($_smarty_tpl->tpl_vars['page']->step));
if ($_smarty_tpl->tpl_vars['page']->total > 0) {
for ($_smarty_tpl->tpl_vars['page']->value = 1, $_smarty_tpl->tpl_vars['page']->iteration = 1;$_smarty_tpl->tpl_vars['page']->iteration <= $_smarty_tpl->tpl_vars['page']->total;$_smarty_tpl->tpl_vars['page']->value += $_smarty_tpl->tpl_vars['page']->step, $_smarty_tpl->tpl_vars['page']->iteration++) {
$_smarty_tpl->tpl_vars['page']->first = $_smarty_tpl->tpl_vars['page']->iteration === 1;$_smarty_tpl->tpl_vars['page']->last = $_smarty_tpl->tpl_vars['page']->iteration === $_smarty_tpl->tpl_vars['page']->total;?>
                        <a href="/category/<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
?page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&sort=<?php echo $_smarty_tpl->tpl_vars['orderBy']->value;?>
"
                           class="pagination-link <?php if ($_smarty_tpl->tpl_vars['page']->value == $_smarty_tpl->tpl_vars['currentPage']->value) {?>active<?php }?>">
                            <?php echo $_smarty_tpl->tpl_vars['page']->value;?>

                        </a>
                    <?php }
}
?>
                    <?php if ($_smarty_tpl->tpl_vars['currentPage']->value < $_smarty_tpl->tpl_vars['totalPages']->value) {?>
                        <a href="/category/<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
?page=<?php echo $_smarty_tpl->tpl_vars['currentPage']->value+1;?>
&sort=<?php echo $_smarty_tpl->tpl_vars['orderBy']->value;?>
"
                           class="pagination-link">next→</a>
                    <?php }?>
                </div>
            <?php }?>
        <?php } else { ?>
            <div class="empty-state">
                <p>There are no articles in this category yet.</p>
            </div>
        <?php }?>
    </div>
<?php
}
}
/* {/block "content"} */
}
