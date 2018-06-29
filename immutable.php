<?php
class Person
{
    protected $name;
    protected $height;
    protected $heart;

    public function __construct($name, $height)
    {
        $this->name = $name;
        $this->height = $height;
        $this->heart = new Heart(80);
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($new_name)
    {
        $new_person = clone $this;
        $new_person->name = $new_name;
        return $new_person;
    }

    public function running(){
        $this->heart->change_heart_rate(15);
    }
}

Class Heart
{
    protected $heart_rate;

    public function __construct($heart_rate)
    {
        $this->heart_rate = $heart_rate;
    }

    public function change_heart_rate($rate){
        $this->heart_rate += $rate;
    }
}

$ami = new Person('ami', 153);

echo "amiをvar_dump\n\n";
var_dump($ami);
echo "――――――――――――――――――――――――――――\n\n";

$yamamo = $ami->setName('yamamo');

echo "yamamoをvar_dump\n\n";
var_dump($yamamo);
echo "――――――――――――――――――――――――――――\n\n";

echo "ここでamiがランニングし、心拍数が上昇\n\n";
$ami->running();

echo "――――――――――――――――――――――――――――\n\n";
echo "ランニング後のamiをvar_dump\n\n";
var_dump($ami);
echo "――――――――――――――――――――――――――――\n\n";

echo "yamamoをvar_dump（心拍数が80のままならディープコピー）\n\n";
var_dump($yamamo);
echo "――――――――――――――――――――――――――――\n\n";

