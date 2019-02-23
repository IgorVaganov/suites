<?
$config=require_once __DIR__.'/../config/db.php';
$pieces = explode(";", $config['dsn']);
$db_host=mb_substr(stristr($pieces[0], '='),1);
$db_name=mb_substr(stristr($pieces[1], '='),1);
define('db_host', $db_host);
define('db_name', $db_name);
define('db_char', $config['charset']);
define('db_user', $config['username']);
define('db_pass', $config['password']);

class data_base
{
    protected static $instance = null;

    public function __construct() {}
    public function __clone() {}

    public static function instance()
    {
        if (self::$instance === null)
        {
            $opt  = array(
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => TRUE,
            );
            $dsn = 'mysql:host='.db_host.';dbname='.db_name.';charset='.db_char;
            self::$instance = new PDO($dsn, db_user, db_pass, $opt);
        }
        return self::$instance;
    }

    public static function __callStatic($method, $args)
    {
        return call_user_func_array(array(self::instance(), $method), $args);
    }

    public static function run($sql, $args = [])
    {
        if (!$args)
        {
            return self::instance()->query($sql);
        }
        $stmt = self::instance()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    public static function myonewords($words){
        $arr = explode(" ", $words);
        return $arr[0];
    }

}
?>