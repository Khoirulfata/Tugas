<?php
$url = "https://data.bmkg.go.id/DataMKG/TEWS/gempadirasakan.xml";
$xmlData = file_get_contents($url);
$gempa = new SimpleXMLElement($xmlData);
echo "<pre>";
print_r($gempa);
echo "<h2>Info Gempa</h2>";
$tmp = "<table border='1'>
      <tr><td>Tanggal</td>
      <td>Jam</td>
      <td>DateTime</td>
      <td>Point</td>
      <td>Lintang</td>
      <td>Bujur</td>
      <td>Magnitude</td>
      <td>Kedalaman</td>
      <td>Wilayah</td>
      <td>Dirasakan</td>
      </tr>";
foreach ($gempa->gempa as $item) {
    $coordinates = explode(",", $item->point->coordinates);
    $tmp .= "
       <tr><td>{$item->Tanggal}</td>
       <td>{$item->Jam}</td>
       <td>{$item->DateTime}</td>
       <td>{$coordinates[0]}, {$coordinates[1]}</td>
       <td>{$item->Lintang}</td>
       <td>{$item->Bujur}</td>
       <td>{$item->Magnitude}</td>
       <td>{$item->Kedalaman}</td>
       <td>{$item->Wilayah}</td>
       <td>{$item->Dirasakan}</td>
       </tr>";
}
$tmp .= "</table>";
echo $tmp;
?>