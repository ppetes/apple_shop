<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ $product->ProductName }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto">
                        <!-- <div class="product-header text-center mb-6">
                            <h1 class="text-2xl font-bold">{{ $product->ProductName }}</h1>
                        </div> -->

                        <div class="product-photo mx-auto mb-6" style="max-width: 400px;">
                            <img id="product-image" src="{{ $defaultPhotoPath }}" alt="{{ $product->ProductName }}" style="width: 100%;" class="rounded-lg ">
                        </div>

                        <div class="variants flex flex-wrap gap-2 justify-center mb-6">
                            @foreach($product->variants as $variant)
                                @if($variant->Storage == 0)
                                    <button class="variant-button px-4 py-2 bg-gray-200 dark:bg-black rounded-md hover:bg-gray-300 dark:hover:bg-gray-600 transition"
                                            onclick="changePhoto('{{ $variant->VariantID }}')">
                                        {{ $variant->Color }}
                                    </button>
                                @else
                                    <button class="variant-button px-4 py-2 bg-gray-200 dark:bg-black rounded-md hover:bg-gray-300 dark:hover:bg-gray-600 transition"
                                            onclick="changePhoto('{{ $variant->VariantID }}')">
                                        {{ $variant->Color }} - {{ $variant->Storage }}GB
                                    </button>
                                @endif
                            @endforeach
                        </div>

                        <div class="price text-center text-2xl font-bold mb-4" id="product-price">
                            ฿{{ number_format($product->variants->first()->Price, 2) }}
                        </div>

                        @if($product->variants)
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    document.getElementById('selectedVariantID').value = '{{ $product->variants->first()->VariantID }}';
                                });
                            </script>
                            <!-- Add to Cart Form -->
                            <form action="{{ route('cart.add') }}" method="POST" class="text-center">
                                @csrf
                                <input type="hidden" name="ProductID" value="{{ $product->ProductID }}">
                                <input type="hidden" name="VariantID" id="selectedVariantID">
                                <input type="number" name="Quantity" value="1" min="1" class="w-16 text-center">
                                <button type="submit" class="add-to-cart bg-black hover:bg-red-500 text-white font-bold py-2 px-6 rounded-lg transition mt-4">
                                    Add to Cart
                                </button>

                            </form>
                        @endif
                    </div>

                    <script>
                        const photoPaths = @json($photoPaths);

                        function changePhoto(variantId) {
                            const newPhotoPath = photoPaths[variantId] || '{{ asset('default.jpg') }}';
                            document.getElementById('product-image').src = newPhotoPath;
                            document.getElementById('selectedVariantID').value = variantId;
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
