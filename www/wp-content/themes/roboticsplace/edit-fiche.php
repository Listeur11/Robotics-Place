<?php
/*
* Template Name: gestion fiche adhérent
*/

$page_url = get_permalink();
$html = '';

// on essaye de trouver l'entreprise associé à cet utilisateur
$editor_entreprise_id = $wpdb->get_var("SELECT post_id FROM $wpdb->postmeta WHERE meta_key = 'entreprise_admin_id' AND meta_value = '".get_current_user_id()."'");

// si l'utilisateur n'est pas éditeur d'une fiche entreprise, on vérifie s'il n'est pas déjà rattaché à une entreprise
if(!$editor_entreprise_id) {
	$associated_entreprise_id = $wpdb->get_var("SELECT post_id FROM $wpdb->postmeta WHERE meta_key = 'entreprise_users_id_filter' AND meta_value = '".get_current_user_id()."'");
}


if(isset($_GET['associate_id']) && is_numeric($_GET['associate_id']))
{
	if(!empty($editor_entreprise_id) || !empty($associated_entreprise_id)) {
		$html_page .= '<p><strong>Une erreur est survenue : vous êtes déjà associé à une entreprise.</p></strong>';
	}
	else
	{
		update_field('entreprise_users_id', get_current_user_id(), $_GET['associate_id']);
		add_post_meta($_GET['associate_id'], 'entreprise_users_id_filter', get_current_user_id());
		wp_redirect($page_url);
		exit;
	}
}



if(isset($_GET['remove_id']))
{
	if(empty($associated_entreprise_id)) {
		$html_page .= '<p><strong>Une erreur est survenue : vous n’êtes associés à aucune entreprise.</p></strong>';
	}
	else
	{
		delete_field('entreprise_users_id', get_current_user_id(), $associated_entreprise_id);
		delete_post_meta($associated_entreprise_id, 'entreprise_users_id_filter', get_current_user_id());
		wp_redirect($page_url);
		exit;
	}
}




$options = array(
  'id' => 'form-adherent',
  'field_groups' => array(1295),
  'post_title' => true,
  'uploader' => 'basic',
  'honeypot' => true,
  'kses'	=> true
);


// affiche le formulaire d'édition de l'entreprise
if($editor_entreprise_id)
{
	$options += array(
		'post_id' => $editor_entreprise_id,
	  'new_post' => false,
		'updated_message' => 'Fiche entreprise mise à jour',
		'html_submit_button'	=> '<input type="submit" class="button button__classic button--blue" value="Mettre à jour ma fiche entreprise" />',
		'updated_message' => __("", 'acf'),
	);
	$display_form = true;
}

// affiche un message pour indiqué que le compte est associé à un utilisateur
elseif($associated_entreprise_id)
{
	$html_page .= 'Vous êtes associé à l’entreprise <strong>'.get_the_title($associated_entreprise_id).'.</strong><br><br><a href="'.$page_url.'?remove_id=1">Cliquez-ici</a> pour changer d’entreprise.';
}

// formualaire nouvelle entreprise
elseif(isset($_GET['create_entreprise']))
{
	$options += array(
		'post_id' => 'new_post',
		'updated_message' => 'Fiche entreprise créée',
		'html_submit_button'	=> '<input type="submit" class="button button__classic button--blue" value="Créer la fiche de mon entreprise" />',
	  'new_post' => array(
	  	'meta_input' => array('entreprise_admin_id'=>get_current_user_id()),
	  	'post_type' => 'entreprise',
			'post_status' => 'publish',
		),
	);
	$display_form = true;
}

// lorsque l'utilisateur n'est associé à aucune entreprise
else
{
	$html_page .= '
	Vérifiez que votre entreprise n’est pas déjà dans la liste ci-dessous : <br>
	<form method="get" action="'.$page_url.'">
		<select name="associate_id">'.phc_get_select(phc_get_list('entreprise')).'</select>
		<input type="submit" value="Choisir">
	</form><br><br>
	Sinon, vous pouvez <a href="'.$page_url.'?create_entreprise=1">créez la fiche de votre entreprise</a>';

}


if(!empty($display_form)) {
	acf_form_head();
}

get_header();?>
<div class="vs-section">
    <div class="container">
        <div class="pure-g gutters">
            <div class="pure-u-1">
                <div class="pure-g">
                    <h1 class="title pure-u-1 pure-u-md-1-2"><?php the_title(); ?></h1>
                    <div class="button__SeeFiche pure-u-1 pure-u-md-1-2">
                      <?php
                      // if(is_user_logged_in()){
                      //       echo '<a class="button button__classic button--blue " href="'.get_permalink().'"><span></span>Voir ma fiche</a>';
                      // }
                      ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <?php if (current_user_can('adherent') || current_user_can('membre') || current_user_can('administrator') || current_user_can('editor-big')) :?>
        <div class="pure-g gutters">
            <div class="pure-u-1 pure-u-md-1-3 mon-compte-menu">
                <?php do_action( 'woocommerce_account_navigation' );  ?>
            </div>
            <div class="pure-u-1 pure-u-md-2-3 mon-compte-poste-form">
              <?php
	            if(is_user_logged_in())
	            {
		            if(!empty($display_form)) {
                  acf_form($options);
		            }
		            else {
			            echo $html_page;
		            }
              } ?>
            </div>
        </div>
      <?php else :
        echo '<div id="message" class="error">';
        echo 'Veuillez vous connecter pour acceder à cette page';
        echo '</div>';
      endif;?>
    </div>
    <!-- END CONTAINER -->
    <div class="pushFooter"></div>
</div>
<?php
if(!empty($display_form)) {
	acf_enqueue_uploader();
}

get_footer();
