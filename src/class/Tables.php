<?php //Tables.php

    class Tables {

        public function getAllTables($db) {
            $query = 'SELECT * from rooms';
            $stmt = $db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            $data = [];
            while ($row = $result->fetch_assoc()) {
                array_push($data, $row);
            }
            
            $stmt->close();
            return json_encode($data);
        }

        public function addTable($db, $table_info) {
            [ $room, $player_names, $variant, $stakes, $pot_limit, $avg_pot ] = $table_info;
            
            $query = 'INSERT into rooms (room, player_names, variant, stakes, pot_limit, avg_pot) values (?, ?, ?, ?, ?, ?)';
            $stmt = $db->prepare($query);
            $stmt->bind_param('sssssi', $room, $player_names, $variant, $stakes, $pot_limit, $avg_pot);
            $stmt->execute();
            $stmt->close();

            return json_encode(array('msg' => 'success! new poker table added!'));
        }

        public function getTable($db, $table_name) {
            $query = 'SELECT * from rooms where room = ?';
            $stmt = $db->prepare($query);
            $stmt->bind_param('s', $table_name);
            $stmt->execute();

            $result = $stmt->get_result();
            return json_encode($result);
        }

        public function removeTable($db, $table_name) {
            $query = 'DELETE from rooms where room = ?';
            $stmt = $db->prepare($query);
            $stmt->bind_param('s', $table_name);
            $stmt->execute();

            return json_encode(array('msg' => 'success! poker table deleted!'));
        }

        public function updatePlayerNames($db, $request_info) {
            [ $table_name, $player_names ] = $request_info;
            /* INSERT into rooms (player_names)  */
            $query = 'UPDATE rooms set player_names = ? where room = ?';
            $stmt = $db->prepare($query);
            $stmt->bind_param('ss', $player_names, $table_name);
            $stmt->execute();

            $result = $stmt->get_result();
            return json_encode($result);
        }

    }

?>