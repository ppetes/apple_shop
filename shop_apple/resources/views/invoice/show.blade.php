<x-app-layout>
    <form action="{{ route('cart.update') }}" method="POST">
    @csrf
    @method('PATCH')

    @foreach ($cartItems as $cartItem)
        <div class="container-cart-inside">
        <div class="box_lit">
            <div class="box-cart">
                <input 
                    type="checkbox" 
                    class="checkbox-input" 
                    name="check[{{ $cartItem->id }}]" 
                    value="1" 
                    {{ $cartItem->check ? 'checked' : '' }}
                >
            </div>
            <!-- แสดงข้อมูลสินค้า -->
            <div class="product-details">
            <div class="box_img">
            <img src="{{ $cartItem->product->image }}" alt="Product Image" class="product-image">
        </div>
                <p>{{ $cartItem->product->pname }}</p>
                <p>Price: {{ $cartItem->product->price }}</p>
                <p>Quantity: {{ $cartItem->quan }}</p>
                <p>Total: {{ $cartItem->total }}</p>
            </div>
        </div>
</div>
    @endforeach

    <!-- ปุ่ม Add to Cart -->
    <button type="submit" class="btn btn-primary">Add to Cart</button>
</form>
</x-app-layout>
