<?php get_header()

/*
 * Template Name: ContactPage
 * */

?>
	<div class="row map-area">
		<div class="col-sm-12">
			<div class="map-point">
				<div id="map">
					<p>This will be replaced with the Google Map.</p>
				</div>
			</div>
			<div class="map-dir">
				<div id="map2">
					<p>This will be replaced with the Google Map.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<!-- Contact details -->
			<section class="contact-details text-center">
				<div class="col-md-5">
					<h2 class="lined-heading  mt50"><span>Address</span></h2>
					<a href="images/contact/948x632.gif" data-rel="prettyPhoto"><img src="images/contact/948x632.gif" class="img-thumbnail img-responsive"></a>
					<!-- Panel -->
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<div class="panel-title"><strong>Villa Lucija</strong></div>
						</div>
						<div class="panel-body">
							<address>
								99999 99, HRV<br>
								Croatia, 51280<br>
								<abbr title="Phone">Tel:</abbr>HR:999999<br>
								GER: 9999999<br>
								<abbr title="Email">E-Mail:</abbr> <a href="#">99999.com</a><br>
								<abbr title="Website">Website:</abbr> <a href="#">www.99999.com</a><br>
							</address>
						</div>
					</div>
					<button type="submit" class="btn  btn-lg btn-primary direction-show">How to find us</button>
				</div>
			</section>
			<!-- Contact form -->
			<section id="contact-form" class="mt50">
				<div class="col-md-7 contacts-form">
					<h2 class="lined-heading"><span>Send a message</span></h2>
					<p>If you wish to contact us, you can use the form below. We will get into touch with you as soon as possible.</p>
					<form class="clearfix mt50" role="form" method="post" action="php/contact.php" name="contactform" id="contactform">
						<!-- Error message -->
						<div id="message"></div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="name" accesskey="U"><span class="required">*</span> Your Name</label>
									<input name="user_name" type="text" id="name" class="form-control" value=""/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="email" accesskey="E"><span class="required">*</span> E-mail</label>
									<input name="email" type="text" id="email" value="" class="form-control"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="subject" accesskey="S">Subject</label>
							<input name="subject" type="text" id="subject" value="" class="form-control"/>
						</div>
						<div class="form-group">
							<label for="comments" accesskey="C"><span class="required">*</span> Your message</label>
							<textarea name="comments" rows="13" id="comments" class="form-control"></textarea>
						</div>
                        <button> send</button>
						<button type="button" id="send_contact_form"  class="btn btn-lg btn-primary">Send us a mesasge</button>
					</form>
				</div>
				<div class="col-md-4 col-sm-12 contacts-directions col-md-offset-1">
					<table class="directions">
						<tr>
							<td valign="top">
								<div id="directions" class="directions-table"></div>
							</td>
						</tr>
					</table>
					<button type="submit" class="btn  btn-lg btn-primary">Printable text version</button>
					<button type="submit" class="btn  btn-lg btn-primary pull-right direction-hide">Go Back</button>
				</div>
			</section>
		</div>
	</div>
    <br><br><br><br><br><br>
    <br><br><br><br><br>

    <script>
        //Уменьшить рейтинг
        jQuery('#send_contact_form').click(function(e){

            let uname = jQuery('#name').val();
            let email = jQuery('#email').val();
            let subject = jQuery('#subject').val();
            let comments = jQuery('#comments').val();

            jQuery.ajax({
                data: {
                    uname:uname,
                    email:email,
                    subject:subject,
                    comments:comments
                },
                type: 'post',
                url: '/ajax_contact_form',
                success: function(data) {
                    alert('Success');
                    console.log(data)
//                    let rating = document.getElementById('rating_field').innerText = data;
//                    let button = document.getElementById('status').innerText = 'Вы понизили рейтинг поста';
//                    setTimeout(clear_rating_status,2000);
                }
            });
        });
//        /ajax_contact_form/
    </script>
<?php get_footer()?>