<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'villa_db');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Vt}U&5#o+LCO^kIO-:.b$7vI%_6GLNM;iy^UqX0/^AT$!<YL[}N HLfHBb9Ja8;z');
define('SECURE_AUTH_KEY',  '%z8ek9-]mj`b,4D0 rZy[SRn/D%hF3j(}=?{T/~e|Y4TUzMGlVd.n!kSBn`c~)D>');
define('LOGGED_IN_KEY',    '+gOw?@|6_<L+`mG#e)2%ER#Ri$e&gv~x`S{>hp%qjd1EhV8POXGeO+ZFfT1p-4T;');
define('NONCE_KEY',        'F&=ouT)0Uc`M.U&(}R7VdjeWYA,3m|~6S-u}~4C@llS)-S+5;`q4fj 2|Ytg~jyT');
define('AUTH_SALT',        'j6b|byKYk~^4(LIlX^Hkr;HI1kT kiQ6/wj64q10FIlyDBA= xC}@?B0Y$5ao?=Y');
define('SECURE_AUTH_SALT', 'wJEs38Rw<!*:Yi!vEfi?*1TPsQPS@udEz)=)Q(N#_:aT<svo/rT.h^]q3BEPA_hp');
define('LOGGED_IN_SALT',   '~/;4D`z^VPds,?w8BAyq6?5mpsA1D4zXMRS`27g&FwVgx&Cv$~Q<WcaP7>aHkv}R');
define('NONCE_SALT',       'KS8hixuWT+1}[-S%#r,c@pWctXnEG]FMdo+2r#[S21g;D$3F9Jj]c @aI$:k=+vI');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
