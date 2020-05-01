<?php get_header(); ?>

<!-- #wrapper-content start -->
<!-- content-wrapper start -->
<div class="content-wrap">
    <!-- #section 01 start -->
    <?php add_revslider('home-slider-1'); ?>
    <!-- /#section-01 end -->
    <!-- #section 02start -->
    <section id="section-02" class="pb-8 feature-destination pt-85">
        <div class="container">
            <div class="mb-8">
                <h2 class="mb-0">
                    <span>Featured </span>
                    <span class="font-weight-light">Destinations</span>
                </h2>
            </div>
            <div class="slick-slider arrow-center" data-slick-options='{"slidesToShow": 3, "autoplay":false,"dots":false,"responsive":[{"breakpoint": 992,"settings": {"slidesToShow": 3,"arrows":false,"dots":true,"autoplay":true}},{"breakpoint": 768,"settings": {"slidesToShow": 2,"arrows":false,"dots":true,"autoplay":true}},{"breakpoint": 400,"settings": {"slidesToShow": 1,"arrows":false,"dots":true,"autoplay":true}}]}'>
                <?php
                //Destinations Loop
                $featured = new WP_Query('post_type=destinations');
                if ($featured->have_posts()) :
                    while ($featured->have_posts()) : $featured->the_post();
                ?>
                        <div class="col-12">
                            <?php get_template_part('template-parts/content', 'destinations') ?>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata(); //very important to rest after custom query
                endif;
                ?>

            </div>
        </div>
    </section>
    <!-- /#section-02 end -->

    <!-- section 03 - Our Directory -->
    <section id="section-03" class="pb-8 our-directory">
        <!-- heading container -->
        <div class="container">
            <!-- title -->
            <div class="mb-7">
                <h2 class="mb-0">
                    <span class="font-weight-semibold">Our </span>
                    <span class="font-weight-light">Directory</span>
                </h2>
            </div>

            <!-- categories -->
            <div class="d-flex align-items-center pb-8">
                <ul class="nav nav-pills tab-style-01" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">all</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="featured-tab" data-toggle="tab" href="#feature" role="tab" aria-controls="feature" aria-selected="false">featured</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="best-rate-tab" data-toggle="tab" href="#best-rate" role="tab" aria-controls="best-rate" aria-selected="false">best rate</a>
                    </li>

                </ul>
                <div class="ml-auto d-flex slick-custom-nav pl-5">
                    <div class="arrow slick-prev disabled" id="previous"><i class="fas fa-chevron-left"></i></div>
                    <div class="arrow slick-next" id="next"><i class="fas fa-chevron-right"></i></div>
                </div>
            </div>
        </div>

        <!-- directory slide -->
        <div class="container container-1720">
            <!-- content -->
            <div class="tab-content">
                <!-- All Tab -->
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all">
                    <div class="slick-slider arrow-top full-slide custom-nav equal-height" data-slick-options='{"slidesToShow": 5,"autoplay":false,"dots":false,"arrows":false,"responsive":[{"breakpoint": 2000,"settings": {"slidesToShow": 4}},{"breakpoint": 1500,"settings": {"slidesToShow": 3}},{"breakpoint": 1000,"settings": {"slidesToShow": 2}},{"breakpoint": 770,"settings": {"slidesToShow": 1}}]}'>
                        <!-- Box 1 -->

                        <?php //Properties Loop
                        $featured = new WP_Query('post_type=properties');
                        if ($featured->have_posts()) :
                            while ($featured->have_posts()) : $featured->the_post();
                                get_template_part('template-parts/content', 'properties');
                            endwhile;
                            wp_reset_postdata(); //reset after custom query
                        endif;
                        ?>

                        <!-- End Box 1 -->


                    </div>
                </div>
                <!-- End All Tab -->
                <div class="tab-pane fade" id="feature" role="tabpanel" aria-labelledby="feature">
                    <div class="slick-slider arrow-top full-slide custom-nav equal-height" data-slick-options='{"slidesToShow": 5,"autoplay":false,"dots":false,"arrows":false,"responsive":[{"breakpoint": 2000,"settings": {"slidesToShow": 4}},{"breakpoint": 1500,"settings": {"slidesToShow": 3}},{"breakpoint": 1000,"settings": {"slidesToShow": 2}},{"breakpoint": 770,"settings": {"slidesToShow": 1}}]}'>
                        <div class="box" data-animate="fadeInUp">
                            <div class="store card border-0 rounded-0">
                                <div class="position-relative store-image">
                                    <a href="listing-details-full-gallery.html">
                                        <img src="images/shop/shop-1.jpg" alt="store 1" class="card-img-top rounded-0">
                                    </a>
                                    <div class="image-content position-absolute d-flex align-items-center">
                                        <div class="content-left">
                                            <div class="badge badge-primary">Featured</div>
                                        </div>
                                        <div class="content-right ml-auto d-flex w-lg show-link">
                                            <a href="images/shop/full-shop-1.jpg" class="item viewing" data-toggle="tooltip" data-placement="top" title="Quickview" data-gtf-mfp="true">
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
                                    <a href="listing-details-full-gallery.html" class="card-title h5 text-dark d-inline-block mb-2"><span class="letter-spacing-25">Roman
                                            Kraft Hotel</span></a>
                                    <ul class="list-inline store-meta mb-4 font-size-sm d-flex align-items-center flex-wrap">
                                        <li class="list-inline-item"><span class="badge badge-success d-inline-block mr-1">5.0</span><span>4 rating</span>
                                        </li>
                                        <li class="list-inline-item separate"></li>
                                        <li class="list-inline-item"><span class="mr-1">From</span><span class="text-danger font-weight-semibold">$56.00</span></li>
                                        <li class="list-inline-item separate"></li>
                                        <li class="list-inline-item">
                                            <a href="#" class="link-hover-secondary-primary">
                                                <svg class="icon icon-bed">
                                                    <use xlink:href="#icon-bed"></use>
                                                </svg>
                                                <span>Hotel</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="media">
                                        <a href="#" class="d-inline-block mr-3"><img src="images/listing/testimonial-1.png" alt="testimonial" class="rounded-circle">
                                        </a>
                                        <div class="media-body lh-14 font-size-sm">Overlooking Bloomsbury's
                                            Russell Square
                                            and
                                            a 2 minutes' walk from the tube station of the same name...
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-inline card-footer rounded-0 border-top pt-3 mt-5 bg-transparent px-0 store-meta d-flex align-items-center">
                                    <li class="list-inline-item">
                                        <span class="d-inline-block mr-1">
                                            <i class="fal fa-map-marker-alt">
                                            </i>
                                        </span>
                                        <a href="#" class="text-secondary text-decoration-none link-hover-secondary-blue">
                                            San Francisco, CA</a>
                                    </li>
                                    <li class="list-inline-item separate"></li>
                                    <li class="list-inline-item">
                                        <span class="text-green">Open now!</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="box" data-animate="fadeInUp">
                            <div class="store card border-0 rounded-0">
                                <div class="position-relative store-image">
                                    <a href="listing-details-full-gallery.html">
                                        <img src="images/shop/shop-2.jpg" alt="store 2" class="card-img-top rounded-0">
                                    </a>
                                    <div class="image-content position-absolute d-flex align-items-center">
                                        <div class="content-left">
                                            <div class="badge badge-primary">Best Rate</div>
                                        </div>
                                        <div class="content-right ml-auto d-flex show-link">
                                            <a href="images/shop/full-shop-2.jpg" data-gtf-mfp="true" class="item viewing" data-toggle="tooltip" data-placement="top" title="Quick view">
                                                <svg class="icon icon-expand">
                                                    <use xlink:href="#icon-expand"></use>
                                                </svg>
                                            </a>
                                            <a href="#" class="item marking" data-toggle="tooltip" data-placement="top" title="Bookmark"><i class="fal fa-bookmark"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-0 pt-3">
                                    <a href="listing-details-full-image.html" class="card-title h5 text-dark d-inline-block mb-2"><span class="letter-spacing-25">Karly Gomez Cake</span>
                                        <span class="check">
                                            <svg class="icon icon-check-circle">
                                                <use xlink:href="#icon-check-circle"></use>
                                            </svg>
                                        </span>
                                    </a>
                                    <ul class="list-inline store-meta mb-4 font-size-sm d-flex align-items-center flex-wrap">
                                        <li class="list-inline-item"><span class="badge badge-success d-inline-block mr-1">5.0</span><span>8 rating</span>
                                        </li>
                                        <li class="list-inline-item separate"></li>
                                        <li class="list-inline-item"><span class="mr-1">From</span><span class="text-danger font-weight-semibold">$12.00</span></li>
                                        <li class="list-inline-item separate"></li>
                                        <li class="list-inline-item"><a href="#" class="link-hover-secondary-primary">
                                                <svg class="icon icon-pizza">
                                                    <use xlink:href="#icon-pizza"></use>
                                                </svg>
                                                <span>Food</span>
                                            </a></li>
                                    </ul>

                                    <div class="media">
                                        <a href="#" class="d-inline-block mr-3"><img src="images/listing/testimonial-2.png" alt="testimonial" class="rounded-circle">
                                        </a>
                                        <div class="media-body lh-14 font-size-sm">They specialize in makgeolli
                                            at this
                                            Korean-style pub in Seorae Village. And they use...
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-inline card-footer rounded-0 border-top pt-3 mt-5 bg-transparent px-0 store-meta d-flex align-items-center">
                                    <li class="list-inline-item">
                                        <span class="d-inline-block mr-1">
                                            <i class="fal fa-map-marker-alt">
                                            </i>
                                        </span>
                                        <a href="#" class="text-secondary text-decoration-none address">Florencia,
                                            Italy</a>
                                    </li>
                                    <li class="list-inline-item separate"></li>
                                    <li class="list-inline-item">
                                        <span class="text-danger">Close now!</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="box" data-animate="fadeInUp">
                            <div class="store card border-0 rounded-0">
                                <div class="position-relative store-image">
                                    <a href="listing-details-full-gallery.html">
                                        <img src="images/shop/shop-3.jpg" alt="store 1" class="card-img-top rounded-0">
                                    </a>
                                    <div class="image-content position-absolute d-flex align-items-center">
                                        <div class="content-left">
                                            <div class="badge badge-primary">Most view</div>
                                        </div>
                                        <div class="content-right ml-auto d-flex show-link">
                                            <a href="images/shop/full-shop-3.jpg" class="item viewing" data-toggle="tooltip" data-placement="top" title="Quick view" data-gtf-mfp="true">
                                                <svg class="icon icon-expand">
                                                    <use xlink:href="#icon-expand"></use>
                                                </svg>
                                            </a>
                                            <a href="#" class="item marking" data-toggle="tooltip" data-placement="top" title="Bookmark"><i class="fal fa-bookmark"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-0 pt-3">
                                    <a href="listing-details-full-gallery.html" class="card-title h5 text-dark d-inline-block mb-2"><span class="letter-spacing-25">Roman
                                            Kraft Hotel</span></a>
                                    <ul class="list-inline store-meta mb-4 font-size-sm d-flex align-items-center flex-wrap">
                                        <li class="list-inline-item"><span class="badge badge-warning d-inline-block mr-1">4.3</span><span>4 rating</span>
                                        </li>
                                        <li class="list-inline-item separate"></li>
                                        <li class="list-inline-item"><span class="mr-1">From</span><span class="text-danger font-weight-semibold">$10.00</span></li>
                                        <li class="list-inline-item separate"></li>
                                        <li class="list-inline-item"><a href="#" class="link-hover-secondary-primary">
                                                <svg class="icon icon-pizza">
                                                    <use xlink:href="#icon-pizza"></use>
                                                </svg>
                                                <span>Food</span>
                                            </a></li>
                                    </ul>
                                    <div class="media">
                                        <a href="#" class="d-inline-block mr-3"><img src="images/listing/testimonial-5.png" alt="testimonial" class="rounded-circle">
                                        </a>
                                        <div class="media-body lh-14 font-size-sm">After a yoga class changed
                                            her life, Maz
                                            became
                                            vegan, launched...
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-inline card-footer rounded-0 border-top pt-3 mt-5 bg-transparent px-0 store-meta d-flex align-items-center">
                                    <li class="list-inline-item">
                                        <span class="d-inline-block mr-1"><i class="fal fa-map-marker-alt">
                                            </i>
                                        </span>
                                        <a href="#" class="text-secondary text-decoration-none address">Miami,
                                            FL</a>
                                    </li>
                                    <li class="list-inline-item separate"></li>
                                    <li class="list-inline-item">
                                        <span class="text-danger">Close now!</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="box" data-animate="fadeInUp">
                            <div class="store card border-0 rounded-0">
                                <div class="position-relative store-image">
                                    <a href="listing-details-full-gallery.html">
                                        <img src="images/shop/shop-4.jpg" alt="store 1" class="card-img-top rounded-0">
                                    </a>
                                    <div class="image-content position-absolute d-flex align-items-center">
                                        <div class="content-left">
                                            <div class="badge badge-primary">Featured</div>
                                        </div>
                                        <div class="content-right ml-auto d-flex show-link">
                                            <a href="images/shop/full-shop-4.jpg" class="item viewing" data-toggle="tooltip" data-gtf-mfp="true" data-placement="top" title="Quick view">
                                                <svg class="icon icon-expand">
                                                    <use xlink:href="#icon-expand"></use>
                                                </svg>
                                            </a>
                                            <a href="#" class="item marking" data-toggle="tooltip" data-placement="top" title="Bookmark"><i class="fal fa-bookmark"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-0 pt-3">
                                    <a href="listing-details-full-image.html" class="card-title h5 text-dark d-inline-block mb-2"><span class="letter-spacing-25">Red Wings Shoes Store</span></a>
                                    <ul class="list-inline store-meta mb-4 font-size-sm d-flex align-items-center flex-wrap">
                                        <li class="list-inline-item"><span class="badge badge-success d-inline-block mr-1">5.0</span><span>6 rating</span>
                                        </li>
                                        <li class="list-inline-item separate"></li>
                                        <li class="list-inline-item"><span class="mr-1">From</span><span class="text-danger font-weight-semibold">$75.00</span></li>
                                        <li class="list-inline-item separate"></li>
                                        <li class="list-inline-item"><a href="#" class="link-hover-secondary-primary">
                                                <svg class="icon icon-bag">
                                                    <use xlink:href="#icon-bag"></use>
                                                </svg>
                                                <span>Shopping</span>
                                            </a></li>
                                    </ul>
                                    <div class="media">
                                        <a href="#" class="d-inline-block mr-3"><img src="images/listing/testimonial-3.png" alt="testimonial" class="rounded-circle">
                                        </a>
                                        <div class="media-body lh-14 font-size-sm">Established in 1895, these
                                            style
                                            merchants have
                                            set the standard in Sydney suiting for generations...
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-inline card-footer rounded-0 border-top pt-3 mt-5 bg-transparent px-0 store-meta d-flex align-items-center">
                                    <li class="list-inline-item">
                                        <span class="d-inline-block mr-1"><i class="fal fa-map-marker-alt">
                                            </i>
                                        </span>
                                        <a href="#" class="text-secondary text-decoration-none address">
                                            Paris, France</a>
                                    </li>
                                    <li class="list-inline-item separate"></li>
                                    <li class="list-inline-item">
                                        <span class="text-danger">Close now!</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="box" data-animate="fadeInUp">
                            <div class="store card border-0 rounded-0">
                                <div class="position-relative store-image">
                                    <a href="listing-details-full-gallery.html">
                                        <img src="images/shop/shop-5.jpg" alt="store 1" class="card-img-top rounded-0">
                                    </a>
                                    <div class="image-content position-absolute d-flex align-items-center">
                                        <div class="content-left">
                                            <div class="badge badge-primary">AD</div>
                                        </div>
                                        <div class="content-right ml-auto d-flex show-link">
                                            <a href="images/shop/full-shop-5.jpg" class="item viewing" data-toggle="tooltip" data-placement="top" data-gtf-mfp="true" title="Quick view">
                                                <svg class="icon icon-expand">
                                                    <use xlink:href="#icon-expand"></use>
                                                </svg>
                                            </a>
                                            <a href="#" class="item marking" data-toggle="tooltip" data-placement="top" title="Bookmark"><i class="fal fa-bookmark"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-0 pt-3">
                                    <a href="listing-details-full-image.html" class="card-title h5 text-dark d-inline-block mb-2"><span class="letter-spacing-25">Packing & Delivery Service</span>
                                        <span class="check">
                                            <svg class="icon icon-check-circle">
                                                <use xlink:href="#icon-check-circle"></use>
                                            </svg>
                                        </span>
                                    </a>
                                    <ul class="list-inline store-meta mb-4 font-size-sm d-flex align-items-center flex-wrap">
                                        <li class="list-inline-item"><span class="badge badge-warning d-inline-block mr-1">4.5</span><span>2 rating</span>
                                        </li>
                                        <li class="list-inline-item separate"></li>
                                        <li class="list-inline-item"><span class="text-danger font-weight-semibold">Get a quote</span>
                                        </li>
                                        <li class="list-inline-item separate"></li>
                                        <li class="list-inline-item"><a href="#" class="link-hover-secondary-primary">
                                                <svg class="icon icon-cog">
                                                    <use xlink:href="#icon-cog"></use>
                                                </svg>
                                                <span>Service</span>
                                            </a></li>
                                    </ul>
                                    <div class="media">
                                        <a href="#" class="d-inline-block mr-3"><img src="images/listing/testimonial-2.png" alt="testimonial" class="rounded-circle">
                                        </a>
                                        <div class="media-body lh-14 font-size-sm">Most items can be packed
                                            securely in
                                            these
                                            boxes, which are available in several sizes...
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-inline card-footer rounded-0 border-top pt-3 mt-5 bg-transparent px-0 store-meta d-flex align-items-center">
                                    <li class="list-inline-item">
                                        <span class="d-inline-block mr-1"><i class="fal fa-map-marker-alt">
                                            </i>
                                        </span>
                                        <a href="#" class="text-secondary text-decoration-none address">New
                                            York, USA</a>
                                    </li>
                                    <li class="list-inline-item separate"></li>
                                    <li class="list-inline-item">
                                        <span class="text-green">Open now!</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="box" data-animate="fadeInUp">
                            <div class="store card border-0 rounded-0">
                                <div class="position-relative store-image">
                                    <a href="listing-details-full-gallery.html">
                                        <img src="images/shop/shop-1.jpg" alt="store 1" class="card-img-top rounded-0">
                                    </a>
                                    <div class="image-content position-absolute d-flex align-items-center">
                                        <div class="content-left">
                                            <div class="badge badge-primary">Featured</div>
                                        </div>
                                        <div class="content-right ml-auto d-flex show-link">
                                            <a href="images/shop/full-shop-1.jpg" class="item viewing" data-toggle="tooltip" data-placement="top" title="Quickview" data-gtf-mfp="true">
                                                <svg class="icon icon-expand">
                                                    <use xlink:href="#icon-expand"></use>
                                                </svg>
                                            </a>
                                            <a href="#" class="item marking" data-toggle="tooltip" data-placement="top" title="Bookmark"><i class="fal fa-bookmark"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-0 pt-3">
                                    <a href="listing-details-full-gallery.html" class="card-title h5 text-dark d-inline-block mb-2"><span class="letter-spacing-25">Roman
                                            Kraft Hotel</span></a>
                                    <ul class="list-inline store-meta mb-4 font-size-sm d-flex align-items-center flex-wrap">
                                        <li class="list-inline-item"><span class="badge badge-success d-inline-block mr-1">5.0</span><span>4 rating</span>
                                        </li>
                                        <li class="list-inline-item separate"></li>
                                        <li class="list-inline-item"><span class="mr-1">From</span><span class="text-danger font-weight-semibold">$9.00</span></li>
                                        <li class="list-inline-item separate"></li>
                                        <li class="list-inline-item"><a href="#" class="link-hover-secondary-primary">
                                                <svg class="icon icon-pizza">
                                                    <use xlink:href="#icon-pizza"></use>
                                                </svg>
                                                <span>Food</span>
                                            </a></li>
                                    </ul>

                                    <div class="media">
                                        <a href="#" class="d-inline-block mr-3"><img src="images/listing/testimonial-1.png" alt="testimonial" class="rounded-circle">
                                        </a>
                                        <div class="media-body lh-14 font-size-sm">They specialize in makgeolli
                                            at this
                                            Korean-style
                                            pub in Seorae Village. And they use...
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-inline card-footer rounded-0 border-top pt-3 mt-5 bg-transparent px-0 store-meta d-flex align-items-center">
                                    <li class="list-inline-item">
                                        <span class="d-inline-block mr-1"><i class="fal fa-map-marker-alt">
                                            </i>
                                        </span>
                                        <a href="#" class="text-secondary text-decoration-none address py-1">Ubud,
                                            Indonesia</a>
                                    </li>
                                    <li class="list-inline-item separate"></li>
                                    <li class="list-inline-item">
                                        <span class="text-danger">Close now!</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="best-rate" role="tabpanel" aria-labelledby="best-rate">
                    <div class="slick-slider arrow-top full-slide custom-nav" data-slick-options='{"slidesToShow": 5,"autoplay":false,"dots":false,"arrows":false,"responsive":[{"breakpoint": 2000,"settings": {"slidesToShow": 4}},{"breakpoint": 1500,"settings": {"slidesToShow": 3}},{"breakpoint": 1000,"settings": {"slidesToShow": 2}},{"breakpoint": 770,"settings": {"slidesToShow": 1}}]}'>
                        <div class="box" data-animate="fadeInUp">
                            <div class="store card border-0 rounded-0">
                                <div class="position-relative store-image">
                                    <a href="listing-details-full-gallery.html">
                                        <img src="images/shop/shop-1.jpg" alt="store 1" class="card-img-top rounded-0">
                                    </a>
                                    <div class="image-content position-absolute d-flex align-items-center">
                                        <div class="content-left">
                                            <div class="badge badge-primary">Featured</div>
                                        </div>
                                        <div class="content-right ml-auto d-flex w-lg show-link">
                                            <a href="images/shop/full-shop-1.jpg" class="item viewing" data-toggle="tooltip" data-placement="top" title="Quickview" data-gtf-mfp="true">
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
                                    <a href="listing-details-full-gallery.html" class="card-title h5 text-dark d-inline-block mb-2"><span class="letter-spacing-25">Roman
                                            Kraft Hotel</span></a>
                                    <ul class="list-inline store-meta mb-4 font-size-sm d-flex align-items-center flex-wrap">
                                        <li class="list-inline-item"><span class="badge badge-success d-inline-block mr-1">5.0</span><span>4 rating</span>
                                        </li>
                                        <li class="list-inline-item separate"></li>
                                        <li class="list-inline-item"><span class="mr-1">From</span><span class="text-danger font-weight-semibold">$56.00</span></li>
                                        <li class="list-inline-item separate"></li>
                                        <li class="list-inline-item">
                                            <a href="#" class="link-hover-secondary-primary">
                                                <svg class="icon icon-bed">
                                                    <use xlink:href="#icon-bed"></use>
                                                </svg>
                                                <span>Hotel</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="media">
                                        <a href="#" class="d-inline-block mr-3"><img src="images/listing/testimonial-1.png" alt="testimonial" class="rounded-circle">
                                        </a>
                                        <div class="media-body lh-14 font-size-sm">Overlooking Bloomsbury's
                                            Russell Square
                                            and
                                            a 2 minutes' walk from the tube station of the same name...
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-inline card-footer rounded-0 border-top pt-3 mt-5 bg-transparent px-0 store-meta d-flex align-items-center">
                                    <li class="list-inline-item">
                                        <span class="d-inline-block mr-1">
                                            <i class="fal fa-map-marker-alt">
                                            </i>
                                        </span>
                                        <a href="#" class="text-secondary text-decoration-none link-hover-secondary-blue">
                                            San Francisco, CA</a>
                                    </li>
                                    <li class="list-inline-item separate"></li>
                                    <li class="list-inline-item">
                                        <span class="text-green">Open now!</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="box" data-animate="fadeInUp">
                            <div class="store card border-0 rounded-0">
                                <div class="position-relative store-image">
                                    <a href="listing-details-full-gallery.html">
                                        <img src="images/shop/shop-2.jpg" alt="store 2" class="card-img-top rounded-0">
                                    </a>
                                    <div class="image-content position-absolute d-flex align-items-center">
                                        <div class="content-left">
                                            <div class="badge badge-primary">Best Rate</div>
                                        </div>
                                        <div class="content-right ml-auto d-flex show-link">
                                            <a href="images/shop/full-shop-2.jpg" data-gtf-mfp="true" class="item viewing" data-toggle="tooltip" data-placement="top" title="Quick view">
                                                <svg class="icon icon-expand">
                                                    <use xlink:href="#icon-expand"></use>
                                                </svg>
                                            </a>
                                            <a href="#" class="item marking" data-toggle="tooltip" data-placement="top" title="Bookmark"><i class="fal fa-bookmark"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-0 pt-3">
                                    <a href="listing-details-full-image.html" class="card-title h5 text-dark d-inline-block mb-2"><span class="letter-spacing-25">Karly Gomez Cake</span>
                                        <span class="check">
                                            <svg class="icon icon-check-circle">
                                                <use xlink:href="#icon-check-circle"></use>
                                            </svg>
                                        </span>
                                    </a>
                                    <ul class="list-inline store-meta mb-4 font-size-sm d-flex align-items-center flex-wrap">
                                        <li class="list-inline-item"><span class="badge badge-success d-inline-block mr-1">5.0</span><span>8 rating</span>
                                        </li>
                                        <li class="list-inline-item separate"></li>
                                        <li class="list-inline-item"><span class="mr-1">From</span><span class="text-danger font-weight-semibold">$12.00</span></li>
                                        <li class="list-inline-item separate"></li>
                                        <li class="list-inline-item"><a href="#" class="link-hover-secondary-primary">
                                                <svg class="icon icon-pizza">
                                                    <use xlink:href="#icon-pizza"></use>
                                                </svg>
                                                <span>Food</span>
                                            </a></li>
                                    </ul>

                                    <div class="media">
                                        <a href="#" class="d-inline-block mr-3"><img src="images/listing/testimonial-2.png" alt="testimonial" class="rounded-circle">
                                        </a>
                                        <div class="media-body lh-14 font-size-sm">They specialize in makgeolli
                                            at this
                                            Korean-style pub in Seorae Village. And they use...
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-inline card-footer rounded-0 border-top pt-3 mt-5 bg-transparent px-0 store-meta d-flex align-items-center">
                                    <li class="list-inline-item">
                                        <span class="d-inline-block mr-1">
                                            <i class="fal fa-map-marker-alt">
                                            </i>
                                        </span>
                                        <a href="#" class="text-secondary text-decoration-none address">Florencia,
                                            Italy</a>
                                    </li>
                                    <li class="list-inline-item separate"></li>
                                    <li class="list-inline-item">
                                        <span class="text-danger">Close now!</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="box" data-animate="fadeInUp">
                            <div class="store card border-0 rounded-0">
                                <div class="position-relative store-image">
                                    <a href="listing-details-full-gallery.html">
                                        <img src="images/shop/shop-3.jpg" alt="store 1" class="card-img-top rounded-0">
                                    </a>
                                    <div class="image-content position-absolute d-flex align-items-center">
                                        <div class="content-left">
                                            <div class="badge badge-primary">Most view</div>
                                        </div>
                                        <div class="content-right ml-auto d-flex show-link">
                                            <a href="images/shop/full-shop-3.jpg" class="item viewing" data-toggle="tooltip" data-placement="top" title="Quick view" data-gtf-mfp="true">
                                                <svg class="icon icon-expand">
                                                    <use xlink:href="#icon-expand"></use>
                                                </svg>
                                            </a>
                                            <a href="#" class="item marking" data-toggle="tooltip" data-placement="top" title="Bookmark"><i class="fal fa-bookmark"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-0 pt-3">
                                    <a href="listing-details-full-gallery.html" class="card-title h5 text-dark d-inline-block mb-2"><span class="letter-spacing-25">Roman
                                            Kraft Hotel</span></a>
                                    <ul class="list-inline store-meta mb-4 font-size-sm d-flex align-items-center flex-wrap">
                                        <li class="list-inline-item"><span class="badge badge-warning d-inline-block mr-1">4.3</span><span>4 rating</span>
                                        </li>
                                        <li class="list-inline-item separate"></li>
                                        <li class="list-inline-item"><span class="mr-1">From</span><span class="text-danger font-weight-semibold">$10.00</span></li>
                                        <li class="list-inline-item separate"></li>
                                        <li class="list-inline-item"><a href="#" class="link-hover-secondary-primary">
                                                <svg class="icon icon-pizza">
                                                    <use xlink:href="#icon-pizza"></use>
                                                </svg>
                                                <span>Food</span>
                                            </a></li>
                                    </ul>
                                    <div class="media">
                                        <a href="#" class="d-inline-block mr-3"><img src="images/listing/testimonial-5.png" alt="testimonial" class="rounded-circle">
                                        </a>
                                        <div class="media-body lh-14 font-size-sm">After a yoga class changed
                                            her life, Maz
                                            became
                                            vegan, launched...
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-inline card-footer rounded-0 border-top pt-3 mt-5 bg-transparent px-0 store-meta d-flex align-items-center">
                                    <li class="list-inline-item">
                                        <span class="d-inline-block mr-1"><i class="fal fa-map-marker-alt">
                                            </i>
                                        </span>
                                        <a href="#" class="text-secondary text-decoration-none address">Miami,
                                            FL</a>
                                    </li>
                                    <li class="list-inline-item separate"></li>
                                    <li class="list-inline-item">
                                        <span class="text-danger">Close now!</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="box" data-animate="fadeInUp">
                            <div class="store card border-0 rounded-0">
                                <div class="position-relative store-image">
                                    <a href="listing-details-full-gallery.html">
                                        <img src="images/shop/shop-4.jpg" alt="store 1" class="card-img-top rounded-0">
                                    </a>
                                    <div class="image-content position-absolute d-flex align-items-center">
                                        <div class="content-left">
                                            <div class="badge badge-primary">Featured</div>
                                        </div>
                                        <div class="content-right ml-auto d-flex show-link">
                                            <a href="images/shop/full-shop-4.jpg" class="item viewing" data-toggle="tooltip" data-gtf-mfp="true" data-placement="top" title="Quick view">
                                                <svg class="icon icon-expand">
                                                    <use xlink:href="#icon-expand"></use>
                                                </svg>
                                            </a>
                                            <a href="#" class="item marking" data-toggle="tooltip" data-placement="top" title="Bookmark"><i class="fal fa-bookmark"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-0 pt-3">
                                    <a href="listing-details-full-image.html" class="card-title h5 text-dark d-inline-block mb-2"><span class="letter-spacing-25">Red Wings Shoes Store</span></a>
                                    <ul class="list-inline store-meta mb-4 font-size-sm d-flex align-items-center flex-wrap">
                                        <li class="list-inline-item"><span class="badge badge-success d-inline-block mr-1">5.0</span><span>6 rating</span>
                                        </li>
                                        <li class="list-inline-item separate"></li>
                                        <li class="list-inline-item"><span class="mr-1">From</span><span class="text-danger font-weight-semibold">$75.00</span></li>
                                        <li class="list-inline-item separate"></li>
                                        <li class="list-inline-item"><a href="#" class="link-hover-secondary-primary">
                                                <svg class="icon icon-bag">
                                                    <use xlink:href="#icon-bag"></use>
                                                </svg>
                                                <span>Shopping</span>
                                            </a></li>
                                    </ul>
                                    <div class="media">
                                        <a href="#" class="d-inline-block mr-3"><img src="images/listing/testimonial-3.png" alt="testimonial" class="rounded-circle">
                                        </a>
                                        <div class="media-body lh-14 font-size-sm">Established in 1895, these
                                            style
                                            merchants have
                                            set the standard in Sydney suiting for generations...
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-inline card-footer rounded-0 border-top pt-3 mt-5 bg-transparent px-0 store-meta d-flex align-items-center">
                                    <li class="list-inline-item">
                                        <span class="d-inline-block mr-1"><i class="fal fa-map-marker-alt">
                                            </i>
                                        </span>
                                        <a href="#" class="text-secondary text-decoration-none address">
                                            Paris, France</a>
                                    </li>
                                    <li class="list-inline-item separate"></li>
                                    <li class="list-inline-item">
                                        <span class="text-danger">Close now!</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="box" data-animate="fadeInUp">
                            <div class="store card border-0 rounded-0">
                                <div class="position-relative store-image">
                                    <a href="listing-details-full-gallery.html">
                                        <img src="images/shop/shop-5.jpg" alt="store 1" class="card-img-top rounded-0">
                                    </a>
                                    <div class="image-content position-absolute d-flex align-items-center">
                                        <div class="content-left">
                                            <div class="badge badge-primary">AD</div>
                                        </div>
                                        <div class="content-right ml-auto d-flex show-link">
                                            <a href="images/shop/full-shop-5.jpg" class="item viewing" data-toggle="tooltip" data-placement="top" data-gtf-mfp="true" title="Quick view">
                                                <svg class="icon icon-expand">
                                                    <use xlink:href="#icon-expand"></use>
                                                </svg>
                                            </a>
                                            <a href="#" class="item marking" data-toggle="tooltip" data-placement="top" title="Bookmark"><i class="fal fa-bookmark"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-0 pt-3">
                                    <a href="listing-details-full-image.html" class="card-title h5 text-dark d-inline-block mb-2"><span class="letter-spacing-25">Packing & Delivery Service</span>
                                        <span class="check">
                                            <svg class="icon icon-check-circle">
                                                <use xlink:href="#icon-check-circle"></use>
                                            </svg>
                                        </span>
                                    </a>
                                    <ul class="list-inline store-meta mb-4 font-size-sm d-flex align-items-center flex-wrap">
                                        <li class="list-inline-item"><span class="badge badge-warning d-inline-block mr-1">4.5</span><span>2 rating</span>
                                        </li>
                                        <li class="list-inline-item separate"></li>
                                        <li class="list-inline-item"><span class="text-danger font-weight-semibold">Get a quote</span>
                                        </li>
                                        <li class="list-inline-item separate"></li>
                                        <li class="list-inline-item"><a href="#" class="link-hover-secondary-primary">
                                                <svg class="icon icon-cog">
                                                    <use xlink:href="#icon-cog"></use>
                                                </svg>
                                                <span>Service</span>
                                            </a></li>
                                    </ul>
                                    <div class="media">
                                        <a href="#" class="d-inline-block mr-3"><img src="images/listing/testimonial-2.png" alt="testimonial" class="rounded-circle">
                                        </a>
                                        <div class="media-body lh-14 font-size-sm">Most items can be packed
                                            securely in
                                            these
                                            boxes, which are available in several sizes...
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-inline card-footer rounded-0 border-top pt-3 mt-5 bg-transparent px-0 store-meta d-flex align-items-center">
                                    <li class="list-inline-item">
                                        <span class="d-inline-block mr-1"><i class="fal fa-map-marker-alt">
                                            </i>
                                        </span>
                                        <a href="#" class="text-secondary text-decoration-none address">New
                                            York, USA</a>
                                    </li>
                                    <li class="list-inline-item separate"></li>
                                    <li class="list-inline-item">
                                        <span class="text-green">Open now!</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="box" data-animate="fadeInUp">
                            <div class="store card border-0 rounded-0">
                                <div class="position-relative store-image">
                                    <a href="listing-details-full-gallery.html">
                                        <img src="images/shop/shop-1.jpg" alt="store 1" class="card-img-top rounded-0">
                                    </a>
                                    <div class="image-content position-absolute d-flex align-items-center">
                                        <div class="content-left">
                                            <div class="badge badge-primary">Featured</div>
                                        </div>
                                        <div class="content-right ml-auto d-flex show-link">
                                            <a href="images/shop/full-shop-1.jpg" class="item viewing" data-toggle="tooltip" data-placement="top" title="Quickview" data-gtf-mfp="true">
                                                <svg class="icon icon-expand">
                                                    <use xlink:href="#icon-expand"></use>
                                                </svg>
                                            </a>
                                            <a href="#" class="item marking" data-toggle="tooltip" data-placement="top" title="Bookmark"><i class="fal fa-bookmark"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-0 pt-3">
                                    <a href="listing-details-full-gallery.html" class="card-title h5 text-dark d-inline-block mb-2"><span class="letter-spacing-25">Roman
                                            Kraft Hotel</span></a>
                                    <ul class="list-inline store-meta mb-4 font-size-sm d-flex align-items-center flex-wrap">
                                        <li class="list-inline-item"><span class="badge badge-success d-inline-block mr-1">5.0</span><span>4 rating</span>
                                        </li>
                                        <li class="list-inline-item separate"></li>
                                        <li class="list-inline-item"><span class="mr-1">From</span><span class="text-danger font-weight-semibold">$9.00</span></li>
                                        <li class="list-inline-item separate"></li>
                                        <li class="list-inline-item"><a href="#" class="link-hover-secondary-primary">
                                                <svg class="icon icon-pizza">
                                                    <use xlink:href="#icon-pizza"></use>
                                                </svg>
                                                <span>Food</span>
                                            </a></li>
                                    </ul>

                                    <div class="media">
                                        <a href="#" class="d-inline-block mr-3"><img src="images/listing/testimonial-1.png" alt="testimonial" class="rounded-circle">
                                        </a>
                                        <div class="media-body lh-14 font-size-sm">They specialize in makgeolli
                                            at this
                                            Korean-style
                                            pub in Seorae Village. And they use...
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-inline card-footer rounded-0 border-top pt-3 mt-5 bg-transparent px-0 store-meta d-flex align-items-center">
                                    <li class="list-inline-item">
                                        <span class="d-inline-block mr-1"><i class="fal fa-map-marker-alt">
                                            </i>
                                        </span>
                                        <a href="#" class="text-secondary text-decoration-none address py-1">Ubud,
                                            Indonesia</a>
                                    </li>
                                    <li class="list-inline-item separate"></li>
                                    <li class="list-inline-item">
                                        <span class="text-danger">Close now!</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end content -->
        </div>
        <!-- end directory slide -->
    </section>
    <!-- /#section-03 end -->



    <!-- #section 04 start Testimonials-->
    <section class="home-main-testimonial pt-12 pb-13" id="section-04">
        <div class="container">
            <h2 class="mb-8">
                <span class="font-weight-semibold">Clients </span>
                <span class="font-weight-light">Review</span>
            </h2>
            <!-- Testimonials -->
            <div class="container">
                <div class="row">
                    <div class="col col-md-12">
                        <div class="slick-slider testimonials-slider arrow-top" data-slick-options='{"slidesToShow": 2,"autoplay":false,"dots":false,"responsive":[{"breakpoint": 992,"settings": {"slidesToShow": 1,"arrows":false}}]}'>
                            <!-- Testimonial -->
                            <div class="box">
                                <div class="card testimonial h-100 border-0 bg-transparent">
                                    <a href="#" class="author-image">
                                        <img src="<?php echo bloginfo('template_url') ?>/img/testimonial-1.png" alt="testimonial" class="rounded-circle">
                                    </a>
                                    <div class="card-body bg-white">
                                        <div class="testimonial-icon text-right">
                                            <svg class="icon icon-quote">
                                                <use xlink:href="#icon-quote"></use>
                                            </svg>
                                        </div>
                                        <ul class="list-inline mb-4 d-flex align-items-end flex-wrap">
                                            <li class="list-inline-item">
                                                <span class="font-size-lg text-dark font-weight-semibold d-inline-block">
                                                    Geri D.
                                                </span>
                                            </li>
                                        </ul>
                                        <div class="card-text text-gray pr-4">
                                            We had an absolutely fantastic time on the cruise! The boat/rooms were beautiful! The food was incredible and we really enjoyed every excursion! Thanks again for a trip of a lifetime. We have been recommending it to all of our friends and family. Don’t be surprised if you see us again!
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Testimonial 2-->
                            <div class="box">
                                <div class="card testimonial h-100 border-0 bg-transparent">
                                    <a href="#" class="author-image">
                                        <img src="<?php echo bloginfo('template_url') ?>/img/testimonial-2.png" alt="testimonial" class="rounded-circle">
                                    </a>
                                    <div class="card-body bg-white">
                                        <div class="testimonial-icon text-right">
                                            <svg class="icon icon-quote">
                                                <use xlink:href="#icon-quote"></use>
                                            </svg>
                                        </div>
                                        <ul class="list-inline mb-4 d-flex align-items-end flex-wrap">
                                            <li class="list-inline-item">
                                                <span class="font-size-lg text-dark font-weight-semibold d-inline-block">
                                                    Gloria R.
                                                </span>
                                            </li>
                                        </ul>
                                        <div class="card-text text-gray pr-4">
                                            I just want to thank you for arranging the trip of a lifetime for me. The visit to the Sacred Valley and, most of all, the week on the Amazon surpassed any travel experience I’ve ever had — and I’ve had more than a few. Words fail me in expressing my gratitude for the support and planning you gave me. No past or future trip I take will even equal it! </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Testimonial 3-->
                            <div class="box">
                                <div class="card testimonial h-100 border-0 bg-transparent">
                                    <a href="#" class="author-image">
                                        <img src="<?php echo bloginfo('template_url') ?>/img/testimonial-3.png" alt="testimonial" class="rounded-circle">
                                    </a>
                                    <div class="card-body bg-white">
                                        <div class="testimonial-icon text-right">
                                            <svg class="icon icon-quote">
                                                <use xlink:href="#icon-quote"></use>
                                            </svg>
                                        </div>
                                        <ul class="list-inline mb-4 d-flex align-items-end flex-wrap">
                                            <li class="list-inline-item">
                                                <span class="font-size-lg text-dark font-weight-semibold d-inline-block">
                                                    Paul H.
                                                </span>
                                            </li>
                                        </ul>
                                        <div class="card-text text-gray pr-4">
                                            We enjoyed all the excursions including the jungle walks, villages and swimming in the river. Overall, this was, for me, one of the most educational and interesting trips of my life so far. The environment, wildlife, ecosystem and simple life in the villages in the jungle were nothing but amazing. </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /#section-04 end Testimonials-->
    <!-- #section 05 start -->
    <section id="section-05" class="pt-11 pb-11">
        <div class="container">
            <div class="d-flex align-items-center mb-7 flex-wrap flex-sm-nowrap">
                <h2 class="mb-3 mb-sm-0">
                    <span class="font-weight-semibold">Blog</span>
                    <span class="font-weight-light">Tips & Articles</span>
                </h2>
                <a href="blog-listing-grid.html" class="link-hover-dark-primary ml-0 ml-sm-auto w-100 w-sm-auto">
                    <span class="font-size-md d-inline-block mr-1">All articles</span>
                    <i class="fal fa-chevron-right"></i>
                </a>
            </div>
            <div class="row">
                <?php
                //loop
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3

                );
                $secondary = new WP_Query($args);
                if ($secondary->have_posts()) :
                    while ($secondary->have_posts()) : $secondary->the_post();
                        get_template_part('template-parts/content', 'blog');
                    endwhile;
                    wp_reset_postdata(); //very important to rest after custom query
                endif;
                ?>

                

            </div>
        </div>
    </section>
    <!-- /#section-05 end -->
</div>
<!-- .content-wrapper end -->
<!-- #wrapper-content end -->

<?php get_footer(); ?>