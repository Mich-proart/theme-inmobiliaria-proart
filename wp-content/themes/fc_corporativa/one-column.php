<?php

/* Template Name: One Column */

get_header('top-bar');
?>

<section class="px-extra">
    <div class="container text-center py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9">
                <h1 class="color-grey fw-semi-bold text-uppercase">
                    <?php the_title();?>
                </h1>
                <div class="text-left pt-5 pt-lg-4 pb-lg-5 pb-3 mb-3
                onecolumn-body formato">
                    <?php the_field('onecolumn_txt'); ?>
                </div>
            </div>
        </div>
</section>

<?php

get_footer();
