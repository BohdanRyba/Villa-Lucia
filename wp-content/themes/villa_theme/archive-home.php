<?php get_header()
/*
 * Template Name: HomePage
 * */
?>
    <!-- Revolution Slider -->
    <section class="revolution-slider">
        <div class="bannercontainer">
            <div class="banner">
                <ul>

					<?php
					$gallery = get_field( 'images_gallery', 29 );
					if ( $gallery ) {
						for ( $i = 0; $i < count( $gallery ); $i ++ ):


							?>
                            <!-- Slide -->
                            <li data-transition="fade" data-slotamount="7" data-masterspeed="1500">
                                <!-- Main Image -->
                                <img src="<?php echo $gallery[ $i ]['gallery_image']['url'] ?>" style="opacity:0;"
                                     alt=<?php echo hsc( $gallery[ $i ]['gallery_desc'] ) ?>"
                                     data-bgfit=" cover" data-bgposition="left bottom" data-bgrepeat="no-repeat">
                            </li>
							<?php
						endfor;

					}
					?>
                </ul>
            </div>
        </div>
    </section>

    <!-- Reservation form -->
    <section id="reservation-form">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form class="form-inline reservation-horizontal clearfix" role="form" method="post"
                          action="php/reservation.php" name="reservationform" id="reservationform">
                        <!-- Error message -->
                        <div id="message"></div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="checkin">Check-in</label>
                                    <div class="popover-icon" data-container="body" data-toggle="popover"
                                         data-trigger="hover" data-placement="right"
                                         data-content="Check-In is from 14:00"><i class="fa fa-info-circle fa-lg"> </i>
                                    </div>
                                    <i class="fa fa-calendar infield"></i>
                                    <input name="checkin" type="text" id="checkin" value="" class="form-control"
                                           placeholder="Check-in"/>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="checkout">Check-out</label>
                                    <div class="popover-icon" data-container="body" data-toggle="popover"
                                         data-trigger="hover" data-placement="right"
                                         data-content="Check-out before 10:00"><i class="fa fa-info-circle fa-lg"> </i>
                                    </div>
                                    <i class="fa fa-calendar infield"></i>
                                    <input name="checkout" type="text" id="checkout" value="" class="form-control"
                                           placeholder="Check-out"/>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="guests-select">
                                        <label>Guests</label>
                                        <i class="fa fa-user infield"></i>
                                        <div class="total form-control" id="test">1</div>
                                        <div class="guests">
                                            <div class="form-group adults">
                                                <label for="adults">Adults</label>
                                                <div class="popover-icon" data-container="body" data-toggle="popover"
                                                     data-trigger="hover" data-placement="right"
                                                     data-content="+18 years"><i class="fa fa-info-circle fa-lg"> </i>
                                                </div>
                                                <select name="adults" id="adults" class="form-control">
                                                    <option value="1">1 adult</option>
                                                    <option value="2">2 adults</option>
                                                    <option value="3">3 adults</option>
                                                </select>
                                            </div>
                                            <div class="form-group children">
                                                <label for="children">Children</label>
                                                <div class="popover-icon" data-container="body" data-toggle="popover"
                                                     data-trigger="hover" data-placement="right"
                                                     data-content="0 till 16 years"><i
                                                            class="fa fa-info-circle fa-lg"> </i></div>
                                                <select name="children" id="children" class="form-control">
                                                    <option value="0">0 children</option>
                                                    <option value="1">1 child</option>
                                                    <option value="2">2 children</option>
                                                    <option value="3">3 children</option>
                                                </select>
                                            </div>
                                            <button type="button" class="btn btn-default button-save btn-block">Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary btn-block">Check Availability</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>

    <!-- Rooms -->
    <section class="rooms mt50">
    <div class="container">
    <div class="row">
    <div class="col-sm-12">
        <h2 class="lined-heading"><span><?php
				$true_options = get_option( 'true_options' );
				echo $true_options['home_apartment_title'];
				?></span></h2>
    </div>
	<?php
	$count = 3;
	$args  = [
		'order'       => 'rand',
		'post_type'   => 'apartments',
		'numberposts' => $count,
	];

	$apartments = get_posts( $args );

	if ( $apartments ) {
		foreach ( $apartments as $key => $apartment ) {
			setup_postdata( $apartment );
			$post_id = $apartment->ID;
			?>

            <!-- Room -->
            <div class="col-sm-4">
                <div class="room-thumb">

					<?php
					$apartment_price = get_post_meta( $post_id, 'price' );
					$image_arg       = [
						'post_type'   => 'attachment',
						'post_parent' => $post_id,
						'numberposts' => 1
					];
					$post_image      = get_posts( $image_arg );
					foreach ( $post_image as $image ):
						?>
                        <img src="<?php echo $image->guid ?>" alt="room 1" class="img-responsive"/>

					<?php endforeach; ?>

                    <div class="mask">
                        <div class="main">
                            <h5><?php echo htmlspecialchars( $apartment->post_title ) ?></h5>
                            <div class="price">
                                <span>starting at</span>&euro; <?php echo htmlspecialchars( $apartment_price[0] ) ?>
                            </div>
                        </div>
                        <div class="content">
                            <p><span>Apartment for 2 Persons</span></p>
                            <div class="row">
								<?php

								$param_array = get_field( 'parameters', $post_id );
								$items       = array();

								$param_array = array_chunk( $param_array, 2 );
								for ( $i = 0; $i < count( $param_array ); $i ++ ) {
									for ( $j = 0; $j < count( $param_array[ $i ] ); $j ++ ) {
										if ( $param_array[ $i ][ $j ]['prior'] == 1 ) {
											$items[] = $param_array[ $i ][ $j ];
										}
									}
								}
								for ( $i = 0; $i < count( $items ); $i ++ ) :
									?>
                                    <div class="col-xs-6">
                                        <ul class="list-unstyled">
                                            <li>
                                                <i class="fa fa-check-circle"></i><?php echo $items[ $i ]['parametr'] ?>
                                            </li>
                                        </ul>
                                    </div>
								<?php endfor; ?>
                            </div>
                            <a href="<?php echo $apartment->guid ?>" class="btn btn-primary btn-block">Check
                                Apartment</a>
                        </div>
                    </div>
                </div>
            </div>

			<?php
		}
	}
	wp_reset_postdata();
	?>


    <!-- USP's -->
    <section class="usp mt100">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="lined-heading"><span></span></h2>
                </div>
                <div class="col-sm-3 bounceIn appear" data-start="0">
                    <div class="box-icon">
                        <div class="circle"><i class="fa fa-wifi fa-lg"></i></div>
                        <h3>Free Wifi</h3>
                        <a href="#"</i></a> </div>
                </div>
                <div class="col-sm-3 bounceIn appear" data-start="400">
                    <div class="box-icon">
                        <div class="circle"><i class="fa fa-anchor fa-lg"></i></div>
                        <h3>Free Boat Docking Space</h3>
                        <a href="#"></a></div>
                </div>
                <div class="col-sm-3 bounceIn appear" data-start="800">
                    <div class="box-icon">
                        <div class="circle"><i class="fa fa-cutlery fa-lg"></i></div>
                        <h3>Family owned restaurant just a few seconds by foot away</h3>
                        <a href="#"></a></div>
                </div>
                <div class="col-sm-3 bounceIn appear" data-start="1200">
                    <div class="box-icon">
                        <div class="circle"><i class="fa fa-tint fa-lg"></i></div>
                        <h3>Seaside 30 meters away</h3>
                        <a href="#"></a></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery -->
    <section class="gallery-slider mt100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="lined-heading"><span><?php echo hsc( $true_options['home_our_places'] ); ?></span></h2>
                </div>
            </div>
        </div>

        <div id="owl-gallery" class="owl-carousel">
			<?php
			$gallery = get_field( 'images_gallery', 33 );
			if ( $gallery ) {
				for ( $i = 0; $i < count( $gallery ); $i ++ ):
					?>
                    <!-- Slide -->
                    <div class="item">
                        <a href=<?php echo $gallery[ $i ]['gallery_image']['url'] ?>
                           data-rel="prettyPhoto[gallery1]">
                            <img src="<?php echo $gallery[ $i ]['gallery_image']['url'] ?>"
                                 alt="<?php echo hsc( $gallery[ $i ]['gallery_desc'] ) ?>">
                            <i class="fa fa-search"></i></a>
                    </div>
					<?php
				endfor;
			} ?>

        </div>
    </section>
    <br><br><br><br><br><br>
<?php get_footer() ?>