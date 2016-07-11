<?php
/*
 * Author: KhangLe
 * Template Name: Contact
 *
 */

require_once 'includes/lib/ReCaptcha/src/autoload.php';

global $omw_theme_settings;

$secret = isset($omw_theme_settings->ct_recaptcha_private_key) ? $omw_theme_settings->ct_recaptcha_private_key : '';

if (isset($_POST['g-recaptcha-response'])) {

    $recaptcha = new \ReCaptcha\ReCaptcha($secret);

    $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

    if ($resp->isSuccess()) {

        $data = array(
            'title' => isset($_POST['re_title']) ? $_POST['re_title'] : '',
            'name' => isset($_POST['re_name']) ? $_POST['re_name'] : '',
            'company' => isset($_POST['re_company']) ? $_POST['re_company'] : '',
            'email' => isset($_POST['re_email']) ? $_POST['re_email'] : '',
            'content' => isset($_POST['re_content']) ? $_POST['re_content'] : '',
            'entry_time' => gmdate("Y/m/d H:i:s", time() + 9 * 3600),
            'entry_host' => gethostbyaddr(getenv("REMOTE_ADDR")),
            'entry_ua' => getenv("HTTP_USER_AGENT"),
        );
        /* -------------------------------------------------------------- send mail */
        require_once 'includes/lib/Twig/Autoloader.php';
        Twig_Autoloader::register();

        $loader = new Twig_Loader_String;

        $twig = new Twig_Environment($loader);

        $from = $omw_theme_settings->ct_from_email;
        $fromname = $omw_theme_settings->ct_from_name;

        // Mail to Client
        $body_client = $omw_theme_settings->ct_mail_content_client;
        if (isset($body_client) && $body_client != '') {
            $body_client = $twig->render($body_client, $data);
            //
            $subject_client = $twig->render($omw_theme_settings->ct_mail_subject_client, $data);
            //
            $headers = 'From: ' . $fromname . ' <' . $from . '>' . '\r\n';
            //	
            wp_mail($data['email'], stripslashes($subject_client), stripslashes($body_client), $headers);
        }

        // Mail to Admin
        $body_admin = $omw_theme_settings->ct_mail_content_admin;
        if (isset($body_admin) && $body_admin != '') {
            $body_admin = $twig->render($body_admin, $data);
            //
            $subject_admin = $omw_theme_settings->ct_mail_subject_admin;
            //
            $list_email = $omw_theme_settings->ct_mail_list_admin;
            if (isset($list_email) && $list_email != '') {
                $list_email = preg_split('/\r\n|\n|\r/', $list_email);
                //
                $headers = 'From: ' . $fromname . ' <' . $from . '>' . '\r\n';
                //
                wp_mail($list_email, stripslashes($subject_admin), stripslashes($body_admin), $headers);
            }
        }

        wp_redirect(home_url() . '/contact/thankyou');
    } else {
        wp_redirect(home_url());
    }
}
get_header();

$page_title = get_post_meta($post->ID, 'thm_page_title', true);
?>

<section id="main" class="clearfix">
    <div id="page" class="container">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="row page-content">	
                    <?php echo do_shortcode(get_the_content()); ?>
                </div> 
            <?php endwhile; ?>
        <?php endif; ?>
        <div class="row">
            <div id="content" class="site-content col-md-10" role="main">

                <article id="post-<?php the_ID() ?>" class="post-<?php the_ID() ?> page type-page status-publish hentry">

                    <h1 class="entry-title"><?php echo $page_title ?></h1>

                    <div class="entry-content">

                        <form id="contact-info-form" name="contact-info-form" method="post" action="<?php bloginfo('url') ?>/contact" class="form-horizontal">
                            <div class="form-group req">
                                <label for="re_title" class="col-sm-4 control-label">Form of address & title<span class="mandatory">*</span></label>
                                <div class="col-sm-8">
                                    <select id="re_title" name="re_title" class="form-control">
                                        <option value="0">Select Title</option>
                                        <option value="1">Mr.</option>
                                        <option value="2">Ms.</option>
                                        <option value="3">Dr.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group req">
                                <label for="re_name" class="col-sm-4 control-label">First and last name<span class="mandatory">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" id="re_name" name="re_name" value="" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="re_company" class="col-sm-4 control-label">Company</label>
                                <div class="col-sm-8">
                                    <input type="text" id="re_company" name="re_company" value="" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group req">
                                <label for="re_email" class="col-sm-4 control-label">Email<span class="mandatory">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" id="re_email" name="re_email" value="" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group req">
                                <label for="re_content" class="col-sm-4 control-label">Content<span class="mandatory">*</span></label>
                                <div class="col-sm-8">
                                    <textarea id="re_content" name="re_content" class="form-control ctrl_vert"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 center-block">
                                    <div class="g-recaptcha" data-sitekey="<?php echo $omw_theme_settings->ct_recaptcha_public_key ?>"></div>
                                    <div id="catpcha"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 center-block text-center">
                                    <button type="submit" class="btn btn-success inline-block">Send</button>
                                    <button type="reset" class="btn btn-success inline-block">Clean</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </article>

            </div>
        </div>
        <!--/#content-->
    </div>
</section>
<!-- contact info end -->

<?php get_footer(); ?>