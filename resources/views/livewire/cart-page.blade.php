<div class="w-full mt-[3em] max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="container mx-auto px-4">
      <h1 class="text-2xl font-semibold mb-4 text-purple-600">Carrito de Compra</h1>
      <div class="flex flex-col md:flex-row gap-4">
        <div class="md:w-3/4">
          <div class="bg-white overflow-x-auto rounded-lg shadow-md p-6 mb-4">
            <table class="w-full">
              <thead>
                <tr class="border-b border-gray-200">
                  <th class="text-left font-semibold text-gray-900 py-2">Producto</th>
                  <th class="text-left font-semibold text-gray-900 py-2">Precio</th>
                  <th class="text-left font-semibold text-gray-900 py-2">Cantidad</th>
                  <th class="text-left font-semibold text-gray-900 py-2">Total</th>
                  <th class="text-left font-semibold text-gray-900 py-2">Quitar</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($cart_items as $item)
                <tr wire:key="{{ $item['product_id'] }}">
                    <td class="py-4">
                        <div class="flex items-center">
                            <img class="h-16 w-16 mr-4" src='{{url('storage/'.$item['images'][0])}}' alt="{{ $item['name'] }}">
                            <span class="font-semibold">{{$item['name']}}</span>
                        </div>
                    </td>
                    <td class="py-4">{{number_format($item['price'], 2)}}€</td>
                    <td class="py-4">
                        <div class="flex items-center">
                            <button 
                                wire:click='decreaseQty({{$item['product_id']}})'
                                class="border border-gray-300 rounded-md py-2 px-4 mr-2">-</button>
                            <span class="text-center w-8">{{$item['quantity']}}</span>
                            <button 
                                wire:click='increaseQty({{$item['product_id']}})'
                                class="border border-gray-300 rounded-md py-2 px-4 ml-2">+</button>
                        </div>
                    </td>
                    <td class="py-4">{{number_format($item['total_amount'], 2)}}€</td>
                    <td>
                        <button 
                            wire:click='removeItem({{$item['product_id']}})'
                            class="bg-gray-200 border-2 border-gray-300 rounded-lg px-3 py-1 hover:bg-purple-700 hover:text-white hover:border-purple-700">
                            <span wire:loading.remove wire:target='removeItem({{$item['product_id']}})'>Quitar</span>
                            <span wire:loading wire:target='removeItem({{$item['product_id']}})'>Eliminando...</span>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-4xl font-semibold text-slate-500">
                        No hay ningún artículo en el carrito
                    </td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
        <div class="md:w-1/4">
          <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-lg font-semibold mb-4">Resumen</h2>
            <div class="flex justify-between mb-2">
              <span>Subtotal</span>
              <span>{{$grand_total}}€</span>
            </div>
            <hr class="my-2">
            <div class="flex justify-between mb-2">
              <span class="font-semibold">Total</span>
              <span class="font-semibold">{{$grand_total}}€</span>
            </div>
            @if($cart_items)
            <a href="/checkout" class="bg-purple-500 block text-center text-white py-2 px-4 rounded-lg mt-4 w-full">Comprar</a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>