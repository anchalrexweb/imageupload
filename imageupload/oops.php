<?php
class Fruits{
    static public $x=10;
    // protected $num;
    static function fun1(){
        echo "start class1<br>";
        // $this->num=1;
    }
    
    function __destruct(){
        echo "<br>end";
    }

}
// class class2 extends Fruits{
//     function __construct(){
//         // echo "start class2<br>";
//         parent::__construct();
//         $this->num=3;
        
//     }
// }
// $obj = new Fruits();
//    $obj->fun1();
echo Fruits::fun1();
   

?>