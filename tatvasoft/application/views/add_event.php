<body>
	<p id="msg"></p>
	<a href="<?php echo base_url().'Event/show_event';  ?>"><button>Show Events</button></a>
<form id="add_event_form" name="add_event_form" method="post" >
	<table align="center">
		<tr>
			<th>
				Event Title:
			</th>
			<th>
				<input type="text" name="event_title" id="event_title" placeholder="Enter Event Title" value="<?php if(isset($data)){ echo $data['event_title']; } ?>" required>
			</th>
		</tr>
		<tr>
			<th>
				Start Date:
			</th>
			<th>
				<input type="text" name="start_date" id="start_date" placeholder="Enter Event Title" value="<?php if(isset($data)){ echo $data['start_date']; } ?>" required>
			</th>
		</tr>
		<tr>
			<th>
				End Date:
			</th>
			<th>
				<input type="text" name="end_date" id="end_date" placeholder="Enter Event Title" value="<?php if(isset($data)){ echo $data['end_date']; } ?>" required>
			</th>
		</tr>
		<tr>
			<th>Recurence 1:</th>
			<td>
				<select id="recurence_1" name="recurence_1" >
					<option>Select Recurence</option>
					<option value="every" <?php if(isset($data)){ if($data['recurence_1']=='every') { echo 'selected'; } }  ?>>Every</option>
					<option value="every_other" <?php if(isset($data)){ if($data['recurence_1']=='every_other') { echo 'selected'; } }  ?>>Every Other</option>
					<option value="every_third" <?php if(isset($data)){ if($data['recurence_1']=='every_third') { echo 'selected'; } }  ?>>Every Third</option>
					<option value="every_fourth" <?php if(isset($data)){ if($data['recurence_1']=='every_fourth') { echo 'selected'; } }  ?>>Every Fourth</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>Recurence 2:</th>
			<td>
				<select id="recurence_2" name="recurence_2">
					<option>Select Recurence</option>
					<option value="day" <?php if(isset($data)){ if($data['recurence_2']=='day') { echo 'selected'; } }  ?>>Day</option>
					<option value="week" <?php if(isset($data)){ if($data['recurence_2']=='week') { echo 'selected'; } }  ?>>Week</option>
					<option value="month" <?php if(isset($data)){ if($data['recurence_2']=='month') { echo 'selected'; } }  ?>>Month</option>
					<option value="year" <?php if(isset($data)){ if($data['recurence_2']=='year') { echo 'selected'; } }  ?>>Year</option>
				</select>
			</td>
		</tr>
		<input type="hidden" name="id" id="id" value="<?php if(isset($data)){ echo $data['id']; }  ?>">
		<tr>
			<td><input type="submit" name="event_id" id="event_id" ></td>
		</tr>
	</table>
</form>
<script type="text/javascript">
	$("#add_event_form").submit(function(e)
	{

		e.preventDefault();
		var id=$('#id').val();

		if(!id)
		{
			var urlVal='Event/add_event_data';
		}
		else
		{
			var urlVal='Event/update_event_data';
		}
		//alert($("#add_event_form").serialize())

		$.ajax({
				url:urlVal,
				type:'POST',
				data:$("#add_event_form").serialize(),
				success : function(response)
				{
					//console.log(response);
					$("#msg").html('<b>'+res.msg+'</b>');
				
					
				}
			});
	})
</script>
</body>