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
				<a href="/orders">
					<span class="text-xl block">
						{{ App\Models\Order::count() }} Customers Served!
					</span>
				</a>
			</h1>
			<img class="w-48" src="https://c.tenor.com/ZX95mDnlodwAAAAd/the-rock-sus-eye.gif" />
		</header>

		<main class="text-center text-yellow-500 my-10" x-data="{ordering: false}">
			<div class="mb-12 font-mono text-xl">
				Total 💰 earned by JFC Chicken ${{ $orders->sum('total') }}
			</div>
			@foreach($orders as $order)
				<div>
					{{ $order->name ?? 'Anon'}}

					${{ $order->total }} -- {{ $order->qty_combo }} combos, {{ $order->qty_dababy }} Susses, {{ $order->qty_cheesecake }} 🧀🎂
				</div>
			@endforeach

			<a href="/" class="border-2 border-white p-4 mt-12 block">
				Go back to ordering more JFC!
			</a>
		</main>
    </body>
</html>
