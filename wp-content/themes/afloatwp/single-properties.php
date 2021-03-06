<?php get_header() ?>

<?php
while (have_posts()) :
    the_post();

    $url = 'https://departurefinder.azurewebsites.net/api/wpproperties/';
    $url .= get_field('property_id');

    $request = wp_remote_get($url);

    if (is_wp_error($request)) {
        return false; // Bail early
    }

    $body = wp_remote_retrieve_body($request);
    $data = json_decode($body, true);

?>
    <!-- Content Wrapper -->
    <div id="wrapper-content" class="wrapper-content pb-0 pt-0 ">
        <div class="banner" style="background-image:url(<?php
                                                        if (class_exists('MultiPostThumbnails')) :
                                                            $url = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'secondary-image');
                                                            echo $url;
                                                        endif;
                                                        ?>);">
            <div class="container">
                <div class="banner-content">
                    <div class="heading fadeInDown animated" data-animate="fadeInDown">
                        <div class="row">
                            <div class="col-lg-8">
                                <h1 class="mb-2 text-white text-uppercase banner-text-large">
                                    <?php the_title(); ?>
                                </h1>
                                <!-- -->
                                <h6 class="mb-0 text-white text-uppercase banner-text-small">
                                    <!-- Destination -->
                                    <?php
                                    $destinations = get_field('destination');
                                    $count = 0;
                                    if ($destinations) :
                                        foreach ($destinations as $destination) :
                                            if ($count > 0) {
                                                echo ", ";
                                            }
                                    ?>
                                            <a class="" href="<?php echo the_permalink($destination->ID); ?>"><?php echo get_the_title($destination->ID);
                                                                                                                $count += 1; ?></a>
                                    <?php

                                        endforeach;
                                    endif;
                                    ?> /
                                    <!-- Country -->
                                    <?php
                                    $countries = get_field('country');
                                    $count = 0;
                                    if ($countries) :
                                        foreach ($countries as $country) :
                                            if ($count > 0) {
                                                echo ", ";
                                            }
                                            echo get_the_title($country->ID);
                                            $count += 1;
                                        endforeach;
                                    endif;
                                    ?>
                                </h6>
                            </div>
                            <div class="col-lg-4 pt-6">
                                <span class="float-right banner-text-small text-uppercase pr-2" id="priceFromTitle">Price From</span><br>

                                <span class="float-right banner-text-med text-uppercase" id="priceFrom">
                                    <?php
                                    $price = number_format(get_field('price_from'), 0, '.', ',');
                                    echo "$" . $price;
                                    ?>
                                </span>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- Price Change -->
        <script>
            function ChangeTitle(price, itineraryName) {
                var formatter = new Intl.NumberFormat('en-US', {
                    style: 'currency',
                    currency: 'USD',
                    minimumFractionDigits: 0
                });
           
                document.getElementById("priceFrom").textContent = formatter.format(price);
                document.getElementById("priceFromTitle").textContent = itineraryName;
            }
        </script>

        <!-- Page wrapper -->
        <div class="page-wrapper bg-white">
            <div class="container">
                <!-- Page Content -->
                <div class="page-container row bg-white pb-9 pt-1">

                    <!-- Left Content -->
                    <div class="page-content col-12 mb-8 mb-xl-0 pt-1">
                        <div class="collapse-tabs">
                            <div class="tabs border-bottom pb-2 mb-6 d-none d-sm-block">

                                <!-- Tab Nav -->
                                <ul class="nav nav-pills tab-style-01" role="tablist">
                                    <!-- Overview Tab Nav -->
                                    <li class="nav-item">
                                        <a class="nav-link active" onclick="ChangeTitle('<?php echo $data['LowestPrice'] ?>', 'Price From');" id="overview-tab" data-toggle="tab" href="#overview" role="tab" >Overview</a>
                                    </li>
                                    <!-- Itinerary Loop Tab Nav -->
                                    <?php
                                    foreach ($data['Itineraries'] as $item) {
                                    ?>
                                        <li class="nav-item">
                                            <a class="nav-link" onclick="ChangeTitle('<?php echo $item['LowestPrice'] ?>', '<?php echo $item['ShortName'] ?> From');" id="itinerary-<?php echo $item['Id']; ?>-tab" data-toggle="tab" href="#itinerary-<?php echo $item['Id']; ?>" role="tab"><?php echo $item['ShortName']; ?> </a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                    <!-- Cabin Tab Nav -->
                                    <li class="nav-item">
                                        <a class="nav-link active" onclick="ChangeTitle('<?php echo $data['LowestPrice'] ?>', 'Price From');" id="cabins-tab" data-toggle="tab" href="#cabins" role="tab" >Cabins</a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Tab Content -->
                            <div class="tab-content">
                                <!-- Pane Overview -->
                                <div class="tab-pane fade active show" id="overview" role="tabpanel">
                                    <!-- Content Pane -->
                                    <div class="page-container row">
                                        <!-- Left -->
                                        <div class="page-content col-lg-9 order-1 order-lg-0">
                                            <div class="page-content-inner">
                                                <div class="card-body p-sm-0 border-sm-0">
                                                    <div class="mb-7">
                                                        <?php echo get_the_post_thumbnail($post->ID, 'large') ?>
                                                    </div>
                                                    <div class="mb-7">
                                                        <?php the_content() ?>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <!-- Right -->
                                        <div class="sidebar col-lg-3 order-0 order-lg-1 pb-8 pb-lg-0 primary-sidebar sidebar-sticky" id="sidebar">
                                            <div class="primary-sidebar-inner sidebar-inner">
                                                <!-- Info -->
                                                <div class="card px-0 widget border-0 rounded-0 mb-6 bg-grey-06">
                                                    <div class="card-title text-uppercase text-dark font-weight-semibold font-size-md">
                                                        <span>Cruise Information</span>
                                                    </div>
                                                    <div class="card-body px-0 pb-0">
                                                        <ul class="list-group list-group-flush">

                                                            <li class="list-group-item bg-transparent d-flex text-dark px-0">
                                                                <label class="font-weight-semibold text-dark mb-0">Price Range</label>
                                                                <span class="text-green font-weight-semibold font-size-md ml-auto">
                                                                    <?php
                                                                    $price = number_format($data['LowestPrice'], 0, '.', ',');
                                                                    echo "$" . $price;
                                                                    ?>
                                                                    -
                                                                    <?php
                                                                    $price = number_format($data['HighestPrice'], 0, '.', ',');
                                                                    echo "$" . $price;
                                                                    ?>
                                                                </span>
                                                            </li>
                                                            <li class="list-group-item bg-transparent d-flex text-dark px-0">
                                                                <label class="font-weight-semibold text-dark mb-0">Style</label>
                                                                <span class="text-primary font-weight-semibold font-size-md ml-auto">
                                                                    <!-- Style -->
                                                                    <?php $styles = get_field('style');
                                                                    if ($styles) :
                                                                        foreach ($styles as $style) :
                                                                            echo get_the_title($style->ID);
                                                                        endforeach;
                                                                    endif;
                                                                    ?>

                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- End Info -->
                                                <!-- Highlights -->
                                                <div class="card-body px-0 pb-3">

                                                    <div class="card-title text-uppercase text-dark font-weight-semibold font-size-md">
                                                        <?php
                                                        $types = get_field('travel_type');
                                                        if ($types) :
                                                            foreach ($types as $type) :
                                                                echo get_the_title($type->ID);
                                                            endforeach;
                                                        endif;
                                                        ?>
                                                        Highlights
                                                    </div>
                                                    <?php echo get_field('highlights'); ?>

                                                </div>
                                                <!-- End Highlights -->
                                                <!-- Contact Form -->
                                                <div class="card-body px-0 pb-3">
                                                    <div class="card-title text-uppercase text-dark font-weight-semibold font-size-md">
                                                        <span>Send an Enquiry</span>
                                                    </div>
                                                    <div class="contact-form">
                                                        <form>
                                                            <div class="form-group mb-2">
                                                                <label class="sr-only" for="name">Name</label>
                                                                <input type="text" id="name" class="form-control form-control-sm" placeholder="Name:">
                                                            </div>
                                                            <div class="form-group mb-2">
                                                                <label class="sr-only" for="email">Email</label>
                                                                <input type="text" id="email" class="form-control form-control-sm" placeholder="Email Address:">
                                                            </div>
                                                            <div class="form-group mb-2">
                                                                <label class="sr-only" for="message">Message</label>
                                                                <textarea class="form-control" id="message" placeholder="Message..."></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary btn-block btn-sm">Send Message
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- End Contact Form -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pane Itinerary Loop -->
                                <?php
                                foreach ($data['Itineraries'] as $item) {
                                ?>
                                    <div class="tab-pane fade" id="itinerary-<?php echo $item['Id']; ?>" role="tabpanel">
                                        <!-- Content Pane -->
                                        <div class="page-container row">
                                            <!-- Left -->
                                            <div class="page-content col-lg-9 order-1 order-lg-0">
                                                <div class="card-body p-sm-0 border-sm-0">
                                                    <div class="mb-7">
                                                        <img src="<?php echo $item['ImageDTOs'][0]['ImageUrl'] ?>">
                                                    </div>
                                                    <h4><?php echo $item['Name'] ?></h4>
                                                    <!-- Days -->
                                                    <?php $days = $item['ItineraryDays'];
                                                    if ($days) :
                                                        foreach ($days as $day) :

                                                    ?>
                                                            <hr>
                                                            <h5><span class="badge badge-primary">Day <?php echo $day['DayNumber']; ?></span> <?php echo $day['Title']; ?></h5>
                                                            <?php
                                                            echo $day['Excerpt'];
                                                            ?>

                                                    <?php
                                                        endforeach;
                                                    endif;
                                                    ?>
                                                </div>
                                            </div>
                                            <!-- Right -->
                                            <div class="sidebar col-lg-3 order-0 order-lg-1 pb-8 pb-lg-0 primary-sidebar sidebar-sticky" id="sidebar">
                                                <div class="primary-sidebar-inner sidebar-inner">
                                                    <!-- Info -->
                                                    <div class="card px-0 widget border-0 rounded-0 mb-6 bg-grey-06">
                                                        <div class="card-title text-uppercase text-dark font-weight-semibold font-size-md">
                                                            <span>Cruise Information</span>
                                                        </div>
                                                        <div class="card-body px-0 pb-0">
                                                            <ul class="list-group list-group-flush">

                                                                <li class="list-group-item bg-transparent d-flex text-dark px-0">
                                                                    <label class="font-weight-semibold text-dark mb-0">Price Range</label>
                                                                    <span class="text-green font-weight-semibold font-size-md ml-auto">
                                                                        <?php
                                                                        $price = number_format($item['LowestPrice'], 0, '.', ',');
                                                                        echo "$" . $price;
                                                                        ?>
                                                                        -
                                                                        <?php
                                                                        $price = number_format($item['HighestPrice'], 0, '.', ',');
                                                                        echo "$" . $price;
                                                                        ?>
                                                                    </span>
                                                                </li>
                                                                <li class="list-group-item bg-transparent d-flex text-dark px-0">
                                                                    <label class="font-weight-semibold text-dark mb-0">Style</label>
                                                                    <span class="text-primary font-weight-semibold font-size-md ml-auto">
                                                                        <!-- Style -->
                                                                        <?php $styles = get_field('style');
                                                                        if ($styles) :
                                                                            foreach ($styles as $style) :
                                                                                echo get_the_title($style->ID);
                                                                            endforeach;
                                                                        endif;
                                                                        ?>

                                                                    </span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- End Info -->
                                                    <div class="card-body bg-grey px-0 pb-0">

                                                        <div class="card-title text-uppercase text-dark font-weight-semibold font-size-md">
                                                            <span>2020 Availability</span><span class="float-right badge badge-primary">Promos</span>
                                                        </div>
                                                        </h4>
                                                        <ul class="list-group list-group-flush">
                                                            <?php
                                                            $months = $item['DepartureMonths'];
                                                            if ($months) :
                                                                foreach ($months as $month) :
                                                            ?>
                                                                    <li class="list-group-item bg-transparent d-flex text-dark px-0 border-top-0">
                                                                        <label class="text-dark font-weight-semibold mb-0"><?php echo $month['MonthName']; ?></label>
                                                                        <span class="text-dark ml-auto">
                                                                            <?php
                                                                            $days = $month['Days'];
                                                                            if ($days) :
                                                                                foreach ($days as $day) :
                                                                                    if ($day['HasPromo'] == true) {
                                                                            ?>
                                                                                        <span class="ml-1" style="color: #00b099;">
                                                                                            <?php echo $day['Day']; ?>
                                                                                        </span>
                                                                                    <?php
                                                                                    } else {
                                                                                    ?>
                                                                                        <span class="ml-1">
                                                                                            <?php echo $day['Day']; ?>
                                                                                        </span>
                                                                            <?php
                                                                                    }


                                                                                endforeach;
                                                                            endif;
                                                                            ?>
                                                                        </span>
                                                                    </li>
                                                            <?php
                                                                endforeach;
                                                            endif;


                                                            ?>
                                                        </ul>



                                                    </div>
                                                    </span>
                                                    <!-- Inclusions -->
                                                    <div class="card-body px-0 pb-0 mt-5">
                                                        <div class="card-title text-uppercase text-dark font-weight-semibold font-size-md">
                                                            <span>Inclusions</span>
                                                        </div>
                                                        <ul class="icon-list list-group list-group-flush list-group-borderless">
                                                            <?php
                                                            $inclusions = $item['Inclusions'];
                                                            if ($inclusions) :
                                                                foreach ($inclusions as $inclusion) :
                                                            ?>
                                                                    <li class="list-group-item p-0 mb-3 icon-box no-shape icon-box-style-03 ">
                                                                        <span class="icon-box-icon d-inline-block mr-1">+</span>
                                                                        <span>
                                                                            <?php
                                                                            echo $inclusion['Description'];
                                                                            ?>
                                                                        </span>
                                                                    </li>
                                                            <?php
                                                                endforeach;
                                                            endif;
                                                            ?>
                                                        </ul>
                                                    </div>
                                                    <!-- Exclusions -->
                                                    <div class="card-body px-0 pb-0 mt-5">
                                                        <div class="card-title text-uppercase text-dark font-weight-semibold font-size-md">
                                                            <span>Exclusions</span>
                                                        </div>
                                                        <ul class="icon-list list-group list-group-flush list-group-borderless">
                                                            <?php
                                                            $exclusions = $item['Exclusions'];
                                                            if ($exclusions) :
                                                                foreach ($exclusions as $exclusion) :
                                                            ?>
                                                                    <li class="list-group-item p-0 mb-3 icon-box no-shape icon-box-style-03 ">
                                                                        <span class="icon-box-icon d-inline-block mr-1">-</span>
                                                                        <span>
                                                                            <?php
                                                                            echo $exclusion['Description'];
                                                                            ?>
                                                                        </span>
                                                                    </li>
                                                            <?php
                                                                endforeach;
                                                            endif;
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                }
                                ?>
                                <!-- Pane Cabin -->
                                <div class="tab-pane fade" id="cabins" role="tabpanel">
                                    <!-- Content Pane -->
                                    <div class="page-container row">
                                        <!-- Left -->
                                        <div class="page-content col-lg-9 order-1 order-lg-0">
                                            <div class="page-content-inner">
                                                <div class="card-body p-sm-0 border-sm-0">
                                                    <h4>Quick Facts</h4>
                                                    <span class="font-weight-semibold font-size-md">Number Of Cabins: </span><?php echo $data['NumberOfCabins']; ?><br>
                                                    <span class="font-weight-semibold font-size-md">Capacity: </span><?php echo $data['PaxCapacity']; ?><br>
                                                    <span class="font-weight-semibold font-size-md">Option to Share: </span><?php echo $data['OptionToShare']; ?><br>
                                                    <span class="font-weight-semibold font-size-md">Interconnectable Cabins: </span><?php echo $data['InterconnectableCabins']; ?><br>
                                                    <span class="font-weight-semibold font-size-md">Air Conditioning: </span><?php echo $data['AirConditioning']; ?><br>
                                                    <hr>
                                                    <?php
                                                    $count = 0;
                                                    foreach ($data['CabinDTOs'] as $item) {
                                                    ?>
                                                        <h4><?php echo $item['Name']; ?></h4>
                                                        <img class="mb-4" src="<?php echo $item['ImageDTOs'][0]['ImageUrl']; ?>"><br>
                                                        <span class="font-weight-semibold font-size-md">Size: </span><?php echo $item['Size']; ?><br>
                                                        <span class="font-weight-semibold font-size-md">Beds: </span><?php echo $item['Beds']; ?><br>
                                                        <span class="font-weight-semibold font-size-md">Windows: </span><?php echo $item['Windows']; ?><br>
                                                        <?php echo $item['Features']; ?>
                                                        <hr>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Right -->
                                        <div class="sidebar col-lg-3 order-0 order-lg-1 pb-8 pb-lg-0 primary-sidebar sidebar-sticky" id="sidebar">
                                            <div class="primary-sidebar-inner sidebar-inner">
                                                <!-- Highlights -->
                                                <div class="card-body px-0 pb-3">

                                                    <div class="card-title text-uppercase text-dark font-weight-semibold font-size-md">
                                                        <?php
                                                        $types = get_field('travel_type');
                                                        if ($types) :
                                                            foreach ($types as $type) :
                                                                echo get_the_title($type->ID);
                                                            endforeach;
                                                        endif;
                                                        ?>
                                                        Highlights
                                                    </div>
                                                    <?php echo get_field('highlights'); ?>

                                                </div>
                                                <!-- End Highlights -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Tab Content -->
                        </div>
                        <!-- End Left Content -->

                    </div>
                    <!-- End Page Content -->
                </div>
            </div>
            <!-- end page wrapper -->
        </div>
        <!-- End Content Wrapper -->
    </div>

    <!-- Recently Viewed-->
    <div class="recent-view bg-white pt-9 pb-11">
        <div class="container">
            <div class="mb-6">
                <h5 class="mb-0">
                    Related Travel
                </h5>
            </div>
            <div class="row">
                <?php
                //loop
                $args = array(
                    'post_type' => 'properties',
                    'posts_per_page' => 3

                );
                $secondary = new WP_Query($args);
                if ($secondary->have_posts()) :
                    while ($secondary->have_posts()) : $secondary->the_post();
                        get_template_part('template-parts/content', 'related');
                    endwhile;
                    wp_reset_postdata(); //very important to rest after custom query
                endif;
                ?>
            </div>
        </div>
    </div>
    <!-- #wrapper-content end -->
    </div>
<?php


endwhile;
?>
<!-- #site-wrapper end-->
<?php get_footer() ?>