 <?php
   session_start();
    include_once 'includes.php';

    if (isset($_POST['name'] , $_POST['pass']) || isset($_COOKIE['name'] , $_COOKIE['pass']))  {

        if (isset($_COOKIE['name'] , $_COOKIE['pass'])) {
            $name = mysql_real_escape_string($_COOKIE['name']);
            $pass = mysql_real_escape_string($_COOKIE['pass']);
        }else {

            if (empty($_POST['name'])) {
                echo '<script>alert("ERROR: Please enter username!")</script>';
            }else if(empty($_POST['pass'])) {
                echo '<script>alert("ERROR: Please enter password!")</script>';
            }

            $name = mysql_real_escape_string($_POST['name']);
            $pass = sha1($_POST['pass']);
            
        }
    

        $query = "SELECT * 
            FROM usertable 
            WHERE PhoneNumber = '{$_POST['name']}' 
            AND Password = '{$_POST['pass']}'";

        $result = $db->query($query);

        $query = "SELECT * 
            FROM usertable
            WHERE Email = '{$_POST['name']}'
            AND Password = '{$_POST['pass']}'";

        $result3 = $db->query($query);

        $query  = "SELECT status 
            FROM usertable
            WHERE PhoneNumber = '{$_POST['name']}'";

        $result2 = $db->query($query);

        if (mysqli_num_rows($result) == 1 || mysqli_num_rows($result3) == 1)  {
            setcookie('name' , $_POST['name'] , time() + 300);
            setcookie('pass' , $pass , time() + 300);
            $_SESSION['loggedIn'] = 1;
            
if(is_numeric($_POST['name'])) {
            $_SESSION['PhoneNumber'] = $_POST['name'];
            $query = "SELECT Email
                         FROM userTable 
                         WHERE  PhoneNumber = '{$_POST['name']}'";   
            $result = $db->query($query);
            $row=mysqli_fetch_array($result);
            $_SESSION['Email']=$row['Email'];
}
else {
        $_SESSION['Email'] = $_POST['name'];
        $query123 = "SELECT PhoneNumber
                         FROM userTable 
                         WHERE  userTable.Email = '{$_POST['name']}'";   
        $result123 = $db->query($query123);
        $row=mysqli_fetch_array($result123);;
        $_SESSION['PhoneNumber']=$row['PhoneNumber'];

}





            $query = "SELECT PhoneNumber
                FROM usertable
                WHERE Email = '{$_POST['name']}'";

            $temp = $db->query($query);

            $query = "UPDATE usertable
                SET status = 1
                WHERE PhoneNumber = '{$_POST['name']}'";

            $db->query($query);

        }else {
                echo'<script>alert("ERROR: Incorrect username or password!")</script>';
        } 
}
?>
<html>
    <link rel = "stylesheet" type = "text/css" href = "http://localhost/PDBMS/IMAGES/CSS_FILES/classes.css">
<title>WHATS APP</title>

<style>
body
{
background-image:url('http://localhost/PDBMS/IMAGES/bgfinal.jpg');
background-repeat:repeat;
background-position:-35px 1px;
}
</style>

<body bgcolor = "#004A63">
    <img class = "imagePositionbg" src ="http://localhost/PDBMS/IMAGES/loginBg.jpg">
