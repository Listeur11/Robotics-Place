<header id="menu" class="close">
    <div class="container flex--center flex__xs--column ">
        <div class="logoAndlanguage">
            <div class="flex flex--center">
                <button id="seconnecter" class="button button__seconnecter">Se connecter</button>
                <div id="switchLangueMobile">
                    <?php //wp_nav_menu( array( 'theme_location' => 'langue' ) ); ?>
                </div>
            </div>

            <a href="<?php echo get_home_url(); ?>" class="Logo"><img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo.svg" alt="Logo Robotics PLace"></a>

            <button id="toggle" class="custom-toggle visible-xs"><s class="bar"></s><s class="bar"></s></button>
        </div>
        <nav id="menuLinks">
            <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
            <div id="espaceConnexion">
                <div class="container">
                    <div class="pure-u-1 flex flex--justifyFlexEnd">
                        <?php
                        $current_user = wp_get_current_user();
                        $redirect_logout = get_bloginfo('url');
                        $args = array(
                            'echo'           => true,
                            'remember'       => false,
                            'redirect'       => 'https://dev.wp-samaritain.io/robotics/mon-compte',
                            'form_id'        => 'loginform',
                            'id_username'    => 'user_login',
                            'id_password'    => 'user_pass',
                            'id_remember'    => 'rememberme',
                            'id_submit'      => 'wp-submit',
                            'label_username' => __( '' ),
                            'label_password' => __( '' ),
                            'label_remember' => __( 'Remember Me' ),
                            'label_log_in'   => __( 'Log In' ),
                            'value_username' => '',
                            'value_remember' => false
                        );
                        if (is_user_logged_in()) {
                            echo '<p>';
                          pll_e('Bonjour '); echo $current_user->user_firstname; echo '  <a href="' . get_bloginfo('url') . '/mon-compte">'; echo pll_e('Mon compte'); echo '</a> '; echo '  |  <a href="' . wp_logout_url($redirect_logout) . '">'; echo pll_e('Me déconnecter'); echo'</a>';
                          echo '</p>';
                        }
                        else {
                            wp_login_form($args);
                        }
                      ?>
                        <div id="switchLanguedesk">
                            <?php wp_nav_menu( array( 'theme_location' => 'langue' ) ); ?>
                        </div>


                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
