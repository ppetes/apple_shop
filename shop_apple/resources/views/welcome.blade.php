<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>KIWIStore</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            body {font-family: "Raleway", Arial, Helvetica, sans-serif;}
                h1, h2, h3, h4, h5, h6 {
                font-family: "Raleway";
                letter-spacing: 5px;
            }
            .custom-font {
                font-family: Courier, monospace; /* Change to your desired font */
            font-weight: 500; /* If you want the font to be bold */
        }

        .logo-container {
    margin-left: 30px; /* เพิ่มระยะห่างทางซ้าย */
}


        </style>
    </head> 

    <nav style="height: 180px;">               
    <!-- <div class="w3-top"> -->
        <div class="w3-bar w3-black w3-padding w3-card dark:bg-black" 
             style="font-size: 18px; letter-spacing:4px; display: flex; justify-content: flex-start; align-items: center;  
                    position: absolute; top: 0; left: 0; right: 0; z-index: 10; background-color: rgba(255, 255, 255, 0.8); box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.9); ">
            <!-- Logo -->
            <div class="shrink-0">
                    <a href="/">
                    <img src="/webim/Logo.png" style="width: 120px; display: block; margin: 0 auto;">
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
            
                <a href="/cart" class="flex items-center w3-center" style="color: gray; text-decoration: none; width: 70px;" onmouseover="this.style.color='white'" onmouseout="this.style.color='gray'">
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
                           class="custom-font rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 
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

</nav>

<!-- Header -->
 <div style="background-color:#ffffff;">

 <!-- ส่วนของแถบค้นหา -->
<div style="width: 100%; background-color:#ffffff; padding: 20px 0; text-align: center; display: block; clear: both;">
    <input type="text" placeholder="Search..." 
        style="width: 60%; padding: 10px; font-size: 18px; border: 1px solid #ccc; border-radius: 5px;">
    <button style="padding: 10px 20px; font-size: 18px; border: none; background-color: #333; color: white; border-radius: 5px;">
    <i class="fa fa-search"></i> <!-- ไอคอนค้นหาจาก Font Awesome -->
    </button>
</div><br>

<div class="w3-display-container w3-content w3-wide" style="max-width:900px;min-width:500px;" id="home">
    <div class="w3-content" style="width: 100%; height: 100%; position: relative; text-align: center;">
        <img class="mySlides w3-animate-opacity sm:rounded-lg" src="/webim/ad1.png" style="width:100%; height: auto; object-fit: cover;">
        <img class="mySlides w3-animate-opacity sm:rounded-lg" src="/webim/ad2.png" style="width:100%; height: auto; object-fit: cover;">
        <img class="mySlides w3-animate-opacity sm:rounded-lg" src="/webim/ad3.png" style="width:100%; height: auto; object-fit: cover;">
        <img class="mySlides w3-animate-opacity sm:rounded-lg" src="/webim/ad4.png" style="width:100%; height: auto; object-fit: cover;">
        <img class="mySlides w3-animate-opacity sm:rounded-lg" src="/webim/ad5.png" style="width:100%; height: auto; object-fit: cover;">

        <div style="text-align:center; margin-top: 10px;">
            <span class="dot" onclick="currentDiv(1)"></span>
            <span class="dot" onclick="currentDiv(2)"></span>
            <span class="dot" onclick="currentDiv(3)"></span>
            <span class="dot" onclick="currentDiv(4)"></span>
            <span class="dot" onclick="currentDiv(5)"></span>
        </div>
    </div>
    <div class="w3-display-bottomleft w3-padding-large w3-opacity">
        <h1 class="w3-xlarge">KIWI Store</h1>
    </div>
</div>

    <script>
        let slideIndex = 0;
        showDivs();

        function currentDiv(n) {
            slideIndex = n - 1;
            showDivs();
        }

        function showDivs() {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1; }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showDivs, 4000); // Change image every 4 seconds
        }
    </script>
<br><br>
<footer class="w3-container w3-black" style="padding:32px">
  <a href="#" class="w3-button w3-white w3-padding-large w3-margin-bottom"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <p>Made by <a target="_blank">KIWI Store</a></p>
</footer>
      
</html>
