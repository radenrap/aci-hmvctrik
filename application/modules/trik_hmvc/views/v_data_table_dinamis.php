<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to Demo Data Table</title>
    <link rel="stylesheet" href="<?php echo base_url('vendors/jquery_data_table/css/jquery.dataTables.min.css');?>" />
    <style type="text/css">
 
    ::selection{ background-color: #E13300; color: white; }
    ::moz-selection{ background-color: #E13300; color: white; }
    ::webkit-selection{ background-color: #E13300; color: white; }
 
    body {
        background-color: #fff;
        margin: 40px;
        font: 13px/20px normal Helvetica, Arial, sans-serif;
        color: #4F5155;
    }
 
    a {
        color: #003399;
        background-color: transparent;
        font-weight: normal;
    }
 
    h1 {
        color: #444;
        background-color: transparent;
        border-bottom: 1px solid #D0D0D0;
        font-size: 19px;
        font-weight: normal;
        margin: 0 0 14px 0;
        padding: 14px 15px 10px 15px;
    }
 
    code {
        font-family: Consolas, Monaco, Courier New, Courier, monospace;
        font-size: 12px;
        background-color: #f9f9f9;
        border: 1px solid #D0D0D0;
        color: #002166;
        display: block;
        margin: 14px 0 14px 0;
        padding: 12px 10px 12px 10px;
    }
 
    #body{
        margin: 0 15px 0 15px;
    }
     
    p.footer{
        text-align: right;
        font-size: 11px;
        border-top: 1px solid #D0D0D0;
        line-height: 32px;
        padding: 0 10px 0 10px;
        margin: 20px 0 0 0;
    }
     
    #container{
        margin: 10px;
        border: 1px solid #D0D0D0;
        -webkit-box-shadow: 0 0 8px #D0D0D0;
    }
    </style>

    <script src="<?php echo base_url('vendors/jquery_data_table/js/jquery.js');?>"></script>
	<script src="<?php echo base_url('vendors/jquery_data_table/js/jquery.dataTables.min.js');?>"></script>
	
	<script type="text/javascript">
		$(document).ready(function() {
			$('#example').DataTable();
		} );
	</script>
</head>
<body>
 
<div id="container">
    <h1>Selamat datang di CodeIgniter Demo Data Table!</h1>
 
    <div id="body">
        <p>Data Personal</p>
 		
 	<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th>No.</th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
				<th>No.</th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
        <tbody>
			<?php
			$no = 1; 
			foreach($grid as $row) :
			echo "<tr>
					<td>$no</td>
					<td>$row->name</td>
					<td>$row->position</td>
					<td>$row->office</td>
					<td>$row->age</td>
					<td>$row->start_date</td>
					<td>$row->salary</td>
				</tr>";				
			$no++;
			endforeach;
			?>
        </tbody>
    </table>
        
    </div>
 
    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
 
</body>
</html>