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
                <div class="page-title pt-7 pb-2 border-bottom">
                    <div class="explore-details-top d-flex flex-wrap flex-lg-nowrap bg-white">
                        <div class="store">
                            <!-- Property Name -->
                            <div class="d-flex flex-wrap">
                                <h2 class="text-dark mr-3 mb-2"><?php echo $data['Name']; ?>
                                </h2>
                            </div>

                            <!-- nav links -->
                            <ul class="list-inline store-meta d-flex flex-wrap align-items-center">

                                <?php
                                $count = 0;
                                foreach ($data['Itineraries'] as $item) {
                                    $count += 1;
                                    if ($count > 1) {
                                ?>
                                        <li class="list-inline-item separate"></li>
                                        <li class="list-inline-item"><span><?php echo $item['ShortName']; ?></span></li>
                                    <?php

                                    } else {
                                    ?>
                                        <li class="list-inline-item"><span><?php echo $item['ShortName']; ?></span></li>
                                <?php
                                    }
                                }
                                ?>




                                <li class="list-inline-item separate"></li>
                                <li class="list-inline-item">
                                    <span>Cabins</span>
                                </li>
                                <li class="list-inline-item separate"></li>
                                <li class="list-inline-item">
                                    <span>Prices</span>
                                </li>
                            </ul>
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
                <div class="page-container row bg-white pt-8 pb-9">

                    <!-- Left Content -->
                    <div class="page-content col-xl-8 mb-8 mb-xl-0 pt-1">
                        <div class="explore-details-container">
                            <div class="mb-9">
                                <div class="mb-7">
                                    <?php echo get_the_post_thumbnail($post->ID, 'large') ?>
                                </div>
                                <div class="mb-7"></div>
                                <?php the_content() ?>
                            </div>

                        </div>
                    </div>
                    <!-- End Left Content -->
                    <!-- Right Content -->
                    <div class="sidebar col-12 col-xl-4 pt-1">

                        <!-- Contact Form -->
                        <div class="card-body px-0 pb-3">
                            <div class="card-title text-uppercase text-dark font-weight-semibold font-size-md">
                                <span class="text-secondary d-inline-block mr-2"><i class="fas fa-envelope"></i></span>
                                <span>Contact me</span>
                            </div>
                            <div class="contact-form">
                                <form>
                                    <div class="form-group mb-2">
                                        <label class="sr-only" for="name">Name</label>
                                        <input type="text" id="name" class="form-control form-control-sm border-0 bg-white" placeholder="Name:">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="sr-only" for="email">Email</label>
                                        <input type="text" id="email" class="form-control form-control-sm border-0 bg-white" placeholder="Email Address:">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="sr-only" for="message">Message</label>
                                        <textarea class="form-control border-0" id="message" placeholder="Message..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block btn-sm">Send Message
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- End Right Content -->
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