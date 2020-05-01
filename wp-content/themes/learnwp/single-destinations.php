<?php get_header() ?>

<?php
while (have_posts()) :
    the_post();

?>
    <!-- Content Wrapper -->
    <div id="wrapper-content" class="wrapper-content pb-0 pt-0 ">
        <!-- Header image -->
        <div class="image">
        <?php
            if (class_exists('MultiPostThumbnails')) :
                MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'header-image');
            endif;
            ?>
        </div>


        <!-- Page wrapper -->
        <div class="page-wrapper bg-white">
            <div class="container">


                <!-- Page Content -->
                <div class="page-container row">
    
                    <div class="page-content col-12 col-lg-8 order-0 order-lg-1 mb-8 mb-lg-0">
                        <div class="explore-filter d-lg-flex align-items-center d-block">
                            <div class="text-dark font-weight-semibold font-size-md mb-4 mb-lg-0">56 Results found</div>
                            <div class="form-filter d-flex align-items-center ml-auto">
                                <div class="form-group row no-gutters align-items-center">
                                    <label for="sort-by"
                                           class="col-sm-3 text-dark font-size-md font-weight-semibold mb-0">Sort
                                        by</label>
                                    <div class="select-custom col-sm-9">
                                        <select id="sort-by" class="form-control">
                                            <option value="0">Latest</option>
                                            <option value="1">New York</option>
                                            <option value="1">LA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="format-listing ml-auto">
                                    <a href="#" class="active"><i class="fas fa-th"></i></a>
                                    <a href="explore-sidebar-list.html"><i class="fal fa-bars"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row equal-height">
                            <div class="col-lg-6 mb-6">
                                <div class="store card border-0 rounded-0">
                                    <div class="position-relative store-image">
                                        <a href="listing-details-full-image.html">
                                            <img src="images/shop/popular-place-2.jpg" alt="store 1"
                                                 class="card-img-top rounded-0">
                                        </a>
                                        <div class="image-content position-absolute d-flex align-items-center">
                                            <div class="content-right ml-auto d-flex">
                                                <a href="images/shop/full-popular-place-2.jpg"
                                                   class="item viewing"
                                                   data-toggle="tooltip"
                                                   data-placement="top"
                                                   title="Quick view" data-gtf-mfp="true">
                                                    <svg class="icon icon-expand">
                                                        <use xlink:href="#icon-expand"></use>
                                                    </svg>
                                                </a>
                                                <a href="#" class="item marking" data-toggle="tooltip"
                                                   data-placement="top"
                                                   title="Bookmark"><i class="fal fa-bookmark"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pb-4">
                                        <a href="listing-details-full-image.html"
                                           class="card-title h5 text-dark d-inline-block mb-2"><span
                                                class="letter-spacing-25">Fruit Cake - Halsey St </span></a>
                                        <ul class="list-inline store-meta mb-4 font-size-sm d-flex align-items-center flex-wrap">
                                            <li class="list-inline-item"><span
                                                    class="badge badge-success mr-1 d-inline-block">4.8</span><span
                                                    class="number">2 rating</span>
                                            </li>
                                            <li class="list-inline-item separate"></li>
                                            <li class="list-inline-item"><span class="mr-1">From</span><span
                                                    class="text-danger font-weight-semibold">$4.0</span></li>
                                            <li class="list-inline-item separate"></li>
                                            <li class="list-inline-item"><span class="text-green">Open now!</span></li>
                                        </ul>
                                        <div class="media">
                                            <a href="#" class="d-inline-block mr-3"><img
                                                    src="images/listing/testimonial-1.png"
                                                    alt="testimonial" class="rounded-circle">
                                            </a>
                                            <div class="media-body lh-14 font-size-sm">They specialize in makgeolli at
                                                this
                                                Korean-style pub in Seorae Village. And they use...
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer rounded-0 border-top-0 pb-3 pt-0 bg-transparent">
                                        <div class="border-top pt-3">
											<span
                                                    class="d-inline-block mr-1"><i
                                                    class="fal fa-map-marker-alt">
											</i>
												</span>
                                            <a href="#" class="text-secondary text-decoration-none address">92
                                                Halsey St,
                                                Brooklyn, NY</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                       
                    </div>
                </div>
                <!-- End Page Content -->
            </div>
        </div>
        <!-- end page wrapper -->
    </div>
    <!-- End Content Wrapper -->
    </div>


    <!-- #wrapper-content end -->
    </div>
<?php


endwhile;
?>
<!-- #site-wrapper end-->
<?php get_footer() ?>