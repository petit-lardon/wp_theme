<h1>MyFolio settings page</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php">
    <?php
        settings_fields('myfolio_settings_group');
        do_settings_sections('myfolio');
        submit_button();
    ?>
</form>
<?php bloginfo(); ?>
