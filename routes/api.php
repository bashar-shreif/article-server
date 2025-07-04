<?php
//Routing starts here (Mapping between the request and the controller & method names)
//It's an key-value array where the value is an key-value array
//----------------------------------------------------------
$apis = [
    '/articles' => ['controller' => 'ArticleController', 'method' => 'getAll'],
    '/delete_articles' => ['controller' => 'ArticleController', 'method' => 'deleteAll'],
    '/add_article' => ['controller' => 'ArticleController', 'method' => 'add'],
    '/get_article_category' => ['controller' => 'ArticleController', 'method' => 'getArticleCategory'],
    '/get_articles_of_category' => ['controller' => 'ArticleController', 'method' => 'getAllArticlesByCategory'],
    //'/edit_article' => ['controller' => 'ArticleController', 'method' => 'edit'],
    '/categories' => ['controller' => 'CategoryController', 'method' => 'getAll'],
    '/delete_categories' => ['controller' => 'CategoryController', 'method' => 'deleteAll'],
    '/add_category' => ['controller' => 'CategoryController', 'method' => 'add'],
    '/edit_category' => ['controller' => 'CategoryController', 'method' => 'edit'],
    '/login' => ['controller' => 'AuthController', 'method' => 'login'],
    '/register' => ['controller' => 'AuthController', 'method' => 'register'],

];

include("routes.php");
?>