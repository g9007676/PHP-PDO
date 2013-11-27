
<?php 
	define('USERNAME', 'root');
    define('PASSWORD', '0000');
    define('POST', '3306');
    define('HOST', 'localhost');
    define('DBNAME', 'test_limit');


		$db = new PDO ("mysql:dbname=".DBNAME.";host=".HOST.";port=3306",USERNAME, PASSWORD, array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
        $sql = "SELECT * FROM `member_main` WHERE `mm_email` = ? and `mm_password` = ?";
		$sth = $db->prepare($sql);
		$sth->bindValue('mm_password', PDO::PARAM_STR);
		$sth->bindValue('mm_email', PDO::PARAM_STR);
		$sth->execute(array($_POST['mm_email'],md5($_POST['mm_password'])));
		$result = $sth->fetch(PDO::FETCH_OBJ);
	    var_dump($result);
?>