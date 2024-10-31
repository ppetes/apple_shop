<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            iPad Products
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto">
                        @if($products->isEmpty())
                            <p class="text-center">No ipad products available.</p>
                        @else
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($products as $product)
                                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                                        <!-- Product Photo -->
                                        <div class="product-photo mb-4">
                                           <img src="{{ $product->photos->first() ? asset('storage' . $product->Photo) : asset('default.jpg') }}"
                                                 alt="{{ $product->ProductName }}" 
                                                 class="w-full h-48 object-cover rounded-lg">
                                        </div>
                                        
                                        
                                        <!-- Product Name -->
                                        <h3 class="text-xl font-bold">{{ $product->ProductName }}</h3>
                                        
                                        <!-- Variants and Price -->
                                        <!-- <p class="text-gray-600 dark:text-gray-300">Variants:</p> -->
                                        <!-- <div class="flex space-x-2 mb-2">
                                            @foreach($product->variants->sortBy('Color') as $variant)
                                                <div class="w-6 h-6 rounded-full" style="background-color: {{ $variant->Color }};" title="{{ $variant->Color }}"></div>
                                            @endforeach
                                        </div> -->
                                        <p class="text-gray-600 dark:text-gray-300">Price: ฿{{ number_format($product->variants->min('Price'), 2) }}</p>
                                        


                                        <!-- Buy Button -->
                                        <a href="/product/{{ $product->ProductID }}" 
                                        class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg mt-4">
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
