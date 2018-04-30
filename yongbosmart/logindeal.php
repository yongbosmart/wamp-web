<?PHP
header("Content-Type: text/html; charset=utf-8");
session_start();
if(isset($_POST["submit"])){

    $_SESSION['name']= $_POST['username'];
    include_once('conn.php');//链接数据库
$name=$_POST['username'];
$passowrd=$_POST['password'];

    if ($name && $passowrd){//如果用户名和密码都不为空
        $sql = "select * from host where name = '$name' and password='$passowrd'";//检测数据库是否有对应的username和password的sql
        $result = mysql_query($sql);//执行sql
        $rows=mysql_num_rows($result);//返回一个数值
        if($rows==1){//0 false 1 true
            $name = $_POST['username'];//post获得用户名表单值
            $passowrd = $_POST['password'];//post获得用户密码单值
            header("Location:index.php");
            exit;
        }else{
            echo "用户名或密码错误";

        }


    }else{//如果用户名或密码有空
        echo "表单填写不完整";



    }

    mysql_close();//关闭数据库
}//检测是否有submit操作
else if(isset($_POST["visitor"])){
    header("Location:homepage.php");
    $name = "tripper";//post获得用户名表单值
    exit;
}else{

    exit("错误执行");
}

?>