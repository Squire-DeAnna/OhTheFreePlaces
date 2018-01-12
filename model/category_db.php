<?php
class categoryDB{
function get_categories() {
    global $db;
    $query = "SELECT * FROM categories
            ORDER BY categoryName";
    $statement = $db->query($query);
    $categories = array();
    foreach ($statement as $row){
        $category = new Category();
        $category->setID($row['categoryID']);
        $category->setName($row['categoryName']);
            $categories[] = $category;
        }
        return $categories;

    }

function get_category($category_id) {
        global $db;
        $query = "SELECT * FROM categories
                  WHERE categoryID = '$category_id'";
        $statement = $db->query($query);
        $row = $statement->fetch();
        $category = new Category();
        $category->setID($row['categoryID']);
        $category->setName($row['categoryName']);
        return $category;
    }
}

class Category {
    private $id, $name;

    public function construct() {
        $this->id = 0;
        $this->name = '';
    }

    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;
    }
}
    