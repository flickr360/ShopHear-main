<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopHear</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <style>
        html, body{
            width: 100%;
            height: 100%;
            font-family: "Outfit", sans-serif;
            font-optical-sizing: auto;
            font-weight: 200;
            font-style: normal;
            color: #282828;
        }
        body{
            background-image: url("assets/background.jpg");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .items img{
            height: 150px;
            width: 150px;
            border-radius: 10px;
        }
        .grid-item{
            text-align: center;
        }
        .navbar-brand {
            margin-left: 20px; 
        }

        .cart-container{
            margin-right: 30px;
        }
        #cart-button{
            font-size: 30px;
        }
        .navbar{
            background-color: rgb(45, 27, 84);
            color: #ffffff;
            position: sticky;
            top: 0;
            z-index: 3;
        }
        .brandname{
            float: right;
            font-size: 30px;
            margin-left: 10px;
            margin-top: 3px;
            color: #ffffff;
        }
        .items {
            :root {
                font-size: 20px;
            }
        
            *,
            *:before,
            *:after {
                box-sizing: border-box;
            }
        
            p {
                margin: 0;
            }
        
            body {
                font: 1em/1.618 Inter, sans-serif;
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
                padding: 30px;
                margin: 0;
                color: #224;
                background: url(https://source.unsplash.com/E8Ufcyxz514/2400x1823) center / cover no-repeat fixed;
            }
        
            .grid-item {
                max-width: 300px;
                min-height: 200px;
                display: flex;
                flex-direction: column;
                align-items: center;
                margin: 15px;
                max-width: 500px;
                height: 400px;
                padding: 35px;
                border: 1px solid rgba(255, 255, 255, 0.116);
                border-radius: 20px;
                background-color: rgba(255, 255, 255, 0.221);
                box-shadow: 0 0 20px 5px rgba(0, 0, 0, 0.25);
                backdrop-filter: blur(15px);
                transition: transform 0.1s ease-in-out;
            }
        
            .grid-item img {
                transition: transform 0.1s ease-in-out; /* Add transition to image */
            }
        
            .grid-item:hover img {
                transform: scale(1.1); /* Enlarge the image on hover */
            }
        }
        
        .greetings{
            text-align: center;
        }
        #instruction{
            margin-top: 25px;
            font-size: 50px;
        }
        #available-items{
            margin-top: 30px;
            margin-bottom: 15px;
            font-size: 40px;
        }
        .grid-item p{
            font-size: 20px;
        }
        .indicator {
            margin-top: 20px;
            margin-right: 20px;
            background: transparent;
            border: none;
            float: right;
            position: sticky;
        }
        
        .indicator img {
            height: 80px; 
            width: auto; 
            z-index: 0;
        }
        .cartbtn{
            margin-top: 15px;
            appearance: none;
            background-color: transparent;
            border: 2px solid #1A1A1A;
            border-radius: 15px;
            box-sizing: border-box;
            color: #3B3B3B;
            cursor: pointer;
            display: inline-block;
            font-family: Roobert,-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
            font-size: 15px;
            font-weight: 600;
            line-height: normal;
            min-height: 30px;
            min-width: 40px;
            outline: none;
            text-align: center;
            text-decoration: none;
            transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            width: 120px;
            will-change: transform;
            }

            .cartbtn:disabled {
            pointer-events: none;
            }

            .cartbtn:hover {
            color: #fff;
            background-color: #642a94;
            box-shadow: rgba(149, 48, 221, 0.25) 0 8px 15px;
            transform: translateY(-2px);
            }

            .cartbtn:active {
            box-shadow: none;
            transform: translateY(0);
            }

    </style>
</head>
<body>

<nav class="navbar navbar-light">
  <a class="navbar-brand" href="#">
    <img src="assets/logo.png" width="50" height="50">
    <h1 class="brandname">ShopHear</h1>
  </a>
  <div class="cart-container">
        <a href="cart.php">
            <i class="bi bi-bag-fill" id="cart-button"></i>
        </a>    
