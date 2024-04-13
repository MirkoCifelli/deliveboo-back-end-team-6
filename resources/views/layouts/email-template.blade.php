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
    color: white;
    }
    body{
        background-image: url('{{ asset("img/tile_background.png") }}');
    }

    .container{
    max-width: 60%;
    margin: 0 auto;
    padding: 24px;
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

    .bottom{
    padding: 16px;
    background-color: lightgray;
    min-height: 500px;
    display:flex;
    flex-direction: column;
    }

    span{
    color: black;
    }

    ul{
    flex-grow: 1;
    }

    li{
    text-align: center;
    padding: 8px;
    background-color: gray;
    display:  flex;
    justify-content: space-between;
    }

    li>div>span{
    color: white;
    }

    .final-price > span{
    font-size: 1.5rem;
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