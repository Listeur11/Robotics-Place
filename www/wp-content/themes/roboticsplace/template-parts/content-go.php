<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Robotics_Place
 */
?>
    <div class="container">

        <div class="pure-g gutters">
            <div class="pure-u-1 textLeft">
                <a href="<?php bloginfo('url');?>/mon-compte" class="link link--blue"><i class="fas fa-long-arrow-alt-left pink"></i><?php pll_e('Retour Liste Go NoGo'); ?></a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="pure-g gutters">
                <?php the_content(); ?>
        </div>
    </div>
