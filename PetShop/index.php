<?php
session_start();

abstract class Pet
{
    protected $name;
    protected $age;
    protected $type;

    public function __construct($name, $age,)
    {
        $this->name = htmlspecialchars($name);
        $this->age = (int)$age;
    }

    public function greet()
    {
        return "Hi! I'm {$this->name}, {$this->age} years old and I am a {$this->type}.";
    }

    abstract public function doSomething();
}

class Dog extends Pet
{
    public function __construct($name, $age)
    {
        parent::__construct($name, $age);
        $this->type = "Dog";
    }

    public function doSomething()
    {
        return "Barf! I love licking my balls.";
    }
}

class Cat extends Pet
{
    public function __construct($name, $age)
    {
        parent::__construct($name, $age);
        $this->type = "Cat";
    }

    public function doSomething()
    {
        return "Purrr! I love Catnip! Feed me, Human.";
    }
}

class Bird extends Pet
{
    public function __construct($name, $age)
    {
        parent::__construct($name, $age);
        $this->type = "Bird";
    }

    public function doSomething()
    {
        return "MY MY! I'm a Seagull, I want your food.";
    }
}


class PetShop
{
    public function __construct()
    {
        if (!isset($_SESSION['pets'])) {
            $_SESSION['pets'] = [];
        }
    }

    public function addPet($type, $name, $age)
    {
        switch ($type) {
            case 'Dog':
                $pet = new Dog($name, $age);
                break;
            case 'Cat':
                $pet = new Cat($name, $age);
                break;
            case 'Bird':
                $pet = new Bird($name, $age);
                break;
            default:
                return;
        }
        $_SESSION['pets'][] = $pet;
    }

    public function getPets()
    {
        return $_SESSION['pets'];
    }
}

$shop = new PetShop();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'];
    $name = $_POST['name'];
    $age = $_POST['age'];

    if ($type && $name && $age) {
        $shop->addPet($type, $name, $age);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Pet Shop</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Pet Shop</h1>

    <form method="POST">
        <label>Type:</label>
        <select name="type" required>
            <option value="">Select</option>
            <option value="Dog">Dog</option>
            <option value="Cat">Cat</option>
            <option value="Bird">Bird</option>
        </select><br>

        <label>Name:</label>
        <input type="text" name="name" required><br>

        <label>Age:</label>
        <input type="number" name="age" required><br>

        <button type="submit">Add Pet</button>
    </form>

    <h2>Our Pets</h2>
    <ul>
        <?php foreach ($shop->getPets() as $pet): ?>
            <li><?= $pet->greet(); ?> — <?= $pet->doSomething(); ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>