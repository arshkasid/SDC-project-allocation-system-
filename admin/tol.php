<div style="padding:12%">
    <h1 style="text-allign:center ">Teachers On Leave</h1>


    <table id="nameTable">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Faculty Id</th>
                <th> name</th>
                <th>Remark</th>
                <th>Added By</th>
                <th>Remove</th>
                

                
            </tr>
        </thead>
        <tbody>
            <?php
            
            
             $sr=1;
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
               
               

                // Display table rows for each item in the armory
                echo"

            <tr >
                <td>$sr</td>
                <td>$facultyId</td>
                <td >$name</td>
                <td >$remarks</td>
                <td >$addedBy</td>
             
                <td>
                <a href='removeTol.php?Tol=$facultyId' class='btn btn-danger' style='background-color: #ff0000;
                  border: none;
                  color: white;
                  padding: 15px 32px;
                  text-align: center;
                  text-decoration: none;
                  display: inline-block;
                  font-size: 16px;'>Remove</a>
                </td>
                
           </tr>";
           
$sr+=1;
            }


            
            ?>
            <a href='addTol.php' class='btn btn-success' style='background-color: #04AA6D;
                  border: none;
                  border-radius: 30px;
                  color: white;
                  padding: 15px 32px;
                  text-align: center;
                  text-decoration: none;
                  display: inline-block;
                  font-size: 16px;'>Add a Leave</a>