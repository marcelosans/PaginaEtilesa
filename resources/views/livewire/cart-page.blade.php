<div class="w-full mt-[4em] max-w-[85rem] py-4 sm:py-6 lg:py-10 px-3 sm:px-4 lg:px-8 mx-auto">
    <div class="container mx-auto px-2 sm:px-4">
        <h1 class="text-xl sm:text-2xl font-semibold mb-4 sm:mb-6 text-purple-600">@lang('cart.shopping_cart')</h1>
        
        <div class="flex flex-col lg:flex-row gap-4 lg:gap-6">
            <!-- Cart Items Section -->
            <div class="w-full lg:w-3/4">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <!-- Mobile Layout -->
                    <div class="block md:hidden">
                        @forelse ($cart_items as $item)
                        <div wire:key="{{ $item['product_id'] }}" class="border-b border-gray-200 p-4 last:border-b-0">
                            <div class="flex items-start space-x-3">
                                <img class="h-16 w-16 sm:h-20 sm:w-20 object-cover rounded-md flex-shrink-0" 
                                     src='{{url('storage/'.$item['images'][0])}}' 
                                     alt="{{ $item['name'] }}">
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-semibold text-gray-900 text-sm sm:text-base mb-2 line-clamp-2">{{$item['name']}}</h3>
                                    <div class="space-y-2">
                                        <div class="flex justify-between items-center">
                                            <span class="text-sm text-gray-600">@lang('cart.price'):</span>
                                            <span class="font-medium">{{number_format($item['price'], 2)}}€</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-sm text-gray-600">@lang('cart.quantity'):</span>
                                            <div class="flex items-center space-x-2">
                                                <button 
                                                    wire:click='decreaseQty({{$item['product_id']}})'
                                                    class="border border-gray-300 rounded-md w-8 h-8 flex items-center justify-center text-sm hover:bg-gray-50">-</button>
                                                <span class="text-center min-w-[2rem] text-sm">{{$item['quantity']}}</span>
                                                <button 
                                                    wire:click='increaseQty({{$item['product_id']}})'
                                                    class="border border-gray-300 rounded-md w-8 h-8 flex items-center justify-center text-sm hover:bg-gray-50">+</button>
                                            </div>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-sm text-gray-600">@lang('cart.total'):</span>
                                            <span class="font-semibold text-purple-600">{{number_format($item['total_amount'], 2)}}€</span>
                                        </div>
                                        <div class="pt-2">
                                            <button 
                                                wire:click='removeItem({{$item['product_id']}})'
                                                class="w-full bg-gray-100 border border-gray-300 rounded-lg px-3 py-2 text-sm hover:bg-red-50 hover:text-red-600 hover:border-red-300 transition-colors">
                                                <span wire:loading.remove wire:target='removeItem({{$item['product_id']}})'>@lang('cart.remove')</span>
                                                <span wire:loading wire:target='removeItem({{$item['product_id']}})'>@lang('cart.removing')</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-12 px-4">
                            <div class="text-4xl sm:text-6xl text-gray-300 mb-4">🛒</div>
                            <p class="text-lg sm:text-xl font-semibold text-gray-500">@lang('cart.no_items')</p>
                        </div>
                        @endforelse
                    </div>

                    <!-- Desktop Layout -->
                    <div class="hidden md:block overflow-x-auto">
                        <div class="p-4 sm:p-6">
                            <table class="w-full min-w-[600px]">
                                <thead>
                                    <tr class="border-b border-gray-200">
                                        <th class="text-left font-semibold text-gray-900 py-3 pr-4">@lang('cart.product')</th>
                                        <th class="text-left font-semibold text-gray-900 py-3 px-2">@lang('cart.price')</th>
                                        <th class="text-left font-semibold text-gray-900 py-3 px-2">@lang('cart.quantity')</th>
                                        <th class="text-left font-semibold text-gray-900 py-3 px-2">@lang('cart.total')</th>
                                        <th class="text-left font-semibold text-gray-900 py-3 pl-2">@lang('cart.remove')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($cart_items as $item)
                                    <tr wire:key="{{ $item['product_id'] }}" class="border-b border-gray-100 last:border-b-0">
                                        <td class="py-4 pr-4">
                                            <div class="flex items-center">
                                                <img class="h-12 w-12 lg:h-16 lg:w-16 object-cover rounded-md mr-3 lg:mr-4 flex-shrink-0" 
                                                     src='{{url('storage/'.$item['images'][0])}}' 
                                                     alt="{{ $item['name'] }}">
                                                <span class="font-semibold text-sm lg:text-base line-clamp-2">{{$item['name']}}</span>
                                            </div>
                                        </td>
                                        <td class="py-4 px-2 text-sm lg:text-base">{{number_format($item['price'], 2)}}€</td>
                                        <td class="py-4 px-2">
                                            <div class="flex items-center space-x-1 lg:space-x-2">
                                                <button 
                                                    wire:click='decreaseQty({{$item['product_id']}})'
                                                    class="border border-gray-300 rounded-md w-8 h-8 lg:w-10 lg:h-10 flex items-center justify-center text-sm hover:bg-gray-50">-</button>
                                                <span class="text-center min-w-[2rem] text-sm lg:text-base">{{$item['quantity']}}</span>
                                                <button 
                                                    wire:click='increaseQty({{$item['product_id']}})'
                                                    class="border border-gray-300 rounded-md w-8 h-8 lg:w-10 lg:h-10 flex items-center justify-center text-sm hover:bg-gray-50">+</button>
                                            </div>
                                        </td>
                                        <td class="py-4 px-2 font-semibold text-purple-600 text-sm lg:text-base">{{number_format($item['total_amount'], 2)}}€</td>
                                        <td class="py-4 pl-2">
                                            <button 
                                                wire:click='removeItem({{$item['product_id']}})'
                                                class="bg-gray-100 border border-gray-300 rounded-lg px-2 lg:px-3 py-1 lg:py-2 text-sm hover:bg-red-50 hover:text-red-600 hover:border-red-300 transition-colors">
                                                <span wire:loading.remove wire:target='removeItem({{$item['product_id']}})'>@lang('cart.remove')</span>
                                                <span wire:loading wire:target='removeItem({{$item['product_id']}})'>@lang('cart.removing')</span>
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-12">
                                            <div class="text-6xl text-gray-300 mb-4">🛒</div>
                                            <p class="text-xl font-semibold text-gray-500">@lang('cart.no_items')</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Summary Section -->
            <div class="w-full lg:w-1/4">
                <div class="bg-white rounded-lg shadow-md p-4 sm:p-6 sticky top-4">
                    <h2 class="text-lg font-semibold mb-4 text-gray-900">@lang('cart.summary')</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">@lang('cart.subtotal')</span>
                            <span class="font-medium">{{$grand_total}}€</span>
                        </div>
                        <hr class="border-gray-200">
                        <div class="flex justify-between items-center">
                            <span class="font-semibold text-lg text-gray-900">@lang('cart.total')</span>
                            <span class="font-semibold text-lg text-purple-600">{{$grand_total}}€</span>
                        </div>
                        @if($cart_items)
                        <div class="pt-4">
                            <a href="/checkout" 
                               class="bg-purple-500 hover:bg-purple-600 transition-colors duration-200 block text-center text-white py-3 px-4 rounded-lg w-full font-medium">
                               @lang('cart.checkout')
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>