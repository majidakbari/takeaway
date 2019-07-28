<?php

if (!function_exists('get_class_name')) {
    function get_class_name($object)
    {
        $output = get_class($object);

        return substr($output, strrpos($output, '\\') + 1);
    }
}

if (!function_exists('collection_to_array')) {
    function collection_to_array($input) {
        $result = [];
        foreach ($input as $value) {
            foreach ($value as $collection) {
               $result = array_merge($result, $collection->all());
            }
        }

        return $result;
    }
}
