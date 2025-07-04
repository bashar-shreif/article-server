<?php

require("Controller.php");

Category::setMysqli($mysqli);

class CategoryController extends Controller
{
    protected static string $model = "Category";
    protected static string $service = "CategoryService";
    protected static array $required_fields = ["category", "description"];
}