<?php
session_start();
  include 'config/config.php';
  include 'config/connect.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <body>
    <div class="container mt-5">
      <div class="card text-center w-50 ms-auto me-auto">
        <div class="card-header">
          <h1>Image Upload Project</h1>
        </div>
        <div class="card-body">
          <form action="event.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo $_SESSION['_token']; ?>">
            <input name="upload[]" type="file" multiple="multiple" class="form-control"/>
            <p class="text-danger"><?php if(!empty($imgerror)){ echo $imgerror; } ?></p>
            <button type="submit" name="button" class="btn btn-primary">Upload</button>
          </form>
        </div>
      </div>
      <div class="container">
        <?php
        $stmt = $pdo->prepare("SELECT * FROM imgtable");
        $stmt->execute();
        $datas = $stmt->fetchall();
        ?>

        <?php foreach ($datas as $data) {
          ?>
              <img src="<?php echo $data['image']; ?>" alt="" width="32.5%">
          <?php
        } ?>
      </div>
    </div>
  </body>
</html>
