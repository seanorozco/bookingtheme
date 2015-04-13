<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/img/ico/favicon.ico">

    <title>
      <?php wp_title( '|', true, 'right'); ?>
      <?php bloginfo( 'name' ); ?>
    </title>
    
    <?php wp_head(); ?>
    
  </head>
  
  <body <?php body_class(); ?> >


<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      
      <a class="navbar-brand" href="<?php bloginfo( 'url' ); ?>"><span class="glyphicon glyphicon-tree-conifer"></span><?php bloginfo( 'name' ); ?></a>
    </div>
              
    <?php 
        wp_nav_menu( array(
            'menu'              => 'primary',
            'theme_location'    => 'primary',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => '',
            'container_id'      => 'bs-example-navbar-collapse-1',
            'menu_class'        => 'nav navbar-nav navbar-right',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker())
        );
    ?>    
    
  </div><!-- /.container-fluid -->
 </nav>