<?php
/*
 * Author: KhangLe
 *
 */
get_header();
?>

<section id="main" class="container">
    <div class="row page-content">

        <header class="page-header">
            <h1 class="page-title">經營項目</h1>
        </header> <!-- .page-header -->

        <?php echo do_shortcode('[omw_load_business]') ?>

    </div>
    <!-- .row -->
</section>

<?php get_footer(); ?>