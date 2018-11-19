<?php

function site_init()
{
	if(function_exists('phc_register_post_type')) {
		phc_register_post_type('entreprise', 'Entreprises', array('supports'=>array('title'), 'menu_icon'=>'dashicons-location-alt'), true);
	}
}
add_action('init', 'site_init', 1);



function my_acf_save_post($post_id)
{
	// bail early if no ACF data
	if(empty($_POST['acf']) || $_POST['post_type'] != 'entreprise') {
		return;
	}

	if(!empty($_POST['acf']['field_5ba9323c82d22']['address']))
	{
		$address_info = array_reverse(explode(', ', $_POST['acf']['field_5ba9323c82d22']['address']));

		if(count($address_info) >= 3)
		{
			// on supprime le code postal
			$city_name = preg_replace('#[0-9+ ]+#', '', $address_info[1]);

			// enregistre le nom de la ville l'entreprise en meta pour le filtre FacetWP
			update_post_meta($post_id, 'entreprise_ville', $city_name);
		}
	}
}

add_action('acf/save_post', 'my_acf_save_post', 1);




function phc_custom_comment($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	$reponse = get_field('reponse', $comment);

	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>">
			<div class="comment-author vcard">
				<?php echo get_avatar($comment, $size='48', $default='<path_to_url>' ); ?>
				<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
			</div>

			<?php
			if ($comment->comment_approved == '0') {
				echo '<em>'.__('Your comment is awaiting moderation.').'</em><br>';
			}

			echo '
			<div class="comment-meta commentmetadata">
				<a href="'.htmlspecialchars(get_comment_link($comment->comment_ID)).'">'.sprintf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()).'</a>';
				edit_comment_link(__('Edit This'), '  ', '');
			echo '</div>';


			// affichage de la réponse : Go ou Nogo
			if($reponse) {
				echo '<strong>Reponse à la question : '.ucfirst($reponse).'</strong>';
			}

			comment_text();

			echo '
			<div class="reply">
				'.str_replace(array('comment-reply-link', 'onclick=\''), array('comment-reply-link2', 'onclick=\'document.getElementById("acf-field_5b8e5cb2c5300").checked = false; document.getElementById("acf-field_5b8e5cb2c5300-nogo").checked = false; '), get_comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'])))).'
			</div>
		</div>';
}




/**
 * Permet de sauvegarder sur plusieurs lignes un champ multiple plutôt que dans un tableau sérializé
 */
function acf_multiple_field($value, $post_id, $field)
{
  if(is_array($value) && count($value) > 0)
  {
	  $new_field = $field['name'].'_filter';

	  delete_post_meta($post_id, $new_field);

	  foreach ($value as $meta_value) {
	    add_post_meta($post_id, $new_field, $meta_value);
	  }
  }

  return $value;
}
add_filter('acf/update_value/name=entreprise_users_id', 'acf_multiple_field', 10, 3);



/**
 * Déclare un post_type avec des paramètres par défaut
 */
function phc_register_post_type($post_type, $label_plural, $args, $is_female=false)
{
	global $pagenow;

	// on verifie que le post_type n'existe pas déjà
	if (post_type_exists($post_type) === true) {
		return false;
	}

	// label du post_type au singulier
	$label = (isset($args['labels']['singular_name'])) ? $args['labels']['singular_name'] : substr($label_plural, 0, -1);

	// paramètres par défaut
	$default_labels = array(
		'name' => $label_plural,
		'singular_name' => $label,
		'menu_name' => $label_plural,
		'all_items' => 'Liste',
		'add_new' => 'Nouveau',
		'add_new_item' => 'Ajouter un nouveau '.strtolower($label),
		'edit_item' => 'Modifier un '.strtolower($label), // the edit item text. Default is Edit Post/Edit Page
		'new_item' => 'Nouveau '.strtolower($label),
		'view_item' => 'Voir',
		'search_items' => 'Chercher un '.strtolower($label),
		'not_found' => 'Aucun '.strtolower($label).' trouvé.',
		'not_found_in_trash' => 'Aucun '.strtolower($label).' trouvé dans la corbeille.', // the not found in trash text. Default is No posts found in Trash/No pages found in Trash
		//'parent_item_colon' => '', // the parent text. This string isn't used on non-hierarchical types. In hierarchical ones the default is Parent Page
	);

	// met au feminin
	if($is_female)
	{
		foreach($default_labels as $key => $val) {
			$default_labels[$key] = str_replace(array(' un ', ' nouveau', 'Nouveau ', 'Aucun ', ' trouvé'), array(' une ', ' nouvelle', 'Nouvelle ', 'Aucune ', ' trouvée'), $val);
		}
	}

	// surcharge les paramètres de lable par défaut avec ceux spécifiés
	if(isset($args['labels']))
	{
		foreach ($args['labels'] as $key => $val) {
			$default_labels[$key] = $val;
		}
	}

	unset($args['labels']);


	$default_args = array(
		'labels' => $default_labels,
		'public' => true,
		'show_ui' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'rewrite' => true,
		'query_var' => false,
		//'supports' => array('title', 'editor', 'author', 'thumbnail'),
		//'hide_editor' => false,
	);

	// surcharge les paramètres par défaut avec ceux spécifiés
	foreach ($args as $key => $val) {
		$default_args[$key] = $val;
	}

	// enregistre le nouveau type
	return register_post_type($post_type, $default_args);
}







