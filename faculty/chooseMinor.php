<div style="padding:5%">
    <h1>Requests From Students</h1>
    <br>
    <br>
    <input type="text" id="searchInput" oninput="searchTable()" placeholder="Search by name">


    <table id="nameTable">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Name Of student</th>
                <th>MUJ ID</th>
                <th>branch</th>
                <th>year</th>
                <th>Mobile No</th>
                <th>E-mail ID</th>
                
                <th>Project Name</th>
                <th>proposal</th>
                <th>accept</th>
            </tr>
        </thead>
        <tbody>
            <?php
             $sr=1;
             $search_query = "SELECT * FROM `requests` where facultyId='$facultyId'";
             $result_query = mysqli_query($con, $search_query);
             $search_query3 = "SELECT * FROM `faculty` where facultyId='$facultyId'";
             $result_query3= mysqli_query($con, $search_query3);
             $row3 = mysqli_fetch_assoc($result_query3);
             $studentsAlloted=$row3['studentsAlloted'];
             $maxCap=$row3['maxCap'];

             while ($row = mysqli_fetch_assoc($result_query)) {
              $regNo=$row['regNo'];
              $proposal=$row['proposal'];
              $project_name=$row['project_name'];
              $search_query2 = "SELECT * FROM `students` where regNo='$regNo'";
             $result_query2 = mysqli_query($con, $search_query2);
             $row2 = mysqli_fetch_assoc($result_query2);
             

                // Access the column values
                $name=$row2['name']; 
                $facultyId=$row2['regNo']; 
                $phoneNo=$row2['phoneNo']; 
                $email=$row2['email']; 
                $branch=$row2['branch']; 
                $year=$row2['year']; 
                $mentorId=$row2['mentorId']; 
                
                // Display table rows for each item in the armory
                echo"

            <tr >
                <td>$sr</td>
                <td >$name</td>
                <td>$regNo</td>
                <td>$branch</td>
                <td>$year</td>
                <td>$phoneNo</td>
                <td>$email</td>
                <td>$project_name</td>
                <td><a href='$proposal' target='_blank'style='background-color: #008CBA; /* Green */
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;'  class='btn btn-primary'
          
                    
             
                '>Open</a></td>";

                if ($studentsAlloted<$maxCap AND $mentorId==NULL ) {
                  echo"  <td><a href='index.php?accepted=$regNo' class='btn btn-success' style='background-color: #04AA6D;
                  border: none;
                  color: white;
                  padding: 15px 32px;
                  text-align: center;
                  text-decoration: none;
                  display: inline-block;
                  font-size: 16px;'>Accept</a>
                  <a href='index.php?denied=$regNo' class='btn btn-danger' style='background-color: #ff0000;
                  border: none;
                  color: white;
                  padding: 15px 32px;
                  text-align: center;
                  text-decoration: none;
                  display: inline-block;
                  font-size: 16px;'>Reject</a></td>
                  ";
                }else{
                    echo"  <td><button style='background-color: #f44336;
                    border: none;
                    color: white;
                    padding: 15px 32px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;' class='' onclick='openProposalForm2()'>FULL</button></td>";
                }
               
           echo" </tr>";
           
$sr+=1;
            }


            
            ?>
        </tbody>
    </table>
   
 
    <script>
        function  openProposalForm2(){
            alert("Faculty Already has 12 students or student already alloted");
        }
      </script>
<script>
    function searchTable() {
      var searchQuery = document.getElementById('searchInput').value.toLowerCase();
      var tableRows = document.getElementById('nameTable').getElementsByTagName('tbody')[0].getElementsByTagName('tr');

      for (var i = 0; i < tableRows.length; i++) {
        var rowData = tableRows[i].textContent.toLowerCase();

        if (rowData.includes(searchQuery)) {
          tableRows[i].style.display = '';
        } else {
          tableRows[i].style.display = 'none';
        }
      }
    }
  </script>
