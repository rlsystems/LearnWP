<div class="box" data-animate="fadeInUp">
    <div class="store card border-0 rounded-0">
        <div class="position-relative store-image">
            <a href="<?php echo get_permalink() ?>">
                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php echo get_the_title() ?>" class="card-img-top rounded-0">
            </a>
            <div class="image-content position-absolute d-flex align-items-center">
                <div class="content-left">
                    <div class="badge badge-primary">Featured</div>
                </div>
                <div class="content-right ml-auto d-flex w-lg show-link">
                    <a href="<?php echo get_the_post_thumbnail_url() ?>" class="item viewing" data-toggle="tooltip" data-placement="top" title="Quickview" data-gtf-mfp="true">
                        <svg class="icon icon-expand">
                            <use xlink:href="#icon-expand"></use>
                        </svg>
                    </a>
                    <a href="#" class="item marking" data-toggle="tooltip" data-placement="top" title="Bookmark"><i class="fal fa-bookmark"></i></a>
                    <a href="#" class="item" data-toggle="tooltip" data-placement="top" title="Compare">
                        <svg class="icon icon-chart-bars">
                            <use xlink:href="#icon-chart-bars"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body px-0 pb-0 pt-3">
            <a href="<?php echo get_permalink() ?>" class="card-title h5 text-dark d-inline-block mb-2">
                <span span class="letter-spacing-25"><?php the_title(); ?></span>
            </a>
            <ul class="list-inline store-meta mb-4 font-size-sm d-flex align-items-center flex-wrap">
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
                <li class="list-inline-item separate"></li>
                <li class="list-inline-item">

                    <svg class="icon icon-bed">
                        <use xlink:href="#icon-bed"></use>
                    </svg>
                    <span>
                        <?php
                        $travelTypes = get_field('travel_type');
                        if ($travelTypes) :
                            foreach ($travelTypes as $travelType) :
                                echo get_the_title($travelType->ID);
                            endforeach;
                        endif;
                        ?>
                    </span>
                </li>
            </ul>

        </div>
        <ul class="list-inline card-footer rounded-0 border-top pt-3 mt-5 bg-transparent px-0 store-meta d-flex align-items-center">
            <li class="list-inline-item">
                <span class="d-inline-block mr-1">
                    <i class="fal fa-map-marker-alt">
                    </i>
                </span>
                <a href="#" class="text-secondary text-decoration-none link-hover-secondary-blue">
                    <?php
                    $destinations = get_field('destination');
                    if ($destinations) :
                        foreach ($destinations as $destination) :
                            echo get_the_title($destination->ID);
                        endforeach;
                    endif;
                    ?>
                </a>
            </li>
            <li class="list-inline-item separate"></li>
            <li class="list-inline-item">
                <span class="text-green">
                    <?php
                    $countries = get_field('country');
                    if ($countries) :
                        foreach ($countries as $country) :
                            echo get_the_title($country->ID);
                        endforeach;
                    endif;
                    ?>
                </span>
            </li>
        </ul>
    </div>
</div>