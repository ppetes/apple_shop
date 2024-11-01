<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl md:text-4xl text-gray-800 dark:text-gray-200 leading-tight text-center" style="font-family: 'Poppins', sans-serif;">
            Cart
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(session('success'))
                        <div id="session-message" class="bg-green-500 text-white p-4 rounded mb-4">
                            {{ session('success') }}
                        </div>
                        <script>
                            setTimeout(function() {
                                document.getElementById('session-message').style.display = 'none';
                            }, 5000);
                        </script>
                    @endif
                    @if(session('error'))
                        <div id="session-message" class="bg-red-500 text-white p-4 rounded mb-4">
                            {{ session('error') }}
                        </div>
                        <script>
                            setTimeout(function() {
                                document.getElementById('session-message').style.display = 'none';
                            }, 5000);
                        </script>
                    @endif
                    @if($cartItems->isEmpty())
                        <p class="text-center">Your cart is empty.</p>
                    @else
                        <table class="w-full table-auto">
                            <thead>
                                <tr class="bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                    <th class="p-4">Product</th>
                                    <th class="p-4">Variant</th>
                                    <th class="p-4">Quantity</th>
                                    <th class="p-4">Price</th>
                                    <th class="p-4">Subtotal</th>
                                    <th class="p-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartItems as $item)
                                    @php
                                        $itemPrice = $item->variant ? $item->variant->Price : $item->product->Price;
                                        $subtotal = $itemPrice * $item->Quantity;
                                    @endphp
                                    <tr class="text-center">
                                        <td class="p-4">{{ $item->product->ProductName }}</td>
                                        @if($item->variant->Storage == 0)
                                        <td class="p-4">{{ $item->variant ? $item->variant->Color : 'Default' }}</td>
                                        @else
                                        <td class="p-4">{{ $item->variant ? $item->variant->Color . ' - ' . $item->variant->Storage . 'GB' : 'Default' }}</td>
                                        @endif
                                        <td class="p-4">
                                            <form action="{{ route('cart.update', $item->CartID) }}" method="POST" class="inline" id="update-form-{{ $item->CartID }}">
                                                @csrf
                                                <input type="number" name="Quantity" value="{{ $item->Quantity }}" min="1" class="w-16 text-center"
                                                    onchange="document.getElementById('update-form-{{ $item->CartID }}').submit();">
                                            </form>
                                        </td>
                                        <td class="p-4">฿{{ number_format($itemPrice, 2) }}</td>
                                        <td class="p-4">฿{{ number_format($subtotal, 2) }}</td>
                                        <td class="p-4">
                                            <form action="{{ route('cart.remove', $item->CartID) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 font-bold" title="Remove">✖</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-right mt-6">
                            <h3 class="text-2xl font-bold">Total: ฿{{ number_format($cartItems->sum(fn($item) => $item->Quantity * ($item->variant ? $item->variant->Price : $item->product->Price)), 2) }}</h3>
                        </div>
                        <div class="text-right mt-6">
                            <button type="button" class="btn btn-primary"> Payment </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
