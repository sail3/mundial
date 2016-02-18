<?php
namespace MUNDIAL\Model;

use Silex\Application;
/**
 * Modelo para la tabla Category.
 */
class CategoryModel {
  private $database;

  public function __construct(Application $app)
  {
    $this->database = $app['db'];
  }

  public function retrieveAll()
  {
    $sql = "SELECT * from Category";
    return $this->database->fetchAll($sql);
  }
  public function retrieve($idCategory = null)
  {
    $sql = "SELECT * FROM Category WHERE idCategory = ?";
    $statement = $this->database->prepare($sql);
    $statement->bindValue(1, $idCategory);
    $statement->execute();
    return $statement->fetchAll();
  }
  public function insert($title, $description)
  {
    $sql = "INSERT INTO Category (title, description, enable) values (?,?,?)";
    $statement = $this->database->prepare($sql);
    $statement->bind(1, $title);
    $statement->bind(2, $description);
    $statement->bind(3,1);
    $statement->execute();
  }
  public function delete($idCategory)
  {
    $sql = "DELETE from Category WHERE idCategory = ?";
    $statement = $this->database->prepare($sql);
    $statement->bindValue(1, $idCategory);
    $statement->execute();
  }
  public function udate($idCategory, $title, $description, $enable)
  {
    $sql = "UPDATE Category set idCategory=?, title=?, description=?, enable=? where idCategory =?";
    $statement->bindValue(1, $idCategory);
    $statement->bindValue(2, $title);
    $statement->bindValue(3, $description);
    $statement->bindValue(4, $enable);
    $statement->bindValue(5, $isCategory);
    $statement->execute();
  }
}
