<?php
require ("Person.php");
// Sử dụng class
$person = new Person();
$person->setAge(12);
$person->setName('John');
$person->setAddress('123 Main Street');
// hiển thị thông tin
echo $person->getInfo() . "<br>";
if ($person->canVote()) {
    echo "this person can vote";
} else {
    echo "this person cannot vote";
}
?>