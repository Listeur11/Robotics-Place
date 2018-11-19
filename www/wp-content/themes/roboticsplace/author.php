<?php

get_header(); ?>
    <div class="vs-section">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

       <div class="decort">adhérents</div>
        <div class="container">
            <div class="pure-g gutters">
                <div class="pure-u-1 pure-u-md-2-3 fiche-container">
                    <h1 class=" fiche-title title pure-u-1">
                        <?php the_title(); ?>
                    </h1>
                    <div class="txt-fiche">
                        <p>Vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor.</p>
                    </div>
                    <div class="bg-fiche"></div>
                </div>
                <div class="pure-u-1 pure-u-md-1-3 fiche-company-infos">
                    <div class="company-infos">
                        <div class="img-post">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/img/actu.png" alt="">
                        </div>
                        <p><span class="info-title">Adresse :</span> 10 rue de la Sausse <br> 31240 Saint Jean</p>
                        <p><span class="info-title">Tél :</span> 05.61.61.26.40</p>
                        <p><span class="info-title">Effectif :</span> 20 personnes</p>
                        <p><span class="info-title">Compétences :</span> automatique, électronique, logiciel temps réel, mise au point et essais.</p>
                        <a class="button button__classic button--blue " href="#">
                            <div></div><span></span>Site Web</a>
                    </div>
                </div>
                <h2 class="pure-u-1 pure-u-md-1-5">En vidéo</h2>
                <div class="pure-u-1 pure-u-md-4-5 video-section">
                    <div class="pure-g">

                        <!--                        <iframe width="560" height="315" src="https://www.youtube.com/embed/zJ7hUvU-d2Q" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>-->
                        <div class="pure-u-1">
                        <img class="barreVerticale" src="<?php echo get_template_directory_uri(); ?>/images/icons/barreVerticale.svg" alt="">
                        <section class="regular slider slider-video responsive2">
                            <div>
                                <iframe width="100%" height="450px" src="https://www.youtube.com/embed/zJ7hUvU-d2Q" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                            <div>
                                <iframe width="100%" height="450px" src="https://www.youtube.com/embed/zJ7hUvU-d2Q" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>

                        </section>
                        </div>
                    </div>
                </div>

                <div class="pure-u-1">
                    <div class="pure-g">
                        <h2 class="pure-u-1">En image</h2>
                        <section class="regular slider responsive">
                            <div>
                                <img src="http://placehold.it/450x300?text=1">
                            </div>
                            <div>
                                <img src="http://placehold.it/450x300?text=2">
                            </div>
                            <div>
                                <img src="http://placehold.it/450x300?text=3">
                            </div>
                            <div>
                                <img src="http://placehold.it/450x300?text=4">
                            </div>
                            <div>
                                <img src="http://placehold.it/450x300?text=5">
                            </div>
                            <div>
                                <img src="http://placehold.it/450x300?text=6">
                            </div>
                        </section>
                    </div>
                </div>








            </div>
            <?php endwhile; endif; ?>
        </div>
        <!-- END CONTAINER -->
        <div class="pushFooter"></div>
    </div>
    <?php get_footer() ?>
