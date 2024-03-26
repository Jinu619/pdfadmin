<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title id="company_id"></title>
    <meta name="robots" content="noindex, nofollow" />
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <link href="#" rel="#" />

    <!-- Google Fonts Nunito & Poppins -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

    <!---*************************************
      Link Django with index css files only
    ************************************** -->

    <!-- Bootstrap CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet" />
    <link href="./css/style3.css" rel="stylesheet" />
    <style>
        .star {
            font-size: 4vh;
            cursor: pointer;
        }

        .star-2 {
            font-size: 4vh;
            cursor: pointer;
        }

        .star-3 {
            font-size: 4vh;
            cursor: pointer;
        }

        .golden {
            color: goldenrod;
        }
    </style>
</head>

<body>
    <main style="background-color: rgb(255, 255, 255)">
        <!-- style="
        background-image: url('assets/img/');
        background-size: cover;
      " -->
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="card mb-3">
                                <div class="d-flex justify-content-center py-2"></div>
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                        <img src="./images/preethisilkslogo.png" style="max-width: fit-content;" class=" mb-2 rounded " alt="">

                                    </div>
                                    <h4 class="d-flex justify-content-center mb-3 fw-bold">
                                        👋 Help us improve
                                    </h4>
                                    <hr />
                                    <form class="row g-3" id="feedbackForm" action="createlinkvalidate.php" method="post" autocomplete="off" enctype="multipart/form-data">
                                        <!-- Question 1 -->



                                        <div class="col-12">
                                            <p class="fw-bold">
                                                code
                                            </p>
                                            <input type="text" name="code" class="form-control">
                                        </div>
                                        <div class="col-12">
                                            <input type="submit" class="btn btn-success w-100" value=" Create">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


    <script src="./js/bootstrap.bundle.min.js"></script>

    <!-- init file start here -->
    <script src="./js/main.js"></script>
    <!-- init file ends here -->



</body>

</html>