<?php 

class UtilService {

    public static function manyToArray($entities){
        $results = [];

        foreach($entities as $e){
             $results[] = $e->toArray(); //hence, we decided to iterate again on the articles array and now to store the result of the toArray() which is an array. 
        } 

        return $results;
    }



}