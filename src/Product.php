<?php

namespace Alialbair\BelajarPhpUnitTest;

class Product{
    private string $id, $name, $description;
    private int $pirce, $quantity;

    public function getId():string{
        return $this->id;
    }

    public function setId(string $id):void{
        $this->id = $id;
    }

    public function getName():string{
        return $this->name;
    }

    public function setName(string $name):void{
        $this->name = $name;
    }

    public function getDescription():string{
        return $this->description;
    }

    public function setDescription(string $description):void{
        $this->description = $description;
    }

    public function getPrice():string{
        return $this->pirce;
    }

    public function setPirce(int $price):void{
        $this->pirce = $price;
    }

    public function getQuantity():string{
        return $this->id;
    }

    public function setQuantity(int $quantity):void{
        $this->quantity = $quantity;
    }
}
?>