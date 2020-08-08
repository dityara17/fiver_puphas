<?php

session_start();
define('base_url', 'http://localhost:8080/fiverr_pizza/');

class MainClass
{

    function __construct()
    {
        $host = "localhost";
        $user = "root";
        $pw = "";
        $db = "fiver_puphas";
        $this->db = new PDO("mysql:$host", $user, $pw);
        $this->db->exec("CREATE DATABASE IF NOT EXISTS $db");
        $this->db->exec("USE $db");
    }

    function login($u, $pass)
    {

        $to = $this->db->query("SELECT * FROM users where username='$u' AND password='$pass' ");
        if ($to->rowCount() > 0) {
            $_SESSION['admin'] = $to->fetch(PDO::FETCH_ASSOC);
            return 1;
        } else {
            return 0;
        }

    }

    function getPv()
    {
        return $this->db->query("select * from product_varians order by id_pv desc ")->fetchAll();
    }

    function storePv($name)
    {
        $stmt = $this->db->prepare("INSERT INTO `product_varians`( `name`) VALUES (?)");
        $stmt->execute([$name]);
        return true;
    }

    function destoryPv($id)
    {
        $this->db->query("delete from product_varians where id_pv = '$id' ");
    }

    function storeTransaction($pv, $name, $address, $phone, $message)
    {
        $stmt = $this->db->prepare("INSERT INTO `transaction`( `pv_id`, `name`, `address`, `phone`, `message`) VALUES (?,?,?,?,?)");
        $stmt->execute([$pv, $name, $address, $phone, $message]);
    }

    function getNotify()
    {
        return $this->db->query("select * from transaction limit 0,9 ")->fetchAll(PDO::FETCH_ASSOC);
    }

    function time_elapsed_string($datetime, $full = false)
    {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    function updatePv($name, $id)
    {
        $stmt = $this->db->prepare("update product_varians set name = ? where  id_pv = ? ");
        $stmt->execute([$name, $id]);
    }

    function getPvById($id)
    {
        return $this->db->query("select * from product_varians where id_pv ='$id' ")->fetch();
    }

    function getTransaction()
    {
        return $this->db->query("select *, t.name as tname, pv.name as pvname 
            from transaction t 
            join   product_varians pv on t.pv_id =pv.id_pv
            order by id desc ");
    }

}

$use = new MainClass();