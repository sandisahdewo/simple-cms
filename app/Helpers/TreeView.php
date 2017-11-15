<?php

function tree($elements, $parentId = 0, $parentName = 'parent_id', $idName = 'id') {
	$branch = array();

    foreach ($elements as $element) {
        if ($element[$parentName] == $parentId) {
            $children = tree($elements, $element[$idName]);
            if ($children) {
                $element['children'] = $children;
            }
            $branch[] = $element;
        }
    }

    return $branch;
}

function treeData($elements, $separator = 0) {
	$branch = [];
	foreach($elements as $key => $element) {
		$element->level = $separator;
		$branch[] = $element;
		if($element->children) {
			$separator++;
			$branch = array_merge($branch, treeData($element->children, $separator));
			$separator--;
		} 
	}		
	return $branch;
}

function checkboxTree($elements, $separator = 0, $value = null) {
	$branch = [];
	foreach($elements as $key => $element) {
		$branch[] = str_repeat('&nbsp;&nbsp;&nbsp;', $separator).
					Form::checkbox('id_kategori['.$element->id.']', $element->id).' '.
					Form::label('id_kategori', $element->kategori);
		if($element->children) {
			$separator++;
			$branch = array_merge($branch, checkboxTree($element->children, $separator));
			$separator--;
		} 
	}	
	return $branch;
}

function selectTree($elements, $value, $label, $separator = 0) {
	$branch = [];	
	foreach($elements as $key => $element) {		
		$element->label = str_repeat('--', $separator) . $element->$label;
		$branch[$element->id] = $element->label;
		if($element->children) {
			$separator++;
			$branch = array_merge($branch, selectTree($element->children, $value, $label, $separator));
			$separator--;
		} 
	}		
	return $branch;
}


