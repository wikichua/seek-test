<?php

function uuid() {
    return sprintf( '%04x%04x-%04x-%08x-%04x-%04x%04x%04x',
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
        mt_rand( 0, 0xffff ),
        mt_rand( 0, 0x0fff ) | 0x4000,
        mt_rand( 0, 0x3fff ) | 0x8000,
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}

function activeOnCurrentRoute($regex){
  if (preg_match('/\b'.$regex.'(\.)?\b/',Route::currentRouteName())) {
    return 'active';
  }
  return '';
}

function sortTableHeaderSnippet($field='',$fieldname = '')
{
    $fullUrla = $fullUrld = isset(parse_url(Request::fullUrl())['query'])? parse_url(Request::fullUrl())['query']:'';
    parse_str($fullUrla, $fullUrla);
    parse_str($fullUrld, $fullUrld);
    unset($fullUrld['a'],$fullUrla['d']);

    $fullUrla['a'] = $fieldname; 
    $fullUrla = http_build_query($fullUrla);
    $fullUrld['d'] = $fieldname; 
    $fullUrld = http_build_query($fullUrld);
    return $field.' <div class="btn-group btn-group-xs">
            <a href="'.Request::url().'?'.$fullUrla.'" style="position:absolute;top:-12px;left:1px;color:#66CFF6;display:block;overflow:hidden;line-height:1px;float:right"><i class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="'.Request::url().'?'.$fullUrld.'" style="position:absolute;top:-3px;left:1px;color:#66CFF6;display:block;overflow:hidden;line-height:1px;float:right"><i class="glyphicon glyphicon-chevron-down"></i></a>
            </div>';
}

function searchTableHeaderSnippet($field='')
{
    return Form::text('s-'.$field, request()->get('s-'.$field), array('class'=>"input-sm form-control"));
}

function search_reset_buttons()
{
    return '<div class="text-center">
    <div class="btn-group btn-group-sm">
        <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-search"></i></button>
        <a href="'.Request::url().'" class="btn btn-warning"><i class="glyphicon glyphicon-refresh"></i></a>
    </div></div>';
}

function action_add_button($route)
{
    return '<a href="'.$route.'" title="Create" data-toggle="tooltip" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-plus"></i> Create</a>';
}

function action_update_button($route)
{
    return '<a href="'.$route.'" title="Update" data-toggle="tooltip" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-pencil"></i> Update</a>';
}

function shifting_buttons($object,$route1,$route2)
{
    $str = '';
    if(isSearchOrSortExecuted())
        return '';
    if($object->p_id)
        $str .= '<a href="'.$route1.'" class="btn btn-xs" data-toggle="tooltip" data-placement="auto top" title="Shift Up"><span class="glyphicon glyphicon-chevron-up"></span></a>';
    if($object->n_id)
        $str .= '<a href="'.$route2.'" class="btn btn-xs" data-toggle="tooltip" data-placement="auto bottom" title="Shift Down"><span class="glyphicon glyphicon-chevron-down"></span></a>';
    return '<div style="text-align:center;">' . $str . '</div>';
}

function isSearchOrSortExecuted()
{
    $hide = false;
    if(count(request()->all()))
    {
        if(request()->has('a') || request()->has('d'))
            $hide = true;
        else{
            foreach (request()->all() as $key => $value) {
                if(preg_match('/^s-/i', $key))
                {
                    $hide = true;
                    break;
                }
            }
        }
    }
    
    return $hide;
}