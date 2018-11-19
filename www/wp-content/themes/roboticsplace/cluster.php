<?php
/*
    Template Name: Page Cluster
    Description: Page template cluster
*/
$DAS = get_field('bloc_das');
$POLES = get_field('bloc_poles');
$btn_encart = get_field('btn_encart');
$imgEntete = get_field('image_haut');
get_header(); ?>


    <div class="vs-section">
        <div class="decort vs-div" data-speed="0.02"><span>cluster</span></div>
        <div class="container relative">
            <div class="pure-g gutters">
                <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-3-5">
                    <h1 class="title ">
                        <?php the_field('titre') ?>
                    </h1>
                    <div class="decallage">
                        <?php the_field('intro'); ?>
                    </div>
                </div>
                <?php if( !empty($imgEntete) ):  ?>
                 <div class="pure-u-1 hidden-xs pure-u-sm-1-2 pure-u-md-2-5 flex flex--center vs-div">
                    <img class="mainPatern" src="<?php echo $imgEntete['url']; ?>" alt="<?php echo $imgEntete['alt']; ?>">
                </div>
            <?php else : ?>
                <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-2-5 relative zTop" id="parentVideo">
                    <?php get_template_part('php/video'); ?>
                </div>
            <?php endif; ?>
            </div>
        </div>

        <div class="container section__axes">
            <h2 class="left left--pushed relative marginTop vs-div" id="titleInterclustering">
                <?php the_field('titre_axes'); ?>
            </h2>
            <img class="shape_axes_left" src="<?php echo get_template_directory_uri(); ?>/images/paterns/decoLB3.svg" alt="">
            <img class="shape_axes_leftMiddle" src="<?php echo get_template_directory_uri(); ?>/images/paterns/decoLB4.svg" alt="">
            <div class="pure-g gutters flex flex--justifyFlexEnd" id="interclusting">
                <div class="pure-u-1 pure-u-md-11-12 pure-u-lg-5-6 whiteBg whiteBg--paddingSides rightBloc vs-div">
                    <?php if ( have_rows('repeteur_bloc') ): ?>
                    <div class="pure-g gutters flex flex--baseline">
                        <img class="barreVerticale" src="<?php echo get_template_directory_uri(); ?>/images/icons/barreVerticale.svg" alt="">
                        <?php while ( have_rows('repeteur_bloc') ) : the_row();
                            $icone = get_sub_field('axe_icone');
                            $titre = get_sub_field('axe_titre');
                            $content = get_sub_field('axe_texte')
                        ?>
                        <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-3 flex flex--column">
                            <div class="pure-g gutters">
                                <div class="pure-u-1-4 pure-u-md-1">
                                    <img class="center paterns" src="<?php echo $icone['url']; ?>" alt="<?php echo $icone['alt']; ?>" />
                                </div>
                                <div class="pure-u-3-4 pure-u-md-1">
                                    <b class="titre3"><?php echo $titre; ?></b>
                                    <?php echo $content; ?>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
        <div id="Orga">
            <div class="container">
                <div class="pure-g">
                    <h2 class="left pure-u-1">
                        <?php the_field('titre_organisation'); ?>
                    </h2>
                    <div class="pure-u-1 pure-u-md-1-4 flex flex--center" id="listeBtn">
                        <div class="pure-g gutters">
                            <div class="pure-u-1-3 pure-u-md-1">
                                <button class="button button__cluster button--active " id="btnCluster" href="#"><span></span>Le cluster</button>
                            </div>
                            <div class="pure-u-1-3 pure-u-md-1 ">
                                <button class="button button__cluster" id="btnDas" href="#">
                                <span></span>Les DAS</button>
                            </div>
                            <div class="pure-u-1-3 pure-u-md-1 ">
                                <button class="button  button__cluster" id="btnPoles" href="#">
                                <span></span>Les pôles</button>
                            </div>
                        </div>
                    </div>
                    <div class="custom-select pure-u-1" id="dasSelect">
                        <select class="options">
                            <option>Selectionnez un secteur...</option>
                            <option value="RobotiqueServ">Robotique de service</option>
                            <option value="RobotiqueIndus">Robotique industrielle</option>
                            <option value="Drones">Drones</option>
                        </select>
                    </div>
                    <div class="custom-select pure-u-1" id="polesSelect">
                        <select class="options">
                            <option>Selectionnez un secteur...</option>
                            <option value="poleRecherche">Pôles Recherche</option>
                            <option value="poleFournisseurs">Pôle Fournisseurs de technologies</option>
                            <option value="poleBesoin">Pôle Besoin</option>
                            <option value="poleFormation">Pôle Formation</option>
                        </select>
                    </div>



                    <div class="pure-u-1 pure-u-md-1-2 " id="schema">
                        <?php get_template_part('php/schema'); ?>
                    </div>
                    <div class="pure-u-1 pure-u-md-1-4  flex flex--center">
                        <div class="contenu" id="dasGlobal">
                            <?php the_field('contenu_das') ?>
                        </div>
                        <div class="contenu" id="polesGlobal">
                          <?php the_field('contenu_poles') ?>
                        </div>

                        <div class="contenu" id="lecluster">
                            <?php the_field('bloc_cluster'); ?>
                        </div>
                        <div class="contenu" id="RobotiqueServ">
                            <?php echo $DAS['das1']; ?>
                        </div>
                        <div class="contenu" id="RobotiqueIndus">
                            <?php echo $DAS['das2']; ?>
                        </div>
                        <div class="contenu" id="Drones">
                            <?php echo $DAS['das3']; ?>
                        </div>
                        <div class="contenu" id="poleRecherche">
                            <?php echo $POLES['poles_recherche']; ?>
                        </div>
                        <div class="contenu" id="poleFournisseurs">
                            <?php echo $POLES['poles_fournisseurs_de_technologie']; ?>
                        </div>
                        <div class="contenu" id="poleBesoin">
                            <?php echo $POLES['poles_besoin']; ?>
                        </div>
                        <div class="contenu" id="poleFormation">
                            <?php echo $POLES['pole_form']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container ">
            <div class="pure-g fullwithMobile parentEncart">
                <div class="pure-u-1">
                    <div class="pure-g flex encartBoutton flex--center flex--justifyCenter vs-div" data-speed="0.02">
                        <div class="pure-u-1 pure-u-sm-10-12 pure-u-md-2-3 ">
                            <h4>
                                <?php the_field('sur-titre') ?>
                            </h4>
                            <h5>
                                <?php the_field('titre_encart') ?>
                            </h5>
                            <?php if ($btn_encart): ?>
                            <div class="flex flex--justifyCenter">
                                <a class="button button__classic button--blue button--margin" href="<?php echo $btn_encart['lien_encart']; ?>"><span></span><?php echo $btn_encart['titre']; ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container container--notMobile section__membres">
            <div class="pure-g flex flex--justifyFlexEnd" id="membres">
                <h2 class="left marginTop pure-u-1 vs-div" data-speed="0.01">
                    <?php the_field('titre_membres_bureau') ?>
                </h2>
                <div class="pure-u-1 pure-u-sm-4-5 pure-u-lg-2-3 whiteBg whiteBg--padding relative vs-div" data-speed="0.03">
                    <div class="mobile-slider show-arrows" data-item-width="100%">
                        <?php if ( have_rows('repeteur_membre') ): ?>
                        <ul class="list-1">
                            <?php while ( have_rows('repeteur_membre') ) : the_row();
                                $name = get_sub_field('membre_nom');
                                $fonction = get_sub_field('membre_fonction');
                                $profil = get_sub_field('membre_image');
                                ?>
                            <li class="flex flex--center event-list-item">
                                <div class="imgMembre"><img src="<?php echo $profil['url'];?>" alt="<?php $profil['alt']; ?>"></div>
                                <div class="name flex flex--center">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/icons/barrehorizontale.svg" alt="">
                                    <b class="titre4"><?php echo $name; ?></b> <span><?php echo $fonction; ?></span>
                                </div>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <img class="shape__membres_Pink" src="<?php echo get_template_directory_uri(); ?>/images/paterns/decoLA2.svg" alt="">
            <img class="shape__membres_Blue" src="<?php echo get_template_directory_uri(); ?>/images/paterns/decoLB5.svg" alt="">
        </div>

        <div class="container">

            <div class="pure-g" id="titleFondateur">
                <h2 class="left marginTop pure-u-1 pure-u-sm-1-2 pure-u-md-1-3 vs-div">
                    <?php the_field('titre_fondateur_ffc'); ?>
                </h2>
            </div>
            <div class="pure-g flex flex--justifyFlexEnd vs-div" id="ffc">
                <div class="pure-u-1 pure-u-sm-4-5 pure-u-lg-2-3 whiteBg whiteBg--padding relative flex flex--center">
                    <div class="pure-g">
                        <div id="pushFFC" class="pure-u-1 pure-u-sm-2-3 flex flex--center">
                               <?php $imgFFC = get_field('ffc_image');
                            if( !empty($imgFFC) ): ?>
                            <a target="_blank" rel="nofollow" href="<?php the_field('lien_logo') ?>">
                              <img class="sideImg center" src="<?php echo $imgFFC['url']; ?>" alt="<?php echo $imgFFC['alt']; ?>" />
                            </a>
                            <?php endif; ?>
                            <div>
                                <?php the_field('contenu_ffc'); ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTAINER -->
        <div class="pushFooter"></div>
    </div>
    <script src="<?php echo get_template_directory_uri(); ?>/js/customSelectForm.js"></script>
    <div id="popin_video" class="popin_unactive">
      <div class="popin_click" data-target='#popin_video'></div>
      <div id="popin_video_player" class="wrapper_popin_video">

      </div>
    </div>
    <?php get_footer() ?>
