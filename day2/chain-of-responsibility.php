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

        $promo08 = new Promo_08();
        $promo01 = new Promo_01();
        $promo10 = new Promo_10();

        $promo08->setNext(new Promo_01);
        $promo01->setNext(new Promo_10);

        $price = $promo08->calculate($sn, $price);

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
    protected $next = null;

    public function calculate($sn, $price)
    {
        if ($this->accept($sn)) {
            return $this->getNewPrice($price);
        } else {
            return $this->next->calculate($sn, $price);
        }
        return $price;
    }

    public function setNext(Promo $promo)
    {
        $this->next = $promo;
    }

    abstract protected function accept($sn);

    protected function getNewPrice($price)
    {
        return $price;
    }
}

class Promo_08 extends Promo
{
    public function accept($sn)
    {
        $type = substr($sn, 0, 1);
        return ('A' === $type);
    }

    public function getNewPrice($price)
    {
        return $price * 0.8;
    }
}

class Promo_01 extends Promo
{
    public function accept($sn)
    {
        $type = substr($sn, 0, 1);
        return ('B' === $type);
    }

    public function getNewPrice($price)
    {
        return $price * 0.1;
    }
}

class Promo_10 extends Promo
{
    public function accept($sn)
    {
        $type = substr($sn, 0, 1);
        return ('C' === $type);
    }

    public function getNewPrice($price)
    {
        return $price -= 10;
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