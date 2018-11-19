<?php
/*
Plugin Name: Darman utility
Description: Plugin pour désactiver certaines fonctions de WP et améliorer le backoffice pour nos merveilleux client <3
Version: 1.0
License: GPL
Author: Studio Darman
Author URI: https://www.darmadesign.fr/
*/

// ajout de style
function dar_admin_style(){
    wp_enqueue_style('admin_style',plugins_url('style.css',__FILE__));
}
add_action('admin_enqueue_scripts','dar_admin_style');

// supprime les accents, ponctuation pour les fichiers
add_filter( 'sanitize_file_name', 'remove_accents', 10, 1 );
add_filter( 'sanitize_file_name_chars', 'sanitize_file_name_chars', 10, 1 );
function sanitize_file_name_chars( $special_chars = array() ) {
	$special_chars = array_merge( array( '’', '‘', '“', '”', '«', '»', '‹', '›', '—', 'æ', 'œ', '€' ), $special_chars );
	return $special_chars;
}
// modif le menu de l'éditeur de texte
// function dar_tinymce_filtre($in){
//     $in['toolbar1']='formatselect,bold,italic,underline,bullist,numlist,blockquote,link,unlink,wp_more,spellchecker,wp_fullscreen,wp_adv ';
//     $in['toolbar2']='pastetext,removeformat,charmap,undo,redo ';
//     $in['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Pre=pre';
//     return $in;
// }
// add_filter('tiny_mce_before_init', 'dar_tinymce_filtre');
function yoast_bottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoast_bottom');



/*--------------------------------------
DASHBOARD
---------------------------------------*/
// ajoute un widget custom sur le dashboard
add_action('wp_dashboard_setup', 'darman_dashboard_widgets');
function darman_dashboard_widgets() {
    //global $wp_meta_boxes;
    wp_add_dashboard_widget('darman_contact', 'Contacter l\'équipe technique de Darman', 'contact_darman');
}

/*--------------------------------------
CONTACT & MAINTENANCE
---------------------------------------*/
function contact_darman() {
    echo '<p>
    Pour toutes questions ou demande d\'informations, n\'hésitez pas à nous contacter:<br><br>
    <span class="team">
        <img src="' . plugins_url( 'img/vero.png', __FILE__ ) . '" >
        <strong>Véronique</strong>
        <i><small>Pour toutes questions sur votre projet</small></i>
        <a class="link_team" href="mailto:veronique@darmandesign.fr">Contacter</a>
    </span>
    <span class="team">
        <img src="' . plugins_url( 'img/jb.png', __FILE__ ) . '" >
        <strong>Jean-Baptiste</strong>
        <i><small>Pour tous problèmes techniques</small></i>
        <a class="link_team" href="mailto:support@darmandesign.fr">Contacter</a>
    </span>
    <span>Ou par téléphone au <strong>05 62 27 09 37</strong></span><br><br>
    </p>';
}


/*----------------------------------------------------
supprime les widgets metabox du tableau de bords
----------------------------------------------------*/

add_action( 'admin_menu',  'remove_dashboard_widgets'  );
function remove_dashboard_widgets() {
    remove_action( 'welcome_panel', 'wp_welcome_panel' );
    remove_meta_box('dashboard_activity', 'dashboard', 'core');    // activité recente
    remove_meta_box('dashboard_quick_press', 'dashboard', 'core');   // brouillon rapide
    remove_meta_box('dashboard_primary', 'dashboard', 'core');    // Nouvelles de Wordpress
    remove_meta_box('dashboard_right_now', 'dashboard', 'core');   // D'un coup d oeil
}
function custom_admin_footer() {
    echo '<span class="">Réalisation <a href="http://www.studiodarman.fr/" target="_blank">Studio Darman</a></span>.';
}
add_filter( 'admin_footer_text', 'custom_admin_footer' );

/*--------------------------------------
Nettoyage du WP_HEAD
-----------------------------------------*/
// launching operation cleanup
add_action( 'init', 'head_cleanup' );
// remove WP version
add_filter( 'the_generator', 'masquer_version' );
// remove pesky injected css for recent comments widget
add_filter( 'wp_head', 'remove_wp_widget_recent_comments_style', 1 );
// clean up comment styles in the head
add_action( 'wp_head', 'remove_recent_comments_style', 1 );
// clean up gallery output in wp
add_filter( 'gallery_style', 'gallery_style' );
function head_cleanup() {
    // category feeds
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    // post and comment feeds
    remove_action( 'wp_head', 'feed_links', 2 );
    // EditURI link
    remove_action( 'wp_head', 'rsd_link' );
    // windows live writer
    remove_action( 'wp_head', 'wlwmanifest_link' );
    // index link
    remove_action( 'wp_head', 'index_rel_link' );
    // previous link
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
    // start link
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
    // links for adjacent posts
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    // WP version
    remove_action( 'wp_head', 'wp_generator' );
    // remove WP version from css
    add_filter( 'style_loader_src', 'remove_wp_ver_css_js', 9999 );
    // remove Wp version from scripts
    add_filter( 'script_loader_src', 'remove_wp_ver_css_js', 9999 );
    // all actions related to emojis
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    // filter to remove TinyMCE emojis
    //add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
} /* end bones head cleanup */

// remove WP version
function masquer_version() { return ''; }
// remove WP version from scripts
function remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
// remove injected CSS for recent comments widget
function remove_wp_widget_recent_comments_style() {
    if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
        remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
    }
}
// remove injected CSS from recent comments widget
function remove_recent_comments_style() {
    global $wp_widget_factory;
    if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
        remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
    }
}
// remove injected CSS from gallery
function gallery_style($css) {
    return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}
