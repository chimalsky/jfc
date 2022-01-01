<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $guarded = [];
    use HasFactory;

	public function getTotalAttribute()
	{
		return ($this->qty_combo * 10) + ($this->qty_dababy * 12) + ($this->qty_cheesecake * 2.50);
	}
}
