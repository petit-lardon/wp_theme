<?php
/**
 * Created by PhpStorm.
 * User: jlavie
 * Date: 04/08/2019
 * Time: 16:22
 *
 * ====================
 * ADMIN PAGE
 * ====================
 */

function folio_add_admin_page() {
    $page_title = 'Folio options';
    $menu_title = 'MyFolio';                //Nom affiché dans le menu du BO
    $capability = 'manage_options';         //Droits pour accéder à la page (manage_options = admin)
    $menu_slug = 'myfolio';                 //Slug unique dans l'URL
    $function = 'myfolio_theme_create_page';//Fonction appellée pour afficher le contenu
    //$icon_url = get_template_directory_uri().'/image/folio-icon.png';
    $icon_url = 'dashicons-schedule';       //Chemin de l'icone utilisée dans le menu
    $position = 110;                        //Position du module dans la liste des options dans le BO
    $sub_menu_settings = 'settings';
    $sub_menu_css = 'css';
    $sub_menu_css_function = 'myfolio_theme_css_page';

    add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);

    add_submenu_page($menu_slug, $menu_title, $sub_menu_settings, $capability, $menu_slug,$function);
    add_submenu_page($menu_slug, $menu_title.' '.$sub_menu_css, $sub_menu_css, $capability, $menu_slug.'_'.$sub_menu_css,$sub_menu_css_function);
}

//afficher notre page dans l'admin menu
add_action('admin_menu', 'folio_add_admin_page');

function myfolio_theme_create_page() {
    echo '<h1>MyFolio settings page</h1>';
}

function myfolio_theme_css_page() {
    echo '<h1>MyFolio css page</h1>';
}
