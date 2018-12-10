
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CMS</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  <link rel="stylesheet" href="http://localhost/music_blog/asets/css/main.css">
</head>
<body class="bg-light">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="http://localhost/music_blog/index.php">Music Blog</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="http://localhost/music_blog/admin/user/users.php">User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/music_blog/admin/post/posts.php">Posts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/music_blog/admin/aside/aside.php">Aside</a>
          </li>
        </ul>

        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2"  id="search" placeholder="Search Post by Name">
        </form>

        <ul class="navbar-nav ml-5">
          <?php if(!isset($_SESSION['userId'])): ?>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/music_blog/login.php">Login</a>
            </li>
          <?php else:?>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/music_blog/logout.php">Logout</a>
            </li>
          <?php endif;?>
        </ul>
      </div>
    </div>
  </nav>

  <section>
    <div class="container p-4">
