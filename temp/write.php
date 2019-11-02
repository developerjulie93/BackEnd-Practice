<?php
  $conn = mysqli_connect('localhost','root','111111');
  mysqli_select_db($conn, 'opentutorials');
  $result = mysqli_query($conn, "SELECT * FROM topic");


 ?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <style type="text/css">
       body.white{
        background: white;
        color: black;
       }
       body.black{
        background-color: black;
        color: white;
       }
     </style>
</head>
<body id="target">
    <header>
        <h1><a href="http://localhost/index.php">JavaScript</a></h1>
  </header>
    <nav>
        <ol style="list-style: none; padding:0;">
          <?php
              while($row = mysqli_fetch_assoc($result)){
                echo '<li><a href="http://localhost/temp/index.php?id='.$row['id'].'">'.$row['title'].'</a></li>';
             }
           ?>
        </ol>
    </nav>
  <div id="control">
    <input type="button" value="white" onclick="document.getElementById('target').className='white'"/>
    <input type="button" value="black" onclick="document.getElementById('target').className='black'" />
    <a href="http://localhost/temp/write.php"><input type="button" value="write"></a>
  </div>
  <article style="width: 500px; height: 500px; background-color: yellow;">
  <?php
    if(empty($_GET['id']) == false ) {
      $sql = 'SELECT * FROM topic WHERE id='.$_GET['id'];
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      echo '<h2>'.$row['title'].'</h2>';
      echo $row['discription'];
  }
     ?>
  <form action="process.php" method="post">
  <p>
    Title : <input type="text" name="title">
  </p>
  <p>
    Author : <input type="text" name="author">
  </p>
  <p>
    Description: <textarea name="discription"></textarea>
  </p>
  <input type="submit" name="submit" value="Submit"></a>
  </article>
  </form>
</body>
</html>