<!DOCTYPE html>
<html>
<head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}
</style>
</head>
<body>

<ul>
  <li><a href="/mvc/index/dashboard/index">Home</a></li>
  <li><a href="/mvc/index/user/registerView">Registration</a></li>
  <li><a href="#contact">Contact</a></li>
  <li style="float:right"><a class="active" href="/mvc/index/index/logout">Logout</a></li>
</ul>
    <br>
    <h4 style="text-align:right">Hi   <?php echo $_SESSION['email']; ?> </h4>

</body>
</html>

