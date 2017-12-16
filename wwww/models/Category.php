<?php

/**
 * Class Category
 */
class Category
{

    /**
     * Returns an array of categories for the list on the site
     */
    public static function getCategoriesList()
    {
        // Connection DB
        $db = Db::getConnection();

        // Request DB
        $result = $db->query('SELECT id, name FROM category WHERE status = "1" ORDER BY sort_order, name ASC');

        // Receiving and returning results
        $i = 0;
        $categoryList = array();
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }
        return $categoryList;
    }

    

}
