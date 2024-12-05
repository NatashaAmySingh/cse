<?php
require_once "models/UserModel.php";

class UserController {
    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    // List all users
    public function listUsers() {
        $users = $this->model->getAllUsers();
        include "views/users/index.php";
    }

    // Show form to create a user
    public function createForm() {
        include "views/users/create.php";
    }

    // Handle creating a new user
    public function createUser() {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        if ($this->model->createUser($name, $email, $password, $role)) {
            header("Location: index.php?controller=user&action=listUsers");
        } else {
            echo "Error creating user.";
        }
    }

    // Delete a user
    public function deleteUser() {
        $id = $_GET['id'];
        if ($this->model->deleteUser($id)) {
            header("Location: index.php?controller=user&action=listUsers");
        } else {
            echo "Error deleting user.";
        }
    }
}
?>