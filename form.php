<?php 
$fname = $_POST['fname'] ??null;
$lname = $_POST['lname'] ??null;
$u_email = $_POST['u_email'] ??null;

if (isset($_POST['submit'])){

    $fname =   mysqli_real_escape_string($conn, $_POST['fname']  ) ;
    $lname =   mysqli_real_escape_string($conn, $_POST['lname']  ) ;
    $u_email = mysqli_real_escape_string($conn, $_POST['u_email']) ;
$errors = [
'fnameError'=>   '',
'lnameError'=>   '',
'u_emailError'=> ''

];

//echo $fname . ' ' . $lname . ' ' . $u_email;
$sql = "INSERT INTO users(firstName,lastName,email) 
        VALUES ('$fname','$lname','$u_email')";
if(empty($fname)){
    $errors["fnameError"] = "الرجاء ادخال اسمك الاول";

} if(empty($lname)){
    $errors["lnameError"] = "الرجاء ادخال اسمك الاخير";
echo '';
}
// emile
if(empty($u_email)){
    $errors['u_emailError'] = 'الرجاء ادخال بريدك الالكتروني';
} elseif(!filter_var($u_email, FILTER_VALIDATE_EMAIL)){
        $errors['u_emailError'] = 'الرجاء ادخال بريد الكتروني صحيح ';
}


if(!array_filter($errors)){
    $fname =   mysqli_real_escape_string($conn, $_POST['fname']  ) ;
    $lname =   mysqli_real_escape_string($conn, $_POST['lname']  ) ;
    $u_email = mysqli_real_escape_string($conn, $_POST['u_email']) ;

    $sql = "INSERT INTO users(firstName,lastName,email) 
        VALUES ('$fname','$lname','$u_email')";

if(mysqli_query($conn ,$sql )){
header('location: '. $_SERVER['PHP_SELF']);
}else{
echo 'error';
}
}

}
?>