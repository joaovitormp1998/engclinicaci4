<?php
// Database connection info 
$dbDetails = array(
    'host' => 'localhost',
    'user' => 'u246849716_root',
    'pass' => 'Base@321',
    'db'   => 'u246849716_engclinica'
);

// DB table to use 
$table = 'equipamento';

// Table's primary key 
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
$columns = array(
    array('db' => 'id', 'dt' => 0),
    array('db' => 'nome',  'dt' => 1),
    array('db' => 'setor',      'dt' => 2),
    array('db' => 'numeroSerie',     'dt' => 3),
);

// Include SQL query processing class 
require 'ssp.class.php';

// Output data as json format 
echo json_encode(
    SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
);
