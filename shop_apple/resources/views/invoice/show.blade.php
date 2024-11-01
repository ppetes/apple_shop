<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Invoice #{{ $invoice->OrderID }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-bold">Invoice Details</h3>
                    
                    @if($invoice->details->isEmpty())
                        <p class="text-center">No products found for this invoice.</p>
                    @else
                    <p><strong>Ordered By:</strong> {{ $invoice->user->name }}</p>
                    <p><strong>Date:</strong> {{ $invoice->Date }}</p>
                   
                        <table class="w-full table-auto">
                            <thead>
                                <tr class="bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                    <th class="p-4">Product</th>
                                    <th class="p-4">Variant</th>
                                    <th class="p-4">Quantity</th>
                                    <th class="p-4">Price</th>
                                    <th class="p-4">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoice->details as $detail)
                                    @php
                                        $subtotal = $detail->Quantity * ($detail->variant ? $detail->variant->Price : $detail->product->Price);
                                    @endphp
                                    <tr class="text-center">
                                        <td class="p-4">{{ $detail->product->ProductName }}</td>
                                        <td class="p-4">
                                            {{ $detail->variant ? $detail->variant->Color : 'Default' }}
                                        </td>
                                        <td class="p-4">{{ $detail->Quantity }}</td>
                                        <td class="p-4">฿{{ number_format($detail->Price, 2) }}</td>
                                        <td class="p-4">฿{{ number_format($subtotal, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    <div class="text-right mt-6">
                        <h3 class="text-2xl font-bold">Total: ฿{{ number_format($invoice->TotalAmount, 2) }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
