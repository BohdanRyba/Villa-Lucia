<?php get_header() ?>
    <!-- Parallax Effect -->
    <script type="text/javascript">$(document).ready(function () {
            $('#parallax-pagetitle').parallax("50%", -0.55);
        });</script>

    <section class="parallax-effect">
        <div id="parallax-pagetitle" style="background-image: url(images/parallax/1900x911.gif);">
            <div class="color-overlay">
                <!-- Page title -->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <ol class="breadcrumb">
                                <li><a href="/">Home</a></li>
	                            <?php
	                            $page = get_post(11,ARRAY_A); ?>
                                <li class="active"><?php echo $page['post_title']?></li>
                            </ol>
                            <h1><?php echo $page['post_title']?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Filter -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <ul class="nav nav-pills" id="filters">
                    <li class="active"><a href="#" data-filter="*">All</a></li>
					<?php
					$args             = [
						'post_type' => 'gallery_page',
					];
					$images           = get_posts( $args );
					$filter_param_arr = array();
					$filter_names_arr = array();

					foreach ( $images as $image ):
						$image_id = $image->ID;
						$rows     = get_field( 'filter', $image_id );
						foreach ( $rows as $row ) {
							$filter_names_arr[] = $row['filter_name'];
							$filter_param_arr[] = $row['filter_param'];
						}
					endforeach;

					$filter_param_arr = array_values( array_unique( $filter_param_arr ) );
					$filter_names_arr = array_values( array_unique( $filter_names_arr ) );
					for ( $i = 0; $i < count( $filter_names_arr ); $i ++ ):?>
                        <li><a href="#"
                               data-filter=".<?php echo htmlspecialchars( $filter_param_arr[ $i ] ) ?>">
								<?php echo  $filter_names_arr[ $i ] ?></a>
                        </li>
					<?php endfor; ?>
                </ul>

            </div>
        </div>
    </div>

    <!-- Gallery -->
    <section id="gallery" class="mt50">
        <div class="container">
            <div class="row gallery">

				<?php
				$args                 = [
					'post_type' => 'gallery_page',
				];
				$images               = get_posts( $args );
				foreach ( $images as $image ):
					$image_id = $image->ID;
					$image_content    = $image->post_content;
					$post_image       = get_field( 'gallery_page_image', $image_id );
					$filter_param_arr = array();
					$filter_names_arr = array();

					$rows = get_field( 'filter', $image_id );
					$image_desc = get_field('gallery_page_image_description',$image_id  )
					?>
                    <div class="col-sm-3 <?php
					for ( $i = 0; $i < count( $rows ); $i ++ ):
						echo ( $rows[ $i ]['filter_param'] ) . ' ';
					endfor;
					?> fadeIn appear">
                        <a href="<?php echo $post_image ?>"
                           data-rel="prettyPhoto[gallery1]">
                            <img src="<?php echo $post_image ?>" alt="<?php echo $image_desc;?>" class="img-responsive zoom-img"/><i
                                    class="fa fa-search"></i></a></div>

					<?php
				endforeach;
				?>
            </div>
        </div>
    </section>
<?php get_footer() ?>