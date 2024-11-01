<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KIWI Store</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {font-family: "Raleway", Arial, Helvetica, sans-serif;}
        h1, h2, h3, h4, h5, h6 {
            font-family: "Raleway";
            letter-spacing: 5px;
        }
        .custom-font {
            font-family: Courier, monospace;
            font-weight: 500;
        }
        .logo-container {
            margin-left: 30px;
        }
        .product {
            display: block; /* Show all products by default */
        }
        .visible {
            display: block; /* Show matching products */
        }
        .not-found {
            display: none; /* Hide by default */
            color: red; /* Style as needed */
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <nav style="height: 180px;">
        <div class="w3-bar w3-black w3-padding w3-card dark:bg-black" 
             style="font-size: 18px; letter-spacing:4px; display: flex; justify-content: flex-start; align-items: center;  
                    position: absolute; top: 0; left: 0; right: 0; z-index: 10; background-color: rgba(255, 255, 255, 0.8); box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.9); ">
            <!-- Logo -->
            <div class="shrink-0">
                <a href="/">
                    <img src="/webim/Logo.png" style="width: 150px; display: block; margin: 0 auto;">
                </a>
            </div>

            <div class="w3-right w3-hide-small" style="display: flex; gap: 15px; align-items: center; text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2); font-family: Courier, monospace;">
                <br>
                <a href="register" class="w3-bar-item" style="text-decoration: none;" onmouseover="this.style.fontWeight='bold'" onmouseout="this.style.fontWeight='normal'">iPhone</a>
                <a href="register" class="w3-bar-item" style="text-decoration: none;" onmouseover="this.style.fontWeight='bold'" onmouseout="this.style.fontWeight='normal'">iPad</a>
                <a href="register" class="w3-bar-item" style="text-decoration: none;" onmouseover="this.style.fontWeight='bold'" onmouseout="this.style.fontWeight='normal'">AirPods</a>
                <a href="register" class="w3-bar-item" style="text-decoration: none;" onmouseover="this.style.fontWeight='bold'" onmouseout="this.style.fontWeight='normal'">Mac</a>
                <a href="register" class="w3-bar-item" style="text-decoration: none;" onmouseover="this.style.fontWeight='bold'" onmouseout="this.style.fontWeight='normal'">TV</a>
                <a href="register" class="w3-bar-item" style="text-decoration: none;" onmouseover="this.style.fontWeight='bold'" onmouseout="this.style.fontWeight='normal'">Watch</a>
                <a href="register" class="w3-bar-item" style="text-decoration: none;" onmouseover="this.style.fontWeight='bold'" onmouseout="this.style.fontWeight='normal'">Accessories</a>

                <a href="register" class="flex items-center w3-center" style="color: gray; text-decoration: none; width: 70px;" onmouseover="this.style.color='white'" onmouseout="this.style.color='gray'">
                    <i class="fa fa-shopping-cart" style="font-size: 24px;"></i>
                </a>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" 
                           class="custom-font rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 
                                  focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 
                                  dark:focus-visible:ring-white w3-bar-item w3-button"
                        >
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                            class="custom-font rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-gray-300 
                                    focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white 
                                    dark:focus-visible:ring-white w3-bar-item w3-button w3-round-medium"
                            style="letter-spacing: 2px;" onmouseover="this.style.fontWeight='700'" 
                            onmouseout="this.style.fontWeight='500'">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" 
                            class="custom-font rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 
                                    focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white
                                    dark:focus-visible:ring-white w3-bar-item w3-button w3-center" 
                            style="border: 2px solid white; color: white; border-radius: 5px; padding: 10px 20px; letter-spacing: 2px; " 
                            onmouseover="this.style.fontWeight='700'" 
                            onmouseout="this.style.fontWeight='500'">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav><br>

    <!-- Header -->
    <div style="background-color:#ffffff;">

    <div class="w3-display-container w3-content w3-wide" style="max-width:900px;min-width:500px;" id="home">
            <div class="w3-content" style="width: 100%; height: 100%; position: relative; text-align: center;">
                <img class="mySlides w3-animate-opacity sm:rounded-lg" src="/webim/ad1.png" style="width:100%; height: auto; object-fit: cover;">
                <img class="mySlides w3-animate-opacity sm:rounded-lg" src="/webim/ad2.png" style="width:100%; height: auto; object-fit: cover;">
                <img class="mySlides w3-animate-opacity sm:rounded-lg" src="/webim/ad3.png" style="width:100%; height: auto; object-fit: cover;">
                <img class="mySlides w3-animate-opacity sm:rounded-lg" src="/webim/ad4.png" style="width:100%; height: auto; object-fit: cover;">
                <img class="mySlides w3-animate-opacity sm:rounded-lg" src="/webim/ad5.png" style="width:100%; height: auto; object-fit: cover;">
                <div class="w3-container w3-bottom w3-center w3-opacity w3-hover-opacity-off">
                    <div style="width: 100%; display: flex; justify-content: center;">
                        <span class="dot" onclick="currentDiv(1)"></span>
                        <span class="dot" onclick="currentDiv(2)"></span>
                        <span class="dot" onclick="currentDiv(3)"></span>
                        <span class="dot" onclick="currentDiv(4)"></span>
                        <span class="dot" onclick="currentDiv(5)"></span>
                    </div>
                </div>
            </div>
        </div>
        <div id="notFoundMessage" class="not-found" style="font-family: 'Poppins', sans-serif; letter-spacing: 3px;">Not Found "input"</div>
        <!-- Search Bar -->
        <div style="width: 100%; background-color:#ffffff; padding: 20px 0; text-align: center; letter-spacing: 3px;">
            <input type="text" id="searchInput" placeholder="Search..." 
                style="width: 60%; padding: 10px; font-size: 18px; border: 1px solid #ccc; border-radius: 5px;">
            <button onclick="searchProducts()" style="padding: 10px 20px; font-size: 18px; border: none; background-color: #333; color: white; border-radius: 5px;">
                <i class="fa fa-search"></i> <!-- Search icon from Font Awesome -->
            </button>
        </div>

        <script>
            let slideIndex = 0;
            showSlides();
            

            function showSlides() {
                const slides = document.getElementsByClassName("mySlides");
                const dots = document.getElementsByClassName("dot");
                for (let i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";  
                }
                slideIndex++;
                if (slideIndex > slides.length) {slideIndex = 1}    
                for (let i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" w3-red", "");
                }
                slides[slideIndex - 1].style.display = "block";  
                dots[slideIndex - 1].className += " w3-red";
                setTimeout(showSlides, 3000); // Change image every 3 seconds
            }

            function currentDiv(n) {
                showSlides(slideIndex = n);
            }

            function searchProducts() {
                const input = document.getElementById('searchInput').value.toLowerCase();
                const products = document.querySelectorAll('.product');
                const notFoundMessage = document.getElementById('notFoundMessage');

                let found = false; // Flag to check if any products were found

                products.forEach(product => {
                    const productName = product.querySelector('h3').innerText.toLowerCase();
                    // Check if the product name includes the input value
                    if (productName.includes(input)) {
                        product.classList.add('visible');
                        product.style.display = 'block'; // Show product
                        found = true; // Product is found
                    } else {
                        product.classList.remove('visible');
                        product.style.display = 'none'; // Hide product
                    }
                });

                // Show or hide the not found message based on the search results
                if (found) {
                    notFoundMessage.style.display = 'none'; // Hide not found message
                } else {
                    notFoundMessage.innerText = `Not Found "${input}"`;
                    notFoundMessage.style.display = 'block'; // Show not found message
                }
            }
        </script>

        <!-- Product Grid -->
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($products as $product)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md transition-transform transform hover:-translate-y-2 hover:shadow-lg sm:rounded-lg product visible"> <!-- Add visible class here -->
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="w3-center">
                            <a href="register" >
                                <img src="{{ asset('storage/' . $product->Photo) }}" style="width: 100%; max-width: 400px; display: block; margin: 0 auto;" alt="{{ $product->ProductName }}">
                                <h3 class="mt-2 text-center" style="font-family: 'Poppins', sans-serif; letter-spacing: 2px;">{{ $product->ProductName }}</h3>
                                <p class="text-gray-600 dark:text-gray-300 mb-4">Price: ฿{{ number_format($product->variants->min('Price'), 2) }}</p>
                            </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Not Found Message -->
            <!-- <div id="notFoundMessage" class="not-found" style="font-family: 'Poppins', sans-serif; letter-spacing: 3px;">Not Found "input"</div> -->
        </div>
    </div>
</body>
</html>
<!-- 216บรรทัด -->