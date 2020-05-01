<div class="box" data-animate="zoomIn">
    <div class="card border-0">
        <a class="hover-scale" href="<?php echo get_permalink() ?>">
            <img src="<?php echo get_the_post_thumbnail_url()?>" alt="<?php echo get_the_title() ?>" class="image">
        </a>
        <div class="card-body px-0 pt-4">
            <h5 class="mb-0 card-title">
                <a href="<?php echo get_permalink() ?>" class="font-size-h5 link-hover-dark-primary">
                    <?php the_title(); ?>
                </a>
            </h5>
            <span class="card-text font-size-md">
                4 Listing
            </span>
        </div>

    </div>
</div>