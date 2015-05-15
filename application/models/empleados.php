<?php
class Articulo_model extends Model {

   function __construct(){
      parent::Model();
   }
   
   function dame_ultimos_articulos(){
      $ssql = "select * prueba";
      return mysql_query($ssql);
   }
}
?>