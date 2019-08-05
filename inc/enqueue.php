<?php
/**
 * @package myFolioTheme
 * User: jlavie
 *
 * ====================
 * ADMIN PAGE ENQUEUE FUNCTIONS
 * ====================
 */

function myfolio_load_admin_scripts($hook) {
    if('toplevel_page_myfolio' != $hook) {
        return;
    }
    //on déclare un nouveau fichier css avec un ID
    wp_register_style('myfolio_admin', get_template_directory_uri().'/css/myfolio.admin.css', array(), '1.0.0', 'all');

    //ajoute et lance le CSS déclaré précédemment
    wp_enqueue_style('myfolio_admin');
}
//avec cette action, la fonction dans le fichier ne sera appelé que si on est connecté à l'administration
add_action('admin_enqueue_scripts', 'myfolio_load_admin_scripts');
