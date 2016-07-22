<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $title ?></title>
</head>
<body>
  <div class="article">
    <h1><?php echo $User['id'] ?></h1>
    <div class="content">
      <?php echo $User['name'] ?>
    </div>
  </div>
  <ul class="foobar">
    <li>FooBar</li>
    <li>
      <?php echo $foo_bar ?>
    </li>
  </ul>
</body>
</html>