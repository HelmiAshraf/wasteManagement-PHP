<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Waste-Management-System</title>
   <!-- Font Awesome -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet"><link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="../asset/css/adminlte.min.css">
   <link rel="stylesheet" href="../asset/css/style.css">
   <link rel="stylesheet" href="../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <style type="text/css">
      table tr td {
         padding: 0.3rem !important;
      }
      table tr td p{
         margin-top: -0.8rem !important;
         margin-bottom: -0.8rem !important;
         font-size: 0.9rem;
      }
      td a.btn{
         font-size: 0.7rem;
      }
   </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
   <nav class="main-header navbar navbar-expand navbar-light" style="background-color: rgb(86,181,42)">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
         </ul>
         <ul class="navbar-nav ml-auto">
            <li class="nav-item">
               <a class="nav-link" href="#" role="button">
                  <img src="../asset/img/avatar.png" class="img-circle" alt="User Image" width="40" style="margin-top: -8px;">
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" data-widget="fullscreen" href="../logout.php">
                  <i class="fas fa-sign-out-alt"></i>
               </a>
            </li>
         </ul>
      </nav>
      <aside class="main-sidebar sidebar-light-primary">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
         <img src="../asset/img/logo.png" alt="DSMS Logo" width="200">
         </a>
         <div class="sidebar">
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item">
                     <a href="index.php" class="nav-link">
                        <img src="../asset/img/dashboard.png" width="30">
                        <p>
                           Dashboard
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="recycle-center.php" class="nav-link">
                        <img src="../asset/img/recycle-center.png" width="30">
                        <p>
                           Recycling Center
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="garbage-type.php" class="nav-link">
                        <img src="../asset/img/garbage-type.png" width="30">
                        <p>
                           Garbage Type
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="member.php" class="nav-link">
                        <img src="../asset/img/member.png" width="30">
                        <p>
                           Members
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="records.php" class="nav-link">
                        <img src="../asset/img/records.png" width="30">
                        <p>
                           Collection Record
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <img src="../asset/img/report.png" width="30">
                        <p>
                           Reports
                        </p>
                        <i class="right fas fa-angle-left"></i>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="garbage-type-report.php" class="nav-link">
                              <i class="nav-icon far fa-circle"></i>
                              <p>Garbage Type</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="income-report.php" class="nav-link">
                              <i class="nav-icon far fa-circle"></i>
                              <p>Income by Center</p>
                           </a>
                        </li>
                     </ul>
                  </li>
               </ul>
            </nav>
         </div>
      </aside>
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                     <h1 class="m-0"><img src="../asset/img/member.png" width="40"> Members</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Members</li>
                        </ol>
                     </div>
                  </div>
               </div>
            </div>

<?php
                           include ('connection.php');
                           echo '
                           <section class="content">
                           <div class="container-fluid">
                              <div class="card card-info">
                                 <br>
                                 <div class="col-md-12">
                                    <table id="example1" class="table table-bordered">
                                       <thead>
                                          <tr>
                                             <th>Profile</th>
                                             <th>Full Name</th>
                                             <th>Contact</th>
                                             <th>Email</th>
                                             <th>Account</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                           '; 
                           $sql = "SELECT * FROM tbl_member";
                           $result = mysqli_query($connection, $sql);
                           while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                           {
                              $fullname = $row["first_name"]. ' ' . $row["last_name"];
                               echo '                 
                                                      <tbody>
                                                      <tr>
                                                      <td style="display:none;">'.$row["username"].'</td>
                                                         <td><img src="../asset/img/profile.png" width="60" style="border: 2px solid #ddd"></td>
                                                         <td>'.$fullname.'</td>
                                                         <td>'.$row["contact"].'</td>
                                                         <td>'.$row["email_address"].'</td>
                                                         <td>
                                                         <p class="info">Username: <b>'.$row["username"].'</b></p>
                                                         <p class="info">Password: <b>***********</b></p>
                                                      </td>
                                                      <td class="text-center">
                                                         <a class="btn btn-sm btn-success editbtn" href="#" data-toggle="modal"
                                                            data-target="#edit"><i
                                                            class="fa fa-user-edit"></i> Update</a>
                                                         <a class="btn btn-sm btn-danger deletebtn" href="#" data-toggle="modal"
                                                            data-target="#delete"><i
                                                            class="fa fa-trash"></i> Delete</a>
                                                      </td>
                                                      </tr>
                                                      ';
                           }
                              echo '
                                                      </tbody>
                                                   </table>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- /.container-fluid -->
                                       </section>
                                       ';
                                          mysqli_close ($connection);
                                          echo '</table>';
                                    ?>         
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
      </div>
      <!-- ./wrapper -->
      <div id="deletemodal" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-body text-center">
               <form action="deletemember.php" method="POST">
                  <img src="../asset/img/sent.png" alt="" width="50" height="46">
                  <input type="hidden" name="username" id="username">
                  <h3>Are you sure want to delete this Member?</h3>
                  <div class="m-t-20"> 
                     <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                     <button type="submit" name="deletemember" class="btn btn-danger">Delete</button>
                  </div>
                        </form>
               </div>
            </div>
         </div>
      </div>
      <div id="editmodal" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
               <div class="modal-body text-center">
               <form action="editmember.php" method="POST">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="card-header">
                              <h5><img src="../asset/img/member.png" width="40"> Member Information</h5>
                              </div>
                              <div class="row">
                                 <input type="hidden" name="username" id="username">
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label>Account Status</label>
                                          <select name="status" id="status" class="form-control">
                                             <option value="1">Active</option>
                                             <option value ="2">Inactive</option>
                                          </select>
                                       </div>
                                    </div>
                        </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
                        <button type="submit" name="editmember" class="btn btn-primary">Save</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="../asset/jquery/jquery.min.js"></script>
      <script src="../asset/js/bootstrap.bundle.min.js"></script>
      <script src="../asset/js/adminlte.js"></script>
      <!-- DataTables  & Plugins -->
      <script src="../asset/tables/datatables/jquery.dataTables.min.js"></script>
      <script src="../asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
      <script src="../asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
      <script src="../asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
      <script>
         $(function () {
           $("#example1").DataTable();
         });
      </script>
         <script>
      $(document).ready(function() {

         $('.deletebtn').on('click', function() {

            $('#deletemodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
               return $(this).text();
            }).get();

            console.log(data);

            $('#username').val(data[0]);

         });
      });
   </script>
         <script>
      $(document).ready(function() {

         $('.editbtn').on('click', function() {

            $('#editmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
               return $(this).text();
            }).get();

            console.log(data);

            $('#username').val(data[0]);
            $('#status').val(data[1]);
         });
      });
   </script>
   </body>
</html>