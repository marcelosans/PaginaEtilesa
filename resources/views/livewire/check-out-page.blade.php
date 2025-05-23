<div class="w-full mt-[3em] max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
	<h1 class="text-2xl font-bold text-purple-800 dark:text-purple-200 mb-4">
		{{ __('checkout.payment') }}
	</h1>
	<div class="grid grid-cols-12 gap-4">
		<div class="md:col-span-12 lg:col-span-8 col-span-12">
			<!-- Card -->
			<div class="bg-white rounded-xl shadow-lg p-4 sm:p-7 dark:bg-gray-900">
				<!-- Shipping Address -->
				<form wire:submit.prevent='placeOrder'>
					<div class="mb-6">
						<h2 class="text-xl font-bold underline text-purple-700 dark:text-purple-300 mb-2">
							{{ __('checkout.shipping_address') }}
						</h2>
						<div class="grid grid-cols-2 gap-4">
							<div>
								<label class="block text-purple-800 dark:text-purple-200 mb-1" for="first_name">
									{{ __('checkout.first_name') }}
								</label>
								<input wire:model='first_name' class="w-full rounded-lg border border-purple-300 py-2 px-3 
								dark:bg-gray-800 dark:text-white dark:border-purple-700 
								@error('first_name') border-red-500 @enderror"  
								id="first_name" type="text">
								</input>
								@error('first_name')
								<div class="text-red-500 text-sm">{{$message}}</div>
								@enderror
							</div>
							<div>
								<label class="block text-purple-800 dark:text-purple-200 mb-1" for="last_name">
									{{ __('checkout.last_name') }}
								</label>
								<input wire:model='last_name' class="w-full rounded-lg border border-purple-300 py-2 px-3 
								dark:bg-gray-800 dark:text-white dark:border-purple-700
								@error('last_name') border-red-500 @enderror" 
								id="last_name" type="text">
								</input>
								@error('last_name')
								<div class="text-red-500 text-sm">{{$message}}</div>
								@enderror
							</div>
						</div>
						<div class="mt-4">
							<label class="block text-purple-800 dark:text-purple-200 mb-1" for="phone">
								{{ __('checkout.phone') }}
							</label>
							<input wire:model='phone' class="w-full rounded-lg border border-purple-300 py-2 px-3 
							dark:bg-gray-800 dark:text-white dark:border-purple-700
							@error('phone') border-red-500 @enderror" 
							id="phone" type="text">
							</input>
							@error('phone')
								<div class="text-red-500 text-sm">{{$message}}</div>
								@enderror
						</div>
						<div class="mt-4">
							<label class="block text-purple-800 dark:text-purple-200 mb-1" for="address">
								{{ __('checkout.address') }}
							</label>
							<input wire:model='street_address' class="w-full rounded-lg border border-purple-300 py-2 px-3 
							dark:bg-gray-800 dark:text-white dark:border-purple-700
							@error('street_address') border-red-500 @enderror" 
							id="address" type="text">
							</input>
							@error('street_address')
								<div class="text-red-500 text-sm">{{$message}}</div>
								@enderror
						</div>
						<div class="mt-4">
							<label class="block text-purple-800 dark:text-purple-200 mb-1" for="city">
								{{ __('checkout.city') }}
							</label>
							<input wire:model='city' class="w-full rounded-lg border border-purple-300 py-2 px-3 
							dark:bg-gray-800 dark:text-white dark:border-purple-700
							@error('city') border-red-500 @enderror" 
							id="city" type="text">
							</input>
							@error('city')
								<div class="text-red-500 text-sm">{{$message}}</div>
								@enderror
						</div>
						<div class="grid grid-cols-2 gap-4 mt-4">
							<div>
								<label class="block text-purple-800 dark:text-purple-200 mb-1" for="state">
									{{ __('checkout.state') }}
								</label>
								<select wire:model='state' class="w-full rounded-lg border border-purple-300 py-2 px-3 
								dark:bg-gray-800 dark:text-white dark:border-purple-700
								@error('state') border-red-500 @enderror" 
								id="state">
									<option value="">{{ __('checkout.select_state') }}</option>
									<option value="Álava">{{ __('checkout.provinces.alava') }}</option>
									<option value="Albacete">{{ __('checkout.provinces.albacete') }}</option>
									<option value="Alicante">{{ __('checkout.provinces.alicante') }}</option>
									<option value="Almería">{{ __('checkout.provinces.almeria') }}</option>
									<option value="Asturias">{{ __('checkout.provinces.asturias') }}</option>
									<option value="Ávila">{{ __('checkout.provinces.avila') }}</option>
									<option value="Badajoz">{{ __('checkout.provinces.badajoz') }}</option>
									<option value="Barcelona">{{ __('checkout.provinces.barcelona') }}</option>
									<option value="Burgos">{{ __('checkout.provinces.burgos') }}</option>
									<option value="Cáceres">{{ __('checkout.provinces.caceres') }}</option>
									<option value="Cádiz">{{ __('checkout.provinces.cadiz') }}</option>
									<option value="Cantabria">{{ __('checkout.provinces.cantabria') }}</option>
									<option value="Castellón">{{ __('checkout.provinces.castellon') }}</option>
									<option value="Ciudad Real">{{ __('checkout.provinces.ciudad_real') }}</option>
									<option value="Córdoba">{{ __('checkout.provinces.cordoba') }}</option>
									<option value="Cuenca">{{ __('checkout.provinces.cuenca') }}</option>
									<option value="Girona">{{ __('checkout.provinces.girona') }}</option>
									<option value="Granada">{{ __('checkout.provinces.granada') }}</option>
									<option value="Guadalajara">{{ __('checkout.provinces.guadalajara') }}</option>
									<option value="Guipúzcoa">{{ __('checkout.provinces.guipuzcoa') }}</option>
									<option value="Huelva">{{ __('checkout.provinces.huelva') }}</option>
									<option value="Huesca">{{ __('checkout.provinces.huesca') }}</option>
									<option value="Islas Baleares">{{ __('checkout.provinces.islas_baleares') }}</option>
									<option value="Jaén">{{ __('checkout.provinces.jaen') }}</option>
									<option value="La Coruña">{{ __('checkout.provinces.la_coruna') }}</option>
									<option value="La Rioja">{{ __('checkout.provinces.la_rioja') }}</option>
									<option value="Las Palmas">{{ __('checkout.provinces.las_palmas') }}</option>
									<option value="León">{{ __('checkout.provinces.leon') }}</option>
									<option value="Lleida">{{ __('checkout.provinces.lleida') }}</option>
									<option value="Lugo">{{ __('checkout.provinces.lugo') }}</option>
									<option value="Madrid">{{ __('checkout.provinces.madrid') }}</option>
									<option value="Málaga">{{ __('checkout.provinces.malaga') }}</option>
									<option value="Murcia">{{ __('checkout.provinces.murcia') }}</option>
									<option value="Navarra">{{ __('checkout.provinces.navarra') }}</option>
									<option value="Ourense">{{ __('checkout.provinces.ourense') }}</option>
									<option value="Palencia">{{ __('checkout.provinces.palencia') }}</option>
									<option value="Pontevedra">{{ __('checkout.provinces.pontevedra') }}</option>
									<option value="Salamanca">{{ __('checkout.provinces.salamanca') }}</option>
									<option value="Santa Cruz de Tenerife">{{ __('checkout.provinces.santa_cruz_tenerife') }}</option>
									<option value="Segovia">{{ __('checkout.provinces.segovia') }}</option>
									<option value="Sevilla">{{ __('checkout.provinces.sevilla') }}</option>
									<option value="Soria">{{ __('checkout.provinces.soria') }}</option>
									<option value="Tarragona">{{ __('checkout.provinces.tarragona') }}</option>
									<option value="Teruel">{{ __('checkout.provinces.teruel') }}</option>
									<option value="Toledo">{{ __('checkout.provinces.toledo') }}</option>
									<option value="Valencia">{{ __('checkout.provinces.valencia') }}</option>
									<option value="Valladolid">{{ __('checkout.provinces.valladolid') }}</option>
									<option value="Vizcaya">{{ __('checkout.provinces.vizcaya') }}</option>
									<option value="Zamora">{{ __('checkout.provinces.zamora') }}</option>
									<option value="Zaragoza">{{ __('checkout.provinces.zaragoza') }}</option>
								</select>
								@error('state')
								<div class="text-red-500 text-sm">{{$message}}</div>
								@enderror
							</div>
							<div>
								<label class="block text-purple-800 dark:text-purple-200 mb-1" for="zip">
									{{ __('checkout.zip_code') }}
								</label>
								<input wire:model='zip_code' class="w-full rounded-lg border border-purple-300 py-2 px-3 
								dark:bg-gray-800 dark:text-white dark:border-purple-700
								@error('zip_code') border-red-500 @enderror" 
								id="zip" type="text">
								</input>
								@error('zip_code')
								<div class="text-red-500 text-sm">{{$message}}</div>
								@enderror
							</div>
						</div>
					</div>
					<div class="text-lg font-semibold mb-4 text-purple-800 dark:text-purple-200">
						{{ __('checkout.payment_method') }}
					</div>
					<ul class="grid w-full gap-6 md:grid-cols-2">
						<li>
							<input wire:model='payment_method' class="hidden peer" id="hosting-big" type="radio" value="stripe">
							<label class="inline-flex items-center justify-between w-full p-5 
							text-purple-500 bg-white border border-purple-200 rounded-lg cursor-pointer 
							dark:text-purple-400 dark:bg-gray-800 dark:border-purple-700 
							peer-checked:border-purple-600 peer-checked:text-purple-600
							hover:bg-purple-50 dark:hover:bg-purple-900" 
							for="hosting-big">
								<div class="block">
									<div class="w-full text-lg font-semibold">
										{{ __('checkout.card_payment') }}
									</div>
								</div>
								<svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none" viewbox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
									<path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
									</path>
								</svg>
							</label>
						</li>
					</ul>
					@error('payment_method')
					<div class="text-red-500 text-sm">{{$message}}</div>
					@enderror
				</div>
				<!-- End Card -->
			</div>
			<div class="md:col-span-12 lg:col-span-4 col-span-12">
				<div class="bg-white rounded-xl shadow-lg p-4 sm:p-7 dark:bg-gray-900">
					<div class="text-xl font-bold underline text-purple-700 dark:text-purple-300 mb-2">
						{{ __('checkout.order_summary') }}
					</div>
					<div class="flex justify-between mb-2 font-bold text-purple-800 dark:text-purple-200">
						<span>
							{{ __('checkout.subtotal') }}
						</span>
						<span>
						{{$grand_total}}€
						</span>
					</div>
					<hr class="bg-purple-300 my-4 h-1 rounded">
					<div class="flex justify-between mb-2 font-bold text-purple-800 dark:text-purple-200">
						<span>
							{{ __('checkout.total') }}
						</span>
						<span>
							{{$grand_total}}€
						</span>
					</div>
				</div>
				<button type="submit" class="bg-purple-600 mt-4 w-full p-3 rounded-lg text-lg text-white hover:bg-purple-700">
					<span wire:loading.remove>{{ __('checkout.buy') }}</span>
					<span wire:loading>{{ __('checkout.processing') }}</span>
				</button>
				<div class="bg-white mt-4 rounded-xl shadow-lg p-4 sm:p-7 dark:bg-gray-900">
					<div class="text-xl font-bold underline text-purple-700 dark:text-purple-300 mb-2">
						{{ __('checkout.cart_summary') }}
					</div>
					<ul class="divide-y divide-purple-200 dark:divide-purple-700" role="list">
						@foreach ($cart_items as $ci)
						<li class="py-3 sm:py-4" wire:key='{{$ci['product_id']}}'>
							<div class="flex items-center">
								<div class="flex-shrink-0">
									<img alt="{{$ci['name']}}" class="w-12 h-12 rounded-full" src="{{url('storage',$ci['images'][0])}}">
									</img>
								</div>
								<div class="flex-1 min-w-0 ms-4">
									<p class="text-sm font-medium text-purple-900 truncate dark:text-purple-200">
										{{$ci['name']}}
									</p>
									<p class="text-sm text-purple-500 truncate dark:text-purple-400">
										{{ __('checkout.quantity') }}: {{$ci['quantity']}}
									</p>
								</div>
								<div class="inline-flex items-center text-base font-semibold text-purple-900 dark:text-purple-200">
									{{$ci['total_amount']}}€
								</div>
							</div>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</form>
	</div>
</div>