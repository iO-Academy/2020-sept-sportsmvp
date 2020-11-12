<?php

namespace TheRealMVP;

class DisplayFilter
{
    /**
     * Iterate through each team object to display values and inject html
     *
     * @param mixed  $data
     *
     * @return string
     */
    public static function displayFilter(array $data) : string
    {
        $filterString = '';
        foreach($data as $item){
            $filterString .= '<option value="'
            . $item->getId()
            . '">'
            . $item->getName()
            . '</option>';
        }
        return $filterString;
    }
}