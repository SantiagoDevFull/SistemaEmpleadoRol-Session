<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php require_once '../include/recursosCSS.php' ?>
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/navegacion.css">
  <link rel="stylesheet" href="../css/footer.css">
</head>

<body>
  <?php require_once '../include/recursosJS.php' ?>
  <?php require_once '../include/navegacionIndex.php' ?>


  <div>

    <div class=" bg-white p-2  text-dark d-flex">
      <div class="col-6 d-flex justify-content-left align-items-center">
        <h5><i class="fa-solid fa-cart-shopping" style="color: #000000;"></i>&nbsp;SISTEMA DE VENTA</h5>
      </div>

      <div class="d-flex container justify-content-end align-items-center">
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalYoutube">
          <i class="redes fa-brands fa-youtube text-danger fa-2xl"></i>
        </button>

      </div>
    </div>



    <div class="bg-success p-3 text-white">
      <marquee behavior="scroll" direction="left" scrollamount="10">
        <i class="fa-regular fa-star" style="color: #ffea05;"></i>
        Los mejores precios lo encuentras aqui. Hacemos de lo imposible, algo simple.
        <i class="fa-regular fa-star" style="color: #ffea05;"></i>
      </marquee>
    </div>

  </div>

  <div>
    <div id="carouselExampleIndicators" class="carousel slide img-fluid" data-bs-ride="true">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../image/carruselAbarrotes.jpg" class="d-block w-100" height="500">
        </div>
        <div class="carousel-item">
          <img src="../image/carruselCarnes.jpg" class="d-block w-100" height="500">
        </div>
        <div class="carousel-item">
          <img src="../image/carruselFrutas.jpg" class="d-block w-100" height="500">
        </div>
        <div class="carousel-item">
          <img src="../image/carruselVerduras.jpg" class="d-block w-100" height="500">
        </div>
      </div>
      <button class="carousel-control-prev bg-dark" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      </button>
      <button class="carousel-control-next bg-dark" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
      </button>
    </div>
  </div>

  <div class="bg-success p-3 text-white">
    <marquee behavior="scroll" direction="left" scrollamount="10">
      <i class="fa-regular fa-star" style="color: #ffea05;"></i>
      Los mejores precios lo encuentras aqui. Hacemos de lo imposible, algo simple.
      <i class="fa-regular fa-star" style="color: #ffea05;"></i>
    </marquee>
  </div>

  <!-- Modal de youtube -->
  <div class="modal modal-lg fade" id="modalYoutube" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 badge bg-info" id="staticBackdropLabel">::: PROUCTOS DE BUENA CALIDAD :::</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <iframe src="https://www.youtube.com/embed/JE5RJ4bOU6o" width="100%" height="500px" title="YouTube video player" frameborder="1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
          </iframe>

        </div>
      </div>
    </div>
  </div>




  <?php require_once '../include/footerIndex.php' ?>


</body>

</html>