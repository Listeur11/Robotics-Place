<div  class="pure-u-1 relative marginTop whiteBg" id="resultatRecherche">
  <div class="pure-u-1">
    <?php echo do_shortcode('[facetwp pager="true"]');
    echo do_shortcode('[facetwp counts="true"]'); ?>
  </div>
  <ul class="pure-u-1">
    <?php  while ( have_posts() ): the_post();
      $userID = UPT()->get_user_id();
      $company = get_field('user_company', 'user_'.$userID);
      $desc = get_field('user_intro','user_'.$userID);
      $logo = get_field('logo', 'user_'.$userID);
      $RecupDas = get_field('user_das', 'user_'.$userID);
      $RecupPoles = get_field('user_poles', 'user_'.$userID); ?>
      <li class="pure-g gutters flex flex--center user-<?php echo $userID; ?>">
        <div class="  pure-u-1 pure-u-sm-1-2 pure-u-md-1-6">
          <img class="grayscale" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>"/>
        </div>
        <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-4 societe">
            <b class="titre3"><?php echo $company; ?></b>
            <?php if($RecupDas) :
              foreach( $RecupDas as $das ): ?>
                <span><?php echo $das['label'];?></span>
            <?php endforeach;
            endif; ?>
            <?php if($RecupPoles) :
              foreach( $RecupPoles as $poles ): ?>
                <span><?php echo $poles['label'];?></span>
            <?php endforeach;
            endif; ?>
        </div>
        <div class="pure-u-1 pure-u-sm-1-3 pure-u-md-1-3">
            <?php if(strlen($desc) > 150){
                    $desc = substr($desc, 0, 150);
                    $lastWord = strrpos($desc, " ");
                    $desc = substr($desc, 0, $lastWord);
                    echo $desc .'...';
                  } else{
                    echo $desc;
                  }; ?>
        </div>
        <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-6">
            <a class="button button__voirFiche button--violet " href="<?php the_permalink();?>"><?php pll_e('Voir Fiche');?></a>
        </div>
      </li>
    <?php endwhile; ?>
  </ul>
</div>
