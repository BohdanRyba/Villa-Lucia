<!DOCTYPE HTML>
<html>
<head>
    <meta charset="<?php bloginfo( 'charset' ) ?>">
    <title><?php wp_title( '', true, 'right' ) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<?php wp_head(); ?>
    <script type="text/javascript">
        jQuery(function () {
            //jQueryUI - Datepicker
            if (jQuery().datepicker) {
                jQuery('#checkin').datepicker({
                    showAnim: "drop",
                    dateFormat: "yy-mm-dd",
                    minDate: "-0D",
                    firstDay: 1,
                    beforeShow: function () {
                        var a = jQuery("#checkout").datepicker('getDate');
                        if (a) return {
                            maxDate: a
                        }
                    },
                    beforeShowDay: function (date) {
                        var unavailableDates = ["05-26-2015", "05-27-2015", "05-28-2015", "05-29-2015", "05-30-2015",];
                        var selDate = date;
                        result = hostelPROUnavailable(date, unavailableDates);
                        if (!result[0]) return result;
                        // if the date is not unavailable, let's see do we need to color it
                        var fromDate = jQuery('input[name=checkin]').val();
                        var toDate = jQuery('input[name=checkout]').val();
                        var fromParts = fromDate.split('-');
                        fromDate = new Date(fromParts[0], fromParts[1] - 1, fromParts[2]);
                        var toParts = toDate.split('-');
                        toDate = new Date(toParts[0], toParts[1] - 1, toParts[2]);
                        if (date.valueOf() >= fromDate.valueOf() && date.valueOf() <= toDate.valueOf()) {
                            // return true with highlighted class
                            return [true, 'hostelpro-highlight', null];
                        }
                        // else just return true
                        return [true];
                    }
                });

                jQuery('#checkout').datepicker({
                    showAnim: "drop",
                    dateFormat: "yy-mm-dd",
                    minDate: "-0D",
                    firstDay: 1,
                    beforeShow: function () {
                        var a = jQuery("#checkin").datepicker('getDate');
                        if (a) return {
                            minDate: a
                        }
                    },
                    beforeShowDay: function (date) {
                        var unavailableDates = ["05-26-2015", "05-27-2015", "05-28-2015", "05-29-2015",];
                        var selDate = date;
                        result = hostelPROUnavailable(date, unavailableDates);
                        if (!result[0]) return result;
                        // if the date is not unavailable, let's see do we need to color it
                        var fromDate = jQuery('input[name=checkin]').val();
                        var toDate = jQuery('input[name=checkout]').val();
                        var fromParts = fromDate.split('-');
                        fromDate = new Date(fromParts[0], fromParts[1] - 1, fromParts[2]);
                        var toParts = toDate.split('-');
                        toDate = new Date(toParts[0], toParts[1] - 1, toParts[2]);
                        console.log(date);
                        console.log(fromDate);
                        console.log(toDate);
                        if (date.valueOf() >= fromDate.valueOf() && date.valueOf() <= toDate.valueOf()) {
                            // return true with highlighted class
                            return [true, 'hostelpro-highlight', null];
                        }
                        // else just return true
                        return [true];
                    }
                });
                jQuery('#checkin, #checkout').on('focus', function () {
                    jQuery(this).blur();
                }); // Remove virtual keyboard on touch devices
            }
        });
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body <?php body_class() ?>>
<!-- Header -->
<header>
    <!-- Navigation -->
    <div class="navbar yamm navbar-default" id="sticky">
        <div class="container">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle">
                    <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                </button>
				<?php
				$gallery = get_field( 'images_gallery', 63 );
				//				dd( $gallery );
				if ( $gallery ):
					for ( $i = 0; $i < count( $gallery ); $i ++ ):?>
                        <a href="/" class="navbar-brand">
                            <!-- Logo -->
                            <div id="logo">
                                <img id="default-logo"
                                     src="<?php echo $gallery[ $i ]['gallery_image']['url'] ?>"
                                     alt="<?php echo hsc($gallery[ $i ]['gallery_desc']) ?>"
                                     style="height:44px;">
                            </div>
                        </a>
					<?php endfor;
				endif;
				?>

            </div>
            <div id="navbar-collapse-grid" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
					<?php $args = [
						'post_status' => 'publish',
						'post_type'   => 'page',
						'orderby'       => 'menu_order',
						'order'       => 'ASC',
					];
					$menus      = get_posts( $args );

					foreach ( $menus as $menu ):?>
                        <li><a href="<?php echo $menu->guid ?>"><?php echo $menu->post_title ?></a></li>
					<?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</header>
<!--End of HEADER-->
