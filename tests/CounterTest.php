<?php

//namespace dibuat sama agar tidak perlu require_once
namespace Alialbair\BelajarPhpUnitTest;

use PhpParser\Node\Expr\FuncCall;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

//wajib extends TestCase
//best practice nameclassTest
//best practice namefuntionTest
class CounterTest extends TestCase{

    public function testIncrement(){
        $counter = new Counter();
        self::assertEquals(0, $counter->getCounter());
        //markTestIncomplete(), memberi tanda bahwa test ini belum selesai
        //Jangan memakai comment!!!
        self::markTestIncomplete("TODO Increment");
        //code dibawah ini tidak akan dijalankan karena markTestIncomplete()
    }

    public function testCounter(){
        $counter = new Counter;
        // $counter = new Counter; isActive == error
        $counter->increment();

        //Assert(Pengecekan Menggunakan Class PHPUnit)
        Assert::assertEquals(1, $counter->getCounter());
        
        $counter->increment();
        //$this->assertEquals(1, $counter->getCounter()); $this(karna, TestCase extends Assert) Correct
        $this->assertEquals(2, $counter->getCounter());
        
        $counter->increment();
        //self::assertEquals(1, $counter->getCounter()); self(karna, TestCase extendss Assert) Correct
        self::assertEquals(3, $counter->getCounter());

        //run: vendor/bin/phpunit tests/CounterTest.php
        //run specific function: vendor/bin/phpunit --filter 'CounterTest::testCounter' tests/CounterTest.php
    }

    /**
     * @test
     */
    public function increment(){
        $counter = new Counter;
        //markTestSkipped(), memberi tanda bahwa test ini dilewati/skip
        self::markTestSkipped("Masih ada error yang bingung");
        //code dibawah ini tidak akan dijalankan karena markTestSkipped()
        // $counter = new Counter; isActive == error
        $counter->increment();

        //Assert(Pengecekan Menggunakan Class PHPUnit)
        Assert::assertEquals(1, $counter->getCounter());
    }

    public function testFirst():Counter{
        $counter = new Counter();
        $counter->increment();
        $this->assertEquals(1, $counter->getCounter());

        return $counter;
    }

    //@depends adalah test yang dilakukan selanjutnya dengan merujuk test pertama
    //jika test pertama gagal, maka berhenti jika berhasil maka lanjut
    /**
     * @depends testFirst
     */
    public function testSecond(Counter $counter):void{
        $counter->increment();
        $this->assertEquals(2, $counter->getCounter());
    }

    //@requires adalah skip test menggunakan pengecekean
    //contoh  dibawah ini, hanya di OS Windows 
    /**
     * @requires OSFAMILY Windowns
     */
    public function testOnlyWindows(){
        self::assertTrue(true, "Only in Windows");
    }

    //@requires adalah skip test menggunakan pengecekean
    //contoh  dibawah ini, hanya di OS Windows dan PHP 8
    /**
     * @requires OSFAMILY Windowns
     * @requires PHP >=8
     */
    public function TestOnlyWindowsAndPHP8(){
        self::assertTrue(true, "Only in Windows");
    }
}
?>