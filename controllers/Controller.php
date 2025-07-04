<?php

require(__DIR__ . "/../models/Article.php");
require(__DIR__ . "/../connection/connection.php");
require(__DIR__ . "/../services/UtilService.php");
require(__DIR__ . "/../services/ResponseService.php");

abstract class Controller
{
    protected static string $model;
    protected static array $required_fields;

    //getAll method returns all if there's nothing in $_GET, and if there's an id in $_GET it returns the row of the id
    public static function getAll()
    {
        if (!isset($_GET["id"])) {
            $all = static::$model::all();
            $all_arrays = UtilService::manyToArray($all);
            echo ResponseService::response(true, $all_arrays);
            return;
        }

        $id = $_GET["id"];
        $result = static::model::find($id)->toArray();
        echo ResponseService::response(true, $result);
        return;
    }
    //getAll method deletes all if there's nothing in $_GET, and if there's an id in $_GET it deletes the row of the id
    public function deleteAll()
    {
        if (!isset($_POST["id"])) {
            $all = static::model::deleteAll();
            echo ResponseService::response(true, $all);
            return;
        }

        $id = $_POST["id"];
        $all = static::$model::delete($id);
        echo ResponseService::response(true, $all);
        return;
    }
    //add method adds a row
    public function add()
    {
        foreach (static::$required_fields as $field) {
            if (!isset($_POST[$field]))
                echo ResponseService::response(false, "Missing Information");
            return;
        }
        $all = [];
        foreach (static::$required_fields as $field)
            $all[$field] = $_POST[$field];

        $inserted_id = static::$model::create($all);
        echo ResponseService::response(true, $inserted_id);
        return;
    }
    //edit method edits a row
    public function edit()
    {
        if (empty($_POST)) {
            echo ResponseService::response(false, "Nothing to edit");
            return;
        }
        $id = $_POST["id"];
        $row = [];
        foreach ($_POST as $key => $value) {
            if (strcmp($key, "id"))
                $row[$key] = $value;
        }
        $response = static::$model::update($row, $id) . " rows updated.";
        echo ResponseService::response(true, $response);
    }
}