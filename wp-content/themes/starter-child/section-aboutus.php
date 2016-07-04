<?php
/**
 * Author: KhangLe
 * Template Name: Section About Us
 */
?>

<section id="about-us" class="page-wrapper light-bg">
    <div class="container">
        <div class="row page-content">

            <?php
            $args = array(
                'post_type' => 'company',
                'posts_per_page' => -1,
            );
            $loop = new WP_Query($args);
            ?>
            <?php if ($loop->have_posts()): ?>
                <?php while ($loop->have_posts()): $loop->the_post(); ?>

                    <?php
                    $bg_color = 'background:' . get_field('bg_color') . ';';
                    $style = 'style="' . $bg_color . '"';
                    ?>

                    <div class="feature-box col-md-4 col-sm-6 col-xs-12">
                        <div class="feature-box-1 pull-left">
                            <span <?php echo $style ?>>
                                <i class="fa <?php echo get_field('icon') ?> icon-custom-style"></i>
                            </span>
                        </div>
                        <div class="feature-box-2">
                            <h3><?php the_title() ?></h3>
                            <p><?php the_content() ?></p>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata() ?>

        </div>
    </div>
</section>