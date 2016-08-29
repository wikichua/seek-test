<?php
namespace SEEK\Http\Misc;

trait SearchableTrait
{
	public function scopeSearch($q)
	{
		$searchInputs = request()->all();

		foreach ($searchInputs as $key => $value) {
			if(preg_match('/^s-/i', $key) && trim($value) != '')
			{
				$key = str_replace('s-', '', $key);
				$keys = strpos($key,'-') > 0? explode('-',$key):$key;
				if(is_array($keys) && count($keys) == 2)
				{
					$q = $q->whereHas($keys[0], function($q) use($keys,$value)
					{
						$k = $keys[1];
						if(strtotime(trim($value)) !== false)
						{
							if(str_contains($k,'_>_'))
							{
								$k = str_replace('_>_','',$k);
						    	$q->withTrashed()->where($k,'>=',date('Y-m-d 00:00:00',strtotime(trim($value))));
							}							
							elseif(str_contains($k,'_<_'))
							{
								$k = str_replace('_<_','',$k);
						    	$q->withTrashed()>where($k,'<=',date('Y-m-d 23:59:59',strtotime(trim($value))));
							}
							else
							{
						    	$q->withTrashed()>where($k,'>=',date('Y-m-d 00:00:00',strtotime(trim($value))))->where($k,'<=',date('Y-m-d 23:59:59',strtotime(trim($value))));
							}
						}
						else
						    $q->withTrashed()->where($k,'like','%'.trim($value).'%');
					});
				} elseif(is_array($keys) && count($keys) == 3) {
					$q = $q->whereHas($keys[0], function($q) use($keys,$value)
					{
						$q = $q->whereHas($keys[1], function($q) use($keys,$value)
						{
							$k = $keys[2];
							if(strtotime(trim($value)) !== false)
							{
							    if(str_contains($k,'_>_'))
								{
									$k = str_replace('_>_','',$k);
							    	$q->withTrashed()->where($k,'>=',date('Y-m-d 00:00:00',strtotime(trim($value))));
								}							
								elseif(str_contains($k,'_<_'))
								{
									$k = str_replace('_<_','',$k);
							    	$q->withTrashed()->where($k,'<=',date('Y-m-d 23:59:59',strtotime(trim($value))));
								}
								else
								{
							    	$q->withTrashed()->where($k,'>=',date('Y-m-d 00:00:00',strtotime(trim($value))))->where($k,'<=',date('Y-m-d 23:59:59',strtotime(trim($value))));
								}
							}
							else
							    $q->withTrashed()->where($k,'like','%'.trim($value).'%');
						});
					});
				} else {
					$k = $keys;
					if(strtotime(trim($value)) !== false)
					{
					    if(str_contains($k,'_>_'))
						{
							$k = str_replace('_>_','',$k);
					    	$q->where($k,'>=',date('Y-m-d 00:00:00',strtotime(trim($value))));
						}							
						elseif(str_contains($k,'_<_'))
						{
							$k = str_replace('_<_','',$k);
					    	$q->where($k,'<=',date('Y-m-d 23:59:59',strtotime(trim($value))));
						}
						else
						{
					    	$q->where($k,'>=',date('Y-m-d 00:00:00',strtotime(trim($value))))->where($k,'<=',date('Y-m-d 23:59:59',strtotime(trim($value))));
						}
					}
					else
						$q = $q->where($k,'like','%'.trim($value).'%');
				}		
			}
		}

		return $q;
	}
}