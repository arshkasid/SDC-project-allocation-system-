<div class="container">


<?php

                    $regNo=$_SESSION['regNo'];
         $user_image="Select * from `students` where regNo='$regNo'";
                    $result_image=mysqli_query($con,$user_image);
                    $row_image=mysqli_fetch_array($result_image);
                    $result_image=$row_image['user_image'];
                    $name=$row_image['name'];
                    $phoneNo=$row_image['phoneNo'];
                    $email=$row_image['email'];
                    $branch=$row_image['branch'];
                    $year=$row_image['year'];
                    $mentorId=$row_image['mentorId'];
                    ?>





        <aside>
        <?php
                        echo"
            <div class='profile'>
                <div class='top'>
                    <div class='profile-photo'>
                        <img src='users_area/user_images/$result_image' alt=''>
                    </div>
                    <div class='info'>
                        
                        <p>Hey, <b>$name</b> </p>
                        <small class='text-muted'>$regNo</small>
                    </div>
                </div>
                <div class='about'>
                    <h5>Course</h5>
                    <p>$branch</p>
                    <h5>Year</h5>
                    <p>$year</p>
                    <h5>Contact</h5>
                    <p>$phoneNo</p>
                    <h5>Email</h5>
                    <p>$email</p>
                    <h5>phone no</h5>
                    <p>$phoneNo</p>
                   ";
                   if($mentorId!=NULL){
                    echo"<h5>mentor Name</h5>
                    <a href='index.php?facultyDetail=$mentorId'>$mentorId</a>";
                  }
                   ?>
                </div>
            </div>
        </aside>

        <main>
            <h1>Attendance</h1>
            <div class="subjects">
                <div class="eg">
                    <span class="material-icons-sharp">architecture</span>
                    <h3>Engineering Graphics</h3>
                    <h2>12/14</h2>
                    <div class="progress">
                        <svg><circle cx="38" cy="38" r="36"></circle></svg>
                        <div class="number"><p>86%</p></div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <div class="mth">
                    <span class="material-icons-sharp">functions</span>
                    <h3>Mathematical Engineering</h3>
                    <h2>27/29</h2>
                    <div class="progress">
                        <svg><circle cx="38" cy="38" r="36"></circle></svg>
                        <div class="number"><p>93%</p></div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <div class="cs">
                    <span class="material-icons-sharp">computer</span>
                    <h3>Computer Architecture</h3>
                    <h2>27/30</h2>
                    <div class="progress">
                        <svg><circle cx="38" cy="38" r="36"></circle></svg>
                        <div class="number"><p>81%</p></div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <div class="cg">
                    <span class="material-icons-sharp">dns</span>
                    <h3>Database Management</h3>
                    <h2>24/25</h2>
                    <div class="progress">
                        <svg><circle cx="38" cy="38" r="36"></circle></svg>
                        <div class="number"><p>96%</p></div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <div class="net">
                    <span class="material-icons-sharp">router</span>
                    <h3>Network Security</h3>
                    <h2>25/27</h2>
                    <div class="progress">
                        <svg><circle cx="38" cy="38" r="36"></circle></svg>
                        <div class="number"><p>92%</p></div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
            </div>

            <div class="timetable" id="timetable">
                <div>
                    <span id="prevDay">&lt;</span>
                    <h2>Today's Timetable</h2>
                    <span id="nextDay">&gt;</span>
                </div>
                <span class="closeBtn" onclick="timeTableAll()">X</span>
                <table>
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Room No.</th>
                            <th>Subject</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </main>

        <div class="right">
            <div class="announcements">
                <h2>Announcements</h2>
                <div class="updates">
                <?php
                $search_query = "SELECT * FROM `announcements`";
                $result_query = mysqli_query($con, $search_query);
   
                while ($row = mysqli_fetch_assoc($result_query)) {
                   $announcement=$row['announcement'];
                   $type=$row['type'];

echo"
                    <div class='message'>
                        <p> <b>$type</b> $announcement</p>
                        
                    </div>
                    ";
                }
                   ?>
                </div>
            </div>

            <div class="leaves">
                <h2>Teachers on leave</h2>

<?php

$search_query = "SELECT * FROM `tol`";
$result_query = mysqli_query($con, $search_query);

while ($row = mysqli_fetch_assoc($result_query)) {
   $facultyId=$row['facultyId'];
   $remarks=$row['remarks'];
   $addedBy=$row['addedBy'];

   $search_query2 = "SELECT * FROM `faculty` where facultyId='$facultyId'";
   $result_query2 = mysqli_query($con, $search_query2);

   $row2 = mysqli_fetch_assoc($result_query2);
   $name=$row2['name'];
   $user_image=$row2['user_image'];

echo"
                <div class='teacher'>
                    <div class='profile-photo'><img src='./users_area/user_images/$user_image' alt=''></div>
                    <div class='info'>
                        <h3>$name</h3>
                        <small class='text-muted'>$remarks</small>
                    </div>
                </div>
                ";
}
                ?>
            </div>

        </div>
    </div>

    
    <script src="timeTable.js"></script>
    <script src="app.js"></script>