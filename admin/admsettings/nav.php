<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="admin.php">Admin's page</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href=""><span class="glyphicon glyphicon-user"></span> Hi, <?= $_SESSION["name"]?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span>  Log out</a></li>
    </ul>
  </div>
</nav>