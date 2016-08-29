<?php

namespace SEEK;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use SEEK\Http\Misc\SortableTrait;
use SEEK\Http\Misc\SearchableTrait;


class PricingRule extends Model
{
	use SoftDeletes, SortableTrait, SearchableTrait;

	protected $table = 'pricing_rules';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
}
