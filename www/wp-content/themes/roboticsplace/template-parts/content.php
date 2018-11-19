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
                <a href="<?php bloginfo('url');?>/actualites" class="link link--blue"><i class="fas fa-long-arrow-alt-left pink"></i><?php pll_e('Retour Actualités'); ?></a>
            </div>
            <div class="pure-u-1">
                <div class="pure-g">
                    <span class="title pure-u-1 category-link"><?php the_category(', '); ?></span>
                    <h1 class=" article-title title pure-u-1">
                        <?php the_title(); ?>
                    </h1>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="pure-g gutters">
            <div class="pure-u-1">
                <?php if(get_the_post_thumbnail() ) : ?>
                <div class="img-post">
                    <?php the_post_thumbnail('full'); ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="txt-article">
                <?php if ( have_rows('gestion_du_contenu') ): ?>
                    <?php while ( have_rows('gestion_du_contenu') ) : the_row();
                        if(get_row_layout() == 'text_full') : ?>
                            <div class="pure-u-1 text_full">
                                    <?php the_sub_field('editeur');?>
                            </div>
                        <?php elseif(get_row_layout() == 'introduction'): ?>
                            <div class="pure-u-1 intro">
                                <?php the_sub_field('editeur');?>
                            </div>
                        <?php elseif(get_row_layout() == 'encart_text_color'): ?>
                            <div class="pure-u-1 encart_color">
                                    <?php the_sub_field('editeur'); ?>
                            </div>
                        <?php elseif(get_row_layout() == 'encart_cta') : ?>
                            <div class="pure-u-1 encart_cta">
                                <?php the_sub_field('editeur');  ?>
                                <a class="button button__classic button--pink" href="<?php the_sub_field('url_btn'); ?>"><span></span><?php the_sub_field('title_btn'); ?></a>
                            </div>
                        <?php elseif(get_row_layout() == 'col_content'): ?>
                          <div class="pure-u-1 content_col">
                              <?php if ( have_rows('contenu') ): ?>
                                  <?php while ( have_rows('contenu') ) : the_row(); ?>
                                    <div class=" <?php the_sub_field('background_color'); ?> <?php if(get_sub_field('texte_ou_image') == 'texte') : ?> col_text <?php endif;?> col <?php the_sub_field('largeur_du_contenu');?>">
                                    <?php if(get_sub_field('texte_ou_image') == 'texte') :
                                            the_sub_field('texte');
                                          else :
                                              $image = get_sub_field('image');
                                              $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                              if( $image ) {
                                              	echo wp_get_attachment_image( $image, $size );
                                              }endif; ?>
                                    </div>
                                  <?php endwhile; ?>
                              <?php endif; ?>
                          </div>
                      <?php endif;
                     endwhile;
                     else : ?>
                     <div class="pure-u-1 text_full">
                             <?php   the_content(); ?>
                     </div>

                <?php endif; ?>
            </div>
        </div>
        <div class="previous-post">
            <?php previous_post_link( '%link','< Actualité précédente' ) ?>
        </div>
        <div class="next-post">
            <?php next_post_link( '%link','Actualité suivante >' ) ?>
        </div>
    </div>