/**
 * Fonction de debug, equivalente à print_r (la couleur en plus)
 */
function tt($array, $simple=false)
{
  $debug = print_r($array, 1);

  if($simple !== false) {
    return $debug;
  }
  else
  {
		// ajoute la couleur
		$debug = str_replace('Object', '<font color="red">Object</font>', $debug);
		$debug = str_replace('Array', '<font color="#FFCC33">Array</font>', $debug);
		$debug = str_replace('[', '[<font color="blue">', $debug);
		$debug = str_replace(']', '</font>]',$debug);

		// ajoute une police avec largeur fixe
    $debug = '<pre style="background-color:#fff; font-size:11px;">'.$debug.'</pre>';

		echo $debug;
  }
}





/**
 * Tronque un chaine à $max caractères sans couper le dernier mot
 */
function phc_str_truncate($str, $max, $continue_str='...')
{
  if (strlen($str)>$max)
  {
    $str = substr(strip_tags($str), 0, $max);
    $i = max(strrpos($str, ' '), strrpos($str, '-'));
    if ($i>0) {
      $str = substr($str, 0, $i);
    }
    $str .= ' '.$continue_str;
  }
  return $str;
}




/**
 * Construit une liste d'option pour un <select> simple ou multiple. Usage :
 * $list : array simple ou multidimensionnel (pour optgroup)
 *         si un clé commence par '_', elle sera desactivée (disable)
 * $selected : string ou array. Mettre vide '' pour désactiver la selection automatique
 * $default : première valeur. Si "null", elle ne s'affiche pas
 *
 * Bug potentiel : si $selected == '', alors valeur 0 sera selectionnée car 0 == ''
 */
function phc_get_select($list, $selected='', $default='---')
{
	// première valeur
  $ret = ($default !== null) ? '<option value="">'.$default.'</option>' : '';

  // option(s) selectionnée(s) / ajouter (string) permet d'éviter les bugs lié au 0
  if(is_array($selected))
  {
		foreach($selected as $key=>$val) {
			$selected[$key] = (string)$val;
		}
  }
  // si $selected est une chaine de caratere, on la transforme en tableau
  elseif($selected !== '') {
		$selected = array((string)$selected);
  }



	foreach($list as $key => $val)
	{
		// tableau à 2 dimensions : on utilise optgroup
		if(is_array($val))
		{
			$ret .= '<optgroup label="'.esc_attr($key).'">';
			foreach($val as $subkey=>$subval)
			{
		    // désactivation des champs dont la clé commence par '_'
		    $option = (substr($subkey, 0, 1) == '_') ? ' disabled="disabled"' : '';

		    // selection du champ selectionné
		    $option .= ($selected !== '' && in_array($subkey, $selected)) ? ' selected="selected"' : '';

    		$ret .= '<option value="'.$subkey.'"'.$option.'>'.$subval.'</option>';
			}
			$ret .= '</optgroup>';
		}
		else
		{
	    // désactivation des champs dont la clé commence par '_'
	    $option = (substr($key, 0, 1) == '_') ? ' disabled="disabled"' : '';

	    // selection du champ selectionné
	    $option .= ($selected !== '' && in_array($key, $selected)) ? ' selected="selected"' : '';

    	$ret .= '<option value="'.$key.'"'.$option.'>'.$val.'</option>';
		}
	}

  return $ret;
}




/**
 * Retourne un tableau associatif post_id => title
 */
function phc_get_list($post_type, $args = array(), $apply_filter = false)
{
	// paramètre par défaut
  $args_default = array(
    'no_found_rows' => true,
		'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC',
    'post_type' => $post_type,
    'post_status' => 'publish',
    'ignore_sticky_posts' => 1
  );

  $args = array_merge($args_default, $args);

	// execution de la requête
  $query = new WP_Query($args);


  $list_simple = array();
  if(count($query->posts) > 0)
  {
    foreach($query->posts as $val) {
      $list_simple[$val->ID] = ($apply_filter !== false) ? apply_filters('the_title', $val->post_title) : $val->post_title;
    }
  }

	// restaure $wp_query et le global post data à leur valeur d'origine
	wp_reset_query();

  return $list_simple;
}
