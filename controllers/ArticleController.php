<?php

require("Controller.php");

Article::setMysqli($mysqli);

class ArticleController extends Controller
{

    protected static string $model = "Article";
    protected static array $required_fields = ["name", "author", "description", "category_id"];
    public function getArticleCategory()
    {
        if (!isset($_GET["id"])) {
            echo ResponseService::response(false, "Missing Id");
            return;
        }
        $id = $_GET["id"];
        echo ResponseService::response(true, Article::getCategory($id));
        return;

    }
    public function getAllArticlesByCategory()
    {
        if (!isset($_GET["id"])) {
            $articles = Article::all();
            $articles_array = UtilService::manyToArray($articles);
            echo ResponseService::response(true, $articles_array);
            return;
        }

        $id = $_GET["id"];
        $article = UtilService::manyToArray(Article::getAllByCategoryId($id));
        echo ResponseService::response(true, $article);
        return;
    }
}

//To-Do:

//1- Try/Catch in controllers ONLY!!! 
//2- Find a way to remove the hard coded response code (from ResponseService.php) -> kinda done
//3- Include the routes file (api.php) in the (index.php) -- In other words, seperate the routing from the index (which is the engine) -> Done
//4- Create a BaseController and clean some imports -> Done