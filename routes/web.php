<?php

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/order/{order}', function (Request $request, Order $order) {
	return view('order', compact('order'));
})->name('order.show');

Route::post('/order', function (Request $request) {
	$request->validate([
		'qty_combo' => 'nullable|min:1|max:9999',
		'qty_dababy' => 'nullable|min:1|max:9999',
		'qty_cheesecake' => 'nullable|min:1|max:9999',
		'cc' => 'required'
	]);

	$order = Order::create([
		'qty_combo' => $request->qty_combo ?? 0,
		'qty_dababy' => $request->qty_dababy ?? 0,
		'qty_cheesecake' => $request->qty_cheesecake ?? 0,
		'cc' => $request->cc
	]);

	return redirect()->route('order.show', $order);
});
