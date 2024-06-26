<div class="container">


<?php

                    $facultyId=$_SESSION['facultyId'];
         $user_image="Select * from `faculty` where facultyId='$facultyId'";
                    $result_image=mysqli_query($con,$user_image);
                    $row_image=mysqli_fetch_array($result_image);
                    $result_image=$row_image['user_image'];
                    $name=$row_image['name'];
                    $phoneNo=$row_image['phoneNo'];
                    $email=$row_image['email'];
                    // $branch=$row_image['branch'];
                    // $year=$row_image['year'];
                    $studentsAlloted=$row_image['studentsAlloted'];
                    $designation= $row_image['designation'];
                    $specialization= $row_image['specialization'];
                
                    ?>





        <aside>
        <?php
                        echo"
            <div class='profile'>
                <div class='top'>
                    <div class='profile-photo'>
                        <img src='../users_area/user_images/$result_image' alt=''>
                    </div>
                    <div class='info'>
                        
                        <p>Hey, <b>$name</b> </p>
                        <small class='text-muted'>$facultyId</small>
                    </div>
                </div>
                <div class='about'>
                    
                    <h5>Contact</h5>
                    <p>$phoneNo</p>
                    <h5>Email</h5>
                    <p>$email</p>
                    <h5>phone no</h5>
                    <p>$phoneNo</p>
                    <h5>studentsAlloted</h5>
                    <p>$studentsAlloted</p>
                    <h5>designation</h5>
                    <p>$designation</p>
                    <h5>specialization</h5>
                    <p>$specialization</p>
                    
                   "; ?>
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
                    <div class="message">
                        <p> <b>Academic</b> Summer training internship with Live Projects.</p>
                        <small class="text-muted">2 Minutes Ago</small>
                    </div>
                    <div class="message">
                        <p> <b>Co-curricular</b> Global internship oportunity by Student organization.</p>
                        <small class="text-muted">10 Minutes Ago</small>
                    </div>
                    <div class="message">
                        <p> <b>Examination</b> Instructions for Mid Term Examination.</p>
                        <small class="text-muted">Yesterday</small>
                    </div>
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
                    <div class='profile-photo'><img src='../users_area/user_images/$user_image' alt=''></div>
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