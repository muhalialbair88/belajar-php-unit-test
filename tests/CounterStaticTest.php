<?php

namespace Alialbair\BelajarPhpUnitTest;

use PHPUnit\Framework\TestCase;

class CounterStaticTest extends TestCase{

    public static Counter $counter;


    //setUpBeforeClass() adalah function static, yang dapat sharing variable di setiap test
    //atau bisa pakai @beforeClass
    //hanya dijalankan di awal test(hanya dibuat new objek di test awal)
    public static function setUpBeforeClass(): void
    {
        self::$counter = new Counter();
    }

    public function testFirst(){
        self::$counter->increment();
        self::assertEquals(1, self::$counter->getCounter());
    }

    public function testSecond(){
        self::$counter->increment();
        self::assertEquals(2, self::$counter->getCounter());
    }

    //tearDownAfterClass() adalah function static, yang dapat sharing variable di setiap test
    //atau bisa pakai @afterClass
    //hanya dijalankan di akhir test(hanya dibuat new objek di test akhir)
    public static function tearDownAfterClass(): void
    {
        echo "Unit Test Selesai" . PHP_EOL;
    }
}

?>