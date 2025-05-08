<div class="w-full mt-3 max-w-7xl mt-9 py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="text-4xl font-bold text-purple-800">{{ __('orders.my_orders') }}</h1>
    <div class="flex flex-col bg-white p-5 rounded mt-4 shadow-lg">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-purple-900">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">{{ __('orders.order') }}</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">{{ __('orders.date') }}</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">{{ __('orders.order_status') }}</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">{{ __('orders.payment_status') }}</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">{{ __('orders.amount') }}</th>
                                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-white uppercase">{{ __('orders.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            @php
                                $statusClasses = [
                                    'new' => 'bg-purple-500',
                                    'processing' => 'bg-purple-600',
                                    'shipped' => 'bg-purple-700',
                                    'delivered' => 'bg-purple-800',
                                    'cancelled' => 'bg-black'
                                ];
                        
                                $paymentStatusClasses = [
                                    'pending' => 'bg-purple-500',
                                    'paid' => 'bg-purple-700',
                                    'failed' => 'bg-black'
                                ];
                        
                                $status = match($order->status) {
                                    'new' => __('orders.status_new'),
                                    'processing' => __('orders.status_processing'),
                                    'shipped' => __('orders.status_shipped'),
                                    'delivered' => __('orders.status_delivered'),
                                    'cancelled' => __('orders.status_cancelled'),
                                    default => __('orders.status_unknown')
                                };
                        
                                $paymentStatus = match($order->payment_status) {
                                    'pending' => __('orders.payment_pending'),
                                    'paid' => __('orders.payment_paid'),
                                    'failed' => __('orders.payment_cancelled'),
                                    default => __('orders.payment_unknown')
                                };
                            @endphp
                        
                            <tr wire:key='{{ $order->id }}' class="{{ $loop->iteration % 2 == 0 ? 'bg-purple-50' : 'bg-white' }}">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                    #{{ $order->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    {{ $order->created_at->format('d-m-Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    <span class="{{ $statusClasses[$order->status] }} py-1 px-3 rounded text-white shadow">
                                        {{ $status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    <span class="{{ $paymentStatusClasses[$order->payment_status] }} py-1 px-3 rounded text-white shadow">
                                        {{ $paymentStatus }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    {{ number_format($order->grand_total, 2) }}€
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                    <a href="/my-order-detail/{{$order->id}}" 
                                       class="bg-purple-700 text-white py-2 px-4 rounded-md hover:bg-purple-600 transition-colors">
                                        {{ __('orders.view_details') }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Static Pagination -->
            <div class="mt-6 flex justify-center">
                {{$orders->links()}}
            </div>
        </div>
    </div>
</div>