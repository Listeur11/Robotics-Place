<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php
/* 
    Template Name: Page CVtheque
    Description: Page template CVtheque  
*/
get_header(); ?>

    <body <?php body_class(); ?> id="annuaire">
        <?php get_template_part('php/menu'); ?>
        <div class="vs-section">
            <div class="container">
                <div class="pure-g gutters">
                    <h1 class="title pure-u-1 pure-u-sm-2-3">Vous recherchez un expert dans la robotique ?</h1>
                </div>
                <div class="pure-u-1 relative whiteBg" id="barreRecherche">
                    <div class="pure-g gutters">
                        <div class="pure-u-1-2 pure-u-sm-1-3 flex flex--column">
                            <h2 class="label">Mots-clés</h2>
                        </div>
                        <div class="pure-u-1-2 pure-u-sm-1-3 flex flex--column">
                            <h2 class="label">Ville/Code Postal</h2>
                        </div>
                    </div>
                </div>
                <div class="pure-u-1 relative marginTop whiteBg" id="resultatRecherche">
                    <div class="pure-g gutters  flex flex--center">
                        <div class="  pure-u-1 pure-u-sm-1-2 pure-u-md-1-12">
                            <img class="grayscale" src="./images/logos/logo.svg" alt="">
                        </div>
                        <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-3 societe">
                            <b class="titre3">Nom du postulant</b>
                            <span>Métier</span>
                        </div>
                        <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-6">
                            <p>Lieu</p>
                        </div>
                        <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-4">
                            <p>Date de publication</p>
                        </div>
                        <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-6">
                            <a class="button button__voirFiche button--violet " href="#">Voir CV</a>
                        </div>
                    </div>
                    <div class="pure-g gutters  flex flex--center">
                        <div class="  pure-u-1 pure-u-sm-1-2 pure-u-md-1-12">
                            <img class="grayscale" src="./images/logos/logo.svg" alt="">
                        </div>
                        <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-3 societe">
                            <b class="titre3">Nom du postulant</b>
                            <span>Métier</span>
                        </div>
                        <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-6">
                            <p>Lieu</p>
                        </div>
                        <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-4">
                            <p>Date de publication</p>
                        </div>
                        <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-6">
                            <a class="button button__voirFiche button--violet " href="#">Voir CV</a>
                        </div>
                    </div>
                    <div class="pure-g gutters  flex flex--center">
                        <div class="  pure-u-1 pure-u-sm-1-2 pure-u-md-1-12">
                            <img class="grayscale" src="./images/logos/logo.svg" alt="">
                        </div>
                        <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-3 societe">
                            <b class="titre3">Nom du postulant</b>
                            <span>Métier</span>
                        </div>
                        <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-6">
                            <p>Lieu</p>
                        </div>
                        <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-4">
                            <p>Date de publication</p>
                        </div>
                        <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-6">
                            <a class="button button__voirFiche button--violet " href="#">Voir CV</a>
                        </div>
                    </div>
                    <div class="pure-g gutters  flex flex--center">
                        <div class="  pure-u-1 pure-u-sm-1-2 pure-u-md-1-12">
                            <img class="grayscale" src="./images/logos/logo.svg" alt="">
                        </div>
                        <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-3 societe">
                            <b class="titre3">Nom du postulant</b>
                            <span>Métier</span>
                        </div>
                        <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-6">
                            <p>Lieu</p>
                        </div>
                        <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-4">
                            <p>Date de publication</p>
                        </div>
                        <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-6">
                            <a class="button button__voirFiche button--violet " href="#">Voir CV</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONTAINER -->
            <div class="pushFooter"></div>
        </div>
        <?php get_footer() ?>
        <?php get_template_part('php/script'); ?>
    </body>

</html>
