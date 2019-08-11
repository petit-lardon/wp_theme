<h1>MyFolio theme support</h1>
<?php
    settings_errors();
?>

<form method="post" action="options.php" class="myfolio__form">
    <?php
        settings_fields('myfolio_theme_support');
        do_settings_sections('myfolio_theme_support_page');
        submit_button();
    ?>
</form>
