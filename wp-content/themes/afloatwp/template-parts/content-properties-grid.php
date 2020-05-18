   <!-- Listing -->
   <div class="col-lg-3 mb-6">
       <div class="store card border-0 rounded-0">
           <div class="position-relative store-image">
               <a href="<?php echo get_permalink() ?>">
                   <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php echo get_the_title() ?>" class="card-img-top rounded-0">
               </a>
               <div class="image-content position-absolute d-flex align-items-center">
                   <div class="content-right ml-auto d-flex">
                       <a href="<?php echo get_the_post_thumbnail_url() ?>" class="item viewing" data-toggle="tooltip" data-placement="top" title="Quick view" data-gtf-mfp="true">
                           <svg class="icon icon-expand">
                               <use xlink:href="#icon-expand"></use>
                           </svg>
                       </a>
                       <a href="#" class="item marking" data-toggle="tooltip" data-placement="top" title="Bookmark"><i class="fal fa-bookmark"></i></a>
                   </div>
               </div>
           </div>
           <div class="card-body ">
               <a href="<?php echo get_permalink() ?>" class="card-title h5 text-dark d-inline-block mb-2"><span class="letter-spacing-25"><?php the_title(); ?></span></a>
               <ul class="list-inline store-meta font-size-sm d-flex align-items-center flex-wrap">
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

           </div>
         
       </div>
   </div>