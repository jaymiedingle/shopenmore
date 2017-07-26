<?php include('includes/header.php'); ?>
<?php include('includes/top-bar.php'); ?>


<?php


$profile = $_SESSION['admindata'];

/*pagination data*/
$limit = 50;
$current_page = isset($_GET['page']) ? $_GET['page'] : 0;
DB::query("SELECT * FROM tb_student");
$total_count = DB::count();
$pages_count = ceil($total_count / $limit);
$offset = ($current_page == 0) ? 0 : ($current_page - 1) * $limit;

//get students of student
$students = DB::query("SELECT * FROM tb_student LIMIT $offset,$limit", $profile['id']);


?>


    <div id="all">

        <div id="content">
            <div class="container">

                <br>

                
                 <?php include('includes/admin-sidemenu.php'); ?>

                <div class="col-md-9" id="customer-orders">
                    <div class="box">

                        <h1>Students List</h1>

                        <p class="lead">Listing of all students in system</p>

                        <hr>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Stud#</th>
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach($students as $key=>$student) { ?>
                                    <tr>
                                        <th><?php echo ($key + 1); ?></th>
                                        <td>
                                            <span class="label label-primary lb-lg">
                                                <?php echo ucwords($student['id']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="studentdetails.php?id=<?php echo $student['id']; ?>">
                                                <?php echo $student['fname']; ?> <?php echo $student['lname']; ?>
                                            </a>
                                        </td>
                                       
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>

                        <!--pagination-->
                        <div class="pages">
                            <?php echo Common::pagination($current_page, $pages_count); ?>
                        </div>
                        <!--end pagination-->

                    </div>

                </div>
                <!-- /.col-md-9 -->


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
    </div>

<?php include('includes/footer.php'); ?>
<!--give active state to navigation-->
<script type="text/javascript">
var sub_page = "students";
$("." + sub_page).addClass("active");
</script>