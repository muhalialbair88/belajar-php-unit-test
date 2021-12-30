<?php

namespace Alialbair\BelajarPhpUnitTest;

class Counter{

    private int $counter = 0;

    public function increment():void{
        $this->counter++;
    }

    public function getCounter(){
        return $this->counter;  
    }
}
?>