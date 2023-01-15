<?php

//connection to mysql 
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "newkantin";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

//funtion registration
function registration($data);
global $conn;

//get data from input with name atribute
$alerterror    = '';
$username      = $data['username'];
$password      = $data['password'];
$passwordverif = $data['passwordverif'];
$date          = date(Y:m:d);

//condition 1 if passwrod not match with passwordferiv
if( $password != $passwordverif ) {
  $alerterror = 'password anda tidak sama';
  die;
else{
  $executeCode = "INSERT INTO akun VALUES('', '$username', '$password', '$date')";
  mysqli_query($conn, $executeCode);
  echo('<script>
          alert('akun anda berhasil dibuat');
        </script>');
}

//function login
function login($data) {
  global  $conn; 

  //get data from input where button login clicked
  $alerterror    = '';
  $username      = $data['username'];
  $password      = $data['password'];
  
  //get data sql where name match with username on database
  $userSql = "SELECT * FROM akun WHERE usernmae= '$username'";
  $userString = mysqli_fetch_assoc($userSql);
  
  //conditions bruh
  if(userSql == NULL || userSql == '') {
    alerterror = "maap nama anda belum terdaftar, silahkan buat akun anda <a href='reg.php'>disini</a>";
  }else{
    if($password != $userSql['password'] ) {
      $alerterror = 'maap password anda salah min';
    }else{
      $status = $userSql['status'];
      $_SESSION['LOGIN'] = $username;
      if($status == 'pembeli') {
        header('location: index.php');
      }else if($status == 'driver'){
        header('location: account.php');
      }else{
        header('location: dashboard/index.php');
      }
    }
  }  
}
  
function addProduct($data) {
  global $conn;
  
  $produkName = $data['produkname'];
  $price      = $data['price'];
  $deskripsi  = $data['deskripsi'];
  $date       = date(Y:m:d);
  
  
  
  
  
  
  
  
?>
