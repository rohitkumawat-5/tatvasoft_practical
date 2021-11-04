<?php

	$date1_ts = strtotime($data['start_date']);
    $date2_ts = strtotime($data['end_date']);
    $diff = $date2_ts - $date1_ts;
    $total_days= round($diff / 86400);




?>
<body>
	<h3>Event View Page</h3>
	<table border="1px solid" width="100%">
		<thead>
			<tr>
				<td>
					<b>Event name:</b><?php echo $data['event_title']; ?>
				</td>
				
				<td colspan="3">Title of event</td>
			</tr>
			<tr>
				<th  style="text-align: left;">Event Occurrences:</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $data['recurence_1'].'<br>'. $data['recurence_1']; ?></td>
				<td>Date <?php echo $data['start_date'].'<br> Date '.$data['end_date'];  ?></td>
				<td>
					<?php 
						$timestamp1 = strtotime($data['start_date']);
						$timestamp2 = strtotime($data['end_date']);
						$day1 = date('D', $timestamp1);  
						$day2 = date('D', $timestamp2);
						echo $day1.'<br>'.$day2;
					?>
				</td>
			</tr>
			<tr>
				<td ></td>
				<td colspan="3">Total Recurrence Event:<?php  echo $total_days; ?> </td>
			</tr>
		</tbody>
	</table>
</body>