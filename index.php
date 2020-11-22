<?
class Robot1{
    public $weight, $height, $speed;
    public function __construct()
    {
        $this->height = 1;
        $this->speed  = 10;
        $this->weight = 100;
    }
}
class Robot2 extends Robot1{
    public function __construct()
    {
        $this->height = 2;
        $this->speed  = 200;
        $this->weight = 200;
    }
}
class FactoryRobot{
    // сохраняем типы роботов
    public $type = [];
    // сами роботы
    public $robot = [];
    public $mergeRobot = [];
    //добавление типов роботов
    public function addType($type){
        $typeName = get_class($type);
        if (!in_array($typeName, $this->type)){
            $this->type[]=$type;
        }
    }
    // создание количества роботов
    public function createRobot($count, $type){
        for ($i = 0; $i <= $count; $i++) {
            $this->robot[]=$this->type[$type];
        }
        return $this->robot;
    }
}
class MergeRobot{
    public  $mergeRobot = [];
    public function __construct()
    {
        $this->mergeRobot;
    }
    public function createMergeRobot($robot){
        $height = [];
        $speed = [];
        $weight = [];
        foreach ($robot as $robots){
            $vars = ((get_object_vars($robots)));
            $height []  = $vars["height"];
            $speed [] = $vars["speed"];
            $weight [] = $vars["weight"];
        }
        return $this->mergeRobot =["speed"=>min($speed), "height"=>array_sum($height), "weight"=>array_sum($weight)];
    }

    public function getSpeed(){
        return $this->mergeRobot["speed"];
    }
    public function getWeight(){
        return $this->mergeRobot["weight"];
    }
    public function getHeight(){
        return $this->mergeRobot["height"];
    }

}



$factory = new FactoryRobot();
$factory->addType(new Robot1());
$factory->addType(new Robot2());
$factory->createRobot(1,1);
$factory->createRobot(1,0);
$mergeRobot = new MergeRobot();
$mergeRobot->createMergeRobot($factory->robot);
$factory->addType($mergeRobot);
$factory->createRobot(5,3);
$mergeRobot->getSpeed();

var_dump($mergeRobot->getSpeed());

