<?php
get_header();

?>
    <!-- Parallax Effect -->
    <script type="text/javascript">$(document).ready(function () {
            $('#parallax-pagetitle').parallax("50%", -0.55);
        });</script>

    <section class="parallax-effect">
        <div id="parallax-pagetitle" style="background-image: url(./images/parallax/1900x911.gif);">
            <div class="color-overlay">
                <!-- Page title -->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <ol class="breadcrumb">
                                <li><a href="/">Home</a></li>
								<?php
								$page = get_post( 8, ARRAY_A );
								?>
                                <li><a href="<?php echo $page['guid'] ?>"><?php echo $page['post_title'] ?></a></li>
                                <li class="active"><?php the_title() ?></li>
                            </ol>
                            <h1><?php the_title();
								$post_id = get_the_ID() ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container mt50">
        <div class="row">
            <!-- Slider -->
            <section class="standard-slider room-slider">
                <div class="col-sm-12 col-md-8">
                    <div class="slider_wrap">

						<?php
						$gallery_image_array = get_field( 'apartment_gallery', get_the_ID() );
						if ( $gallery_image_array ):
							?>
                            <div class="slider slider-for">
								<?php foreach ( $gallery_image_array as $images ): ?>
                                    <div><img src="<?php echo $images['apart_image'] ?>"
                                              alt="<?php echo htmlspecialchars( $images['gallery_description'] ) ?>"/>
                                    </div>
								<?php endforeach; ?>
                            </div>
                            <div class="slider slider-nav">
								<?php foreach ( $gallery_image_array as $images ): ?>
                                    <div>
                                        <div class="slider-nav-inner"><img src="<?php echo $images['apart_image'] ?>"
                                                                           alt="<?php echo htmlspecialchars( $images['gallery_description'] ) ?>"/>
                                        </div>
                                    </div>
								<?php endforeach; ?>
                            </div>
						<?php else: ?>
                            <h2>Нету изображений</h2>
						<?php endif; ?>

                    </div>
                </div>
            </section>

            <!-- Reservation form -->
            <section id="reservation-form" class="mt50 clearfix">
                <div class="col-sm-12 col-md-4">
                    <form class="reservation-vertical clearfix" role="form" method="post" action="php/reservation.php"
                          name="reservationform" id="reservationform">
                        <h2 class="lined-heading"><span>Reservation</span></h2>
                        <div id="message"></div>
                        <!-- Error message display -->
                        <div class="form-group">
                            <select class="hidden" name="room" id="room">
                                <option selected="selected">Double Room</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="checkin">Check-in</label>
                            <div class="popover-icon" data-container="body" data-toggle="popover" data-trigger="hover"
                                 data-placement="right" data-content="Check-In is from 14:00"><i
                                        class="fa fa-info-circle fa-lg"> </i></div>
                            <i class="fa fa-calendar infield"></i>
                            <input name="checkin" type="text" id="checkin" value="" class="form-control"
                                   placeholder="Check-in" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="checkout">Check-out</label>
                            <div class="popover-icon" data-container="body" data-toggle="popover" data-trigger="hover"
                                 data-placement="right" data-content="Check-out before 10:00"><i
                                        class="fa fa-info-circle fa-lg"> </i></div>
                            <i class="fa fa-calendar infield"></i>
                            <input name="checkout" type="text" id="checkout" value="" class="form-control"
                                   placeholder="Check-out" required="required"/>
                        </div>
                        <div class="form-group">
                            <div class="guests-select">
                                <label>Guests</label>
                                <i class="fa fa-user infield"></i>
                                <div class="total form-control" id="guests-total">1</div>
                                <div class="guests">
                                    <div class="form-group adults">
                                        <label for="adults">Adults</label>
                                        <div class="popover-icon" data-container="body" data-toggle="popover"
                                             data-trigger="hover" data-placement="right" data-content="+18 years"><i
                                                    class="fa fa-info-circle fa-lg"> </i></div>
                                        <select name="adults" id="adults" class="form-control">
                                            <option value="1">1 adult</option>
                                            <option value="2">2 adults</option>
                                            <option value="3">3 adults</option>
                                        </select>
                                    </div>
                                    <div class="form-group children">
                                        <label for="children">Children</label>
                                        <div class="popover-icon" data-container="body" data-toggle="popover"
                                             data-trigger="hover" data-placement="right" data-content="0 till 18 years">
                                            <i class="fa fa-info-circle fa-lg"> </i></div>
                                        <select name="children" id="children" class="form-control">
                                            <option value="0">0 children</option>
                                            <option value="1">1 child</option>
                                            <option value="2">2 children</option>
                                            <option value="3">3 children</option>
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-default button-save btn-block">Save</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group-title">Price</div>
                            <div class="form-price">
                                <div class="form-price-title">per night</div>
                                <div class="form-price-value"><span>99</span> €</div>
                                <input type="hidden" name="price-data" value="99"/>
                            </div>
                            <div class="form-price form-price-show">
                                <div class="form-price-title">total</div>
                                <div class="form-price-value" id="price-total"><span>0</span> €</div>
                                <input type="hidden" name="price-total" value=""/>
                                <div class="form-price-subvalue" id="price-day">(<span></span> nights)</div>
                                <input type="hidden" name="price-day" value=""/>
                            </div>
                            <div class="form-price form-price-hide">
                                <span>Please choose your Check-in and Check-out</span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Book Now</button>
                    </form>
                </div>
            </section>

            <!-- Room Content -->
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 mt50">
                            <h2 class="lined-heading"><span>Apartment Details</span></h2>
                            <h3 class="mt50">Table overview</h3>
                            <table class="table table-striped mt30">
                                <tbody>

								<?php $param_array = get_field( 'parameters', $post_id ) ?>
								<?php
								$param_array = array_chunk( $param_array, 3 );
								for ( $i = 0; $i < count( $param_array ); $i ++ ) :
									?>
                                    <tr>
										<?php
										for ( $j = 0; $j < count( $param_array ); $j ++ ): ?>
											<?php if ( isset( $param_array[ $i ][ $j ]['parametr'] ) ): ?>
                                                <td>
                                                    <i class="fa fa-check-circle"></i> <?php echo $param_array[ $i ][ $j ]['parametr'] ?>
                                                </td>
											<?php else: ?>
                                                <td></td>

											<?php endif; ?>
										<?php endfor; ?>
                                    </tr>
								<?php endfor; ?>
                                </tbody>
                            </table>
                            <p class="mt50"><?php $post_content = get_post( $post_id );
								echo $post_content->post_content;
								?></p>
                        </div>
                        <div class="col-md-5 mt50">
                            <h2 class="lined-heading"><span>Availability</span></h2>
                            <div class="calendar-wrap">
                                <div id="hostelproRoomCalendarWrap1">
                                    <div id="hostelproRoomCalendar1" class="calendar-hostel"></div>
                                    <form method="post" action="?" id="hostelPROBookCalendarForm1">
                                        <input type="hidden" name="room_id" value="1">
                                        <input type="hidden" name="in_booking_mode" value="1">
                                        <input type="hidden" name="from_date" value="">
                                        <input type="hidden" name="to_date" value="">
                                        <input type="hidden" name="currently_setting" value="from">
                                        <input type="hidden" name="action" value="hostelpro_ajax">
                                        <input type="hidden" name="type" value="load_booking_form">
                                        <input type="hidden" id="hostelpro-alternate1">
                                        <p class="hostel-message hidden">New bookings can be made after the summer has
                                            finished, please visit us again when this years summer has finished</p>
                                    </form>
                                </div>
                                <div class="dp-example">
                                    <div class="dp-example-item avaible"><span>31</span> avaible</div>
                                    <div class="dp-example-item occupied"><span>31</span> occupied</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Other Rooms -->
    <section class="rooms mt50">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="lined-heading"><span>Other Apartments</span></h2>
                </div>
				<?php
				$count = 3;
				$args  = [
					'orderby'     => 'rand',
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
                                        <h5><?php echo hsc( $apartment->post_title ) ?></h5>
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
											$size = 0;
											if ( count( $items ) > 8 ) {
												$size = 8;
											} else {
												$size = count( $items );
											}
											for ( $i = 0; $i < $size; $i ++ ) :
                                                if(isset($items[$i])){
												?>
                                                <div class="col-xs-6">
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <i class="fa fa-check-circle"></i><?php echo $items[ $i ]['parametr'] ?>
                                                        </li>
                                                    </ul>
                                                </div>
											<?php }endfor; ?>
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
            </div>
        </div>
    </section>
    <br><br><br><br><br><br>

<?php
get_footer();