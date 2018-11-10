 <?php

/* 
 * Copyright (C) 2013 peredur.net
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

// include_once 'psl-config.php';   // Needed because functions.php is not included

// $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
// if ($mysqli->connect_error) {
//     header("Location: ../error.php?err=Unable to connect to MySQL");
//     exit();}


$dsn = "pgsql:"
    . "host=ec2-107-22-164-225.compute-1.amazonaws.com;"
    . "dbname=d67g1hfdl781i1;"
    . "user=xlacznqbnaszsb;"
    . "port=5432;"
    . "sslmode=require;"
    . "password=e084270b0c2bbb5d3eba824d3df45bab5c734ae70e9f56cbd80609b2cbb1ddc4";

$mysqli = new PDO($dsn);
if ($mysqli->connect_error) {
    header("Location: ../error.php?err=Unable to connect to MySQL");
    exit();
}

?>