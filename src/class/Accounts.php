<?php //Accounts.php
    class Accounts {
        public function __construct() {
            $this->table_name = 'accounts';
        }

        public function getAllUsers($db) {
            $query = 'SELECT * from accounts';
            $stmt = $db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = [];
            while ($row = $result->fetch_assoc()) {
                array_push($data, $row);
            };
            return json_encode($data);
        }

        public function getUser ($db, $email) {
            $query = 'SELECT * from accounts where email = ?';
            $stmt = $db->prepare($query);
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            $stmt->close();
            return json_encode($user);
        }

        public function addUser ($db, $user_info) {
            [ $email, $username, $md5, $timestamp ] = $user_info;
            $balance = 5000; $chips = 0;
            
            $query = 'INSERT into accounts (email, username, md5, balance, chips, timestamp) values (?, ?, ?, ?, ?, ?)';
            $stmt = $db->prepare($query);
            $stmt->bind_param('sssiis', $email, $username, $md5, $balance, $chips, $timestamp);
            $stmt->execute();
            $stmt->close();

            return $this->getUser($db, $email);
        }

        public function getBalanceByUser ($db, $username) {
            $query = 'SELECT balance from accounts where username = ?';
            $stmt = $db->prepare($query);
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $balance = $result->fetch_assoc();
            $stmt->close();

            return json_encode(array('balance' => $balance));
        }

        public function getChipsByUser ($db, $username) {
            $query = 'SELECT chips from accounts where username = ?';
            $stmt = $db->prepare($query);
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $chips = $result->fetch_assoc();
            $stmt->close();
            
            return json_encode(array('chips' => $chips));
        }
    
    }

?>