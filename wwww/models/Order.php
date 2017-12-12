<?php

/**
 * Class Order
 */
class Order
{

    /**
     * Save order
     */
    public static function save($userName, $userPhone, $userDay, $userTime, $userId, $products)
    {
        // Connection with Db
        $db = Db::getConnection();

        // Test
        $sql = 'INSERT INTO product_order (user_name, user_phone, user_day, user_time, user_id, products) '
                . 'VALUES (:user_name, :user_phone, :user_day, :user_time, :user_id, :products)';

        $products = json_encode($products);

        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_day', $userDay, PDO::PARAM_STR);
        $result->bindParam(':user_time', $userTime, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $result->bindParam(':products', $products, PDO::PARAM_STR);

        return $result->execute();
    }

    /**
     * Returns the list of orders
     */
    public static function getOrdersList()
    {
        // Connection with Db
        $db = Db::getConnection();

        // Receiving and returning results
        $result = $db->query('SELECT id, user_name, user_phone, date, status FROM product_order ORDER BY id DESC');
        $ordersList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $ordersList[$i]['id'] = $row['id'];
            $ordersList[$i]['user_name'] = $row['user_name'];
            $ordersList[$i]['user_phone'] = $row['user_phone'];
            $ordersList[$i]['date'] = $row['date'];
            $ordersList[$i]['status'] = $row['status'];
            $i++;
        }
        return $ordersList;
    }

  

    /**
     * Returns the order with the specified id
     */
    public static function getOrderById($id)
    {
        // Connection with DB
        $db = Db::getConnection();

        // Test
        $sql = 'SELECT * FROM product_order WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // We indicate that we want to get data in the form of an array
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Executing the query
        $result->execute();

        // Returning data
        return $result->fetch();
    }

    /**
     * Deletes an order with the specified id
     */
    public static function deleteOrderById($id)
    {
        // Connection with DB
        $db = Db::getConnection();

        // Test
        $sql = 'DELETE FROM product_order WHERE id = :id';

        // Receiving and returning results. A prepared query is used
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Edits an order with the specified id
     */
    public static function updateOrderById($id, $userName, $userPhone, $userDay, $userTime, $date, $status)
    {
        // Connection with DB
        $db = Db::getConnection();

        // Test
        $sql = "UPDATE product_order
            SET 
                user_name = :user_name, 
                user_phone = :user_phone, 
                user_day = :user_day, 
                user_time = :user_time, 
                date = :date, 
                status = :status 
            WHERE id = :id";

        // Receiving and returning results. A prepared query is used
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_day', $userDay, PDO::PARAM_STR);
        $result->bindParam(':user_time', $userTime, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }

}
