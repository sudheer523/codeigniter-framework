<body>
 <div id="container">
  <h1>Users</h1>
  <div id="body">
<?php
foreach($results as $data) {
    echo $data->user_id . " - " . $data->username . "<br>";
}
?>
   <p><?php echo $links; ?></p>
  </div>
  <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
 </div>
</body