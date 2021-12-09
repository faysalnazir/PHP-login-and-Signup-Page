<?
require('connection.php');
if(isset($_POST['register']))
{
    $user_exist_query="SELECT * FROM 'registered_users' WHERE 'username'='$_POST[user]' OR 'email'='$_POST[email]'";
    $result=mysqli_query($con,$user_exist_query); // query fire

    if($result)(mysqli_num_rows($result)>0); # it will be executed if username or email is already taken
    {
        #if any user has already taken username or email
        $result_fetch=mysqli_fetch_assoc($result);
        if($result_fetch['username']==$_POST['username'])
        {
            #error for username already registered
            echo"
         <script>
             alert('$result_fetch[username] - Username already taken');
             window.location.href='index.php';
         </script>";
        }
        else
        {
            #error for email already registered
            echo"
            <script>
               alert('$result_fetch[email] - email already taken');
               window.location.href='index.php';
            </script>";
        }
        else
        {
            $query="INSERT INTO `registered_users`(`full_name`, `username`, `email`, `password`) VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]','$_POST[password]')";
            if(mysqli_query($con,$query))
            {
                # if data inserted successfully
                echo"
              <script>
              alert('registration Successfully');
             window.location.href='index.php';
              </script>
                "
            }
            else
            {
                #if data cnnot be inserted
             echo"
              <script>
              alert('cannot Run Query');
             window.location.href='index.php';
              </script>
                ";
             }

        }


    
    
    else
    {
        echo"
        <script>
        alert('cannot Run Query');
        window.location.href='index.php';
        </script>
    }
}

?>