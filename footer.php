<section class="reassurance bg-pink2 pt-3 pb-3">
    <div class="container">
        <?php dynamic_sidebar('reassurance'); ?>
    </div>
</section>
<footer class="pt-3 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                ?>
                <a href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo $logo[0]; ?> " alt="" class="img-fluid">
                </a>
            </div>
            <div class="col-md-9 border bg-white pt-3 pb-3">
                <div class="row">
                    <div class="col-md-4">
                        <?php dynamic_sidebar('footer-info-col-1'); ?>
                    </div>
                    <div class="col-md-4">
                        <?php dynamic_sidebar('footer-info-col-2'); ?>
                    </div>
                    <div class="col-md-4">
                        <?php dynamic_sidebar('footer-info-col-3'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer() ?>

</body>

</html>