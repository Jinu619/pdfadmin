<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SVJG | DEMO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import "bourbon";

        body {
            background: #eee !important;
        }

        .wrapper {
            margin-top: 80px;
            margin-bottom: 80px;
        }

        .form-signin {
            max-width: 380px;
            padding: 15px 35px 45px;
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, 0.1);

            .form-signin-heading,
            .checkbox {
                margin-bottom: 30px;
            }

            .checkbox {
                font-weight: normal;
            }

            .form-control {
                position: relative;
                font-size: 16px;
                height: auto;
                padding: 10px;
                @include box-sizing(border-box);

                &:focus {
                    z-index: 2;
                }
            }

            input[type="text"] {
                margin-bottom: -1px;
                border-bottom-left-radius: 0;
                border-bottom-right-radius: 0;
            }

            input[type="password"] {
                margin-bottom: 20px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }
        }
    </style>
</head>

<body>


    <div class="wrapper">
        <form class="form-signin" action="type_validate.php" method="POST">
            <h2 class="form-signin-heading">SEND WHATSAPP MESSAGE</h2>
            <label for="phone" class="form-label">Phone Number(followed by country code)</label>
            <input type="text" class="form-control" name="phone" placeholder="919998887776" required="" autofocus="" />
            <div class="row mt-3">
                <div class="col-4 ml-2">
                    <button class="btn btn-lg btn-danger btn-block" type="submit" value="1" name="submit">Invoice</button>
                </div>
                <div class="col-4 ml-2">
                    <button class="btn btn-lg btn-success btn-block" type="submit" value="2" name="submit">Review</button>
                </div>
                <div class="col-4 ml-2">
                    <button class="btn btn-lg btn-warning btn-block" type="submit" value="3" name="submit">Ticket</button>
                </div>


            </div>
        </form>
    </div>
</body>

</html>