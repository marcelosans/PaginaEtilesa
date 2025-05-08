<div class="w-full mt-3 max-w-7xl mt-9  py-10 px-4 sm:px-6 lg:px-8 mx-auto">
  <h1 class="text-4xl font-bold text-purple-700">{{ __('orders-detail.order_details') }}</h1>

  <!-- Cuadrícula -->
  <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mt-5">
    <!-- Tarjeta de Cliente -->
    <div class="flex flex-col bg-white border border-purple-200 shadow-sm rounded-xl">
      <div class="p-4 md:p-5 flex gap-x-4">
        <div class="flex-shrink-0 flex justify-center items-center size-12 bg-purple-100 rounded-lg">
          <svg class="flex-shrink-0 size-5 text-purple-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
            <circle cx="9" cy="7" r="4" />
            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
          </svg>
        </div>

        <div class="grow">
          <div class="flex items-center gap-x-2">
            <p class="text-xs uppercase tracking-wide text-gray-500">
              {{ __('orders-detail.client') }}
            </p>
          </div>
          <div class="mt-1 flex items-center gap-x-2">
            <div>{{$address->full_name}}</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Tarjeta de Fecha de Pedido -->
    <div class="flex flex-col bg-white border border-purple-200 shadow-sm rounded-xl">
      <div class="p-4 md:p-5 flex gap-x-4">
        <div class="flex-shrink-0 flex justify-center items-center size-12 bg-purple-100 rounded-lg">
          <svg class="flex-shrink-0 size-5 text-purple-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 22h14" />
            <path d="M5 2h14" />
            <path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22" />
            <path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2" />
          </svg>
        </div>

        <div class="grow">
          <div class="flex items-center gap-x-2">
            <p class="text-xs uppercase tracking-wide text-gray-500">
              {{ __('orders-detail.order_date') }}
            </p>
          </div>
          <div class="mt-1 flex items-center gap-x-2">
            <h3 class="text-xl font-medium text-gray-800">
              {{$order_items[0]->created_at->format('d-m-Y')}}
            </h3>
          </div>
        </div>
      </div>
    </div>

    <!-- Tarjeta de Estado del Pedido -->
    <div class="flex flex-col bg-white border border-purple-200 shadow-sm rounded-xl">
      <div class="p-4 md:p-5 flex gap-x-4">
        <div class="flex-shrink-0 flex justify-center items-center size-12 bg-purple-100 rounded-lg">
          <svg class="flex-shrink-0 size-5 text-purple-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 11V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h6" />
            <path d="m12 12 4 10 1.7-4.3L22 16Z" />
          </svg>
        </div>

        <div class="grow">
          <div class="flex items-center gap-x-2">
            <p class="text-xs uppercase tracking-wide text-gray-500">
              {{ __('orders-detail.order_status') }}
            </p>
          </div>
          <div class="mt-1 flex items-center gap-x-2">
            @php
                $statusClasses = [
                    'new' => 'bg-purple-500',
                    'processing' => 'bg-purple-600',
                    'shipped' => 'bg-purple-700',
                    'delivered' => 'bg-green-700',
                    'cancelled' => 'bg-red-500'
                ];
                
                $status = match($order->status) {
                    'new' => __('orders-detail.status_new'),
                    'processing' => __('orders-detail.status_processing'),
                    'shipped' => __('orders-detail.status_shipped'),
                    'delivered' => __('orders-detail.status_delivered'),
                    'cancelled' => __('orders-detail.status_cancelled'),
                    default => 'Unknown'
                };
            @endphp
            <span class="{{ $statusClasses[$order->status] }} py-1 px-3 rounded text-white shadow">
              {{ $status }}
            </span>
          </div>
        </div>
      </div>
    </div>

    <!-- Tarjeta de Estado de Pago -->
    <div class="flex flex-col bg-white border border-purple-200 shadow-sm rounded-xl">
      <div class="p-4 md:p-5 flex gap-x-4">
        <div class="flex-shrink-0 flex justify-center items-center size-12 bg-purple-100 rounded-lg">
          <svg class="flex-shrink-0 size-5 text-purple-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12s2.545-5 7-5c4.454 0 7 5 7 5s-2.546 5-7 5c-4.455 0-7-5-7-5z" />
            <path d="M12 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
            <path d="M21 17v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2" />
            <path d="M21 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2" />
          </svg>
        </div>

        <div class="grow">
          <div class="flex items-center gap-x-2">
            <p class="text-xs uppercase tracking-wide text-gray-500">
              {{ __('orders-detail.payment_status') }}
            </p>
          </div>
          <div class="mt-1 flex items-center gap-x-2">
            @php
              $paymentStatusClasses = [
                  'pending' => 'bg-purple-600',
                  'paid' => 'bg-green-600',
                  'failed' => 'bg-red-600'
              ];
              
              $paymentStatus = match($order->payment_status) {
                  'pending' => __('orders-detail.payment_pending'),
                  'paid' => __('orders-detail.payment_paid'),
                  'failed' => __('orders-detail.payment_cancelled'),
                  default => 'Unknown'
              };
            @endphp
            <span class="{{ $paymentStatusClasses[$order->payment_status] }} py-1 px-3 rounded text-white shadow">
              {{ $paymentStatus }}
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="flex flex-col md:flex-row gap-4 mt-4">
    <div class="md:w-3/4">
      <div class="bg-white border border-purple-200 overflow-x-auto rounded-lg shadow-md p-6 mb-4">
        <table class="w-full">
          <thead>
            <tr>
              <th class="text-left font-semibold text-purple-700">{{ __('orders-detail.product') }}</th>
              <th class="text-left font-semibold text-purple-700">{{ __('orders-detail.price') }}</th>
              <th class="text-left font-semibold text-purple-700">{{ __('orders-detail.quantity') }}</th>
              <th class="text-left font-semibold text-purple-700">{{ __('orders-detail.total') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($order_items as $item)
            <tr wire:key="{{$item->id}}">
              <td class="py-4">
                <div class="flex items-center">
                  <img class="h-16 w-16 mr-4" src="{{url('storage',$item->product->images[0])}}" alt="Imagen del producto">
                  <span class="font-semibold">{{$item->product->name}}</span>
                </div>
              </td>
              <td class="py-4">{{$item->unit_amount}}€</td>
              <td class="py-4">
                <span class="text-center w-8">{{$item->quantity}}</span>
              </td>
              <td class="py-4">{{$item->total_amount}}€</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="bg-white border border-purple-200 overflow-x-auto rounded-lg shadow-md p-6 mb-4">
        <h1 class="text-2xl font-bold text-purple-700 mb-3">{{ __('orders-detail.shipping_address') }}</h1>
        <div class="flex justify-between items-center">
          <div>
            <p>{{$address->street_address}}, {{$address->city}}, {{$address->state}}, {{$address->zip_code}}</p>
          </div>
          <div>
            <p class="font-semibold text-purple-700">{{ __('orders-detail.phone') }}:</p>
            <p>{{$address->phone}}</p>
          </div>
        </div>
      </div>

    </div>
    <div class="md:w-1/4">
      <div class="bg-white border border-purple-200 rounded-lg shadow-md p-6">
        <h2 class="text-lg font-semibold mb-4 text-purple-700">{{ __('orders-detail.summary') }}</h2>
        <div class="flex justify-between mb-2">
          <span>{{ __('orders-detail.subtotal') }}</span>
          <span>{{$item->order->grand_total}}€</span>
        </div>
        <hr class="my-2 border-purple-200">
        <div class="flex justify-between mb-2">
          <span class="font-semibold text-purple-700">{{ __('orders-detail.grand_total') }}</span>
          <span class="font-semibold">{{$item->order->grand_total}}€</span>
        </div>
      </div>
    </div>
  </div>
</div>