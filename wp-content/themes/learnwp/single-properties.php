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
        <!-- Header image -->
        <div class="image">
            <?php
            if (class_exists('MultiPostThumbnails')) :
                MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image');
            endif;
            ?>
        </div>


        <!-- Page wrapper -->
        <div class="page-wrapper bg-white">
            <div class="container">

                <!-- Page Title -->
                <div class="page-title pt-7 pb-5">
                    <div class="explore-details-top d-flex flex-wrap flex-lg-nowrap bg-white">
                        <div class="store">
                            <!-- Property Name -->
                            <div class="d-flex flex-wrap">
                                <h2 class="text-dark mr-3"><?php echo $data['Name']; ?>
                                </h2>
                            </div>
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
                                    <a href="<?php echo the_permalink($destination->ID); ?>"><?php echo get_the_title($destination->ID);
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
                            ?> /
                            <!-- Style -->
                            <?php $styles = get_field('style');
                            $count = 0;
                            if ($styles) :
                                foreach ($styles as $style) :
                                    if ($count > 0) {
                                        echo ", ";
                                    }
                                    echo get_the_title($style->ID);
                                    $count += 1;
                                endforeach;
                            endif;
                            ?>


                        </div>
                        <!-- share links -->
                        <div class="ml-0 ml-lg-auto mt-4 mt-lg-0 d-flex flex-wrap flex-sm-nowrap">
                            <h2 class="text-dark mr-3 mb-2">
                                <?php
                                $price = number_format(get_field('price_from'), 0, '.', ',');
                                echo "$" . $price;
                                ?>+
                            </h2>
                        </div>

                    </div>

                </div>

                <!-- Page Content -->
                <div class="page-container row bg-white pb-9">

                    <!-- Left Content -->
                    <div class="page-content col-12 mb-8 mb-xl-0 pt-1">
                        <div class="collapse-tabs">
                            <div class="tabs border-bottom pb-2 mb-6 d-none d-sm-block">

                                <!-- Tab Nav -->
                                <ul class="nav nav-pills tab-style-01" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                                    </li>
                                    <!-- Itinerary Loop Tab Nav -->
                                    <?php
                                    $count = 0;
                                    foreach ($data['Itineraries'] as $item) {

                                    ?>
                                        <li class="nav-item">
                                            <a class="nav-link" id="itinerary-<?php echo $item['Id']; ?>-tab" data-toggle="tab" href="#itinerary-<?php echo $item['Id']; ?>" role="tab" aria-controls="itinerary-<?php echo $item['Id']; ?>" aria-selected="false"><?php echo $item['ShortName']; ?> </a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                    <!-- End Itinerary Loop Tab Nav -->
                                    <li class="nav-item">
                                        <a class="nav-link" id="cabins-tab" data-toggle="tab" href="#cabins" role="tab" aria-controls="cabins" aria-selected="false">Cabins</a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Tab Content -->
                            <div class="tab-content">
                                <div id="collapse-tabs-accordion">

                                    <!-- Overview -->
                                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                        <div class="card bg-transparent mb-4 mb-sm-0">
                                            <div class="card-header d-block d-sm-none bg-transparent px-0 py-1" id="headingOverview">
                                                <h5 class="mb-0">
                                                    <button class="btn text-uppercase btn-block" data-toggle="collapse" data-target="#overview-collapse" aria-expanded="true" aria-controls="overview-collapse">
                                                        Overview
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="overview-collapse" class="collapse show collapsible" aria-labelledby="headingOverview" data-parent="#collapse-tabs-accordion">
                                                <div class="row">
                                                    <!-- left -->
                                                    <div class="col-lg-8 col-sm-12">
                                                        <div class="card-body p-sm-0 border-sm-0">
                                                            <div class="mb-7">
                                                                <?php echo get_the_post_thumbnail($post->ID, 'large') ?>
                                                            </div>
                                                            <div class="mb-7">
                                                                <?php the_content() ?>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- right -->
                                                    <div class="col-lg-4 col-sm-12">
                                                        <div class="card-body px-0 pb-3">
                                                            <!-- Country -->
                                                            <div class="card-title text-uppercase text-dark font-weight-semibold font-size-md">
                                                                <?php
                                                                $types = get_field('travel_type');
                                                                if ($types) :
                                                                    foreach ($types as $type) :
                                                                        echo get_the_title($type->ID);
                                                                    endforeach;
                                                                endif;
                                                                ?>
                                                                
                                                                <span>Highlights</span>
                                                            </div>
                                                            <?php echo get_field('highlights'); ?>
                                                        </div>
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
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Itineraries -->
                                    <?php
                                    $count = 0;
                                    foreach ($data['Itineraries'] as $item) {

                                    ?>
                                        <div class="tab-pane" id="itinerary-<?php echo $item['Id']; ?>" role="tabpanel" aria-labelledby="<?php echo $item['Id']; ?>-tab">
                                            <div class="card bg-transparent mb-4 mb-sm-0">
                                                <div class="card-header d-block d-sm-none bg-transparent px-0 py-1" id="heading-<?php echo $item['Id']; ?>">
                                                    <h5 class="mb-0">
                                                        <button class="btn text-uppercase btn-block collapsed" data-toggle="collapse" data-target="#itinerary-<?php echo $item['Id']; ?>-collapse" aria-expanded="true" aria-controls="overview-collapse">
                                                            <?php echo $item['ShortName']; ?>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="itinerary-<?php echo $item['Id']; ?>-collapse" class="collapse collapsible" aria-labelledby="headingReview" data-parent="#collapse-tabs-accordion">
                                                    <div class="row">
                                                        <!-- left -->
                                                        <div class="col-lg-8 col-sm-12">

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
                                                                        <h5><span class="badge badge-primary">Day <?php echo $day['DayNumber']; ?></span> <?php echo $day['Title']; ?></h5>
                                                                        <?php
                                                                        echo $day['Excerpt'];
                                                                        ?>
                                                                        <hr>
                                                                <?php
                                                                    endforeach;
                                                                endif;
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <!-- right -->
                                                        <div class="col-lg-4 col-sm-12">
                                                            <!-- date widget -->
                                                            <div class="card-body px-0 pb-0">
                                                                <h4>2020 Availability <span class="float-right badge badge-primary">Promos</span></h4>
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
                                                                <!-- <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item bg-transparent d-flex text-dark px-0 border-top-0">
                                                                        <label class="text-dark font-weight-semibold mb-0">January</label>
                                                                        <span class="text-dark ml-auto">1</span>
                                                                    </li>

                                                                </ul> -->
                                                                </span>
                                                                <!-- Inclusions -->
                                                                <div class="card-body px-0 pb-0 mt-5">
                                                                    <h4>Inclusions</h4>
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
                                                                    <h4>Exclusions</h4>
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
                                            </div>
                                        <?php
                                    }
                                        ?>

                                        <!-- Cabins -->
                                        <div class="tab-pane" id="cabins" role="tabpanel" aria-labelledby="cabins-tab">
                                            <div class="card bg-transparent mb-4 mb-sm-0">
                                                <div class="card-header d-block d-sm-none bg-transparent px-0 py-1" id="headingCabins">
                                                    <h5 class="mb-0">
                                                        <button class="btn text-uppercase btn-block collapsed" data-toggle="collapse" data-target="#cabins-collapse" aria-expanded="true" aria-controls="overview-collapse">
                                                            Cabins
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="cabins-collapse" class="collapse collapsible" aria-labelledby="headingCabins" data-parent="#collapse-tabs-accordion">
                                                    <div class="row">
                                                        <!-- left -->
                                                        <div class="col-lg-8 col-sm-12">
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
                                                        <!-- right -->
                                                        <div class="col-lg-4 col-sm-12">
                                                            <div class="card-body px-0 pb-3">
                                                                <!-- Country -->
                                                                <h4>
                                                                    <?php
                                                                    $types = get_field('travel_type');
                                                                    if ($types) :
                                                                        foreach ($types as $type) :
                                                                            echo get_the_title($type->ID);
                                                                        endforeach;
                                                                    endif;
                                                                    ?>
                                                                    Highlights</h4>
                                                                <?php echo get_field('highlights'); ?>
                                                            </div>

                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                </div>
                            </div>
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
                    Recently Viewed
                </h5>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="store media align-items-stretch bg-white">
                        <div class="store-image position-relative">
                            <a href="listing-details-full-image.html">
                                <img src="images/shop/recent-view-1.jpg" alt="Recent view 1">
                            </a>
                            <div class="image-content position-absolute d-flex align-items-center">
                                <div class="content-right ml-auto d-flex">
                                    <a href="images/shop/full-top-place-3.jpg" class="item viewing" data-toggle="tooltip" data-placement="top" title="Quickview" data-gtf-mfp="true">
                                        <svg class="icon icon-expand">
                                            <use xlink:href="#icon-expand"></use>
                                        </svg>
                                    </a>
                                    <a href="#" class="item marking" data-toggle="tooltip" data-placement="top" title="Bookmark"><i class="fal fa-bookmark"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="media-body pl-0 pl-sm-3 pt-4 pt-sm-0">
                            <a href="listing-details-full-image.html" class="font-size-md font-weight-semibold text-dark d-inline-block mb-2 lh-11"><span class="letter-spacing-25">Canabo View Street, Main St</span> </a>
                            <ul class="list-inline store-meta mb-2 lh-1 font-size-sm d-flex align-items-center flex-wrap">
                                <li class="list-inline-item"><span class="badge badge-warning d-inline-block mr-1">4.3</span><span class="number">6 rating</span>
                                </li>
                                <li class="list-inline-item separate"></li>
                                <li class="list-inline-item"><span class="mr-1">From</span><span class="text-danger font-weight-semibold">$8.00</span></li>
                            </ul>
                            <div>
                                <span class="d-inline-block mr-1"><i class="fal fa-map-marker-alt">
                                    </i>
                                </span>
                                <a href="#" class="text-secondary text-decoration-none address">77 Main St,
                                    Queen,
                                    NY</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="store media align-items-stretch bg-white">
                        <div class="store-image position-relative">
                            <a href="listing-details-full-image.html">
                                <img src="images/shop/recent-view-2.jpg" alt="Recent view 1">
                            </a>
                            <div class="image-content position-absolute d-flex align-items-center">
                                <div class="content-right ml-auto d-flex">
                                    <a href="images/shop/full-top-place-4.jpg" class="item viewing" data-toggle="tooltip" data-placement="top" title="Quickview" data-gtf-mfp="true">
                                        <svg class="icon icon-expand">
                                            <use xlink:href="#icon-expand"></use>
                                        </svg>
                                    </a>
                                    <a href="#" class="item marking" data-toggle="tooltip" data-placement="top" title="Bookmark"><i class="fal fa-bookmark"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="media-body pl-0 pl-sm-3 pt-4 pt-sm-0">
                            <a href="listing-details-full-image.html" class="font-size-md font-weight-semibold text-dark d-inline-block mb-2 lh-11"><span class="letter-spacing-25">Japan's Sushi - 10th Ave St</span> </a>
                            <ul class="list-inline store-meta mb-2 lh-1 font-size-sm d-flex align-items-center flex-wrap">
                                <li class="list-inline-item"><span class="badge badge-success d-inline-block mr-1">5.0</span><span class="number">7 rating</span>
                                </li>
                                <li class="list-inline-item separate"></li>
                                <li class="list-inline-item"><span class="mr-1">From</span><span class="text-danger font-weight-semibold">$12.00</span></li>
                            </ul>
                            <div>
                                <span class="d-inline-block mr-1"><i class="fal fa-map-marker-alt">
                                    </i>
                                </span>
                                <a href="#" class="text-secondary text-decoration-none address">99 10th Ave
                                    St,
                                    Mahattan, NY</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="store media align-items-stretch bg-white">
                        <div class="store-image position-relative">
                            <a href="listing-details-full-image.html">
                                <img src="images/shop/recent-view-3.jpg" alt="Recent view 1">
                            </a>
                            <div class="image-content position-absolute d-flex align-items-center">
                                <div class="content-right ml-auto d-flex">
                                    <a href="images/shop/full-top-place-5.jpg" class="item viewing" data-toggle="tooltip" data-placement="top" title="Quickview" data-gtf-mfp="true">
                                        <svg class="icon icon-expand">
                                            <use xlink:href="#icon-expand"></use>
                                        </svg>
                                    </a>
                                    <a href="#" class="item marking" data-toggle="tooltip" data-placement="top" title="Bookmark"><i class="fal fa-bookmark"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="media-body pl-0 pl-sm-3 pt-4 pt-sm-0">
                            <a href="listing-details-full-image.html" class="font-size-md font-weight-semibold text-dark d-inline-block mb-2 lh-11"><span class="letter-spacing-25">Korean Bingsu Shop</span></a>
                            <ul class="list-inline store-meta mb-2 lh-1 font-size-sm d-flex align-items-center flex-wrap">
                                <li class="list-inline-item"><span class="badge badge-success d-inline-block mr-1">5.0</span><span class="number">7 rating</span>
                                </li>
                                <li class="list-inline-item separate"></li>
                                <li class="list-inline-item"><span class="mr-1">From</span><span class="text-danger font-weight-semibold">$12.00</span></li>
                            </ul>
                            <div>
                                <span class="d-inline-block mr-1"><i class="fal fa-map-marker-alt">
                                    </i>
                                </span>
                                <a href="#" class="text-secondary text-decoration-none address">534 Salem
                                    Rd St,
                                    Newark, NY</a>
                            </div>
                        </div>
                    </div>
                </div>
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