<x-app-layout>
    <div class="py-12" style="height: 80vh; display: flex; justify-content: center; align-items: center;">
        <div class="w3-content" style="max-width: 1000px; position: relative; text-align: center;">
            <img class="mySlides w3-animate-opacity sm:rounded-lg" src="/webim/ad1.png" style="width:100%; height: 80vh; object-fit: contain;">
            <img class="mySlides w3-animate-opacity sm:rounded-lg" src="/webim/ad2.png" style="width:100%; height: 80vh; object-fit: contain;">
            <img class="mySlides w3-animate-opacity sm:rounded-lg" src="/webim/ad3.png" style="width:100%; height: 80vh; object-fit: contain;">
            <img class="mySlides w3-animate-opacity sm:rounded-lg" src="/webim/ad4.png" style="width:100%; height: 80vh; object-fit: contain;">
            <img class="mySlides w3-animate-opacity sm:rounded-lg" src="/webim/ad5.png" style="width:100%; height: 80vh; object-fit: contain;">

            <div style="text-align:center; margin-top: 10px;">
                <span class="dot" onclick="currentDiv(1)"></span>
                <span class="dot" onclick="currentDiv(2)"></span>
                <span class="dot" onclick="currentDiv(3)"></span>
                <span class="dot" onclick="currentDiv(4)"></span>
                <span class="dot" onclick="currentDiv(5)"></span>
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
    </div>

    <div class="max-w-10xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($products as $product)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md transition-transform transform hover:-translate-y-2 hover:shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="w3-center">
                            <img src="{{ asset('storage/' . $product->Photo) }}" style="width: 400px; display: block; margin: 0 auto;" alt="{{ $product->ProductName }}">
                            <h3 class="mt-2">{{ $product->ProductName }}</h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
