<?php /* unused navigation code */ ?>

<div class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a>
            </div>
            <div class="navbar-collapse collapse">
              
              <?php 
                $args = array(
                  'menu'        =>  'header-menu',
                  'menu_class'  =>  'nav navbar-nav',
                  'container'   =>  'false'
                );
                wp_nav_menu( $args );
              ?>
              
            </div>
          </div>
        </div>