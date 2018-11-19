<?php
/*
    Template Name: Page Adhérer
    Description: Page template Partenariats
*/
get_header(); ?>

    <div class="vs-section">
        <div class="decort"><span><?php the_title(); ?></span></div>

        <div class="container">
            <div class="pure-g  limitWidthText2">
                <h1 class="pure-u-1 left title"><?php the_field('titre'); ?></h1>
            </div>
            <div class="pure-g gutters pure-u-1 gridForm">
                <?php if (!is_user_logged_in()) { ?>
                <div class="pure-u-1">
                    <div class=" whiteBg  gutters fullwithMobile ">
                        <div class="pure-u-1 wrapperForm">
                            <h3 class="barreAvant"><?php pll_e('Demande d\'adhésion');?></h3>
                            <?php echo do_shortcode( '[wpmem_form register redirect_to="#"]' ); ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="<?php  if (is_user_logged_in()) { ?>pure-u-12 pure-u-sm-12<?php }else{ ?>pure-u-1 no-logged<?php } ?>  ">
                    <div class=" whiteBg  gutters fullwithMobile ">
                        <div class="pure-u-1 wrapperForm">
                            <?php
                                  $current_user = wp_get_current_user();
                                  $args = array(
                                      'echo'           => true,
                                      'remember'       => false,
                                      'redirect'       => 'https://dev.wp-samaritain.io/robotics/mon-compte',
                                      'form_id'        => 'loginformC',
                                      'id_username'    => 'user_loginC',
                                      'id_password'    => 'user_passC',
                                      'id_remember'    => 'remembermeC',
                                      'id_submit'      => 'wp-submitC',
                                      'label_username' => __( 'Nom d\'utilisateur, c\'est votre email'),
                                      'label_password' => __( 'Mot de passe' ),
                                      'label_remember' => __( 'Remember Me' ),
                                      'label_log_in'   => __( 'Log In' ),
                                      'value_username' => '',
                                      'value_remember' => false
                                  );
                                  if (is_user_logged_in()) { ?>
                                       <h3 class="barreAvant"><?php pll_e('Bonjour');?> <a href="<?php bloginfo('url');?>/mon-compte"><?php echo $current_user->user_firstname ;?></a></h3>
                                       <p><?php pll_e('Vous êtes déjà connecté, si ce n\'est pas vous, vous pouvez vous déconnecter en cliquant sur le bouton ci-dessous');?></p>
                                       <a class="button button__classic button--pink button--margin" href="<?php echo wp_logout_url( home_url() ); ?>"><span></span><?php pll_e('Me déconnecter');?></a>
                                  <?php }
                                  else { ?>
                                      <h3 class="barreAvant"><?php  pll_e('Me connecter à mon espace adhérent'); ?></h3>
                                      <?php wp_login_form($args);
                                  }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTAINER -->
        <div class="pushFooter"></div>

    </div>
    <script src="<?php echo get_template_directory_uri(); ?>/js/customSelectForm.js"></script>
    <?php get_footer() ?>
