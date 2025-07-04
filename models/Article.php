<?php
require("Model.php");
require("Category.php");

class Article extends Model
{

    private int $id;
    private string $name;
    private string $author;
    private string $description;
    private int $category_id;

    protected static string $table = "articles";
    protected static string $primaryKey = "id";

    public function __construct(array $data)
    {
        $this->id = $data["id"];
        $this->name = $data["name"];
        $this->author = $data["author"];
        $this->description = $data["description"];
        $this->category_id = $data["category_id"];
    }
    public function getCategoryId(): int
    {
        return $this->category_id;
    }
    public function setCategoryId(int $category_id)
    {
        $this->category_id = $category_id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setAuthor(string $author)
    {
        $this->author = $author;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function toArray()
    {
        return [$this->id, $this->name, $this->author, $this->description, $this->category_id];
    }
    public static function getCategory(int $id)
    {
        $mysqli = self::$mysqli;
        $sql = sprintf("SELECT category FROM categories WHERE id = (SELECT category_id FROM articles WHERE id = %s)", $id);
        $query = $mysqli->prepare($sql);
        $query->execute();
        $category = $query->get_result();
        $category = $category->fetch_assoc();
        return $category["category"];
    }
    public static function getAllByCategoryId(int $id)
    {
        $mysqli = self::$mysqli;
        $sql = sprintf("Select * from articles where category_id = %s", $id);

        $query = $mysqli->prepare($sql);
        $query->execute();

        $data = $query->get_result();

        $objects = [];
        while ($row = $data->fetch_assoc()) {
            $objects[] = new Article($row); //creating an object of type "static" / "parent" and adding the object to the array
        }

        return $objects;
    }
}
