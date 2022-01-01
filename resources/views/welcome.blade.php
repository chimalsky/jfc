<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="{{ mix('css/app.css') }}">
		<script defer src="https://unpkg.com/alpinejs@3.7.1/dist/cdn.min.js"></script>

        <title>JFC Chicken</title>
    </head>
    <body class="container mx-auto bg-red-800 text-blue-300">
		<header class="flex justify-between">
			<img class="w-48" src="https://c.tenor.com/ZX95mDnlodwAAAAd/the-rock-sus-eye.gif" />
			<h1 class="text-9xl text-center font-bold mt-10">
        		JFC Chicken
				<span class="text-2xl block text-yellow-300">
					Home of the JFC Chicken
				</span>
				<span class="text-xl block">
					{{ App\Models\Order::count() }} Customers Served!
				</span>
			</h1>
			<img class="w-48" src="https://c.tenor.com/ZX95mDnlodwAAAAd/the-rock-sus-eye.gif" />
		</header>

		<main class="text-center text-yellow-500 my-10" x-data="{ordering: false}">
			<div class="mb-24">_________________________</div>

			<button type="button" class="block mx-auto my-24 border-indigo-700 p-4 border-4" @click="ordering = !ordering">
				<span x-show="ordering">
					Stop Ordering
				</span>
				<span x-show="!ordering">
					Order Now
				</span>
			</button>

			@if ($errors->count())
				<div class="text-xl">
					You messed up your order
				</div>
			@endif

			@foreach ($errors->all() as $e)
				<div>
					{{ $e }}
				</div>
			@endforeach

			<div class="max-w-sm mx-auto" x-show="ordering">
				<form action="/order" method="post">
					@csrf
			
					<label class="block my-10">
						<header class="text-2xl uppercase font-bold">
							JFC Chicken Combo.
							<span class="italic text-sm">
								Comes with crispy fried chicen and fresh cut french fries. And a Polish pickle.
							</span>
						</header>
						<div class="">
							$10 a plate
						</div>
						<input type="number" name="qty_combo" min="1" max="9999" class="text-black w-16">
					</label>

					<label class="block my-10">
						<header class="text-2xl uppercase font-bold">
							Sussy DaBaby Combo. 
							<span class="italic text-sm">
								Comes with Freshcut Sussy fries. Boiled Among-us shaped Chicken nuggets. And DaBaby-Car inspired MILKShake & FREE DABABY-CAR toy1!1!1!
							</span>
							<img src="https://i.kym-cdn.com/entries/icons/original/000/036/822/cover4.jpg" />
						</header>
						<div class="">
							$12 a Combo and DaBaby
						</div>
						<input type="number" name="qty_dababy" min="1" max="9999" class="text-black w-16">
					</label>

					<label class="block my-10">
						<header class="text-2xl uppercase font-bold">
							Cheesecake! 
						</header>
						<div class="">
							$2.50 a slice
						</div>
						<input type="number" name="qty_cheesecake" min="1" max="9999" class="text-black w-16">
					</label>

					<label class="relative w-full flex flex-col">
						<span class="font-bold mb-3">Card number</span>
						<input class="rounded-md peer pl-12 pr-2 py-2 border-2 border-gray-200 placeholder-gray-300" type="text" name="cc" placeholder="0000 0000 0000" />
						<svg xmlns="http://www.w3.org/2000/svg" class="absolute bottom-0 left-0 -mb-0.5 transform translate-x-1/2 -translate-y-1/2 text-black peer-placeholder-shown:text-gray-300 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
						</svg>
					</label>

					<label class="relative flex-1 flex flex-col mt-12">
						<span class="font-bold mb-3">Expiration date</span>
						<input class="rounded-md peer pl-12 pr-2 py-2 border-2 border-gray-200 placeholder-gray-300" type="text" name="expire_date" placeholder="MM/YY" />
						<svg xmlns="http://www.w3.org/2000/svg" class="absolute bottom-0 left-0 -mb-0.5 transform translate-x-1/2 -translate-y-1/2 text-black peer-placeholder-shown:text-gray-300 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
						</svg>
					</label>

					<button class='mt-10 border-2 border-white p-4'>
						Place Order Now and Eat Chicken Soon
					</button>
				</form>
			</div>
		</main>
    </body>
</html>
