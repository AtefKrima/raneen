<?php // Modified for Arabic by Rasheed Bydousi

/** إعدادات برنامج ووردبريس المعرب **/

// ** إعدادات قاعدة البيانات - ينمكنك الحصول على هذه المعلومات من مستضيفك ** //
/** اسم قاعدة بيانات ووردبريس */
define('DB_NAME', 'wordpress');

/** اسم المستخدم لقاعدة البيانات */
define('DB_USER', 'root');

/** كلمة المرور لقاعدة البيانات */
define('DB_PASSWORD', '');

/** عنوان خادم قاعدة البيانات */
define('DB_HOST', 'localhost');

/** ترميز قاعدة البيانات */
define('DB_CHARSET', 'utf8');

/** مقارنات قاعدة الببيانات (Collation).
* إذا كنت غير متأكّد أتركها فارغة */
define('DB_COLLATE', '');

/**#@+
 * مفاتيح الأمان.
 * استخدم الرابط التالي لتوليد المفتايح {@link https://api.wordpress.org/secret-key/1.1/salt/}
 * @منذ 2.6.0
 */
define('AUTH_KEY',         'EF7/v8->0H?`dedFOF6ncB-ULT7w^y^ydVRci%#=e:_A43<zH3]-P$|J4KN=O[BE');
define('SECURE_AUTH_KEY',  '~C2[%</4>@`/Dn9+|2f#a&|oPF+BHCf29ZC/(~&SPYp`w%g0iN#[rJ+W@r+=8##W');
define('LOGGED_IN_KEY',    'pjk|bYqC`9b|*)%8Y*[l2y3M`V3vA^-i`G}v#LaF3h]OA|.!eF}{Kb_Nk?w~L|#b');
define('NONCE_KEY',        'c85Tv gnYI2_R $<GOVY%p!s>*[4 U+G}6PD*J[%sWCzf.+J`&=#DA[{M*$0=Mq/');
define('AUTH_SALT',        '.v/+}dtdW]Nmy8+hgkRr5^/88^3QJUVw@$)t2rK;y8w/:Ru*a54|UvV*I+v}Ay}H');
define('SECURE_AUTH_SALT', '32K2E}n~|gTrT&I/^TuSdXmB~DLH^k%mIZKq:sfq$ [HzKfKYo6LH9#+p1#701lA');
define('LOGGED_IN_SALT',   'NZ@_S0xLGS##R|5ZD3H(4O_ d|@@zU2u[ @ODcgv;_(~PrW=W9sB%w/9MR0w*c3O');
define('NONCE_SALT',       'Yhi4m-H]-JKkSe3wY,py QH8:NtBpXKcB<J53if1$)bKx,@Cb4*hc<CNM $4.]Nj');


/**#@-*/

/**
 * بادئة الجداول في قاعدة البيانات.
 * تستطيع تركيب أكثر من مدونة على نفس قاعدة البيانات إذا أعطيت لكل قاعدة بادئة جداول مختلفة
 * استخدم فقط حروف, أرقام وخطوط سفلية!
 */
$table_prefix  = 'wp_';

/**
 * للمطورين: نظام تشخيص الأخطاء
 * قم بتغيير flase إلى true لتمكين عرض الملاحظات أثناء التطوير
 */
define('WP_DEBUG', false);

/* هذا هو المطلوب! توقف عن التعديل. نتمنى لك التوفيق في موقعك! */

/** المسار المطلق لمجلد ووردبريس. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');