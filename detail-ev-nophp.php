<?php
session_start();
if (isset($_POST["logout"])) {
  $_SESSION = array();
  session_destroy();
  header("Location: index.php");
  exit;
}
if (isset($_SESSION["pdp"])) {
  $pdp = $_SESSION["pdp"];
} else {
  $pdp = null;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--lien css bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!--finlien css bootstrap-->

  <!--lien css vid yt-->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
  <!--fi lien css vid yt-->

  <!--mes css-->
  <link rel="stylesheet" href="css/index.css" type="text/css">
  <link rel="stylesheet" href="css/details-ev.css" type="text/css">
  <link rel="stylesheet" href="css/dropdown.css" type="text/css">
  <!--fin mes css-->

  <title>Details Evenements</title>
  <style>
    .fa-cart-shopping {
      font-size: 24px;
      color: var(--text-marron);
      margin-left: 10px;
      margin-right: 10px;
      padding-left: 10px;
      padding-right: 10px;
    }

    .fa-cart-shopping:hover {
      transform: scale(1.2);
      color: red;
    }
  </style>

</head>

<body>

    <!-- debut nav bar-->
    <nav class="navbar navbar-expand-lg bg-transparent">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo Nadhamly"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header text-white border-bottom">
          <h5 class="offcanvas-title fontradley" id="offcanvasNavbarLabel">Nadhamly</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end align-items-center flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link  fontradley bold" aria-current="page" href="index.php">Acceuil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  fontradley bold" href="Apropos.php">A propos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  fontradley bold" href="portfolio.php">Portfolio</a>
            </li>
            <li class="nav-item fontradley">
              <a class="nav-link  bold" href="planification.php">Planification</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fontradley  bold" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a href="panier.php" class="cart-link">
                <i class="fa-solid fa-cart-shopping icon-style"></i>
              </a>
            </li>
            <li class="nav-item">
              <?php if (isset($_SESSION["utilisateur"])) { ?>
                <!-- If user is logged in, display image -->
                <div class="profile-dropdown">
                  <div onclick="toggle()" class="profile-img" id="image-container">
                    <?php if (!empty($pdp)) { ?>
                      <img src="<?php echo $pdp; ?>" style="border-radius: 50%; overflow: hidden; width: 55px; height: 55px; object-fit: cover;" id="profile-image">
                    <?php } else { ?>
                      <img src="images/defaultpdp.jpg" alt="Default Profile Picture" style="border-radius: 50%; overflow: hidden; width: 75px; height: 75px; object-fit: cover;" id="profile-image">
                    <?php } ?>
                  </div>

                  <ul class="profile-dropdown-list" style="list-style-type: none;padding:0;z-index:30;">
                    <li class="profile-dropdown-list-item">
                      <a href="profile.php">
                        <i class="fa-regular fa-user"></i>
                        <?php $username = $_SESSION["utilisateur"];
                        echo $username;
                        ?>
                      </a>
                    </li>

                    <li class="profile-dropdown-list-item">
                      <a href="#">
                        <i class="fa-regular fa-envelope"></i>
                        Inbox
                      </a>
                    </li>

                    <li class="profile-dropdown-list-item">
                      <a href="#">
                        <i class="fa-solid fa-chart-line"></i>
                        statistiques
                      </a>
                    </li>

                    <li class="profile-dropdown-list-item">
                      <a href="modifier-profile.php">
                        <i class="fa-solid fa-sliders"></i>
                        parametres
                      </a>
                    </li>

                    <li class="profile-dropdown-list-item">
                      <a href="#">
                        <i class="fa-regular fa-circle-question"></i>
                        Aide et contact
                      </a>
                    </li>

                    <li class="profile-dropdown-list-item">
                      <a href="#">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <?php if (isset($_SESSION["utilisateur"])) { ?>
                          <!-- If user is logged in, display logout button -->
                          <form method="post">
                            <button type="submit" name="logout" class="btn btn-link text-black fontradley button-reset">Déconnexion</button>
                          </form>
                        <?php } else { ?>
                          <!-- If user is not logged in, display regular button -->
                          <a class="nav-link text-white px-3 py-1 rounded-4 fontradley navbtn" href="login.php">Se connecter</a>
                        <?php } ?>
                      </a>
                    </li>
                  </ul>
                </div>
              <?php } else { ?>
                <!-- If user is not logged in, display regular button -->
                <a class="nav-link text-white px-3 py-1 rounded-4 fontradley navbtn" href="login.php">Se connecter</a>
              <?php } ?>
            </li>
          </ul>

        </div>
      </div>
    </div>
  </nav>
  <!-- fin nav bar-->

  <!--partie pour pic evenement-->
  <section class="container sproduct">


    <div class="row mt-5">

      <!--partie des image (partie gauche)-->

      <div class="col-lg-5 col-md-12 col-12">
        <!--carrousel verticale pour grande image-->
        <div class="carou-container mb-5">
          <div class="carou-inner ">
            <div class="carou-item "><img src="images/esppaces/sallerihab.jpg" alt="placeholder"></div>
            <div class="carou-item"><img src="images/esppaces/parcflorale.jpg" alt="placeholder"></div>
            <div class="carou-item"><img src="images/esppaces/hotel_byzacene_sbeitla_9.jpg__769x462_q85_crop-smart_subsampling-2.jpg" alt="placeholder"></div>
          </div>
          <div class="carou-indicators">
            <span class="carou-indicator active" onclick="goToSlide(0)"></span>
            <span class="carou-indicator" onclick="goToSlide(1)"></span>
            <span class="carou-indicator" onclick="goToSlide(2)"></span>
          </div>
        </div>
        <!--carrousel verticale pour grande image-->
      </div>
      <!--fin partie des image-->

      <!--(right div) partie ecriture etc-->
      <div class="col-lg-6 col-md-12 col-12 ecriture">
        <h6 class="pt-4">Profil/Vos Evenements</h6>
        <hr>
        <h3>Evenement de l'Ete Dernier</h3>
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>

        <Span>
          <p class="pt-4">orem ipsum dolor sit amet. Est similique earum et eaque sint eum asperiores consectetur qui eveniet accusamus a dolore assumenda ut autem quia in exercitationem recusandae.
            Ex cupiditate omnis est voluptates aspernatur et omnis soluta. </p>
        </Span>

      </div>
      <!-- fin partie ecriture etc-->
    </div>

  </section>
  <!--fin partie pour pic evenement-->

  <hr class="separateur2">

  <!--section pour les fournisseurs-->
  <section id="fournisseur">
    <div class="container text-center">
      <h3>Vos Fournisseur</h3>

      <p>Ici vous trouvez les fournisseurs qui ont servis pour cet evenement--</p>
    </div>
    <div class="row mx-auto container-fluid">
      <div class="produit text-center col-lg-3 col-md-4 col-12">
        <img class="img-fluid mb-3" src="images/Equipements/chairs1.jpg" alt="placeholder">
        <div class="star ">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Fournisseur d'equipements</h5>
        <button class="voir-plus">Voir Plus</button>
      </div>
      <div class="produit text-center col-lg-3 col-md-4 col-12">
        <img class="img-fluid mb-3" src="images/Baristas/1.jpg" alt="placeholder">
        <div class="star ">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Baristas Presents</h5>
        <button class="voir-plus">Voir Plus</button>
      </div>
      <div class="produit text-center col-lg-3 col-md-4 col-12">
        <img class="img-fluid mb-3" src="images/esppaces/3.jpeg" alt="placeholder">
        <div class="star ">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Decoration</h5>
        <button class="voir-plus">Voir Plus</button>
      </div>
      <div class="produit text-center col-lg-3 col-md-4 col-12">
        <img class="img-fluid mb-3" src="images/bouffe.jpg" alt="placeholder">
        <div class="star ">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>

        </div>
        <h5 class="p-name">Fournisseur de bouffe</h5>
        <button class="voir-plus">Voir Plus</button>
      </div>
    </div>
  </section>
  <!--section pour les fournisseurs-->

  <hr class="separateur2">

  <!--section pour la baniere de promo-->
  <section id="banner" class="col-lg-12 col-md-6 col-12">
    <div class="container col-lg-12 col-md-6 col-12">
      <h4>Venue SALE</h4>
      <h1>Autumn Edition<br>UP TO 20% OFF</h1>
      <hr>
      <button class="text-uppercase">Check Now</button>
      <!--img src="images/esppaces/2.jpg" alt="Image" class="banner-image img-fluid col-lg-12 col-md-6 col-12"-->
      <iframe class="banner-image" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3195.418791762387!2d10.175925675578918!3d36.784508172251606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd340576fc1a05%3A0x25fc1aa869f8cfb6!2s%C3%89cole%20nationale%20sup%C3%A9rieure%20d&#39;ing%C3%A9nieurs%20de%20Tunis%20(ENSIT)!5e0!3m2!1sen!2stn!4v1695837976536!5m2!1sen!2stn" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    </div>
  </section>
  <!--fin section pour la baniere de promo-->

  <!--section pour le titre sponsors-->
  <section id="baniere-titre" class="container">
    <hr class="m-3 separateur">
    <h2 class="ecriture font-weight-bold pr-5">VOS SPONSORS</h2>
    <hr class="m-3 separateur">
  </section>
  <!--fin section pour le titre sponsors-->

  <!--baniere pour sponsor-->
  <section id="sponsor m-5 p-5" class="container">
    <div class="row py-3">
      <img class="img-fluid col-lg-2 col-md-4 col-6 p-5" src="images/brand/1.png" alt="placeholder">
      <img class="img-fluid col-lg-2 col-md-4 col-6 p-5" src="images/brand/2.png" alt="placeholder">
      <img class="img-fluid col-lg-2 col-md-4 col-6 p-5" src="images/brand/3.png" alt="placeholder">
      <img class="img-fluid col-lg-2 col-md-4 col-6 p-5" src="images/brand/4.png" alt="placeholder">
      <img class="img-fluid col-lg-2 col-md-4 col-6 p-5" src="images/brand/5.png" alt="placeholder">
      <img class="img-fluid col-lg-2 col-md-4 col-6 p-5" src="images/brand/6.png" alt="placeholder">
    </div>
  </section>
  <!--fin baniere pour sponsor-->

  <!--début footer-->
  <footer class="bg-dark pt-5 pb-4">
    <div class="container-fluid">
      <div class="row  text-white">
        <div class="col-md-3 col-lg-3 col-sm-1 mx-auto mt-3">
          <h2 style="font-family:'Times New Roman', Times, serif;font-weight: 500;">A propos</h2>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-1 mx-auto mt-3">
          <h2 style="font-family: 'Times New Roman', Times, serif;font-weight: 500;">Accés Rapide</h2>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-1 mx-auto mt-3">
          <h2 style="font-family: 'Times New Roman', Times, serif;font-weight: 500;">Contactez-Nous</h2>
        </div>
      </div>
      <div class="row greytext">
        <div class="col-md-3 col-lg-3 col-sm-1 mx-auto mt-3">
          <p style="font-family:'Times New Roman', Times, serif;"> Nadhamly est un projet crée afin de faciliter l'organisation des évènements il offre une plateforme unique, rapide et facile à utiliser aux utilisateurs qui aspirent à planifier tous les aspects de leurs propres évènements en une seule place et même aux fournisseurs qui cherchent une vitrine pour présenter leurs services et produits. Ceci permettra aux utilisateurs de maximiser leur gain de temps et profiter pleinement de chaque moment spécial.
          </p>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-1 mx-auto mt-3">
          <ul>

            <li><a href="index.php">Acceuil</a></li>
            <li><a href="Apropos.php">A propos</a></li>
            <li><a href="portfolio.php">Portfolio</a></li>
            <li><a href="planification.php">Planification</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="connecter.php">Se connecter</a></li>
          </ul>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-1 mx-auto mt-3">
          <ul class="coordonnées">
            <li align="left">&#128205; <a href="https://maps.app.goo.gl/zLKkJNBrgjAyrBT1A">5, avenue Taha Hussein Montfleury,<br /> 1008 Tunis</a></li>
            <li align="left">&#128222; <a href="tel:216 71 39 25 91">71 39 25 91</a></li>
            <li align="left">&#128224; <a href="tel:216 71 39 11 66"> 71 39 11 66</a></li>
            <li align="left">&#128231; <a href="mailto:contact@ensit.rnu.tn">contact@ensit.rnu.tn</a></li>
          </ul>
        </div>

      </div>
    </div>
  </footer>
  <!--fin footer-->

  <!--script pour caroussel verticale-->
  <script src="js/details-ev.js"></script>
  <!--fin script pour caroussel verticale-->
  <script src="js/dropdown.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var imageContainer = document.getElementById('image-container');
      var profileImage = document.getElementById('profile-image');

      // Add event listener for hover effect
      imageContainer.addEventListener('mouseover', function() {
        profileImage.style.transition = 'transform 0.5s ease';
        profileImage.style.transform = 'scale(1.1)';
        imageContainer.style.cursor = 'pointer';
      });

      // Add event listener to reset when mouse leaves
      imageContainer.addEventListener('mouseout', function() {
        profileImage.style.transition = 'transform 0.5s ease';
        profileImage.style.transform = 'scale(1)';
      });
    });
  </script>


  <!--bootstrap js links-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <!--bootstrap js links-->
  <script src="https://kit.fontawesome.com/db0be4ca84.js" crossorigin="anonymous"></script>

</body>

</html>