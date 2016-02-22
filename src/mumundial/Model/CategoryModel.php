<?php
namespace MUNDIAL\Model;

use Silex\Application;
use MUNDIAL\Entity\Category;
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
  public function save(Category $category)
  {
    $sql = "INSERT INTO Category (title, description, enable) values (?,?,?)";
    $statement = $this->database->prepare($sql);
    $statement->bindValue(1, $category->getTitle());
    $statement->bindValue(2, $category->getDescription());
    $statement->bindValue(3, $category->isEnable());
    $statement->execute();
  }
  public function delete($idCategory)
  {
    $sql = "DELETE from Category WHERE idCategory = ?";
    $statement = $this->database->prepare($sql);
    $statement->bindValue(1, $idCategory);
    $statement->execute();
  }
  public function update(Category $category)
  {
    $sql = "UPDATE Category set title=?, description=?, enable=? where idCategory =?";
    $statement->bindValue(1, $category->getTitle());
    $statement->bindValue(2, $category->getDescription());
    $statement->bindValue(3, $category->hasEnable());
    $statement->bindValue(4, $category->getIdCategory());
    $statement->execute();
  }
}
