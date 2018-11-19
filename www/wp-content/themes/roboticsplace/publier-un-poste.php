<?php
/*
    Template Name: Page Publier un poste
    Description: Page template publier un poste
*/
get_header(); ?>

    <div class="vs-section">
        <div class="container">
            <div class="pure-g gutters">
                <div class="pure-u-1">
                    <div class="pure-g">
                        <h1 class="title pure-u-1 pure-u-md-1-2"><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="pure-g gutters">
                <div class="pure-u-1 pure-u-md-1-3 mon-compte-menu">
                    <?php do_action( 'woocommerce_account_navigation' );  ?>
                </div>
                <div class="pure-u-1 pure-u-md-2-3 mon-compte-poste-form">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        get_template_part( 'template-parts/content', 'page' );
                    endwhile; // End of the loop.
                    ?>
                </div>
            </div>
        </div>
        <!-- END CONTAINER -->
        <div class="pushFooter"></div>
    </div>
    <?php get_footer() ?>
