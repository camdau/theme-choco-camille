<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

<?php
if (have_posts()) {

    while (have_posts()) {
        the_post();
        the_content();
    }
}
?>

<section class="point-sale pt-5 pb-8">
    <div class="container magasin">
        <div class="row d-flex justify-content-center">
            <img src="<?php echo get_template_directory_uri() ?>/images/int-magasin.jpg " alt="" class="img-fluid">
        </div>
    </div>

    <div class="container contact">
        <?php the_field('content_contact'); ?>
    </div>

</section>


<?php get_footer(); ?>