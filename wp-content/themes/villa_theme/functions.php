<?php
/**
 *
 * Uploads a file
 *
 * @param array $array  Входящий масив, который нужно вывести
 * @param bool $bool  Флаг, нужно ли прервать дальнейшее выполнение программы
 * @return array
 */
function dd($array = [],$bool = true){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
	if($bool){
		exit;
	}
}

function hsc($string){
    return htmlspecialchars($string);
}


function enqueue_styles() {
	wp_enqueue_style( 'whitesquare-style', get_stylesheet_uri());

	wp_register_style('animate'         , get_template_directory_uri()."/css/animate.css");
	wp_register_style('bootstrap'       , get_template_directory_uri()."/css/bootstrap.css");
	wp_register_style('font_awesome_min', get_template_directory_uri()."/css/font-awesome.min.css");
	wp_register_style('owl_carousel'    , get_template_directory_uri()."/css/owl.carousel.css");
	wp_register_style('owl_theme'       , get_template_directory_uri()."/css/owl.theme.css");
	wp_register_style('slick'           , get_template_directory_uri()."/css/slick.css");
	wp_register_style('prettyPhoto'     , get_template_directory_uri()."/css/prettyPhoto.css");
	wp_register_style('jquery_ui'       , get_template_directory_uri()."/css/smoothness/jquery-ui-1.10.4.custom.min.css");
	wp_register_style('plugin'          , get_template_directory_uri()."/rs-plugin/css/settings.css");
	wp_register_style('theme'           , get_template_directory_uri()."/css/theme.css");
	wp_register_style('responsive'      , get_template_directory_uri()."/css/responsive.css");
	wp_register_style('turquoise'       , get_template_directory_uri()."/css/colors/turquoise.css");
	wp_register_style('owl_transitions' , get_template_directory_uri()."/css/owl.transitions.css");
	wp_register_style('google'          , "http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600,700");



	wp_enqueue_style( 'animate'         );
	wp_enqueue_style( 'bootstrap'       );
	wp_enqueue_style( 'font_awesome_min');
	wp_enqueue_style( 'owl_carousel'    );
	wp_enqueue_style( 'owl_theme'       );
	wp_enqueue_style( 'slick'           );
	wp_enqueue_style( 'prettyPhoto'     );
	wp_enqueue_style( 'jquery_ui'       );
	wp_enqueue_style( 'plugin'          );
	wp_enqueue_style( 'theme'           );
	wp_enqueue_style( 'responsive'      );
	wp_enqueue_style( 'turquoise'       );
	wp_enqueue_style( 'owl_transitions' );
	wp_enqueue_style( 'google'          );
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

function enqueue_scripts () {
	wp_register_script('1', get_template_directory_uri()."/js/jquery-1.11.0.min.js"                         );
	wp_register_script('2', get_template_directory_uri()."/js/bootstrap.min.js"                             );
	wp_register_script('3', get_template_directory_uri()."/js/bootstrap-hover-dropdown.min.js"              );
	wp_register_script('4', get_template_directory_uri()."/js/owl.carousel.min.js"                          );
	wp_register_script('5', get_template_directory_uri()."/js/jquery.validate.js"                           );
	wp_register_script('6', get_template_directory_uri()."/js/jquery.parallax-1.1.3.js"                     );
	wp_register_script('7', get_template_directory_uri()."/js/jquery.nicescroll.js"                         );
	wp_register_script('8', get_template_directory_uri()."/js/jquery.prettyPhoto.js"                        );
	wp_register_script('9', get_template_directory_uri()."/js/jquery-ui-1.10.4.custom.min.js"               );
	wp_register_script('10', get_template_directory_uri()."/js/jquery.forms.js"                              );
	wp_register_script('11', get_template_directory_uri()."/js/jquery.sticky.js"                             );
	wp_register_script('12', get_template_directory_uri()."/js/waypoints.min.js"                             );
	wp_register_script('13', get_template_directory_uri()."/js/jquery.isotope.min.js"                        );
	wp_register_script('14', get_template_directory_uri()."/js/jquery.gmap.min.js"                           );
	wp_register_script('15', get_template_directory_uri()."/rs-plugin/js/jquery.themepunch.tools.min.js"     );
	wp_register_script('16', get_template_directory_uri()."/rs-plugin/js/jquery.themepunch.revolution.min.js");
	wp_register_script('17', get_template_directory_uri()."/js/slick.js"                                     );
	wp_register_script('18', get_template_directory_uri()."/js/availability.hostelpro.js"                    );
	wp_register_script('19', get_template_directory_uri()."/js/custom.js"                                    );

	wp_enqueue_script('1');
	wp_enqueue_script('2');
	wp_enqueue_script('3');
	wp_enqueue_script('4');
	wp_enqueue_script('5');
	wp_enqueue_script('6');
	wp_enqueue_script('7');
	wp_enqueue_script('8');
	wp_enqueue_script('9');
	wp_enqueue_script('10');
	wp_enqueue_script('11');
	wp_enqueue_script('12');
	wp_enqueue_script('13');
	wp_enqueue_script('14');
	wp_enqueue_script('15');
	wp_enqueue_script('16');
	wp_enqueue_script('17');
	wp_enqueue_script('18');
	wp_enqueue_script('19');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

if (function_exists('add_theme_support')) {
	add_theme_support('menus');
}


add_action( 'init', 'create_post_type_apartments' );
function create_post_type_apartments() {
	register_post_type( 'apartments',
		array(
			'labels' => array(
				'name' => __( 'Apartments' ),
				'singular_name' => __( 'Apartments' )
			),
			'public' => true,
			'has_archive' => true,
		)
	);
}
add_action( 'init', 'create_post_type_galary' );
function create_post_type_galary() {
	register_post_type( 'gallery',
		array(
			'labels' => array(
				'name' => __( 'Gallery' ),
				'singular_name' => __( 'Gallery' )
			),
			'public' => true,
			'has_archive' => true,
		)
	);
}
add_action( 'init', 'create_post_type_gallery_page' );
function create_post_type_gallery_page() {
	register_post_type( 'gallery_page',
		array(
			'labels' => array(
				'name' => __( 'Gallery Page' ),
				'singular_name' => __( 'Gallery Page' )
			),
			'public' => true,
			'has_archive' => true,
		)
	);
}

add_action( 'init', 'create_form_type' );
function create_form_type() {
	register_post_type( 'contact_form',
		array(
			'labels' => array(
				'name' => __( 'Contact Form' ),
				'singular_name' => __( 'contact form' ),
			),
			'public' => true,
			'has_archive' => true,
//			'rewrite' => array('slug' => 'forms'),

		)
	);
}
function true_options() {
	global $true_page;
	add_options_page( 'Параметры', 'Параметры', 'manage_options', $true_page, 'true_option_page');
}
add_action('admin_menu', 'true_options');
function true_option_page(){
	global $true_page;
	?><div class="wrap">
	<h2>Дополнительные параметры сайта</h2>
	<form method="post" enctype="multipart/form-data" action="options.php">
		<?php
		settings_fields('true_options'); // меняем под себя только здесь (название настроек)
		do_settings_sections($true_page);
		?>
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
	</form>
	</div><?php
}

function true_option_settings() {
	global $true_page;
	// Присваиваем функцию валидации ( true_validate_settings() ). Вы найдете её ниже
	register_setting( 'true_options', 'true_options', 'true_validate_settings' ); // true_options

	// Добавляем секцию
	add_settings_section( 'true_section_1', 'Настройка сайта', '', $true_page );

	$true_field_params = array(
		'type'      => 'text', // тип
		'id'        => 'home_our_places',
		'desc'      => 'На главной странице.', // описание
		'label_for' => 'my_text' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
	);
	add_settings_field( 'home_our_places', 'Наши места', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params );

	$true_field_params = array(
		'type'      => 'home_apartment_title', // тип
		'id'        => 'home_apartment_title',
		'desc'      => 'На главной странице.', // описание
		'label_for' => 'home_apartment_title' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
	);
	add_settings_field( 'home_apartments_title', 'Заголовок апартаментов', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params );

	$true_field_params = array(
		'type'      => 'footer_reserved', // тип
		'id'        => 'footer_reserved',
		'desc'      => 'В подвале сайта.', // описание
		'label_for' => 'footer_reserved' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
	);
	add_settings_field( 'footer_reserved', 'Права', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params );

	$true_field_params = array(
		'type'      => 'apartment_title', // тип
		'id'        => 'apartment_title',
		'desc'      => 'На странице апартаментов', // описание
		'label_for' => 'apartment_title' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
	);
	add_settings_field( 'apartment_title', 'Заголовок апартаментов', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params );


////////////////////////////////////////////////////////////////////////////////

//	// Создадим textarea в первой секции
//	$true_field_params = array(
//		'type'      => 'textarea',
//		'id'        => 'my_textarea',
//		'desc'      => 'Пример большого текстового поля.'
//	);
//	add_settings_field( 'my_textarea_field', 'Большое текстовое поле', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params );

	// Добавляем вторую секцию настроек

//	add_settings_section( 'true_section_2', 'Другие поля ввода', '', $true_page );

	// Создадим чекбокс
	$true_field_params = array(
		'type'      => 'checkbox',
		'id'        => 'my_checkbox',
		'desc'      => 'Пример чекбокса.'
	);
	add_settings_field( 'my_checkbox_field', 'Чекбокс', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params );

	// Создадим выпадающий список
	$true_field_params = array(
		'type'      => 'select',
		'id'        => 'my_select',
		'desc'      => 'Пример выпадающего списка.',
		'vals'		=> array( 'val1' => 'Значение 1', 'val2' => 'Значение 2', 'val3' => 'Значение 3')
	);
	add_settings_field( 'my_select_field', 'Выпадающий список', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params );

	// Создадим радио-кнопку
	$true_field_params = array(
		'type'      => 'radio',
		'id'      => 'my_radio',
		'vals'		=> array( 'val1' => 'Значение 1', 'val2' => 'Значение 2', 'val3' => 'Значение 3')
	);
	add_settings_field( 'my_radio', 'Радио кнопки', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params );

}
add_action( 'admin_init', 'true_option_settings' );

/*
 * Функция отображения полей ввода
 * Здесь задаётся HTML и PHP, выводящий поля
 */
function true_option_display_settings($args) {
	extract( $args );

	$option_name = 'true_options';

	$o = get_option( $option_name );

	switch ( $type ) {
		case 'text':
			$o[$id] = esc_attr( stripslashes($o[$id]) );
			echo "<input class='regular-text' type='text' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' />";
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
			break;
		case 'home_apartment_title':
			$o[$id] = esc_attr( stripslashes($o[$id]) );
			echo "<input class='regular-text' type='text1' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' />";
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
			break;
		case 'footer_reserved':
			$o[$id] = esc_attr( stripslashes($o[$id]) );
			echo "<input class='regular-text' type='text1' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' />";
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
			break;
		case 'apartment_title':
			$o[$id] = esc_attr( stripslashes($o[$id]) );
			echo "<input class='regular-text' type='text1' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' />";
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
			break;

		case 'textarea':
			$o[$id] = esc_attr( stripslashes($o[$id]) );
			echo "<textarea class='code large-text' cols='50' rows='10' type='text' id='$id' name='" . $option_name . "[$id]'>$o[$id]</textarea>";
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
			break;
		case 'checkbox':
			$checked = ($o[$id] == 'on') ? " checked='checked'" :  '';
			echo "<label><input type='checkbox' id='$id' name='" . $option_name . "[$id]' $checked /> ";
			echo ($desc != '') ? $desc : "";
			echo "</label>";
			break;
		case 'select':
			echo "<select id='$id' name='" . $option_name . "[$id]'>";
			foreach($vals as $v=>$l){
				$selected = ($o[$id] == $v) ? "selected='selected'" : '';
				echo "<option value='$v' $selected>$l</option>";
			}
			echo ($desc != '') ? $desc : "";
			echo "</select>";
			break;
		case 'radio':
			echo "<fieldset>";
			foreach($vals as $v=>$l){
				$checked = ($o[$id] == $v) ? "checked='checked'" : '';
				echo "<label><input type='radio' name='" . $option_name . "[$id]' value='$v' $checked />$l</label><br />";
			}
			echo "</fieldset>";
			break;
	}
}

/*
 * Функция проверки правильности вводимых полей
 */
function true_validate_settings($input) {
	foreach($input as $k => $v) {
		$valid_input[$k] = trim($v);

		/* Вы можете включить в эту функцию различные проверки значений, например
		if(! задаем условие ) { // если не выполняется
			$valid_input[$k] = ''; // тогда присваиваем значению пустую строку
		}
		*/
	}
	return $valid_input;
}