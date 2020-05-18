<div class="col-md-4 mb-4" data-animate="zoomIn">
    <div class="card border-0">
        <a href="<?php the_permalink() ?>" class="hover-scale">
        <div class="card-img-top image">
            <?php the_post_thumbnail('blog-image-crop') ?>
        </div>
           
        </a>
        <div class="card-body px-0">
            <div class="mb-2"><?php the_tags('', ', '); ?></div>
            <h5 class="card-title lh-13 letter-spacing-25">
                <a href="<?php the_permalink() ?>" class="link-hover-dark-primary text-capitalize">
                <?php the_title(); ?>
                </a>
            </h5>
            <p>
                <?php the_excerpt() ?>
            </p>
            <ul class="list-inline">
                <li class="list-inline-item mr-0">
                    <span class="text-gray"><?php echo get_the_date( 'F j, Y' ); ?></span>
                </li>            
            </ul>
        </div>
    </div>
</div>