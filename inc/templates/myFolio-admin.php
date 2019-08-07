<h1>MyFolio settings page</h1>
<?php
    settings_errors();

    $firstName = esc_attr(get_option('first_name'));
    $lastName = esc_attr(get_option('last_name'));
    $fullName = $firstName.' '.$lastName;
?>

<div class="myfolio__preview">
    <div class="myfolio__preview__sidebar">
        <h1 class="myfolio__preview__sidebar__username">
            <?php print $fullName ?>
        </h1>
        <h2 class="myfolio__preview__sidebar__description">
            <?php print $userDescription = esc_attr(get_option('user_description')); ?>
        </h2>
        <div class="myfolio__preview__sidebar__icon-wrapper">

        </div>
    </div>
</div>

<form method="post" action="options.php" class="myfolio__form">
    <?php
        settings_fields('myfolio_settings_group');
        do_settings_sections('myfolio');
        submit_button();
    ?>
</form>
<?php bloginfo(); ?>
