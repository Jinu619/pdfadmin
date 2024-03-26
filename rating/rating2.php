<?php
include_once("../common/includes/constants.php");
include_once("../common/includes/functions.php");
include_once("../common/includes/common.php");
function decrypt($data, $key)
{
    // Perform Base64URL decoding first
    $data = str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT);
    $data = base64_decode($data);

    $cipher = 'aes-256-cbc'; // AES encryption with a 256-bit key in CBC mode
    $ivLength = openssl_cipher_iv_length($cipher);

    // Extract IV and encrypted data
    $iv = substr($data, 0, $ivLength);
    $encrypted = substr($data, $ivLength);

    $decrypted = openssl_decrypt($encrypted, $cipher, $key, OPENSSL_RAW_DATA, $iv);

    if ($decrypted === false) {
        return "Decryption failed.";
    }

    return $decrypted;
}

?>
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
                                    <?php
                                    $key = isset($_GET['key']) ? $_GET['key'] : "";
                                    if (!$key) {
                                        echo '<h4 class="d-flex justify-content-center mb-3 fw-bold">Thank you from the bottom of our hearts! We dedicate the success of your purchase from Preethi Silks specially to you!</h4>';
                                        exit;
                                    }

                                    $dekey = decrypt($key, "619");
                                    if ($dekey == 'Error') {
                                        echo $dekey . '<h4 class="d-flex justify-content-center mb-3 fw-bold"> Thank you from the bottom of our hearts! We dedicate the success of your purchase from Preethi Silks specially to you!</h4>';
                                        exit;
                                    }
                                    $sel1 = mysqli_query($conn, "SELECT * FROM rating WHERE billno = '$dekey' AND updated_at is null ");
                                    if (!mysqli_num_rows($sel1)) {
                                        echo '<h4 class="d-flex justify-content-center mb-3 fw-bold">Thank you from the bottom of our hearts! We dedicate the success of your purchase from Preethi Silks specially to you!</h4>';
                                        exit;
                                    }

                                    ?>
                                    <input type="hidden" name="billno" value="<?php echo $dekey; ?>">
                                    <h4 class="d-flex justify-content-center mb-3 fw-bold">
                                        👋 Help us improve
                                    </h4>
                                    <hr />
                                    <form class="row g-3" id="feedbackForm" action="rating2Validate.php" method="post" autocomplete="off" enctype="multipart/form-data">
                                        <!-- Question 1 -->

                                        <input type="hidden" name="review_ids" value="781cd59571f544a5bc129b3e844aebd1">
                                        <div class="col-12">
                                            <p class="fw-bold">How helpful was our staff in assisting you with your purchase?</p>
                                            <div class="user-star">
                                                <span onclick="qs1(1,'781cd59571f544a5bc129b3e844aebd1')" class="star star-781cd59571f544a5bc129b3e844aebd1">★
                                                    <input type="hidden" class="hidden-input-781cd59571f544a5bc129b3e844aebd1" value="0" name="q1[]"></span>
                                                <span onclick="qs1(2,'781cd59571f544a5bc129b3e844aebd1')" class="star star-781cd59571f544a5bc129b3e844aebd1">★
                                                    <input type="hidden" class="hidden-input-781cd59571f544a5bc129b3e844aebd1" value="0" name="q1[]"></span>
                                                <span onclick="qs1(3,'781cd59571f544a5bc129b3e844aebd1')" class="star star-781cd59571f544a5bc129b3e844aebd1">★
                                                    <input type="hidden" class="hidden-input-781cd59571f544a5bc129b3e844aebd1" value="0" name="q1[]"></span>
                                                <span onclick="qs1(4,'781cd59571f544a5bc129b3e844aebd1')" class="star star-781cd59571f544a5bc129b3e844aebd1">★
                                                    <input type="hidden" class="hidden-input-781cd59571f544a5bc129b3e844aebd1" value="0" name="q1[]"></span>
                                                <span onclick="qs1(5,'781cd59571f544a5bc129b3e844aebd1')" class="star star-781cd59571f544a5bc129b3e844aebd1">★
                                                    <input type="hidden" class="hidden-input-781cd59571f544a5bc129b3e844aebd1" value="0" name="q1[]"></span>
                                            </div>
                                        </div>

                                        <input type="hidden" name="review_ids" value="9fa484d95f22448ea6b1279fad97ff52">
                                        <div class="col-12">
                                            <p class="fw-bold">How smooth and efficient was the checkout process at our shop?</p>
                                            <div class="user-star">
                                                <span onclick="qs1(1,'9fa484d95f22448ea6b1279fad97ff52')" class="star star-9fa484d95f22448ea6b1279fad97ff52">★
                                                    <input type="hidden" class="hidden-input-9fa484d95f22448ea6b1279fad97ff52" value="0" name="q2[]"></span>
                                                <span onclick="qs1(2,'9fa484d95f22448ea6b1279fad97ff52')" class="star star-9fa484d95f22448ea6b1279fad97ff52">★
                                                    <input type="hidden" class="hidden-input-9fa484d95f22448ea6b1279fad97ff52" value="0" name="q2[]"></span>
                                                <span onclick="qs1(3,'9fa484d95f22448ea6b1279fad97ff52')" class="star star-9fa484d95f22448ea6b1279fad97ff52">★
                                                    <input type="hidden" class="hidden-input-9fa484d95f22448ea6b1279fad97ff52" value="0" name="q2[]"></span>
                                                <span onclick="qs1(4,'9fa484d95f22448ea6b1279fad97ff52')" class="star star-9fa484d95f22448ea6b1279fad97ff52">★
                                                    <input type="hidden" class="hidden-input-9fa484d95f22448ea6b1279fad97ff52" value="0" name="q2[]"></span>
                                                <span onclick="qs1(5,'9fa484d95f22448ea6b1279fad97ff52')" class="star star-9fa484d95f22448ea6b1279fad97ff52">★
                                                    <input type="hidden" class="hidden-input-9fa484d95f22448ea6b1279fad97ff52" value="0" name="q2[]"></span>
                                            </div>
                                        </div>

                                        <input type="hidden" name="review_ids" value="b9a23d299e254bf68f9fa340bfc52457">
                                        <div class="col-12">
                                            <p class="fw-bold">How satisfied were you with the overall service you received at our shop?</p>
                                            <div class="user-star">
                                                <span onclick="qs1(1,'b9a23d299e254bf68f9fa340bfc52457')" class="star star-b9a23d299e254bf68f9fa340bfc52457">★
                                                    <input type="hidden" class="hidden-input-b9a23d299e254bf68f9fa340bfc52457" value="0" name="q3[]"></span>
                                                <span onclick="qs1(2,'b9a23d299e254bf68f9fa340bfc52457')" class="star star-b9a23d299e254bf68f9fa340bfc52457">★
                                                    <input type="hidden" class="hidden-input-b9a23d299e254bf68f9fa340bfc52457" value="0" name="q3[]"></span>
                                                <span onclick="qs1(3,'b9a23d299e254bf68f9fa340bfc52457')" class="star star-b9a23d299e254bf68f9fa340bfc52457">★
                                                    <input type="hidden" class="hidden-input-b9a23d299e254bf68f9fa340bfc52457" value="0" name="q3[]"></span>
                                                <span onclick="qs1(4,'b9a23d299e254bf68f9fa340bfc52457')" class="star star-b9a23d299e254bf68f9fa340bfc52457">★
                                                    <input type="hidden" class="hidden-input-b9a23d299e254bf68f9fa340bfc52457" value="0" name="q3[]"></span>
                                                <span onclick="qs1(5,'b9a23d299e254bf68f9fa340bfc52457')" class="star star-b9a23d299e254bf68f9fa340bfc52457">★
                                                    <input type="hidden" class="hidden-input-b9a23d299e254bf68f9fa340bfc52457" value="0" name="q3[]"></span>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <p class="fw-bold">
                                                What would you like to see improved the most?
                                            </p>
                                            <textarea name="improvement_feedback" rows="3" class="form-control"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <p class="fw-bold">
                                                        Birthday
                                                    </p>
                                                    <input type="date" name="birthday" class="form-control">
                                                </div>
                                                <div class="col-6">
                                                    <p class="fw-bold">
                                                        Anniversary
                                                    </p>
                                                    <input type="date" name="birthday" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <input type="submit" class="btn btn-success w-100" value=" Submit feedback">
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
    <script>
        function qs1(n, questionId) {
            removeStars(".star-" + questionId);
            updateStars(n, ".star-" + questionId, questionId);
        }

        function removeStars(className) {
            const stars = document.querySelectorAll(className);
            stars.forEach((star) => star.classList.remove("golden"));
        }

        function updateStars(n, className, questionId) {
            const stars = document.querySelectorAll(className);
            const hiddenInput = document.querySelector(`.hidden-input-${questionId}`);

            for (let i = 0; i < n; i++) {
                stars[i].classList.add("golden");
            }

            // Update the value of the hidden input
            hiddenInput.value = n;
        }
    </script>

    <script>
        $(document).ready(function() {

            $.ajax({
                url: '/get_login_image',
                type: 'GET',
                dataType: 'json',
                success: function(data) {



                    var imagepath = data.logo_url;
                    $('#myImage').attr('src', imagepath);

                    var companyName = data.company_name; // Replace with the actual key in your data
                    $('#company_name_id').text(companyName);
                    $('#company_id').text(companyName);


                },
                error: function(xhr, status, error) {
                    console.log("hii")
                }
            });
        });
    </script>
</body>

</html>