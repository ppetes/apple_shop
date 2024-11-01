<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl md:text-4xl text-gray-800 dark:text-gray-200 leading-tight text-center" style="font-family: 'Poppins', sans-serif;">
            Watch
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto text-center">
                        @if($products->isEmpty())
                            <p class="text-center font-semibold">No Watch products available.</p>
                        @else
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                                @foreach($products as $product)
                                    <div class="bg-gray-100 dark:bg-gray-700 p-6 border border-gray-300 dark:border-gray-600 rounded-lg shadow-lg transition-transform transform hover:scale-105 flex flex-col justify-between h-full">
                                        <!-- Product Photo -->
                                        <div class="product-photo mb-4">
                                           <img src="{{ $product->photos->first() ? asset('storage' . $product->Photo) : asset('default.jpg') }}"
                                                 alt="{{ $product->ProductName }}" 
                                                 class="w-full h-64 object-cover rounded-lg">
                                        </div>
                                        
                                        <!-- Product Name -->
                                        <h3 class="text-xl font-bold mb-2">{{ $product->ProductName }}</h3>

                                        <!-- Price -->
                                        <p class="text-gray-600 dark:text-gray-300 mb-4">Price: ฿{{ number_format($product->variants->min('Price'), 2) }}</p>

                                        <!-- Buy Button -->
                                        <a href="/product/{{ $product->ProductID }}" 
                                           class="inline-block bg-gray-400 hover:bg-black text-white font-bold py-2 px-4 rounded-lg transition duration-200">
                                            Buy
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
