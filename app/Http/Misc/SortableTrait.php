<?php
namespace SEEK\Http\Misc;

trait SortableTrait
{
	public function scopeSort($q)
    {
    	if(request()->has('a'))
        {
            $key = request()->get('a');
            $keys = strpos($key,'-') > 0? explode('-',$key):$key;
            if(is_array($keys) && count($keys) == 2)
            {
                $q = $q->whereHas($keys[0], function($q) use($keys)
                {
                    $q->withTrashed()->orderBy($keys[1],'asc');
                });
            } elseif(is_array($keys) && count($keys) == 3) {
                $q = $q->whereHas($keys[0], function($q) use($keys)
                {
                    $q = $q->whereHas($keys[1], function($q) use($keys)
                    {
                        $q->withTrashed()->orderBy($keys[2],'asc');
                    });
                });
            } else {
                $q = $q->orderBy($key,'asc');
            }
        }
        elseif(request()->has('d'))
        {
            $key = request()->get('d');
            $keys = strpos($key,'-') > 0? explode('-',$key):$key;
            if(is_array($keys) && count($keys) == 2)
            {
                $q = $q->whereHas($keys[0], function($q) use($keys)
                {
                    $q->withTrashed()->orderBy($keys[1],'desc');
                });
            } elseif(is_array($keys) && count($keys) == 3) {
                $q = $q->whereHas($keys[0], function($q) use($keys)
                {
                    $q = $q->whereHas($keys[1], function($q) use($keys)
                    {
                        $q->withTrashed()->orderBy($keys[2],'desc');
                    });
                });
            } else {
                $q = $q->orderBy($key,'desc');
            }
        }
        return $q;
    }

}