</div>
</nav>

    <button class="indicator" id="startButton">
        <img src="assets/metal ball.png" alt="Recording Icon">
    </button>

    <div class="greetings">
    <p id="instruction">Press Spacebar and say "add <strong>item</strong> to cart".</hp> 
    <p></p>
    <p id="available-items">Available Items</p>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul id="itemsList1" class="items">
                    <div class="grid-item" data-name="retro" data-price="50">
                        <img src="assets/1.png" alt="glasses">
                        <h1>retro</h1>
                        <p>₱50</p>
                        <div class="quantity-selector">
                            <label>Quantity:</label>
                            <input type="number" id="quantity_retro" class="quantity">
                        </div>
                        <button class="cartbtn" onclick="addToCartButton('retro')">Add to Cart</button>
                    </div>
                </ul>
            </div>
            <div class="col-md-3">
                <ul id="itemsList2" class="items">
                    <div class="grid-item" data-name="trendy" data-price="100">
                        <img src="assets/2.png" alt="trendy">
                        <h1>trendy</h1>
                        <p>₱100</p>
                        <div class="quantity-selector">
                            <label>Quantity:</label>
                            <input type="number" id="quantity_trendy" class="quantity">
                        </div>
                        <button class="cartbtn" onclick="addToCartButton('trendy')">Add to Cart</button>
                    </div>
                </ul>
            </div>
            <div class="col-md-3">
                <ul id="itemsList3" class="items">
                    <div class="grid-item" data-name="urban" data-price="150">
                        <img src="assets/3.png" alt="urban">
                        <h1>urban</h1>
                        <p>₱150</p>
                        <div class="quantity-selector">
                            <label>Quantity:</label>
                            <input type="number" id="quantity_urban" class="quantity">
                        </div>
                        <button class="cartbtn" onclick="addToCartButton('urban')">Add to Cart</button>
                    </div>
                </ul>
            </div>
            <div class="col-md-3">
                <ul id="itemsList4" class="items">
                    <div class="grid-item" data-name="funky" data-price="200">
                        <img src="assets/4.png" alt="funky">
                        <h1>funky</h1>
                        <p>₱200</p>
                        <div class="quantity-selector">
                            <label>Quantity:</label>
                            <input type="number" id="quantity_funky" class="quantity">
                        </div>
                        <button class="cartbtn" onclick="addToCartButton('funky')">Add to Cart</button>
                    </div>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <ul id="itemsList5" class="items">
                    <div class="grid-item" data-name="sharp" data-price="50">
                        <img src="assets/5.png" alt="sharp">
                        <h1>sharp</h1>
                        <p>₱50</p>
                        <div class="quantity-selector">
                            <label>Quantity:</label>
                            <input type="number" id="quantity_sharp" class="quantity">
                        </div>
                        <button class="cartbtn" onclick="addToCartButton('sharp')">Add to Cart</button>
                    </div>
                </ul>
            </div>
            <div class="col-md-3">
                <ul id="itemsList6" class="items">
                    <div class="grid-item" data-name="iconic" data-price="100">
                        <img src="assets/6.png" alt="iconic">
                        <h1>iconic</h1>
                        <p>₱100</p>
                        <div class="quantity-selector">
                            <label>Quantity:</label>
                            <input type="number" id="quantity_iconic" class="quantity">
                        </div>
                        <button class="cartbtn" onclick="addToCartButton('iconic')">Add to Cart</button>
                    </div>
                </ul>
            </div>
            <div class="col-md-3">
                <ul id="itemsList7" class="items">
                    <div class="grid-item" data-name="fashion" data-price="150">
                        <img src="assets/7.png" alt="fashion">
                        <h1>fashion</h1>
                        <p>₱150</p>
                        <div class="quantity-selector">
                            <label>Quantity:</label>
                            <input type="number" id="quantity_fashion" class="quantity">
                        </div>
                        <button class="cartbtn" onclick="addToCartButton('fashion')">Add to Cart</button>
                    </div>
                </ul>
            </div>
            <div class="col-md-3">
                <ul id="itemsList8" class="items">
                    <div class="grid-item" data-name="classy" data-price="200">
                        <img src="assets/8.png" alt="classy">
                        <h1>classy</h1>
                        <p>₱200</p>
                        <div class="quantity-selector">
                            <label>Quantity:</label>
                            <input type="number" id="quantity_classy" class="quantity">
                        </div>
                        <button class="cartbtn" onclick="addToCartButton('classy')">Add to Cart</button>
                    </div>
                </ul>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
