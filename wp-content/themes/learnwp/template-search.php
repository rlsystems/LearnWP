<?php
/*Template Name: Search*/
get_header();

$posts = get_posts(array(
    'post_type' => 'properties',
    'posts_per_page' => 8,
    // 'meta_query' => array(
    //     array(
    //         'key' => 'destination', // name of custom field
    //         'value' => '"' . get_the_ID() . '"',
    //         'compare' => 'LIKE',

    //     )
    // )
));

?>
<img class="img-fluid" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />

<div class="container">
    <!-- Breadcrumb -->
    <ul class="breadcrumb breadcrumb-style-02 py-7">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item">Search All Travel</li>
    </ul>

    <!-- Page Container -->
    <div class="page-container row">

        <!-- Sidebar -->
        <div class="sidebar col-lg-4 order-1 order-lg-0 mb-8 mb-lg-0">

            <div class="card widget-filter bg-white mb-6 border-0 rounded-0 px-6">
                <div class="card-header bg-transparent border-0 pt-4 pb-0 px-0">
                    <h5 class="card-title mb-0">Filter</h5>
                </div>
                <div class="card-body px-0">
                    <div class="form-filter">
                        <form>
                            <div class="form-group category">
                                <div class="select-custom">
                                    <!-- zz -->
                                    <?php 
                                    
                                    if( $terms = get_posts( array(
                                        'post_type' => 'destinations',
                                        'posts_per_page' => 8, // to make it simple I use default categories
                                        'orderby' => 'name'
                                    ) ) ) : 
                                        // if categories exist, display the dropdown
                                        echo '<select name="categoryfilter" class="form-control"><option value="">Select...</option>';
                                        foreach ( $terms as $term ) :
                                            echo '<option value=' . $term->ID . '>' . get_the_title($term->ID) . '</option>'; // ID of the category as an option value
                                        endforeach;
                                        echo '</select>';
                                    endif;
                                    
                                    ?>


                                    <!-- zz -->

                                    
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
      
        </div>
        <!-- End Sidebar -->
        <!-- Results Area -->
        <div class="page-content col-lg-8 order-0 order-lg-1">
            <!-- Top Controls -->
            <div class="explore-filter d-lg-flex align-items-center d-block">
                <div class="text-dark font-weight-semibold font-size-md mb-4 mb-lg-0">56 Results found</div>
                <div class="form-filter d-flex align-items-center ml-auto">
                    <div class="form-group row no-gutters align-items-center">
                        <label for="sort-by" class="col-sm-3 text-dark font-size-md font-weight-semibold mb-0">Sort
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
                        <a href="explore-full-map-list.html"><i class="fal fa-bars"></i></a>
                    </div>
                </div>
            </div>
            <!-- End Top Controls -->
            <!-- Results -->
            <div class="row equal-height">
                <?php
                if ($posts) : ?>


                    <?php foreach ($posts as $post) : //loop and render 
                        setup_postdata($post);
                        get_template_part('template-parts/content', 'search-travel');

                    endforeach; ?>


                    <?php wp_reset_postdata(); ?>

                <?php endif; ?>

            </div>
            <!-- End Results -->
            <!-- Pagination -->
            <ul class="pagination pagination-style-02 justify-content-center pb-12 mt-8">
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
            <!-- End Pagination -->
        </div>
        <!-- End Results Area -->
    </div>
    <!-- End Page Container -->
</div>
<!-- End Container -->
<?php get_footer(); ?>