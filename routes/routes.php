<?php

require("Route.php");

Route::Route($apis, '/edit_article', 'ArticleController::edit()');

?>