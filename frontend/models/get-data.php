<?php

// Create connection
$conn = new mysqli("localhost", "root", "", "bekraf");

if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT s.keterangan Subsektor, tahun Tahun, p.keterangan Provinsi, t.keterangan TipeNilai, nilai FROM `t_provinsi` tp, m_subsektor s, m_provinsi p, m_tipenilai_transaksi_provinsi t where subsektor=s.id and provinsi=p.id and tipenilai=t.id";

$result = $conn->query($sql);
$table = '<table id="input" >';
$all_field = array();
if ($result->num_rows >0) {
 $table.="<thead><tr>";
 while($field = $result->fetch_field()) {
 	$table.="<th>".$field->name."</th>";
 	array_push($all_field, $field->name);
 }
 $table.="</tr></thead><tbody>";
 while($row = $result->fetch_array()) {
 	$table.="<tr>";
 	foreach ($all_field as $item) {
        $table.='<td>' . $row[$item] . '</td>'; //get items using property value
    }
    $table.='</tr>';
 }
 
} else {
 echo "No Results Found.";
}
$table.='</tbody></table>';
 //echo $table;
$conn->close();
?>