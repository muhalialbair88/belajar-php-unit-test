<?php

namespace Alialbair\BelajarPhpUnitTest;

use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase{

    //setUP() diguanakn apabila ada code yang ingin dijalankan sebelum test dimuali, 
    //Contohnya dengan membuat attribute objek, sehingga tidak perlu mendeklarasikan berulang setiap kali test dibuat.
    //setUP() 10x test == 10x dipanggil berulang(direset).
    private Person $person;

    protected function setUp(): void
    {
        // $this->person = new Person("Ali"); misalnya dipindahkan deklarasinya di create Person(), sama saja
    }

    //@before menyerupai function sebelumnya jadi sama saja, contoh setUp() dan createPerson() adalah sama
    /**
     * @before
     */
    public function createPerson(){
        $this->person = new Person("Ali");
    }


    public function testSuccess(){
        // $person = new Person("Ali");tidak perlu karena sudah di setUP()
        self::assertEquals('Hello Safhira, My Name is Ali', $this->person->sayHello("Safhira"));    
    }

    public function testException(){
        // $person = new Person("Ali"); tidak perlu karena sudah di setUP()
        $this->expectException(\Exception::class);
        $this->person->sayHello(null);
    }

    //jadi jika ada feature yang tidak mengambalikan value, hanya void echo saja maka dapat menggunakan expectOutputString()
    public function testGoodByeSuccess(){
        // $person = new Person("Ali"); tidak perlu karena sudah di setUP()
        $this->expectOutputString("Good Bye Safhira" . PHP_EOL);
        $this->person->sayGoodBye("Safhira");
    }

     //tearDown() diguanakn apabila ada code yang ingin dijalankan sesudah test berhasil dipanggil, 
    //tearDown() 10x test == 10x dipanggil berulang(direset).
    protected function tearDown(): void
    {
        echo "Tear Down". PHP_EOL;
    }

    //@after menyerupai function sesudahnya jadi sama saja, contoh tearDown() dan After() adalah sama
    /**
     * @after
     */
    protected function After(){
        echo "After" . PHP_EOL;
    }
}
?>