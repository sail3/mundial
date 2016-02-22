<?php
namespace MUNDIAL\Entity;

/**
 * Entidad para la tabla Category.
 */
class Category
{
  protected $title;
  protected $description;
  protected $enable = 1;
  public function setTitle($value='')
  {
    $this->title = $value;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setDescription($value='')
  {
    $this->description = $value;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEnable($value='')
  {
    $this->enable = $value;
  }
  public function isEnable()
  {
    return $this->enable;
  }
}
