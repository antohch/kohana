<?php defined('SYSPATH') or die('No direct script access.');

class Model_News extends Model{
    public function allNews(){
        $query = DB::query(Database::SELECT, 'SELECT id, title, intro, date FROM news');
        return $query->execute()->as_array();
    }
}
