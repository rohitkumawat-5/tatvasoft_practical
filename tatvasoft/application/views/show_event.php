<body>
	<h1 align="center">Show All Events</h1>
	<br>
	<table class="table">
    <thead>
      <tr>
        <th style="text-align: center;">Event Title</th>
        <th style="text-align: center;">Dates</th>
        <th style="text-align: center;">Occurrence</th>
        <th colspan="3" style="text-align: center;">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $key => $value) {
      	?>
      	<tr>
      	<td style="text-align: center;"><?php echo $value['event_title'];  ?></td>
      	<td style="text-align: center;"><?php echo $value['start_date'];  ?></td>
      	<td style="text-align: center;"><?php echo $value['end_date'];  ?></td>
      	<td style="text-align: center;"><a href="<?php echo base_url().'Event/update_event/'.$value['id'];  ?>">Update</a></td>
      	<td style="text-align: center;"><a href="<?php echo base_url().'Event/delete_event/'.$value['id'];  ?>">Delete</a></td>
      	<td style="text-align: center;"><a href="<?php echo base_url().'Event/view_event/'.$value['id'];  ?>">View</a></td>
      </tr>
      	<?php
      }  ?>
    </tbody>
  </table>
</body>