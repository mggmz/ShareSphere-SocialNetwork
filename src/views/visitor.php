
<!DOCTYPE html>
<?php
require_once("../../autoload.php");
use Models\{posts};
$posts = new posts();
$postList = $posts->GetPosts();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShareSphere</title>

    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/mainVisit.css">
    <link rel="stylesheet" href="../css/textpost.css">
    <link rel="stylesheet" href="../css/photopost.css">
    <link rel="stylesheet" href="../css/filtros.css">
    <link rel="stylesheet" href="../css/modal.css">
    <link rel="stylesheet" href="../css/modalEdit.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>

    <header>
    <div class="navbar">
        <div class="logo">
          <a href="./main.php">
              <img src="../images/Logo-cut.png" alt="Logo" style="font-size: 24px; background-color: transparent; border: none;">
          </a>
        </div>

        <div class="access">
        <br /><br />
            <button class="optionnv" href="/"><i class="bi bi-rocket-takeoff"></i><span>Popular</span></button>
            <button class="optionnv" href="/about"><i class="bi bi-controller"></i><span>Gaming</span></button>
            <button class="optionnv" href="/about"><i class="bi bi-dribbble"></i><span>Sports</span></button>
            <br />
        </div>
        
      </div>
    </header>
    
    <div class="main">

        <div class="feedhead">
          <h1>ShareSphere</h1>
          <div class="search-nav">
          <form action="#" method="get">
            <input type="text" placeholder="Buscar..." name="search">
          </form>
          </div>

          <a href="./login.php" class="logout">Logout<i class="bi bi-box-arrow-in-right"></i></a>

        </div>

        <br /><br /><br /><br /><br /><br />

        <div class="filtros">
          <div class="containerfiltros">
            <h1>Filtro</h1>

            <div class="forum">
              <button><img src="../images/6.png"></button>
              <button><img src="../images/7.png"></button>
              <button><img src="../images/14.jpg"></button>
            </div>

          </div>
        </div>

        <?php foreach($postList as $post){?>
        <?php $username = $posts->GetUserById(filter_var($post['creatorId'], FILTER_SANITIZE_STRING));?>
        
        <div class="post-container">
          <div class="user-info">
            <img src="../images/Uli.png" alt="User Image">
            <span>Username</span>
          </div>
          <div class="post-options">
            <button class="action-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
              <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
              </svg>
            </button>
          </div>
          <h2 class="post-content">Title of the Post</h2>
          <h3 class="SubTitle">Tema de la onu</h3>
          <div class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. In nisi, iste deleniti accusantium aliquam aliquid nostrum, accusamus inventore commodi a quisquam. Expedita cumque quis temporibus voluptates dolores modi commodi eius.</div>
          <div class="image-container">
            <img src="../images/playa.jpg" alt="Post Image">
          </div>
          <div class="post-actions">
            <button class="action-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
              <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2 2 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a10 10 0 0 0-.443.05 9.4 9.4 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a9 9 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.2 2.2 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.9.9 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"></path>
              </svg>
            </button>
            <button class="action-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-down" viewBox="0 0 16 16">
                <path d="M8.864 15.674c-.956.24-1.843-.484-1.908-1.42-.072-1.05-.23-2.015-.428-2.59-.125-.36-.479-1.012-1.04-1.638-.557-.624-1.282-1.179-2.131-1.41C2.685 8.432 2 7.85 2 7V3c0-.845.682-1.464 1.448-1.546 1.07-.113 1.564-.415 2.068-.723l.048-.029c.272-.166.578-.349.97-.484C6.931.08 7.395 0 8 0h3.5c.937 0 1.599.478 1.934 1.064.164.287.254.607.254.913 0 .152-.023.312-.077.464.201.262.38.577.488.9.11.33.172.762.004 1.15.069.13.12.268.159.403.077.27.113.567.113.856s-.036.586-.113.856c-.035.12-.08.244-.138.363.394.571.418 1.2.234 1.733-.206.592-.682 1.1-1.2 1.272-.847.283-1.803.276-2.516.211a10 10 0 0 1-.443-.05 9.36 9.36 0 0 1-.062 4.51c-.138.508-.55.848-1.012.964zM11.5 1H8c-.51 0-.863.068-1.14.163-.281.097-.506.229-.776.393l-.04.025c-.555.338-1.198.73-2.49.868-.333.035-.554.29-.554.55V7c0 .255.226.543.62.65 1.095.3 1.977.997 2.614 1.709.635.71 1.064 1.475 1.238 1.977.243.7.407 1.768.482 2.85.025.362.36.595.667.518l.262-.065c.16-.04.258-.144.288-.255a8.34 8.34 0 0 0-.145-4.726.5.5 0 0 1 .595-.643h.003l.014.004.058.013a9 9 0 0 0 1.036.157c.663.06 1.457.054 2.11-.163.175-.059.45-.301.57-.651.107-.308.087-.67-.266-1.021L12.793 7l.353-.354c.043-.042.105-.14.154-.315.048-.167.075-.37.075-.581s-.027-.414-.075-.581c-.05-.174-.111-.273-.154-.315l-.353-.354.353-.354c.047-.047.109-.176.005-.488a2.2 2.2 0 0 0-.505-.804l-.353-.354.353-.354c.006-.005.041-.05.041-.17a.9.9 0 0 0-.121-.415C12.4 1.272 12.063 1 11.5 1"></path>
                </svg>
            </button>
            <button class="action-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"></path>
                <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"></path>
                </svg>
            </button>
            <div>
                <span class="likes">100 Likes</span>
                <span class="comments">50 Comments</span>
            </div>
        </div>
    </div>

        <?php } ?>

</body>
</html>