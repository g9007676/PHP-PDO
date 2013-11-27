PHP-PDO
=======

Learning PHP_PDO

#index.php
```html
<html>
  <body>
    <div class="container">
      <div class="page-header">
        <h1>Example page header <small>Subtext for header</small></h1>
      </div>
      <form role="form" method="post" action="content.php">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="mm_email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"name="mm_password">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
  </body>
</html>
```


#content.php

```php 
    define('USERNAME', 'root');
    define('PASSWORD', '0000');
    define('POST', '3306');
    define('HOST', 'localhost');
    define('DBNAME', 'test_limit');


    $db = new PDO ("mysql:dbname=".DBNAME.";host=".HOST.";port=3306",USERNAME, PASSWORD, array(  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
    $sql = "SELECT * FROM `member_main` WHERE `mm_email` = ? and `mm_password` = ?";
		$sth = $db->prepare($sql);
		$sth->bindValue('mm_password', PDO::PARAM_STR);
		$sth->bindValue('mm_email', PDO::PARAM_STR);
		$sth->execute(array($_POST['mm_email'],md5($_POST['mm_password'])));
		$result = $sth->fetch(PDO::FETCH_OBJ);
	    var_dump($result);
```
