<?php

class Query extends Database{


  /* methods for returning rows from database */

  public static function returnRows($query, $array = [], $returnRows = false){

      if(!empty($query)){
          $stm = self::$db->prepare($query);
      }
      if(!empty($array)){
        $stm->execute($array);
      }else{
        $stm->execute();
      }

      if($stm){
          return $returnRows ? $stm->fetch(PDO::FETCH_OBJ) : $stm->fetchAll(PDO::FETCH_OBJ);
      }
  }
  public static function runQuery($query, $array = []){

      if(!empty($query)){
          $stm = self::$db->prepare($query);
      }
      if(!empty($array)){
        $stm->execute($array);
      }else{
        $stm->execute();
      }
      return $stm;
  }

 /* methods for returning elements */

  public static function all(){

      $class = get_called_class();

      $query = "SELECT * FROM " .$class::$table;
      return self::returnRows($query);
  }

  public static function find($id){
    //var_dump($id);;exit;
    $class = get_called_class();

    $query = "SELECT * FROM ".$class::$table. " WHERE id = :id";

    $array = [
      ':id' => $id
    ];
    $find_object = self::returnRows($query, $array, true);

    return self::setObjectPropertys($find_object);
  }

  public static function setObjectPropertys($find_object){

      $class = get_called_class();

      $object = new $class();

      $find_object_vars = get_object_vars($find_object);

      foreach($find_object_vars as $key => $value){

          $object->$key = $value;
      }
      return $object;

  }

  /* methods for create update and delete methods */


  public function create_query(){

    $object_vars = get_object_vars($this);
  //  var_dump($object_vars);exit;

    $inserted_object_propertys = $this->attribute_has_value($object_vars);

    $array_keys = array_keys($inserted_object_propertys);
    /* string keys */
    $string_keys = implode(",", $array_keys);
    $string_values = ':'.implode(",:", $array_keys);

    $string_arrays = [];
    $string_arrays['string_keys'] = $string_keys;
    $string_arrays['string_values'] = $string_values;

    return $string_arrays;
  }

  public function update_and_delete_query(){

    $object_vars = get_object_vars($this);

    $inserted_object_propertys = $this->attribute_has_value($object_vars);
  //  var_dump($inserted_object_propertys);exit;

    return $this->getQueryString($inserted_object_propertys);

  }

  public function getQueryString($inserted_object_propertys){

    $array_keys = "";
    $array_id = "";

    foreach($inserted_object_propertys as $key => $value){
        if($key === 'id'){
            $array_id .= $key. '= :' .$key. ',';
             continue;
        }
        $array_keys .= $key. ' = :' .$key. ',';
    }
    $query = [];
    $query['parametars']  = rtrim($array_keys,',');
    $query['id']  = rtrim($array_id,',');

    return $query;
  }

  public function bind_array($id = null){

    $object_vars = get_object_vars($this);

    $inserted_object_propertys = $this->attribute_has_value($object_vars);

    $array_propertys = [];
    foreach($inserted_object_propertys as $key => $value){
        if($id === true && $key == 'id'){
            $array_propertys[':'.$key] = $value;
            break;
        }

        $array_propertys[':'.$key] = $value;
    }
    return $array_propertys;
  }

  public function attribute_has_value($objectPropertys){

      $insert_Object_Propertys = [];

      foreach($objectPropertys as $key => $value){
        if($value !== null){

            if($key === 'password'){
                $value = md5($value);
            }
            $insert_Object_Propertys[$key] = $value;
        }
      }
      return $insert_Object_Propertys;

  }

  /* Create Update and Delete methods */

  public function create(){

    $query_part = $this->create_query();

    $query = 'INSERT INTO '.static::$table .'('.  $query_part['string_keys'] .') VALUES ('. $query_part['string_values']  .')';

    $bindArray = $this->bind_array();

    return self::runQuery($query,$bindArray);
  }

  public function update(){

      $query_part = $this->update_and_delete_query();

      $query = 'UPDATE '.static::$table.' SET '. $query_part['parametars'] .' WHERE '.$query_part['id'];

      $bindArray = $this->bind_array();

      return self::runQuery($query,$bindArray);
  }
  public function delete(){

      $query_part = $this->update_and_delete_query();

      $query = "DELETE FROM ".static::$table. " WHERE ".$query_part['id'];

      $bindArray = $this->bind_array(true);
  
      return $this->runQuery($query,$bindArray);
  }




}
