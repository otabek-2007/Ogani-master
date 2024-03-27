<?php

class Pagination{
    const SHOW_BY_DEFAULT = 3;
    public static function Pagination($limit = self::SHOW_BY_DEFAULT)
    {
        $page = 1;
        intval($limit);
        $db = Db::getConnection();
        $result = $db->query('SELECT name, id FROM products ORDER BY id ASC LIMIT '.$limit - 1);
        $appear = $result->fetchAll();

        for ($i = 1; $i < $limit; $i++) {
            echo `<a href="">sss</a>`;
            // return true;
        }
        return $appear;
    }

}
