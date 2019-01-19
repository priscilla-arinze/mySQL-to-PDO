<table width="100%" border="0" cellpadding="2" class="footable" style="font-size:13px;">
  <thead class="footable-first-column">
  <tr>
    <th style="text-align: center;">Last, First</th>
    <th style="text-align: center;">Email</th>
    <th style="text-align: center;">Office</th>
    <th style="text-align: center;">Phone</th>
    <th style="text-align: center;">Area of Specialization</th>
  </tr>
  </thead>
<tbody>

<?php
	require_once("../connect.php");
	$query = "
	SELECT faculty_id,name_last,name_first,title,email,office,phone,specialization FROM faculty_db  
	WHERE classification like '%fulltime%' AND current IS NULL AND (area like '%arts%') 
	ORDER BY name_last";
	$result = mysql_query($query);
	while($r=mysql_fetch_array($result, MYSQL_ASSOC)){
		print "\n\t<tr>";
		print "\n\t\t<td><a href='/ah/people/faculty_detail.php?faculty_id={$r['faculty_id']}'>{$r['name_last']}, {$r['name_first']}</a><br style='margin-bottom: 5px;'>{$r['title']}</td>";
		print "\n\t\t<td><a href='mailto:{$r['email']}'>{$r['email']}</td>";
		print "\n\t\t<td>{$r['office']}</td>";
		$phone = $r['phone'] == "" ? $r['phone'] : "972-883-".$r['phone'];
		print "\n\t\t<td>$phone</td>";
		print "\n\t\t<td>{$r['specialization']}</td>";
		print "\n\t</tr>";
	}
?>
</tbody>
</table>
<h1>Part-time Faculty in Visual Arts</h1>

<table width="100%" border="0" cellpadding="2" class="footable" style="font-size:13px;">
  <thead class="footable-first-column">
  <tr>
    <th style="text-align: center;">Last, First</th>
    <th style="text-align: center;">Email</th>
    <th style="text-align: center;">Office</th>
    <th style="text-align: center;">Phone</th>
    <th style="text-align: center;">Area of Specialization</th>
  </tr>
  </thead>
<tbody>

<?php
require_once("../connect.php");
//$server = mysql_connect($db_host, 'ah_cms_adm', $db_password);
//mysql_select_db('ah_cms');
$query = "
SELECT faculty_id,name_last,name_first,title,email,office,phone,specialization FROM faculty_db  
WHERE classification like '%parttime%' AND current IS NULL AND (area like '%arts%')
ORDER BY name_last";
$result = mysql_query($query);
while($r=mysql_fetch_array($result, MYSQL_ASSOC)){
	print "\n\t<tr>";
	print "\n\t\t<td><a href='/ah/people/faculty_detail.php?faculty_id={$r['faculty_id']}'>{$r['name_last']}, {$r['name_first']}</a><br style='margin-bottom: 5px;'>{$r['title']}</td>";
	print "\n\t\t<td><a href='mailto:{$r['email']}'>{$r['email']}</td>";
	print "\n\t\t<td>{$r['office']}</td>";
	$phone = $r['phone'] == "" ? $r['phone'] : "972-883-".$r['phone'];
	print "\n\t\t<td>$phone</td>";
	print "\n\t\t<td>{$r['specialization']}</td>";
	print "\n\t</tr>";
}
?>
</tbody>
</table>