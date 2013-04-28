<?php


class Cart
{
    protected static $_priceTable = [
        'A0001' => 100,
        'A0002' => 150,
        'B0001' => 300,
        'B0002' => 200,
        'AB001' => 200,
        'AB002' => 200,
    ];
    protected $_total = 0;
    protected $_items = [];

    public function add($sn, $quantity)
    {
        $price = static::$_priceTable[$sn];

        $type = substr($sn, 0, 1);
        if ('A' === $type) {
            $price *= 0.8;
        } elseif ('B' === $type) {
            $price *= 0.1;
        } elseif ('C' === $type) {
            $price -= 10;
        }

        $this->_items[$sn] = [$price, $quantity];
    }

    public function listAll()
    {
        foreach ($this->_items as $sn => $info) {
            list($price, $quantity) = $info;
            echo $sn . ' (' . $price . ') x ' . $quantity, "\n";
        }
    }

    public function calculate()
    {
        foreach ($this->_items as $sn => $info) {
            list($price, $quantity) = $info;
            $this->_total += $price * $quantity;
        }
    }

    public function getTotal()
    {
        return $this->_total;
    }
}

abstract class Promo
{
    public function calculate($sn, $price)
    {
        return $price;
    }
}

class Promo_08
{
    public function calculate($sn, $price)
    {
        $type = substr($sn, 0, 1);
        if ('A' === $type) {
            return $price * 0.8;
        }
        return $price;
    }
}

class Promo_01
{
    public function calculate($sn, $price)
    {
        $type = substr($sn, 0, 1);
        if ('B' === $type) {
            return $price * 0.1;
        }
        return $price;
    }
}

class Promo_10
{
    public function calculate($sn, $price)
    {
        $type = substr($sn, 0, 1);
        if ('C' === $type) {
            return $price - 10;
        }
        return $price;
    }
}


$cart = new Cart();
$cart->add('A0001', 1);
$cart->add('A0002', 2);
$cart->add('B0001', 1);
$cart->add('B0002', 2);
$cart->add('AB001', 1);
$cart->add('AB002', 2);
$cart->calculate();
$cart->listAll();
echo $cart->getTotal(), "\n";