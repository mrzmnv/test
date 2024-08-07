<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
    session_start();

    if (!isset($_SESSION['username'])) {
      header("Location: register.php"); // eger session baslamasa logine yonlendirmek ucun yazdin bunu
      exit();
  }
    include "baglanti.php";
    $sql = "select id, username, email, tel from qeydiyyat where is_admin = 0";
    $result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="dashboard-container">
        <nav class="sidebar">
            <div class="sidebar-header">
                <h2>Menu</h2>
            </div>
            <ul class="sidebar-menu">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">Tasks</a></li>
                <li><a href="#">Resources</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </nav>
        <div class="main-content">
            <header class="topbar">
                <h1>Instagram</h1>
                <div class="user-info">
                    <p>Welcome, <?=$_SESSION['username']?></p>
                    <a href="session.php">Logout</a>
                </div>
            </header>
            <div class="content">
              
                    <div class="card">
                        <h3>Admin mail</h3>
                        <p><?=$_SESSION['user_email']?></p>
                    </div>
                <div class="cards">
                    <div class="card">
                        <h3>Tel</h3>
                        <p><?=$_SESSION['user_tel']?></p>
                    </div>
                    <div class="card">
                        <h3>Unvan</h3>
                        <p>Azerbaijan, Baku</p>
                    </div>
                    <div class="card">
                        <h3>User Status</h3>
                        <p><?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?><p>Admin</p><?php endif; ?></p>
                    </div>
                </div>
                <h1>All Users</h1>
                <?php if ($result->num_rows > 0): ?>
              <table>         
  <thead>
    <tr>
      <th>id</th>
      <th>username</th>
      <th>username</th>
      <th>Email</th>
      <th>Tel</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>
  <?php while($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?php echo $row["id"]; ?></td>
      <td><?php echo $row["username"]; ?></td>
      <td><?php echo $row["email"]; ?></td>
      <td><?php echo $row["tel"]; ?></td>
      <td>
        <a href="#">edit</a>
        <a href="delete.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Bu istifadecini silmek istediyinizden eminsiz?');">Delete</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
        </table>
    <?php else: ?>
        <p>istifadeci tapilmadi.</p>
    <?php endif; ?>

    <?php $con->close(); ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
