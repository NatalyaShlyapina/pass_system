<?php
class Base
{
	static function db_connect()
	{
		$host = 'localhost';
        $user = 'userMain';
        $pswd = '123';
        $db = 'pass_system';
		try{
		$connection = mysqli_connect($host, $user, $pswd,$db);
        mysqli_query($connection,"SET NAMES cp1251");
        return $connection;
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
}
$db=Base::db_connect();
extract($_POST);
$inputData=mysqli_real_escape_string($db,trim($inputData));
$sql="SELECT * FROM users WHERE shtrihCode='$inputData' AND status='1'";
$query=mysqli_query($db,$sql);
if(mysqli_num_rows($query)==1)
{	
	$row=mysqli_fetch_object($query);
	?>
	<img src='images/<?=$row->foto?>' id='pic' title='<?=$row->name?>' alt=''/><br/>
	<?php
	echo 'Имя: '.$row->name.'<br/>';
	echo 'Фамилия: '.$row->sname.'<br/>';

}
else
{
	echo "незарегистрированная карта";
	
}

?>
