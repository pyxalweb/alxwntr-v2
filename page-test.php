<?php /* Template Name: Test */ ?>

<?php
get_header();
?>

<main id="site-main" class="site-main interior">
    <section class="content width-df">
        
    <!-- Call the function and pass in the ACF Field Name -->
    <?php getImage('test_field', 'test-class'); ?>

    </section>
</main>

<?php
get_footer();
