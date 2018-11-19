<?php
/*
* Template name: Accueil
*/
  get_header();
 ?>
 <div id="primary" class="content-area">
    <section id="cluster" class="section container-fluid">
      <div class="container">
        <div class="contenu-container">
            <p class="surtitre"><?php the_field('surtitre-section-cluster') ?></p>
            <h2 class="titre-section"><?php the_field('title-section-cluster'); ?></h2>
            <?php if (!is_mobile()){ ?>
              <div class="contenu-section">
                  <?php the_field('contenu_section-cluster'); ?>
                  <button class="link link-member" type="button" name="button"><?php pll_e('Liste des membres'); ?></button>
                  <button class="link link-orga" type="button" name="button"><?php pll_e('Organisation du cluster'); ?></button>
              </div>
            <?php } ?>

        </div>
            <?php
            if (!is_mobile()){
              $rows = get_field('secteurs_dactivites-cluster');
                if($rows) {
                  echo '<ul class="nav_secteur container">';
                      foreach($rows as $row) {
                        echo '<li><div><span data-letters="' . $row['title_secteur'] . '">' . $row['title_secteur'] . '</span></div></li>';
                      }
                  echo '</ul>';
                }
            }
             ?>
          </div>
          <?php if (!is_mobile()){ ?>
          <div class="bg_bleu bg_anim"></div>
          <div class="bg_blanc bg_anim "></div>
          <img class="main-cluster" src="<?php bloginfo('template_url');?>/img/main-cluster.png" alt="<?php pll_e('Main en robotique - Robotics Place');?>">
          <?php } ?>
      </div>
    </section>
    <?php if(is_mobile()){ ?>
      <div class="contenu-section cluster-content-mobile">
          <?php the_field('contenu_section-cluster'); ?>
          <button class="link link-member" type="button" name="button"><?php pll_e('Liste des membres'); ?></button>
      </div>
    <?php }
    if (!is_mobile()) { ?>
    <div class="container">
      <?php
      $rows = get_field('secteurs_dactivites-cluster');
        if($rows) {
          echo '<ul class="content_liste_secteur">';
              foreach($rows as $row) {
                echo '<li>';
                echo '<img src="' .$row['img_secteur']. '"/ alt="' .$row['title_secteur']. '">';
                echo '<div class="contenu-secteur">' .$row['contenu_secteur']. '</div>';
                echo '</li>';
              }
          echo '</ul>';
        }
       ?>
    </div>
    <?php }
    if (is_mobile()){ ?>
      <div class="container accordion-secteurs">
        <?php
        $rows = get_field('secteurs_dactivites-cluster');
          if($rows) {
                foreach($rows as $row) {
                  echo '<h3>' . $row['title_secteur'] . '</h3>';
                  echo '<div>
                          <img src="' .$row['img_secteur']. '"/ alt="' .$row['title_secteur']. '">'
                          .$row['contenu_secteur']. '
                        </div>';
                }
          }
         ?>
      </div>
    <?php } ?>
    <section id="objectif" class="section container-fluid">
      <div data-scroll="toggle(.fromBottomIn, .fromBottomOut)" class="container">
        <p class="surtitre"><?php the_field('surtitle_section-objectif') ?></p>
        <h2 class="titre-section"><?php the_field('title_section-objectif'); ?></h2>
        <div class="contenu-section col-middle col-width-before">
          <?php the_field('left_content-objectif') ?>
          <button class="link link-rejoindre" type="button" name="button"><?php pll_e('Rejoindre le cluster'); ?></button>
        </div>
        <div class="contenu-section col-middle col-width-before big-mgb">
          <?php the_field('right_content-objectif') ?>
        </div>
        <?php if(is_mobile()) { ?>
          <div class="objectif-mobile">
        <?php } ?>
        <div class="contenu-section col-middle">
          <h3 class="title-arw"><?php the_field('sstitle_section-objectif') ?></h3>
        </div>
        <div class="contenu-section col-middle col-liste-contenu">
          <?php $rows = get_field('liste_contenu_section-objectif');
            if($rows) {
              echo '<ul class="liste_objectif">';
                  foreach($rows as $row) {
                    echo '<li>' .$row['contenu_liste']. '</li>';
                  }
              echo '</ul>';
            } ?>
        </div>
        <?php if(is_mobile()) { ?>
        </div>
        <?php } ?>
      </div>
      <?php if (!is_mobile()) { ?>
        <div class="bg_bleu bg_anim"></div>
        <img class="img__objectif" src="<?php bloginfo('template_url');?>/img/objectif2020.jpg" alt="objectif 2020">
        <div class="bg_blanc bg_anim"></div>
      <?php } ?>
      <div  data-scroll="toggle(.fromBottomIn, .fromBottomOut)" class="container-fluid contenu-village">
          <div class="container">
            <h3><?php the_field('title_village-objectif') ?></h3>
            <div class="contenu-section">
                <?php the_field('content_village-objectif'); ?>
            </div>
          </div>
          <?php
          $image = get_field('image_village_objectif');
          if( !empty($image) ): ?>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
          <?php endif; ?>
      </div>
      <div data-scroll="toggle(.fromBottomIn, .fromBottomOut)" class="encart-soumettre">
        <div class="container">
          <?php the_field('soumettre_objectif'); ?>
          <button class="btn btn-soumettre" type="button" name="button"><?php pll_e('Contactez-nous') ?></button>
        </div>
      </div>
    </section>
    <section data-scroll="toggle(.fromBottomIn, .fromBottomOut)" id="interclustering" class="section container-fluid">
        <div class="container">
          <p class="surtitre"><?php the_field('surtitre-interclustering') ?></p>
          <h2 class="titre-section"><?php the_field('title-section-interclustering'); ?></h2>
          <div class="contenu-section col-middle col-width-before">
            <?php the_field('left-column-interclustering') ?>
            <?php if(!is_mobile()) { ?>
            <button class="link link-carte" type="button" name="button"><?php pll_e('Voir la carte Interclustering'); ?></button>
            <?php } ?>
          </div>
          <?php if(!is_mobile()) { ?>
            <div class="contenu-section col-middle col-width-before">
              <?php the_field('right-column-interclustering') ?>
            </div>
          <?php } ?>
        </div>
        <?php if(!is_mobile()) { ?>
          <div class="bg_bleu bg_anim"></div>
          <div class="bg_blanc bg_anim"></div>
        <?php } ?>
    </section>
    <!-- <section id="actualites" class="section container-fluid">
      <div class="container">
        <p class="surtitre"><?php pll_e('Actualités') ?></p>
        <a class="link" target="_blank" href="#"><?php pll_e('Voir toutes les actualites'); ?></a>
      </div>
      <div class="container-fluid">
        <!-- <a class="twitter-timeline"
            data-chrome="noheader noborders transparent nofooter"
            data-link-color="#8e1d08"
            data-dnt="true"
            data-widget-id="rb_twitter"
            href="https://twitter.com/RoboticsPlace">
        </a> -->
        <!-- <a class="twitter-timeline" data-chrome="noheader noborders transparent nofooter" data-dnt="true" href="https://twitter.com/RoboticsPlace"></a>
        <script src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        <a class="twitter-grid" data-lang="fr" data-limit="3" href="https://twitter.com/TwitterDev/timelines/539487832448843776"></a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
      </div>
    </section> -->
    <section data-scroll="toggle(.fromBottomIn, .fromBottomOut)" id="contact" class="section container-fluid">
      <div class="container">
          <div class="rejoindre contenu-section col-middle">
            <div class="wrapper">
              <?php the_field('rejoindre-contact') ?>
              <button class="btn btn-rejoindre" type="button" name="button"><?php pll_e('Rejoignez-nous') ?></button>
            </div>
          </div>
          <div class="job contenu-section col-middle">
            <div class="wrapper">
              <?php the_field('stage-contact') ?>
              <button class="btn btn-contact" type="button" name="button"><?php pll_e('Contactez-nous') ?></button>
            </div>
          </div>
          <button class="link link-contact" type="button" name="button"><?php pll_e('Pour toutes autres demande contactez-nous en cliquant ici') ?></button>
      </div>
    </section>
    <section data-scroll="toggle(.fromBottomIn, .fromBottomOut)" id="partenaires" class="section container-fluid">
        <div class="container">
          <p class="surtitre"><?php the_field('surtitle-partenaire') ?></p>
          <h2 class="titre-section"><?php the_field('title-partenaire'); ?></h2>
          <?php if( have_rows('logo_partenaire') ): ?>
          	<ul class="liste_partenaires">
          	<?php while( have_rows('logo_partenaire') ): the_row();
          		// vars
          		$image = get_sub_field('logo-entreprise');
          		$link = get_sub_field('link_web');
          		?>
          		<li>
          				<a target="_blank" href="<?php echo $link; ?>">
          				   <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
          				</a>
          		</li>
          	<?php endwhile; ?>
          	</ul>
          <?php endif; ?>
        </div>
    </section>
 </div><!-- #primary -->
 <?php
 get_footer(); ?>
 <!-- <script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];
    if(!d.getElementById(id)){js=d.createElement(s);js.id=id;
    js.src="//platform.twitter.com/widgets.js";
    fjs.parentNode.insertBefore(js,fjs);}
}(document,"script","twitter-wjs");
</script>
<script src="<?php get_template_directory_uri() . '/js/Scustomize-twitter-1.1.min.js';?>" type="text/javascript"></script>
<script>
  var options = {
      "url": "style.css"
  };
  CustomizeTwitterWidget(options);
</script> -->
