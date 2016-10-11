<?php
/**
 * Created by PhpStorm.
 * User: rogerio
 * Date: 10/10/16
 * Time: 14:46
 */

namespace CodeCommerce;


class Cart
{
    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function add($id, $name, $price)
    {
        $this->items += [
            $id => [
                'qtd' => isset($this->items[$id]['qtd']) ? $this->items[$id]['qtd'] ++ : 1,
                'name' => $name,
                'price' => $price
            ]
        ];
        return $this->items;
    }

    public function remove($id)
    {
        unset($this->items[$id]);
    }

    public function all()
    {
        return $this->items;
    }

    public function getTotal()
    {
        $total = 0;
        foreach ($this->items as $items) {
            $total += $items['qtd'] * $items['price'];
        }
        return $total;
    }

    public function setQtd($id, $qtd)
    {
        if($qtd > 0){
            $this->items[$id]['qtd'] = $qtd;
        }
    }

    public function clear()
    {
        $this->items = [];
    }

}