<?php
    if (isset($_SESSION['loggedIn']) == 1) {
         header("location:http://localhost/PDBMS/PHP_FILES/Login_Success.php");
    }   else {
?>

<div style = "position:absolute;">

    <canvas id = "myCanvas" width = "1850" height = "120">
    </canvas>

   
      
    <form  method="post">
    <div >
       
        <div class = "user">
            <br>
            Phone or Email <br>
            <input  type = "text" name = "name" style = "height:30px;width:250px;">
        </div>

        <div class = "password">
            <br>
        Password  <br>
            <input type = "password" name = "pass" style = "width:250px;height:30px;">
        </div>

        <div class = "submit" autofocus>
            <br><br>
            <input class = "loginClass" type="submit" name="submit" value = "Log In">
        </div>
    </div>
    </form>

    <form  method = "post" style = "font-size:25px;" action = "http://localhost/PDBMS/PHP_FILES/SignUpCheck.php">

        <div><br>
            <div class = "SignIn">
                Name &nbsp; &nbsp;<input class = "box" type = "text" placeholder = "Name" name = "Name" required = "Name"> 
            </div><br><br><br>

            <div class = "Signin">     
                 PhoneNumber &nbsp; &nbsp;<input class = "box" type = "text" placeholder = "PhoneNumber" name = "PhoneNumber" required = "PhoneNumber"><br><br>
            </div><br><br><br>

            <div class = "SignIn"> 
                Email &nbsp; &nbsp;<input class = "box" type = "email" id = "Email" placeholder = "Email" name = "Email" required = "Email"><br><br>
            </div><br><br><br>

            <div class = "SignIn">
                 Re-Enter Email &nbsp; &nbsp;<input class = "box" type = "email" id = "Confirm Email" placeholder = "Confirm Email address"name = "CheckEmail" require = "CheckEmail" ><br><br>
            </div><br><br><br>

            <div class = "SignIn">      
                Password &nbsp; &nbsp;<input class = "box" type = "password" name = "Password" placeholder = "Password" required = "Password" style = "height:40px;width:300px; "><br><br>
            </div><br><br>

        </div><br>

        <div style = "color:fff;left:53%;position:absolute;font-size:40px;font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;">
            Gender
        </div>
    
        <div style = "font-size:20px;">

             <div class = "Gender" style = "color:fff;left:63%;font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;" required = "Gender">
                Female <input type = "radio" name = "Sex" value = "female">
                Male <input type = "radio" name = "Sex" value =  "male"><br>
             </div>

        </div><br><br><br>

        <div style = "color:fff;right:40%;top:78%;position:absolute;font-size:40px;font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;">
            BirthDay
        </div>

        <div class = "Day" style="color:fff;top:79%">
            <select class = "size" name = "Day" required = "Day">
                <option value = "Day">Day</option>
                <option value = "1">1</option>
                <option value = "2">2</option>
                <option value = "3">3</option>
                <option value = "4">4</option>
                <option value = "5">5</option>
                <option value = "6">6</option>
                <option value = "7">7</option>
                <option value = "8">8</option>
                <option value = "9">9</option>
                <option value = "10">10</option>
                <option value = "11">11</option>
                <option value = "12">12</option>
                <option value = "13">13</option>
                <option value = "14">14</option>
                <option value = "15">15</option>
                <option value = "16">16</option>
                <option value = "17">17</option>
                <option value = "18">18</option>
                <option value = "19">19</option>
                <option value = "20">20</option>
                <option value = "21">21</option>
                <option value = "22">22</option>
                <option value = "23">23</option>
                <option value = "24">24</option>
                <option value = "25">25</option>
                <option value = "26">26</option>
                <option value = "27">27</option>
                <option value = "28">28</option>
                <option value = "29">29</option>
                <option value = "30">30</option>
                <option value = "31">31</option>
            </select>
        </div>

        <div class = "Month" style="top:79%">
            <select class = "size" name = "Month" required = "Month">
                <option value = "Month">Month</option>
                <option value = "Jan">Jan</option>
                <option value = "Feb">Feb</option>
                <option value = "Mar">Mar</option>
                <option value = "Apr">Apr</option>
                <option value = "May">May</option>
                <option value = "Jun">Jun</option>
                <option value = "Jul">Jul</option>
                <option value = "Aug">Aug</option>
                <option value = "Sep">Sep</option>
                <option value = "Oct">Oct</option>
                <option value = "Nov">Nov</option>
                <option value = "Dec">Dec</option>
            </select>
        </div>

        <div class = "Year" style="top:79%">
            <select class = "size" name = "Year" required = "Year">
                <option value = "Year">Year</option>
                <option value = "1970">1970</option>
                <option value = "1971">1971</option>
                <option value = "1972">1972</option>
                <option value = "1973">1973</option>
                <option value = "1974">1974</option>
                <option value = "1975">1975</option>
                <option value = "1976">1976</option>
                <option value = "1977">1977</option>
                <option value = "1978">1978</option>
                <option value = "1979">1979</option>
                <option value = "1980">1980</option>
                <option value = "1981">1981</option>
                <option value = "1982">1982</option>
                <option value = "1983">1983</option>
                <option value = "1984">1984</option>
                <option value = "1985">1985</option>
                <option value = "1986">1986</option>
                <option value = "1987">1987</option>
                <option value = "1988">1988</option>
                <option value = "1989">1989</option>
                <option value = "1990">1990</option>
                <option value = "1991">1991</option>
                <option value = "1992">1992</option>
                <option value = "1993">1993</option>
                <option value = "1994">1994</option>
                <option value = "1995">1995</option>
                <option value = "1996">1996</option>
                <option value = "1997">1997</option>
                <option value = "1998">1998</option>
            </select>
        </div>
        <br><br>
        <button  class = "buttonClass" name = "websubmit" type = "submit" style="postion:absolute;top:40%;left:62%">
            Sign Up
        </button>
    </form>
</div>
</body>
<?php
}
?> 
</html>
        