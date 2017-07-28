<?php
        require_once 'configDb.php';

        class articlesBL {

        public static function executeStatement($query, $parms) {
            $pdo = self::get_PDO();

            $stmt = $pdo->prepare($query);
            $stmt->execute($parms);
            return $stmt;
        }

        private static function get_PDO() {
            $pdo_parms = ConfigDB::build_pdo_parms('northwind');
            return new PDO($pdo_parms['dsn'], $pdo_parms['user'], $pdo_parms['pass'],  $pdo_parms['opt']);
        }

    }


?>