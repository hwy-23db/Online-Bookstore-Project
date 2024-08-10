<?php
function show_result()
{
    global $connection;
   $data =$_POST['search'];
    $query="Select * from products where productname LIKE '%$data%'";
   $go_query=mysqli_query($connection,$query);
   $count_result=mysqli_num_rows($go_query);
    print-r($count_result);
    dd();
   if($count_result==0)
    {
    echo '<div class="blockquote">Sorry, No result found!<a href="userindex.php">Back</a></div>';
   }
    elseif($count_result>0)
    {
     while($out=mysqli_fetch_array($go_query))
    {
        $productid=$out['productid'];
       $productname=$out['productname'];
       $authorid=$out['authorid'];
       $categoryid=$out['catid'];
       $price=$out['price'];
       $qty=$out['qty'];
       $photo=$out['photo'];
        $display='<div class="col-md-4 col-sm-4">';
       $display.='<div class="card" height="300px">';
        $display.='<img src="Photo/{$photo}" class="card-img-top">';
        $display.='<div class="card-body">';
      $display.='<h4>{$productname}</h4>';
        $display.='<p>{$price}</p>';
        $display.='<p class="text-center"><a href="Addtocart.php?id='.$productid.'" class="btn btn-info">Add to Cart</a></p>';
       $display.='</div></div></div>';
      echo $display;
    }
   }
 
}
function create_accu(){
    global $connection;
    global $user_name;
    global $password;
    global $email;
    global $phone;
    global $address;
 
    $hpass=md5($password);
    $query="select * from user where username='$user_name' and password='$hpass'";
    $user_query=mysqli_query($connection,$query);
    $count=mysqli_num_rows($user_query);
      if($count>0)
        {
          echo "<script>window.alert('already exists')</script>";
        }
        else
        {
          $query="insert into user (username,password,email,phone,address,role)";
          $query.="values ('$user_name','$hpass','$email','$phone','$address','user')";
          $go_query=mysqli_query($connection,$query);
            if(!$go_query)
            {
              die("QUERY FAILED".mysqli_error($connection));
            }
            else
                    {
                        echo "<script>window.alert('you successfully created an account')</script>";
                        echo "<script>window.location.href='login.php'</script>";
                    }
              }
}
 
function user_login()
{
    global $connection;
    $useraname=$_POST['username'];//textbox name
    $password=$_POST['password'];//textbox name
    $hpass=md5($password);
    $query="Select * from user";
    $go_query=mysqli_query($connection,$query);
    while($out=mysqli_fetch_array($go_query))
    {
        $dbusername=$out['username'];//fieldname
        $dbuserpassword=$out['password'];
        $dbuserrole=$out['role'];
        if($dbusername==$useraname && $dbuserpassword==$hpass && $dbuserrole=='user')
        {
            $_SESSION['user']=$useraname;
            header('location:userindex.php');
        }
        else
        {
            echo "<script>window.alert('Invalid User Name and password')</script>";
            echo "<script>window.location.href='login.php'</script>";
        }
    }
} 

function addfeedback()
    {
      global $connection;
      $name=$_POST['name'];
      $email=$_POST['email'];
      $phone=$_POST['phone'];
      $feed_name=$_POST['message'];

      if(empty($feed_name))
      {
        echo '<script>window.alert("Please Enter Feedback")</script>';
      }
      else
      {
        $query="select * from feedback where name='$name'";
           $ch_query=mysqli_query($connection,$query);
           $count=mysqli_num_rows($ch_query);
             if($count>0)
             {
                echo"<script>window.alert('This is already exist')</script>";
             }
             else
             {
                            
                $query="insert into feedback(name,email,phone,message) values('$name','$email','$phone','$feed_name')";
                $go_query=mysqli_query($connection,$query);
                if(!$go_query)
                    {
                        die("QUERY FAILED".mysqli_error());
                    }
                
             }

      }
    }
?>