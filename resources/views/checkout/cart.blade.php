<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/co-style.css') }}">
</head>

<body>

    <div class="container">
        <header>
            <h1>LIST PRODUCT</h1>
            <div class="iconCart">
                <img src="{{ asset('img/cart.png') }}">
                <div class="totalQuantity">0</div>
            </div>
        </header>

        <div class="listProduct">

            <div class="item">
                <img src="{{ asset('img/mochi.jpg') }}">
                <h2>Mochi</h2>
                <div class="price">IDR 11.000</div>
                <button>Add To Cart</button>
            </div>

            <div class="item">
                <img src="{{ asset('img/mochi.jpg') }}">
                <h2>Mochi</h2>
                <div class="price">IDR 11.000</div>
                <button>Add To Cart</button>
            </div>

            <div class="item">
                <img src="{{ asset('img/mochi.jpg') }}">
                <h2>Mochi</h2>
                <div class="price">IDR 11.000</div>
                <button>Add To Cart</button>
            </div>

        </div>
    </div>

    <div class="cart">
        <h2>
            CART
        </h2>

        <div class="listCart">


            <div class="item">
                <img src="images/1.webp">
                <div class="content">
                    <div class="name">CoPilot / Black / Automatic</div>
                    <div class="price">$550 / 1 product</div>
                </div>
                <div class="quantity">
                    <button>-</button>
                    <span class="value">3</span>
                    <button>+</button>
                </div>
            </div>


        </div>

        <div class="buttons">
            <div class="close">
                CLOSE
            </div>
            <div class="checkout">
                <a href="checkout.html">CHECKOUT</a>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/co-app.js') }}"></script>

</body>

</html>
