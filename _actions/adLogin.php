
<?php
session_start();

include ('../vendor/autoload.php');

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

$email = $_POST['email'];
$password = md5($_POST['password']);

$table = new UsersTable(new MySQL());

$user = $table->FindByEmailAndPassword($email, $password);

if($user) {

  $_SESSION['user'] = $user;
  if($user->value != 1){
    HTTP::redirect("/admin/login.php", "error=1");
  }
  HTTP::redirect("/admin/index.php");
}else {
  HTTP::redirect("/admin/login.php", "incorrect=1");

}

?>