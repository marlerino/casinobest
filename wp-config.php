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
define( 'DB_NAME', 'admin_oncaca' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'LK/,hk^2/T2@J~DM/k^Lv!d=>#&zj_2z|OVuS`Uj`w2@`2tgc~<)[gmh)C#4*$V ' );
define( 'SECURE_AUTH_KEY',  'KosNe1nAdu$tH;OhD-S(2(DKW+`s2gk.VG5OrTLz9l4{l)PD?!&foEd&|R$]E Eq' );
define( 'LOGGED_IN_KEY',    '2?9*@:(EgB=<?e(RP!4G{%Ew|Sf:LByY~D{gF}oY>t@q(d1-Mcv^OFYe82{ 8n?#' );
define( 'NONCE_KEY',        'b$L8n~yd>+?ec?3NQf])^UvdCr PEZnSRNugJ,CC{DHZnWT$32U.wU`4a=fG7O-j' );
define( 'AUTH_SALT',        '#=OeUFsJh43Hf*{+?6Rs1eTl0e)8<,9J x~*nVKRW+MuE$prV*]T][e$cK;%@^7.' );
define( 'SECURE_AUTH_SALT', 'D5LTzz* fvMj*dF_vZm3[ M2nX;53Dl9h KL`;w<0o!IB,6|?aou>/~r1Fx{w+Fq' );
define( 'LOGGED_IN_SALT',   '#@L|SEo-HP<Aq&7*z)tcA[S+NIsgX:3 p]|KgGnXr`8L?iHe5_]`KX{vOBI=*bBl' );
define( 'NONCE_SALT',       'R+[)Z%GG<<0<00NrO9au*WS#Yn^WpST~$Hz1Y%@3zz(2<+:=#(E)WBk0Q!j]E1@k' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
