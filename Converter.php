<?php
  class Converter{


    /**
    * 0 -- >
    * @return Dataabase column name
    */
    public static function getStatusColumnName($num){
      return sprintf("status%d",$num);
    }

    /**
    * 0 -- >
    * @return Dataabase column name
    */
    public static function getSeatidColumnName($num){
      return sprintf("stuid_time%d",$num);
    }

  }



  print Converter::getStatusColumnName(3);
  print Converter::getSeatidColumnName(3);
?>
