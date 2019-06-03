<!DOCTYPE html>

<h3>LOGIN FORM</h3>
    <form id="login-form" method="post" action="authen_login.php" >
        <table border="0.5" >
            <tr>
                <td><label for="user_id">User Name</label></td>
                <td><input type="text" name="user_id" id="user_id"></td>
            </tr>
            <tr>
                <td><label for="user_pass">Password</label></td>
                <td><input type="password" name="user_pass" id="user_pass"></input></td>
            </tr>
            <tr>
                <td><input type="submit" value="Submit" />
                <td><input type="reset" value="Reset"/>
            </tr>
        </table>
    </form>
</body>
</html>

<h3>SIGN UP FORM</h3>
    <form id="sign-up-form" method="post" action="create_account.php" >
        <table border="0.5" >
            <tr>
                <td><label for="user_id">User Name</label></td>
                <td><input type="text" name="user_id" id="user_id"></td>
            </tr>
            <tr>
                <td><label for="user_pass">Password</label></td>
                <td><input type="password" name="user_pass" id="user_pass"></input></td>
            </tr>
            <tr>
                <td><input type="submit" value="Submit" />
                <td><input type="reset" value="Reset"/>
            </tr>
        </table>
    </form>
</body>
<?php
if ( isset($_GET['success']) && $_GET['success'] == 1 )
{
     // treat the succes case ex:
     echo "User Already Exists";
}
?>
</html>
