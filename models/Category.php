<?php
require_once("Model.php");

class Category extends Model{

    private int $id; 
    private string $category;
    private string $description;
    
    protected static string $table = "categories";
    protected static string $primary_key = "id";    

    public function __construct(array $data){
        $this->id = $data["id"];
    }

    public function toArray(){
        return [$this->id, $this->category, $this->description];
    }
}
