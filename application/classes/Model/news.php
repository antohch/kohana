<?php defined('SYSPATH') or die('No direct script access.');

class Model_News extends Model{
    public function allNews(){
        $query = DB::query(Database::SELECT, 'SELECT id, title, intro, date FROM news');
        $arr = array_slice(array_reverse($query->execute()->as_array()),0,2);
        return $arr;
    }
    public function newsPage(){
        $query = DB::query(Database::SELECT, 'SELECT id, title, intro, content, date FROM news');
        return array_reverse($query->execute()->as_array());
    }
    public function newsOne($id = 0){
        $query = DB::query(Database::SELECT, 'SELECT id, title, intro, content, date FROM news WHERE id = :id');
        $query->param(':id', $id);
        return $query->execute()->as_array();
    }
    public function newsNext($id = 0){
       $query = DB::query(Database::SELECT, 'SELECT id, title, intro, content, date FROM news');
       $allNews = $query->execute()->as_array();
       $idNext = null;
       foreach($allNews as $k => $v){
           if($v['id'] == $id){
               if(isset($allNews[$k+1])){
                   $idNext = $allNews[$k+1]['id'];
               }
           }
       }
       return $idNext;
    }
    public function newsBack($id = 0){
       $query = DB::query(Database::SELECT, 'SELECT id, title, intro, content, date FROM news');
       $allNews = $query->execute()->as_array();
       $idBack = null;
       foreach($allNews as $k => $v){
           if($v['id'] == $id){
               if(isset($allNews[$k-1])){
                  $idBack = $allNews[$k-1]['id'];
               }
           }
        }
        return $idBack;
    }
    public function update($id = null, $title = null, $intro = null, $content = null, $date = null){
        $query = DB::update('news')->set(array(
                'title' => $title,
                'intro' => $intro,
                'content' => $content,
                'date' => $date,
            ))->where('id', '=', $id);
        $query->execute();
        return $query;
    }
}
