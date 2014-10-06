<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <div class="container" role="document">
    
    <div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="Inscription" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Fermer</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Inscription</h4>
          </div>
          <form method="post" action="<?php site_url('wp-login.php?action=register', 'login_post')?>" class="">
          <div class="modal-body">
            <?php custom_register_form(); ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            <input type="submit" class="btn btn-primary" name="user-submit" value="Valider" class="user-submit" tabindex="103" />
          </div>
        </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Connection" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
          </div>
          <div class="modal-body">
            <?php custom_login_form(); ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            <button type="button" class="btn btn-primary">Valider</button>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      
        <?php
          do_action('get_header');
          // Use Bootstrap's navbar if enabled in config.php
          if (current_theme_supports('bootstrap-top-navbar')) {
            get_template_part('templates/header-top-navbar');
          } else {
            get_template_part('templates/header');
          }
        ?>

      <div class="col-sm-9" id="scrollit">
        <div class="row main-container">
          <div class="col-sm-12 content">
              <div class="col-sm-12 content-header">
                <ul>
                  <?php if ( !is_user_logged_in() ) : ?>
                    <li><a href="<?php //echo wp_login_url( get_permalink() ); ?>" data-toggle="modal" data-target="#login-modal">S'identifier</a></li>
                    <li><a href="<?php //echo wp_registration_url(); ?>" data-toggle="modal" data-target="#register-modal">S'inscrire</a></li>
                  <?php else : ?>
                    <li><a href="<?php echo wp_logout_url( home_url() ); ?>">Se déconnecter</a></li>
                  <?php endif; ?>
                </ul>
              </div>
              <main class="main <?php echo roots_main_class(); ?>" role="main">
                <?php include roots_template_path(); ?>
              </main><!-- /.main -->
              <?php if (roots_display_sidebar()) : ?>
                <aside class="sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">
                  <?php include roots_sidebar_path(); ?>
                </aside><!-- /.sidebar -->
              <?php endif; ?>
          </div>
          <?php get_template_part('templates/footer'); ?>
        </div><!-- /.content -->
      </div>
      
      <?php wp_footer(); ?>
    </div>
  </div><!-- /.wrap -->
</body>
</html>
