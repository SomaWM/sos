<?php
 require_once __DIR__.'/simple_html_dom.php';

 $html = new simple_html_dom();

 // url target
 $html->load_file('http://ews.kemendag.go.id/');

 // mengambil tag header
 $header_1 = $html->find('div[class="uh-head"] span',0)->innertext;
 $header_2 = $html->find('div[class="uh-head"] span',1)->innertext;
 $header_3 = $html->find('div[class="uh-head"] span',2)->innertext;
?>
<table border="1">
 <thead>
  <tr>
   <th><?php echo $header_1; ?></th>
   <th><?php echo $header_2; ?></th>
   <th><?php echo $header_3; ?></th>
  </tr>
 </thead>
 <tbody>
  <?php
   // meloop data kabkota
   $kabkota = $html->find('div[class="content propinsi fl-left"] ul li');
   foreach($kabkota as $kk){

    // nama kabkota
    $nama = $kk->find('div[class="city"] span',0)->innertext;
  ?>
  <tr>
   <td colspan="3"><?php echo $nama; ?></td>
  </tr>
  <?php
   // list data setiap kabkota
   $datas = $kk->find('table tbody tr');
   foreach($datas as $data){

    // nama komoditas
    $komoditas = $data->find('td',0)->find('span',0)->plaintext;

    // harga 1
    $harga_1 = $data->find('td',1)->plaintext;

    // harga 2
    $harga_2  = $data->find('td',2)->plaintext;
  ?>
  <tr>
   <td><?php echo $komoditas; ?></td>
   <td><?php echo $harga_1; ?></td>
   <td><?php echo $harga_2; ?></td>
  </tr>
  <?php }} ?>
 </tbody>
</table>
