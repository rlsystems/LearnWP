<?php get_header() ?>

<?php
while (have_posts()) :
    the_post();

?>

    <!-- Content Wrapper -->
    <div id="wrapper-content" class="wrapper-content pb-0 pt-0 ">
        <div class="banner" style="background-image:url(<?php
                                                        if (class_exists('MultiPostThumbnails')) :
                                                            $url = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'header-image');
                                                            echo $url;
                                                        endif;
                                                        ?>);">
            <div class="container">
                <div class="banner-content">
                    <div class="heading fadeInDown animated" data-animate="fadeInDown">
                        <h1 class="mb-2 text-white text-uppercase banner-text-large">
                            <?php the_title(); ?>
                        </h1>
                        <h6 class="mb-0 text-white text-uppercase banner-text-small">
                            <?php echo get_field('sub_heading'); ?>
                        </h6>

                    </div>
                </div>
            </div>
        </div>
        <!-- xx -->


        <!-- xx -->
        <?php //Get Properties in Destination

        $posts = get_posts(array(
            'post_type' => 'properties',
            'posts_per_page' => 8,
            'meta_query' => array(
                array(
                    'key' => 'destination', // name of custom field
                    'value' => '"' . get_the_ID() . '"',
                    'compare' => 'LIKE',

                )
            )
        ));

        ?>




        <!-- Page wrapper -->
        <div class="page-wrapper bg-white">
            <div class="container">

                <!-- Page Content -->
                <div class="page-container row">

                    <div class="page-content col-12 order-0 order-lg-1 mb-8 mb-lg-0">
                        <!-- Nav -->
                        <div class="explore-filter d-lg-flex align-items-center d-block mt-6">
                            <div class="text-dark font-weight-semibold font-size-md mb-4 mb-lg-0"><?php echo count($posts); ?> Results found</div>
                            <div class="form-filter d-flex align-items-center ml-auto">
                                <div class="form-group row no-gutters align-items-center">
                                    <label for="sort-by" class="col-sm-3 text-dark font-size-md font-weight-semibold mb-0">Sort
                                        by</label>
                                    <div class="select-custom col-sm-9">
                                        <select id="sort-by" class="form-control">
                                            <option value="0">Most Popular</option>
                                            <option value="1">Price Low to High</option>
                                            <option value="2">Price High to Low</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="format-listing ml-auto">
                                    <a href="#" class="active"><i class="fas fa-th"></i></a>
                                    <a href="explore-sidebar-list.html"><i class="fal fa-bars"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Cruises -->
                        <div class="row equal-height">


                            <?php
                            if ($posts) : ?>


                                <?php foreach ($posts as $post) : //loop and render the properties
                                    setup_postdata($post);
                                    get_template_part('template-parts/content', 'properties-grid');

                                endforeach; ?>


                                <?php wp_reset_postdata(); ?>

                            <?php endif; ?>

                        </div>
                        <ul class="pagination pagination-style-02 justify-content-center pb-6 mt-4">
                            <li class="page-item"><a href="#" class="page-link"><i class="fal fa-chevron-left"></i></a>
                            </li>
                            <li class="page-item"><a href="#" class="page-link current">1</a></li>
                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                            <li class="page-item"><a href="#" class="page-link">3</a></li>
                            <li class="page-item"><a href="#" class="page-link">...</a></li>
                            <li class="page-item"><a href="#" class="page-link">10</a></li>
                            <li class="page-item"><a href="#" class="page-link"><i class="fal fa-chevron-right"></i></a>
                            </li>
                        </ul>

                    </div>
                </div>
                <!-- End Page Content -->

                <!--  Block -->
                <div class="row pt-8 pb-12">
                    <!-- https://www.youtube.com/watch?v=W_kvIzKVu2c -->
                    <div class="col-lg-6"> <?php the_content() ?></div>
                    <div class="col-lg-6">
                        <!-- Decoration image -->
                        <div class="image">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/W_kvIzKVu2c" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> </div>
                    </div>

                </div>
                <!-- End Block -->

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