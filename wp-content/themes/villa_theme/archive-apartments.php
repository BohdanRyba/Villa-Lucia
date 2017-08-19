<?php get_header();
/*
 * Template Name: ApartmentsPage
 * */
?>
<!-- Parallax Effect -->
<script type="text/javascript">$(document).ready(function(){$('#parallax-pagetitle').parallax("50%", -0.55);});</script>

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
                            $page = get_post(8,ARRAY_A); ?>
							<li class="active"><?php echo $page['post_title']?></li>
						</ol>
						<h1><?php echo $page['post_title']?></h1>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Rooms -->
<section class="rooms mt50">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2 class="lined-heading"><span><?php
                        $true_options = get_option('true_options');
                        echo $true_options['apartment_title'];?></span></h2>
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
                        <img src="<?php echo $image->guid; ?>" alt="<?php echo $image->post_content; ?>" class="img-responsive"/>

					<?php endforeach; ?>
					<div class="mask">
						<div class="main">
							<h5><?php echo htmlspecialchars($apartment->post_title) ?></h5>
							<div class="price"><span>starting at</span>&euro; <?php echo $apartment_price[0] ?></div>
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
							<a href="<?php echo $apartment->guid ?>" class="btn btn-primary btn-block">Check Apartment</a>
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
</section><br><br><br><br><br><br>
<?php get_footer()?>