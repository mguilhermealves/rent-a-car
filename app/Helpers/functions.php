<?php

function mask($val, $mask)
{
    $maskared = '';
    $k = 0;
    for ($i = 0; $i <= strlen($mask) - 1; ++$i) {
        if ($mask[$i] == '#') {
            if (isset($val[$k])) {
                $maskared .= $val[$k++];
            }
        } else {
            if (isset($mask[$i])) {
                $maskared .= $mask[$i];
            }
        }
    }

    return $maskared;
}


function clean_string($str)
{
	return str_replace(['.', ' ', '/', '-', '(', ')'],  '', $str);
}

/**
 * Set form-control prefix class in Bootstrap form elements
 *
 * @param string $name
 * @param array $attribute
 * @return array
 */
function bs_form_attr($name, array $attributes)
{
	return array_merge($attributes, ['id' => $name, 'class' => 'form-control' . (isset($attributes['class']) ? ' ' . $attributes['class'] : null)]);
}


function date_en($value, $format='Y-m-d')
{
	$value = str_replace("/", "-", $value);
	return date($format, strtotime($value));
}


function date_br($value, $format='d/m/Y')
{
   return date($format, strtotime($value));
}

/**
 * Modify a named input to nested with dots
 *
 * @param string $name
 * @return string
 */
function nested_input($name)
{
	return str_replace(['[', ']'], ['.', ''], $name);
}
