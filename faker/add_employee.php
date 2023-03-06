<?php

require_once 'vendor/autoload.php'; // Include the Faker autoloader
require_once 'config.php'; // Include the database connection details
require_once 'db .php';

$faker = Faker\Factory::create(); // Create a new instance of the Faker generator

for ($i = 0; $i < 200; $i++) {
    $id = $faker -> id;
    $lastName = $faker->lastName;
    $firstName = $faker->firstName;
    $address = $faker->address;
    $office = $faker->office;
    

    // Insert the fake record into your database
    // Here's an example using MySQLi
    $conn = mysqli_connect(DB_HOST, DB_PASS, DB_USER, DB_NAME);
    $sql = "INSERT INTO employee (id, last_name, last_name, email, address) VALUES ('$id ','$firstName', '$lastName', '$address', '$office')";
    if (mysqli_query($conn, $sql)) {
        echo "Added.";
    } else {
        echo "ERROR: Failed $sql. " . mysqli_error($conn);
    }
    $conn->query($sql);
    $conn->close();
}

?>
