<?php
session_start();
function addToCart($Name, $qty)
{
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if (isset($_SESSION['cart'][$Name])) {
        $_SESSION['cart'][$Name] += $qty;
    } else {
        $_SESSION['cart'][$Name] = $qty;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'add_to_cart') {
        $Name = $_POST['product_id'];
        $qty = $_POST['qty'];
        addToCart($Name, $qty);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produkter</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>
    <nav>
        <a href="index.php" class="logo"><svg fill="#000000" height="50px" width="50px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 300 300" xml:space="preserve">
                <g>
                    <g>
                        <g>
                            <path d="M247.987,164.612c-2.912-7.044-11.956-11.137-31.225-14.131c-13.938-2.169-26.431-7.219-36.469-11.256l-0.072-0.029
                   c0.669-2.54,1.028-5.205,1.028-7.952c0-6.933-2.272-13.342-6.107-18.53c3.912-6.651,11.232-22.37,9.482-44.489
                   c-3.175-39.806-21.8-44.662-29.65-44.906c-5.162-0.25-8.994,1.356-11.594,4.556c-4.606,5.662-4.412,15.044,0.694,35.838
                   c3.006,12.281,3.525,24.8,3.919,34.862c0.022,0.505,0.044,0.998,0.066,1.491c-10.892,0.671-20.288,6.941-25.341,15.964
                   c-9.25,0.027-25.542,2.07-42.387,13.739c-16.125,11.144-24.612,21.25-25.956,30.881c-0.7,5.012,0.594,9.681,3.731,13.5
                   c1.087,1.344,4.425,5.412,10.287,5.956c0.438,0.044,0.894,0.063,1.344,0.063c6.794,0,15.15-4.663,28.238-15.681
                   c8.312-7.002,17.615-12.29,25.591-16.602c5.54,8.772,15.315,14.614,26.433,14.614c3.214,0,6.316-0.489,9.236-1.394
                   c8.044,11.489,20.424,21.242,33.833,26.494c9.925,3.9,18.419,5.863,25.737,5.863c10.919,0,19.219-4.375,25.713-13.25
                   C246.088,178.069,250.862,171.556,247.987,164.612z M152.844,35.931c0.013,0,0.444-0.225,1.725-0.131
                   c9.363,0.288,15.938,12.769,17.581,33.4c1.149,14.387-2.325,26.841-6.559,34.983c-1.568-0.907-3.219-1.687-4.943-2.313
                   c-0.055-1.219-0.106-2.485-0.166-3.801c-0.431-10.631-0.963-23.844-4.275-37.344C151.269,40.619,152.581,36.5,152.844,35.931z
                    M89.931,154.919c-14.138,11.888-19.038,12.825-20.381,12.744c-0.212-0.006-0.65-0.056-1.787-1.438
                   c-0.894-1.1-1.219-2.319-1.013-3.844c0.381-2.662,3.138-10.194,20.7-22.325c10.76-7.459,22.202-10.699,31.416-11.405
                   c-0.071,0.856-0.116,1.719-0.116,2.593c0,1.647,0.13,3.264,0.377,4.843C110.336,140.816,99.727,146.684,89.931,154.919z
                    M131.25,131.244c0-10.331,8.412-18.744,18.75-18.744s18.75,8.412,18.75,18.744c0,10.337-8.412,18.756-18.75,18.756
                   S131.25,141.581,131.25,131.244z M234.444,172.819c-3.75,5.1-10.05,13.638-36.813,3.144
                   c-14.26-5.588-23.069-15.183-27.364-20.955c1.614-1.379,3.085-2.918,4.39-4.594l0.981,0.393
                   c10.063,4.075,23.856,9.625,39.219,12.019c19.031,2.962,21.406,6.225,21.544,6.35C236.4,169.213,236.369,170.206,234.444,172.819
                   z" />
                            <path d="M281.25,131.263C281.25,58.888,222.369,0,150,0S18.75,58.887,18.75,131.263c0,53.044,31.63,98.837,77.015,119.516
                   C95.68,264.723,88.873,287.5,81.644,287.5c-3.462,0-6.25,2.794-6.25,6.25s2.788,6.25,6.25,6.25H150h74.331
                   c3.45,0,6.25-2.794,6.25-6.25s-2.794-6.25-6.25-6.25c-8.35,0-17.112-25.656-17.112-36.987c0-0.373-0.039-0.735-0.101-1.09
                   C250.954,228.144,281.25,183.176,281.25,131.263z M205.862,287.5H150H99.181c5.486-9.692,8.092-22.914,8.845-31.865
                   c13.185,4.462,27.302,6.883,41.974,6.883c15.788,0,30.933-2.804,44.966-7.937C195.88,263.187,199.366,277.287,205.862,287.5z
                    M150,250.019c-65.481,0-118.75-53.269-118.75-118.756S84.519,12.5,150,12.5s118.75,53.269,118.75,118.763
                   S215.481,250.019,150,250.019z" />
                        </g>
                    </g>
                </g>
            </svg></a>
        <ul class="nav-ulist">
            <li><a href="index.php">Hjem</a></li>
            <li><a href="produkter.html">Produkter</a></li>
            <li><a href="contact.html">Kontakt Oss</a></li>
        </ul>
        <div class="nav-icon-container">
            <form action="logout.php" method="post">
                <button type="submit">Logout</button>
                <ion-icon href="user.html" name="person-circle-outline" onlick="redirectUser()" id="btn-userpage" size="large"></ion-icon>
                <ion-icon hrer="cart.html" name="cart-outline" onclick="redirectCart()" id="btn-cart" size="large"></ion-icon>
            </form>
        </div>
        <div class="bx bx-menu" id="menu-icon" onlick="test()"></div>
    </nav>
    <div class="index-header">
        <h1>Våre produkter</h1>
    </div>
    <div class="product-main">
        <div class="products-container">
            <div class="product-child">
                <div class="product-card">
                    <img src="images/fan2.png" alt="Product 1">
                    <h3>Gulvvifte Svart</h3>
                    <p>FT-531 Gulvvifte fra NHC (Nordic Home Culture) er en kraftig gulvvifte.</p>
                    <p>350kr</p>
                    <form id="product1" class="add-to-cart-form" method="post">
                        <input type="hidden" name="action" value="add_to_cart">
                        <input type="hidden" name="product_id" value="Gulvvifte Svart">
                        <label for="qty">Antall:</label>
                        <select name="qty" id="qty1">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <button type="button" class="btn">Legg til i handlekurv</button>
                    </form>
                </div>
                <div class="product-card">
                    <img src="images/fan.png" alt="Product 2">
                    <h3>Gulvvifte Silver</h3>
                    <p>Mi Smart Fan 2 fra Xiaomi er en kraftig og allsidig smartvifte som er perfekt for bruk i alle
                        rom.</p>
                    <p>259kr</p>
                    <form id="product2" class="add-to-cart-form" method="post">
                        <input type="hidden" name="action" value="add_to_cart">
                        <input type="hidden" name="product_id" value="Gulvvifte Silver">
                        <label for="qty">Antall:</label>
                        <select name="qty" id="qty2">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <button type="submit" class="btn">Legg til i handlekurv</button>
                    </form>
                </div>
                <div class="product-card">
                    <img src="images/fan3.png" alt="Product 3">
                    <h3>Bordvifte 230mm Svart</h3>
                    <p>En skrivebordsvifte fra NORDIC HOME designet med komfort og stillhet i tankene.</p>
                    <p>289kr</p>
                    <form id="product3" class="add-to-cart-form" method="post">
                        <input type="hidden" name="action" value="add_to_cart">
                        <input type="hidden" name="product_id" value="Bordvifte 230mm Svart">
                        <label for="qty">Antall:</label>
                        <select name="qty" id="qty3">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <button type="submit" class="btn">Legg til i handlekurv</button>
                    </form>
                </div>
                <div class="product-card">
                    <img src="images/fan4.png" alt="Product 4">
                    <h3>Bordvifte USB 18CM</h3>
                    <p>Perfekt for varme sommerdager eller Lan. Bordmodell USB-vifte i aluminium med plastblader.</p>
                    <p>89kr</p>
                    <form id="product4" class="add-to-cart-form" method="post">
                        <input type="hidden" name="action" value="add_to_cart">
                        <input type="hidden" name="product_id" value="Bordvifte USB 18CM">
                        <label for="qty">Antall:</label>
                        <select name="qty" id="qty4">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <button type="submit" class="btn">Legg til i handlekurv</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="product-main">
        <div class="products-container">
            <div class="product-child">
                <div class="product-card">
                    <img src="images/fan5.png" alt="Product 1">
                    <h3>Mi Smart Standing Fan 2 - Gulvvifte</h3>
                    <p>Mi Smart Fan 2 fra Xiaomi er en kraftig og allsidig smartvifte som er perfekt for bruk i alle
                        rom.</p>
                    <p>899kr</p>
                    <form id="product5" class="add-to-cart-form" method="post">
                        <input type="hidden" name="action" value="add_to_cart">
                        <input type="hidden" name="product_id" value="Mi Smart Standing Fan 2 - Gulvvifte">
                        <label for="qty">Antall:</label>
                        <select name="qty" id="qty5">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <button type="submit" class="btn">Legg til i handlekurv</button>
                    </form>
                </div>
                <div class="product-card">
                    <img src="images/fan6.png" alt="Product 2">
                    <h3>Gulvvifte 400mm - Metal</h3>
                    <p>FT-564 Gulvvifte perfekt for varme sommerdager og Lan. </p>
                    <p>899kr</p>
                    <form id="product6" class="add-to-cart-form" method="post">
                        <input type="hidden" name="action" value="add_to_cart">
                        <input type="hidden" name="product_id" value="Gulvvifte 400mm - Metal">
                        <label for="qty">Antall:</label>
                        <select name="qty" id="qty6">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <button type="submit" class="btn">Legg til i handlekurv</button>
                    </form>
                </div>
                <div class="product-card">
                    <img src="images/fan7.png" alt="Product 3">
                    <h3>Gulvvifte 400mm - Lav støy - Hvit</h3>
                    <p>Gulvvifte FT-529 har en kraftig og energieffektiv 50 W motor</p>
                    <p>849kr</p>
                    <form id="product7" class="add-to-cart-form" method="post">
                        <input type="hidden" name="action" value="add_to_cart">
                        <input type="hidden" name="product_id" value="Gulvvifte 400mm - Lav støy - Hvit">
                        <label for="qty">Antall:</label>
                        <select name="qty" id="qty7">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <button type="submit" class="btn">Legg til i handlekurv</button>
                    </form>
                </div>
                <div class="product-card">
                    <img src="images/fan8.png" alt="Product 4">
                    <h3>Gulvvifte 400mm - Lav støy - Sort</h3>
                    <p>Gulvvifte FT-528 har en kraftig og energieffektiv 50 W </p>
                    <p>989kr</p>
                    <form id="product8" class="add-to-cart-form" method="post">
                        <input type="hidden" name="action" value="add_to_cart">
                        <input type="hidden" name="product_id" value="Gulvvifte 400mm - Lav støy - Sort">
                        <label for="qty">Antall:</label>
                        <select name="qty" id="qty8">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <button type="submit" class="btn">Legg til i handlekurv</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="product-main">
        <div class="products-container">
            <div class="product-child">
                <div class="product-card">
                    <img src="images/fan9.png" alt="Product 1">
                    <h3>FT-775 Trådløs USB-vifte - Hvit</h3>
                    <p>Leter du etter en kraftig, bærbar vifte for å beseire sommervarmen? Se ikke lenger enn USB-viften
                        FT-775 fra Nordic Home Culture.</p>
                    <p>499kr</p>
                    <form id="product9" class="add-to-cart-form" method="post">
                        <input type="hidden" name="action" value="add_to_cart">
                        <input type="hidden" name="product_id" value="FT-775 Trådløs USB-vifte - Hvit">
                        <label for="qty">Antall:</label>
                        <select name="qty" id="qty9">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <button type="submit" class="btn">Legg til i handlekurv</button>
                    </form>
                </div>
                <div class="product-card">
                    <img src="images/fan10.png" alt="Product 2">
                    <h3>FT-771 Trådløs Bærbar bordvifte - Hvit</h3>
                    <p>Den trådløse viften FT-771 fra Nordic Home Culture er en praktisk løsning for å holde seg kjølig
                        på varme sommerdager.</p>
                    <p>249kr</p>
                    <form id="product10" class="add-to-cart-form" method="post">
                        <input type="hidden" name="action" value="add_to_cart">
                        <input type="hidden" name="product_id" value="FT-771 Trådløs Bærbar bordvifte - Hvit">
                        <label for="qty">Antall:</label>
                        <select name="qty" id="qty10">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <button type="submit" class="btn">Legg til i handlekurv</button>
                    </form>
                </div>
                <div class="product-card">
                    <img src="images/fan.png" alt="Product 3">
                    <h3>Bordvifte 230mm Hvit</h3>
                    <p>En skrivebordsvifte fra NORDIC HOME designet med komfort og stillhet i tankene.</p>
                    <p>199kr</p>
                    <form id="product11" class="add-to-cart-form" method="post">
                        <input type="hidden" name="action" value="add_to_cart">
                        <input type="hidden" name="product_id" value="Bordvifte 230mm Hvit">
                        <label for="qty">Antall:</label>
                        <select name="qty" id="qty11">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <button type="submit" class="btn">Legg til i handlekurv</button>
                    </form>
                </div>
                <div class="product-card">
                    <img src="images/fan12.png" alt="Product 4">
                    <h3>GXT 278 Notebook Cooling Stand</h3>
                    <p>Avkjølingstativ for spilling på bærbare datamaskiner med belyste vifter som har fire hastigheter
                        og et solid hus</p>
                    <p>339kr</p>
                    <form aid="product12" class="add-to-cart-form" method="post">
                        <input type="hidden" name="action" value="add_to_cart">
                        <input type="hidden" name="product_id" value="GXT 278 Notebook Cooling Stand">
                        <label for="qty">Antall:</label>
                        <select name="qty" id="qty12">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <button type="submit" class="btn">Legg til i handlekurv</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="../js/cart.js"></script>
    <script>
        AOS.init();

        function addToCartFromProductPage(Name, productName, productPrice) {
            addToCart(Name);
        }

        updateCartCount();
    </script>
    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>