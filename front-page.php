<?php get_header(); ?>

<?php
if (have_posts()) {

    while (have_posts()) {
        the_post();
    }
}
?>
<section class="slider">
    <?php echo do_shortcode("[slide_chocolate]")?>
</section>

<section class="bg-rose pt-5 pb-8">
    <div class="container">
        <?php the_field('content_pink'); ?>
    </div>

</section>

<section class="bg-cacao pt-5 pb-8">
    <div class="container">
        <?php the_field('content_white'); ?>
    </div>

</section>


<?php get_footer(); ?>