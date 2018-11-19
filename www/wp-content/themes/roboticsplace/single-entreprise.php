<?php
//$userID = UPT()->get_user_id();
$desc = get_field('entreprise_description');
$logo = get_field('entreprise_logo');
$RecupDas = get_field('entreprise_das');
$RecupPoles = get_field('entreprise_pole');
$url = get_field('entreprise_web');
$phone = get_field('entreprise_telephone');
$location = get_field('entreprise_geolocalisation');
$address = explode( ',' , $location['address']);
$eff = get_field('entreprise_effectif');
$comp = get_field('entreprise_competence');
$videos = get_field('entreprise_video');
$galery = get_field('entreprise_galerie');
$size = 'full'; //taille pour la galerie d'image;

get_header(); ?>
    <div class="vs-section">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

       <div class="decort">adhérent</div>
        <div class="container">
            <div class="pure-g gutters">

                <div class="pure-u-1 pure-u-md-2-3 fiche-container">
                    <h1 class=" fiche-title title pure-u-1">
                        <?php the_title()?>
                    </h1>
                    <div class="txt-fiche">
                      <?php echo $desc; ?>
                    </div>
                    <div class="bg-fiche"></div>
                </div>
                <div class="pure-u-1 pure-u-md-1-3 fiche-company-infos">
                    <div class="company-infos whiteBg">
                        <div class="img-post">
                            <img class="grayscale"  src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>"/>
                        </div>
                        <p><span class="info-title">Adresse : </span> <?php echo $address[0] ; echo $address[1]; echo ',';echo $address[2]; ?></p>
                        <p><span class="info-title">Tél : </span><?php echo $phone; ?></p>
                        <p><span class="info-title">Effectif : </span><?php echo $eff; ?></p>
                        <p><span class="info-title">Compétences : </span> <?php echo $comp; ?></p>
                        <a class="button button__classic button--blue " target="_blank" rel="nofollow" href="<?php echo $url; ?>"><span></span>Site Web</a>
                    </div>
                </div>
                <?php  if($videos) : ?>
                <h2 class="pure-u-1 pure-u-md-1-5">En vidéo</h2>
                <div class="pure-u-1 pure-u-md-4-5 video-section">
                    <div class="pure-g">
                        <div class="pure-u-1">
                            <img class="barreVerticale" src="<?php echo get_template_directory_uri(); ?>/images/icons/barreVerticale.svg" alt="">
                            <section class="regular slider slider-video responsive2">
                                <?php foreach ($videos as $video) : ?>
                                    <div class="item_video">
                                        <?php echo $video['video_item']; ?>
                                    </div>
                                <?php endforeach;?>
                            </section>
                        </div>
                    </div>
                </div>

                <?php endif; ?>
                <?php if ($galery): ?>
                <div class="pure-u-1">
                    <div class="pure-g">

                        <h2 class="pure-u-1">En image</h2>
                        <section class="regular slider responsive">
                            <?php foreach ($galery as $item) : ?>
                                <?php echo wp_get_attachment_image($item['ID'], $size ); ?>
                            <?php endforeach; ?>
                        </section>
                    </div>
                </div>
            <?php endif; ?>
            </div>
            <?php endwhile;  endif; ?>
        </div>
        <!-- END CONTAINER -->
        <div class="pushFooter"></div>
    </div>
    <?php get_footer();
