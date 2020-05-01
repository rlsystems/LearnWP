<?php get_header() ?>
<img class="img-fluid" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />

<div class="primary">
    <div class="main">
        <div class="container">
            <?php
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content', 'single');

            ?>
                <div>

                    <?php
                    $url = 'https://departurefinder.azurewebsites.net/api/wpproperties/';
                    $url .= get_field('property_id');

                    $request = wp_remote_get($url);

                    if (is_wp_error($request)) {
                        return false; // Bail early
                    }

                    $body = wp_remote_retrieve_body($request);
                    $data = json_decode($body, true);

                    ?> Name: <?php echo $data['Name']; ?> <br> <?php
                                            ?> Country: <?php echo $data['Country']; ?> <br> <?php
                                                    ?> Region: <?php echo $data['Region']; ?> <br> <?php
                                                ?> Style: <?php echo $data['Style']; ?> <br> <?php
                                                foreach ($data['Itineraries'] as $item) {
                                                ?> Itinerary: <?php echo $item['Name']; ?>
                        <br>
                    <?php
                                                }
                                                foreach ($data['CabinDTOs'] as $item) {
                    ?> Cabin: <?php echo $item['Name']; ?> <br>
                    <?php
                                                }
                    ?>

                    <img src="<?php echo $data['ImageUrl']; ?>">


                </div>

                <div class="row">
                    <div class="pages col-6 text-left"><?php next_post_link('&laquo; %link'); ?></div>
                    <div class="pages col-6 text-right"><?php previous_post_link('%link &raquo;'); ?></div>
                </div>
            <?php


            endwhile;
            ?>
        </div>
    </div>
</div>
<?php get_footer() ?>