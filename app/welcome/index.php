<h1>welcome yii2 docker env.</h1>

<?php phpinfo() ?>

<h1>use PDO by php.</h1>

<?php 
$pdo = new PDO("mysql:host=db;dbname=sys","root","root"); 
$rs = $pdo -> query("select * from sys_config"); 
while($row = $rs -> fetch()){ 
var_dump($row); 
} 
?> 