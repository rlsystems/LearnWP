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

        <?php //Get Properties in Destination
        $posts = get_posts(array(
            'post_type' => 'properties',
            'meta_query' => array(
                array(
                    'key' => 'destination', // name of custom field
                    'value' => '"' . get_the_ID() . '"',
                    'compare' => 'LIKE'
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