<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopHear</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script></script>

    <style>
        .items img{
            height: 150px;
            width: 150px;
            border-style: solid;
        }
        .grid-item{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Speech Recognition Shopping</h1>
    <button id="startButton">Start Speech Recognition</button>
    <div id="output"></div>
    <div id="result"></div>

    <h2>Available Items</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul id="itemsList1" class="items">
                    <div class="grid-item" data-name="glasses" data-price="50">
                        <img src="glasses.jpg" alt="glasses">
                        <p>glasses - 50</p>
                    </div>
                </ul>
            </div>
            <div class="col-md-3">
                <ul id="itemsList2" class="items">
                    <div class="grid-item" data-name="aviator" data-price="100">
                        <img src="glasses.jpg" alt="aviator">
                        <p>aviator - 100</p>
                    </div>
                </ul>
            </div>
            <div class="col-md-3">
                <ul id="itemsList3" class="items">
                    <div class="grid-item" data-name="brow" data-price="150">
                        <img src="glasses.jpg" alt="brow">
                        <p>glasses 3 - 150</p>
                    </div>
                </ul>
            </div>
            <div class="col-md-3">
                <ul id="itemsList4" class="items">
                    <div class="grid-item" data-name="four" data-price="200">
                        <img src="glasses.jpg" alt="four">
                        <p>glasses 4 - 200</p>
                    </div>
                </ul>
            </div>
        </div>
    </div>
    

    <h2>Cart</h2>
    <ul id="cart"></ul>

    <script src="script.js"></script>
</body>
</html>
