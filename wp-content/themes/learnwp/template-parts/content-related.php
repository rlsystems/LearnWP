<div class="col-lg-4 mb-4 mb-lg-0">
    <div class="store media align-items-stretch bg-white">
        <div class="store-image position-relative">
            <a href="<?php echo get_permalink() ?>">
                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php echo get_the_title() ?>">
            </a>
            
        </div>
        <div class="media-body pl-0 pl-sm-3 pt-4 pt-sm-0">
            <a href="<?php echo get_permalink() ?>" class="font-size-md font-weight-semibold text-dark d-inline-block mb-2 lh-11"><span class="letter-spacing-25"><?php echo get_the_title() ?></span> </a>
            <ul class="list-inline store-meta mb-2 lh-1 font-size-sm d-flex align-items-center flex-wrap">
                <li class="list-inline-item">
                    <span>
                        <?php
                        $styles = get_field('style');
                        if ($styles) :
                            foreach ($styles as $style) :
                                echo get_the_title($style->ID);
                            endforeach;
                        endif;
                        ?>
                    </span>
                </li>
                <li class="list-inline-item separate"></li>
                <li class="list-inline-item">
                    <span class="mr-1">From</span>
                    <span class="text-danger font-weight-semibold">
                        <?php
                        $price = number_format(get_field('price_from'), 0, '.', ',');
                        echo "$" . $price;
                        ?>+
                    </span>
                </li>
            </ul>
            <div>
                <span class="d-inline-block mr-1"><i class="fal fa-map-marker-alt">
                    </i>
                </span>
                <?php
                    $countries = get_field('country');
                    if ($countries) :
                        foreach ($countries as $country) :
                            echo get_the_title($country->ID);
                        endforeach;
                    endif;
                    ?>
             
            </div>
        </div>
    </div>
</div>