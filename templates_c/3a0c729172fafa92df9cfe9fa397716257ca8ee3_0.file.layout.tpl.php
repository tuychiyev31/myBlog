<?php
/* Smarty version 4.5.6, created on 2026-01-31 16:34:04
  from '/var/www/html/templates/layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_697e2efcdfcc45_51749396',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a0c729172fafa92df9cfe9fa397716257ca8ee3' => 
    array (
      0 => '/var/www/html/templates/layout.tpl',
      1 => 1769877118,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_697e2efcdfcc45_51749396 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_865288010697e2efcdfbb81_62736362', "title");
?>
</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<header class="header">
    <div class="container">
        <nav class="nav">
            <a href="/" class="logo">MyBlog</a>
            <div class="nav-links">
                <a href="/" class="nav-link">Home</a>
            </div>
        </nav>
    </div>
</header>

<main class="main">
    <div class="container">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2071213535697e2efcdfc669_59382117', "content");
?>

    </div>
</main>

<footer class="footer">
    <div class="container">
        <p>&copy; 2025 My Blog. All rights reserved.</p>
    </div>
</footer>
</body>
</html><?php }
/* {block "title"} */
class Block_865288010697e2efcdfbb81_62736362 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_865288010697e2efcdfbb81_62736362',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
My Blog<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_2071213535697e2efcdfc669_59382117 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2071213535697e2efcdfc669_59382117',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "content"} */
}
