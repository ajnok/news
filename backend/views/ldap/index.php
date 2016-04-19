<?php
//use Yii;
/* @var $this yii\web\View */

$this->title = 'Ldap';
//$users = Yii::$app->ldap->users()->all(['displayname','givenname','sn'],true,'instancetype','desc');
//////
//////$number = $users->count();
////$users = ($users->toArray());
//foreach($users as $key => $value)
//{
//	var_dump($key);
//	var_dump($value);
//
//	echo $key . "-" . $value->getFirstName() . " " . $value->getLastname() . "<br />";
//	break;
//}
echo("<hr />");
$users = Yii::$app->ldap->search()->whereEquals('samaccounttype','805306368')->recursive(false)->get(['displayname','givenname','sn','description']);
//$users = Yii::$app->ldap->search()->whereHas('displayname')->recursive(false)->get(['displayname','givenname','sn']);
$number = $users->count();
$users = ($users->toArray());
//var_dump($users);
ksort($users);
//var_dump($users);
echo $number ." รายการ" ."<br />";
foreach($users as $key => $value)
{
//	var_dump($key);
//	var_dump($value);
//	break;
	echo $key . "-" . $value->getFirstName() . " " . $value->getLastname() . "-" . $value->getAttribute('description',0) .  "<br />";
//	echo $key . "-" . $value->getFirstName() . " " . $value->getLastname() . "<br />";
//	break;
}
//var_dump($users);
?>