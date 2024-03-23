<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="CodeHim">
    <title>Ratings | DEMO</title>
    <!-- Style CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/demo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>

<body>
    <form action="./ratingvalidte.php" method="POST">
        <main class="cd__main">
            <div class="wrapper">
                <div class="title">Rate your experience</div>
                <div class="content">How satisfied were you with the overall service you received at our shop?</div>
                <div class="rate-box">
                    <input type="radio" name="star" onclick="countUp('1')" id="star0" />
                    <label class="star" for="star0"></label>
                    <input type="radio" name="star" id="star1" />
                    <label class="star" for="star1"></label>
                    <input type="radio" name="star" id="star2" checked="checked" />
                    <label class="star" for="star2"></label>
                    <input type="radio" name="star" id="star3" />
                    <label class="star" for="star3"></label>
                    <input type="radio" name="star" id="star4" />
                    <label class="star" for="star4"></label>
                </div>


                <div class="content">How smooth and efficient was the checkout process at our shop?</div>
                <div class="rate-box1">
                    <input type="radio" name="star1" id="star01" />
                    <label class="star" for="star01"></label>
                    <input type="radio" name="star1" id="star11" />
                    <label class="star" for="star11"></label>
                    <input type="radio" name="star1" id="star22" checked="checked" />
                    <label class="star" for="star22"></label>
                    <input type="radio" name="star1" id="star33" />
                    <label class="star" for="star33"></label>
                    <input type="radio" name="star1" id="star34" />
                    <label class="star" for="star34"></label>
                </div>

                <div class="content">How helpful was our staff in assisting you with your purchase?</div>
                <div class="rate-box2">
                    <input type="radio" name="star5" id="star011" />
                    <label class="star" for="star011"></label>
                    <input type="radio" name="star5" id="star111" />
                    <label class="star" for="star111"></label>
                    <input type="radio" name="star5" id="star211" checked="checked" />
                    <label class="star" for="star211"></label>
                    <input type="radio" name="star5" id="star311" />
                    <label class="star" for="star311"></label>
                    <input type="radio" name="star5" id="star411" />
                    <label class="star" for="star411"></label>
                </div>



                <textarea cols="30" rows="6" placeholder="What would you like to see improved the most?"></textarea>
                <button class="submit-btn" type="button"> SEND </button>
            </div>
        </main>
    </form>

</body>

</html>