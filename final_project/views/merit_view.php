
<table>
<tr>
    <th>Merit_no</th>
     <th>First_name</th>
      <th>Last_name</th>
       
	   <th>email</th>
		<th>SSC_marks</th>
		<th>HSC_marks</th>
			
                
</tr>
<?php foreach($ps as $p):?>
<tr>
<td><?php echo $p["merit_no"];?></td>
<td><?=$p["first_name"]?></td>
<td><?=$p["last_name"]?></td>

<td><?=$p["email"]?></td>
<td><?=$p["ssc_marks"]?></td>
<td><?=$p["hsc_marks"]?></td>
</tr>
<?php endforeach?>
</table>

