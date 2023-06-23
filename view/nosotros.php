<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php require_once '../include/recursosCSS.php' ?>
  <link rel="stylesheet" href="../css/navegacion.css">
  <link rel="stylesheet" href="../css/footer.css">
  <link rel="stylesheet" href="../css/nosotros.css">
</head>

<body>
  <?php require_once '../include/recursosJS.php' ?>
  <?php require_once '../include/navegacionIndex.php' ?>



  <div class="container-fluid p-5 row row-cols-1 row-cols-md-2 g-4 text-center">

    <div class="col">
      <div class="card shadow-lg ">
        <img src="../image/mision.jpg" class="card-img-top" width="100%" height="450px">
        <div class="card-body ">

          <h5 class="card-title badge bg-primary fs-4 ">::: NUESTRA MISIÓN :::</h5><br>
          Nuestra misión es proveer productos de alta calidad y precios competitivos a nuestros clientes en el mercado
          de abarrotes. Nos enfocamos en ofrecer una amplia variedad de productos de alimentación y limpieza, así como
          una excelente atención al cliente para satisfacer sus necesidades y superar sus expectativas.Además, seleccionamos nuestros productos para garantizar la calidad y frescura
          de cada producto que ofrecemos.
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card shadow-lg">
        <img src="../image/vision.jpg" class="card-img-top" width="100%" height="450px">
        <div class="card-body">
          <h5 class="card-title badge bg-danger fs-4">::: NUESTRA VISIÓN :::</h5><br>
          Nuestra visión es ser líderes en el mercado de abarrotes, reconocidos por nuestra excelencia en la calidad de
          productos, el servicio al cliente y la innovación en nuestras operaciones. Nos esforzamos por ser una empresa
          en constante crecimiento, con una presencia en diferentes regiones del país, manteniendo siempre nuestro
          compromiso con la satisfacción del cliente y el bienestar de nuestra comunidad.
        </div>
      </div>
    </div>

    <div class="container text-center p-5">
      <div class="card shadow-lg">

        <div class="card-body">
          <h5 class="card-title badge bg-success fs-4">::: VALORES :::</h5>

          <ol class="list-group list-group-numbered text-start">
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold text-start">Honestidad&nbsp;<i class="fa-solid fa-square-check" style="color: #037401;"></i></div>
                Ser honesto y transparente en todas las actividades empresariales.
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Responsabilidad&nbsp;<i class="fa-solid fa-square-check" style="color: #037401;"></i></div>
                Ser responsable y cumplir con las obligaciones legales y éticas.
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Calidad&nbsp;<i class="fa-solid fa-square-check" style="color: #037401;"></i></div>
                Ofrecer productos o servicios de alta calidad y buscar la excelencia en todo lo que hacemos.
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Respeto&nbsp;<i class="fa-solid fa-square-check" style="color: #037401;"></i></div>
                Respetar a los demás, sin importar su origen, género, orientación sexual, raza, religión o cualquier otra característica.
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Diversidad&nbsp;<i class="fa-solid fa-square-check" style="color: #037401;"></i></div>
                Valorar y respetar la diversidad de opiniones, ideas y perspectivas, y trabajar para crear un ambiente inclusivo.
              </div>
            </li>
          </ol>


        </div>
        <img src="../image/valores.jpg" class="card-img-top" width="100%" height="450px">
      </div>
    </div>
  </div>


  <?php require_once '../include/footerIndex.php' ?>
</body>

</html>