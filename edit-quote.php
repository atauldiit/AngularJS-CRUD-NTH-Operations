
<?php
include_once 'databaseFiles/database_connections.php';
?>
<?php
require_once 'dbconnect.php';
echo "Connected to $host <BR>";
$username = htmlentities($_POST['username']);
$query = "INSERT INTO users (username) VALUES ('$username')";
echo $query . "<BR>";
$result = mysqli_query($dbh, $query);
if (!$result) {
    echo "Error entering data! <BR>";
} else {
    echo "User $username added <BR>";
}
mysqli_free_result($result);
mysqli_close($dbh);
?>
<html>
    <head>
        <title>Add User</title>
    </head>
    <body>
        <h1>Adding MySQL User</h1>
        <hr>
        <form action = "useradd.php" method = "post">
            <p>
                <label for="un">Username:</label>
                <input type="text" class="input" id="un" name="username">
                <br>
                <label>&nbsp</label><input type="submit" value="submit" class="button">
            </p>
        </form>
    </body>
</html>