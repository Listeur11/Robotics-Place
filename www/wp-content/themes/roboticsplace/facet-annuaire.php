<div class="pure-u-1 relative marginTop whiteBg whiteBgResult" id="resultatRecherche">

    <ul class="pure-u-1">
        <?php while (have_posts()): the_post();
            $post_id = get_the_id();
            $data = get_fields();

            $das = get_field_object('entreprise_das');
            $pole = get_field_object('entreprise_pole');

            ?>
            <li class="pure-g gutters flex flex--center user-<?php echo $post_id; ?>">
                <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-6 grid-1">
                    <img class="grayscale" src="<?php echo $data['entreprise_logo']['sizes']['medium']; ?>"
                         alt="<?php echo $data['entreprise_logo']['alt']; ?>"/>
                </div>
                <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-4 societe grid-2">
                    <b class="titre3"><?php the_title(); ?></b>
                    <?php if (!empty($das['value'])) {
                        echo '<span>' . $das['choices'][$das['value']] . '</span>';
                    } ?>
                    <?php if (!empty($pole['value'])) {
                        echo '<span>' . $pole['choices'][$pole['label']] . '</span>';
                    } ?>
                    <?php if ($RecupPoles) :
                        foreach ($RecupPoles as $poles): ?>
                            <span><?php echo $poles['label']; ?></span>
                        <?php endforeach;
                    endif; ?>
                </div>
                <div class="pure-u-1 pure-u-sm-1-3 pure-u-md-5-12 grid-3">
                    <?php echo phc_str_truncate($data['entreprise_description'], 150); ?>
                </div>
                <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-6 center-div grid-4">
                    <a class="button button__voirFiche button--violet "
                       href="<?php the_permalink(); ?>"><?php pll_e('Voir Fiche'); ?></a>
                </div>
                <span class="grey-line grid-5"></span>
            </li>
        <?php endwhile; ?>
    </ul>
    <div class="pure-g gutters">
        <div class="pure-u-1 facet-pagination">
            <?php echo do_shortcode('[facetwp pager="true"]'); ?>
        </div>
    </div>

</div>
