<?php
session_start();
include "functions/visitors.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if(isset($_POST['search'])){
  $search = $_POST['txtsearch'];
  $visitors = findVisitors($search);
}else{
  $visitors = getAllVisitors();
}

// Initialize counters
$total_today = 0;
$total_exam = 0;
$total_others = 0;

// Calculate statistics
foreach ($visitors as $visitor) {
    if ($visitor['date_of_visit'] == date('Y-m-d')) {
        $total_today++;
        if (strtolower($visitor['purpose']) == 'exam') {
            $total_exam++;
        } else {
            $total_others++;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<?php
    include "components/head.php";
?>
<body>

<h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
<a href="add_visitor.php">New Visitor</a> | 
<a href="logout.php">Logout</a>

<h3>Today's Visitors</h3>

<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>#</th>
        <th>Visitor Name</th>
        <th>Date of Visit</th>              
        <th>Time of Visit</th>
        <th>Address</th>
        <th>Contact Number</th>
        <th>School or Office</th>
        <th>Purpose</th>
        <th>Actions</th>
      </tr>
    </thead>
    
    <tbody>
    <?php foreach($visitors as $visitor) { ?>
      <tr>
        <td><?=$visitor['id']?></td>
        <td><?=$visitor['first_name']?> <?=$visitor['last_name']?></td>
        <td><?=$visitor['date_of_visit']?></td>
        <td><?=$visitor['time_of_visit']?></td>
        <td><?=$visitor['address']?></td>
        <td><?=$visitor['contact_number']?></td>
        <td><?=$visitor['school_or_office']?></td>
        <td><?=$visitor['purpose']?></td>
        <td>
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <!-- Edit Button -->
            <a href="edit_visitor.php?id=<?=$visitor['id']?>" class="btn btn-primary btn-sm text-white">
              <i class="fas fa-pen"></i>
            </a>

            <!-- Delete Button -->
            <form method="post" style="display:inline-block;">
              <input type="hidden" name="visitor_id" value="<?=$visitor['id']?>">
              <button class="btn btn-danger btn-sm" name="delete">
                <i class="fas fa-trash"></i>
              </button>
            </form>
          </div>
        </td>
      </tr>
    <?php } ?>           
    </tbody>
  </table>
</div>

<h3>Statistics</h3>
Today: <?php echo $total_today; ?><br>
Exam: <?php echo $total_exam; ?><br>
Others: <?php echo $total_others; ?><br>

</body>
</html>
