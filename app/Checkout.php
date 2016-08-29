<?php

namespace SEEK;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use SEEK\Http\Misc\SortableTrait;
use SEEK\Http\Misc\SearchableTrait;


class Checkout extends Model
{
	use SoftDeletes, SortableTrait, SearchableTrait;

	protected $table = 'checkouts';
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function item()
    {
    	return $this->belongsTo('\SEEK\Item','item_code','code');
    }
}
