<?php

class Model
{
    public function getProduct()
    {
        return array(
            'id'    => 10,
            'name'  => 'Naf-naf'
        );
    }

    public function getCategoryList()
    {
        return new ArrayObject(array(
            '1' => 'Books',
            '2' => 'PC'
        ));
    }
}