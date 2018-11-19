<?php
/*
    Template Name: Page Emploi
*/
$btn_encart = get_field('btn_encart');
acf_form_head();
get_header(); ?>

    <div class="vs-section">
        <div class="decort"><span><?php the_title(); ?></span></div>
        <div class="container">
            <div class="pure-g gutters">
                <h1 class="title pure-u-1 pure-u-sm-2-3"><?php the_field('titre') ?></h1>
            </div>
        </div>
        <?php if(is_user_logged_in()) { ?>
            <div class="container">
                <div class="grid-cv-job">
        <?php } ?>
                <div class="container relative whiteBg grid-job" id="barreRecherche">
                    <div class="pure-g gutters">
                        <div class="pure-u-1 pure-u-sm-1 pure-u-md-1 pure-u-lg-1-3 pure-u-xl-1-3 flex flex--column">
                            <p class="label">Recherche par type de contrat</p>
                            <?php echo facetwp_display( 'facet', 'type_de_contrat' ); ?>
                        </div>
                        <div class="pure-u-1 pure-u-sm-1 pure-u-md-1 pure-u-lg-1-3 pure-u-xl-1-3 flex flex--column">
                            <p class="label">Recherche par ville</p>
                            <?php echo facetwp_display( 'facet', 'lieu_job' ); ?>
                        </div>
                        <div class="pure-u-1 pure-u-sm-1 pure-u-md-1 pure-u-lg-1-3 pure-u-xl-1-3 flex flex--column">
                            <p class="label">Recherche par société</p>
                            <?php echo facetwp_display( 'facet', 'societe_job' ); ?>
                        </div>
                    </div>
                    <ul class="pure-u-1 relative marginTop" id="resultatRecherche">
                        <?php echo facetwp_display( 'template', 'jobs' ); ?>
                    </ul>
                </div>
        <?php if(is_user_logged_in()) { ?>
            <div class="grid-cv whiteBg">
                <div class="container ">
                    <p class="label"><?php pll_e('Liste des CV') ?></p>
                    <?php
                    $cv = array(
                    'post_type' => 'cvtheque'
                );
                $listCV = new WP_Query($cv);
                    if($listCV->have_posts()) : ?>
                    <div class="liste_cv">
                    <?php
                        while ($listCV->have_posts() ) : $listCV->the_post(); ?>
                        <p class="item_cv">
                            <b><?php the_title();?></b> <span class="typeContrat"><?php the_field('type_de_contrat'); ?></span><br/>
                            <span><?php pll_e('Poste recherché : '); ?><?php the_field('intitule_poste');?> </span>
                        </p>
                        <div>
                            <p><?php pll_e('Description : '); ?><?php the_field('a_propos_de_vous'); ?> </p>
                            <?php if(get_field('cv')):  ?>
                            <a class="button__classic dl_list_cv" target="_blank" href="<?php the_field('cv'); ?>">CV</a>
                          <?php endif;
                          if (get_field('lettre_de_motivations')): ?>
                            <a class="button__classic dl_list_cv" target="_blank" href="<?php the_field('lettre_de_motivations'); ?>">Lettre de motivations</a>
                          <?php endif; ?>
                        </div>
                            <?php
                    endwhile;
                        ?>
                    </div>
                    <?php endif;
                    wp_reset_postdata();
                                    ?>
                </div>
            </div>
        </div> <!-- end of grid-cv-job -->
    </div> <!-- end of container is user_loggued_in -->
        <?php } ?>
        <div class="container">
            <div class="pure-g fullwithMobile parentEncart">
            <div class="pure-u-1">
                <div class="pure-g flex encartBoutton flex--center flex--justifyCenter vs-div" data-speed="0.02">
                    <div class="pure-u-1 pure-u-sm-10-12 pure-u-md-2-3 ">
                        <h4>
                           <?php the_field('sur-titre'); ?>
                        </h4>
                        <h5>
                           <?php the_field('titre_encart'); ?>
                        </h5>
                        <?php if ($btn_encart): ?>
                        <div class="flex flex--justifyCenter">
                            <a class="button button__classic button--blue button--margin btn_popin" rel="nofollow" href="#"><span></span><?php echo $btn_encart['titre_btn']; ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!-- END CONTAINER -->
        <div class="pushFooter"></div>
    </div>
<div id="popin_form" class="popin_unactive">
    <div class="popin_click" data-target='#popin_form'></div>
    <div class="popin_form_wrapper">
        <?php $formEmploi = array(
            'id'=> "formEmploi",
            'post_title' => 'true',
            'post_id'		=> 'new_post',
					'new_post'		=> array(
						'post_type'		=> 'cvtheque',
						'post_status'		=> 'draft'
					),
            'honeypot' => true,
            'submit_value' => __("Envoyer mon CV", 'acf'),
            'updated_message' => __("Votre CV à était envoyé", 'acf'),
            'html_updated_message'	=> '<div id="message" class="updated"><p>%s</p></div>',
            'html_submit_button'	=> '<input type="submit" class="button button__classic button--blue" value="%s" />',
            'kses'	=> true
        )
         ?>
        <?php acf_form($formEmploi) ?>
    </div>
</div>
<?php
if(isset($_GET['updated']) && $_GET['updated']){
    $thx_cls = "popin_active";
}else{
    $thx_cls = "popin_unactive";
}
?>
<div id="popin_thx" class="<?= $thx_cls ?>">
   <div class="popin_click" data-target='#popin_thx'></div>
   <div class="popin_thx_wrapper">
        <h3>Merci !</h3>
        <p>Votre demande est soumise à validation par l'équipe de Robotics Place.</p>
   </div>
 </div>
    <?php acf_enqueue_uploader();
    get_footer() ?>
