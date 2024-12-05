<?php
class BaseController {
    protected function render($view, $data = []) {
        extract($data);
        include_once "views/" . $view . ".php";
    }
}