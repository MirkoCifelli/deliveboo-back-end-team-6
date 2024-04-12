<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuovo Email da: @yield('email')</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
            font-weight: 500;
            font-style: normal;
        }
        body{
            background: linear-gradient(135deg, hsla(0, 0%, 100%, 1) 0%, hsla(293, 39%, 84%, 1) 100%);
        }

        .container{
            max-width: 1000px;
            margin: 0 auto;
        }

        section{
            height: 100vh;
            padding-top: 80px;
        }

        h1, span, li{
            margin-bottom: 20px
        }

        h1{
            text-align: center;
        }

        ul{
            list-style-type: none;
        }
    </style>

</head>
<body>
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
</body>
</html>