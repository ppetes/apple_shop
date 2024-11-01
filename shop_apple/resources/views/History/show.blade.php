<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl md:text-4xl text-gray-800 dark:text-gray-200 leading-tight text-center" style="font-family: 'Poppins', sans-serif;">
            Order History
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto">
                        
                        <!-- Orders Table -->
                        <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg overflow-hidden">
                            <thead>
                                <tr class="bg-gray-200 dark:bg-gray-700">
                                    <th class="px-4 py-2 text-left">Order ID</th>
                                    <th class="px-4 py-2 text-left">Date</th>
                                    <th class="px-4 py-2 text-left">Product Name</th>
                                    <th class="px-4 py-2 text-left">Color</th>
                                    <th class="px-4 py-2 text-left">Storage</th>
                                    <th class="px-4 py-2 text-left">Quantity</th>
                                    <th class="px-4 py-2 text-left">Price (฿)</th>
                                    <th class="px-4 py-2 text-left">Total Amount (฿)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($groupedOrders as $orderID => $orders)
                                    <!-- First row for each OrderID -->
                                    <tr>
                                        <td class="border px-4 py-2" rowspan="{{ count($orders) }}">{{ $orderID }}</td>
                                        <td class="border px-4 py-2" rowspan="{{ count($orders) }}">{{ $orders->first()->Date }}</td>
                                        <td class="border px-4 py-2">{{ $orders->first()->ProductName }}</td>
                                        <td class="border px-4 py-2">{{ $orders->first()->Color }}</td>
                                        <td class="border px-4 py-2">{{ $orders->first()->Storage }}</td>
                                        <td class="border px-4 py-2">{{ $orders->first()->Quantity }}</td>
                                        <td class="border px-4 py-2">฿{{ number_format($orders->first()->Price, 2) }}</td>
                                        <td class="border px-4 py-2" rowspan="{{ count($orders) }}">฿{{ number_format($orders->first()->TotalAmount, 2) }}</td>
                                    </tr>
                                    
                                    <!-- Additional rows for other products in the same OrderID -->
                                    @foreach($orders->skip(1) as $order)
                                        <tr>
                                            <td class="border px-4 py-2">{{ $order->ProductName }}</td>
                                            <td class="border px-4 py-2">{{ $order->Color }}</td>
                                            <td class="border px-4 py-2">{{ $order->Storage }}</td>
                                            <td class="border px-4 py-2">{{ $order->Quantity }}</td>
                                            <td class="border px-4 py-2">฿{{ number_format($order->Price, 2) }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
