<?php get_header() ?>
<div class="primary">
    <div class="main">
        <div class="container">
            <?php
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content', 'single');
            endwhile;
            ?>

            <?php

            $posts = get_posts(array(
                'post_type' => 'properties',
                'meta_query' => array(
                    array(
                        'key' => 'destination', // name of custom field
                        'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
                        'compare' => 'LIKE'
                    )
                )
            ));

            if ($posts) : ?>

                <ul>

                    <?php foreach ($posts as $post) :

                        setup_postdata($post);

                    ?>
                        <li>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </li>

                    <?php endforeach; ?>

                </ul>

                <?php wp_reset_postdata(); ?>

            <?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer() ?>