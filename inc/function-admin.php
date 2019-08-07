<?php
/**
 * @package myFolioTheme
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

    //action dans la création de la page. si page pas créée, la fonction suivante ne sera pas appelée
    add_action('admin_init', 'myfolio_custom_settings');
}

//afficher notre page dans l'admin menu
add_action('admin_menu', 'folio_add_admin_page');

function myfolio_theme_create_page() {
    require_once(get_template_directory().'/inc/templates/myFolio-admin.php');
}

function myfolio_theme_css_page() {
    echo '<h1>MyFolio css page</h1>';
}

function myfolio_custom_settings() {
    register_setting('myfolio_settings_group', 'profile_picture');
    register_setting('myfolio_settings_group', 'first_name');
    register_setting('myfolio_settings_group', 'last_name');
    register_setting('myfolio_settings_group', 'user_description');
    register_setting('myfolio_settings_group', 'twitter_link', 'myfolio_twitter_sanitize');
    register_setting('myfolio_settings_group', 'facebook_link');

    add_settings_section('myfolio-sidebar-options', 'Sidebar options', 'myfolio_sidebar_options', 'myfolio');

    add_settings_field('sidebar-profile-picture', 'My picture', 'myfolio_sidebar_profile_picture', 'myfolio', 'myfolio-sidebar-options');
    add_settings_field('sidebar-name', 'Full name', 'myfolio_sidebar_name', 'myfolio', 'myfolio-sidebar-options');
    add_settings_field('sidebar-user-description', 'User description', 'myfolio_sidebar_user_description', 'myfolio', 'myfolio-sidebar-options');
    add_settings_field('sidebar-twitter', 'Twitter', 'myfolio_sidebar_twitter', 'myfolio', 'myfolio-sidebar-options');
    add_settings_field('sidebar-facebook', 'Facebook', 'myfolio_sidebar_facebook', 'myfolio', 'myfolio-sidebar-options');
}

function myfolio_sidebar_options() {
    echo 'Customize your sidebar informations';
}

function myfolio_sidebar_profile_picture() {
    $picture = esc_attr(get_option('profile_picture'));
    echo '<input class="button button-secondary" type="button" id="upload-button" value="Upload profile picture" /><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" />';
}

function myfolio_sidebar_name() {
    $firstName = esc_attr(get_option('first_name'));
    $lastName = esc_attr(get_option('last_name'));
    echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="first name" />';
    echo '<input type="text" name="last_name" value="'.$lastName.'" placeholder="last name" />';
}

function myfolio_sidebar_user_description() {
    $userDescription = esc_attr(get_option('user_description'));
    echo '<input type="text" name="user_description" value="'.$userDescription.'" placeholder="little description" />';
}

function myfolio_sidebar_twitter() {
    $twitter = esc_attr(get_option('twitter_link'));
    echo '<input type="text" name="twitter_link" value="'.$twitter.'" placeholder="Twitter" />
    <p class="description">Input your Twitter username without @</p>';
}

function myfolio_sidebar_facebook() {
    $facebook = esc_attr(get_option('facebook_link'));
    echo '<input type="text" name="facebook_link" value="'.$facebook.'" placeholder="Facebook" />';
}

function myfolio_twitter_sanitize($input) {
    //strip html
    $output = sanitize_text_field($input);
    $output = str_replace('@', '', $output);
    return$output;
}
