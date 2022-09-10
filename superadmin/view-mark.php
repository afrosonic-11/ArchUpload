<?php
include "header.php";
if (!isset($_SESSION["admin"]))
{
    ?>
    <script type="text/javascript">
        window.location = "login.php";
    </script>
    <?php
}




include "connection.php";
?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Grades
            </h1>

        </section>

<div class="box">
    <div class="box-header">

    </div>
    <div class="box-body">
        <table id="example1" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
            <?php
            $res = mysqli_query($link,"select * from mark");
            ?>
            <tr>
                <th>Project Name</th>
                <th>Teacher name</th>
                <th>Student name</th>
                <th>Project Mark</th>
                <th>Comment</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row=mysqli_fetch_array($res))
            {
            ?>
            <tr>
                <td>
                    <?php
                    $project_id =$row["project_id"];
            $result = mysqli_query($link,"select * from add_project WHERE id='$project_id'");
            ?>
             <?php
            while ($rows=mysqli_fetch_array($result))
            {
            ?>
                    <?php echo $rows["project_title"]?>
                    <?php }?>
                </td>
                <td>
                <?php
                    $teacher_id =$row["teacher_id"];
            $teacher = mysqli_query($link,"select * from teacher_registration WHERE id='$teacher_id'");
            ?>
             <?php
            while ($rowss=mysqli_fetch_array($teacher))
            {
            ?>
                    <?php echo $rowss["first_name"]." ".$rowss["last_name"]?>
                    <?php }?>
                </td>
                <td>
                    <?php
                    $student_id =$row["student_id"];
            $student = mysqli_query($link,"select * from student_registration WHERE id='$student_id'");
            ?>
             <?php
            while ($rowss=mysqli_fetch_array($student))
            {
            ?>
                    <?php echo $rowss["first_name"]." ".$rowss["last_name"]?>
                    <?php }?>
                </td>
                <td><?php echo $row["mark"]?></td>
                <td><?php echo $row["comment"]?></td>
            </tr>
            <?php
            }
            ?>
            </tbody>
        </table>


    </div>
</div>
    </div>

<?php
include "footer.php";
?>