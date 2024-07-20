<?php session_start(); 
//  
$username='';
$id='';
$role='';
if(!isset($_SESSION['username'])){
   
    header('location:../../index.php');
}else{
    $username=$_SESSION['username']; 
    $id=$_SESSION['id']; 
    $role=$_SESSION['role'];

}

   
    // header('location:../../index.php');

 ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../../includes/htmlHead.php';
    ?>
   <!-- Bootstrap CDN -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    <!-- Data Tables -->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css">

      <!-- Modal CSS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>

        <!-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
        <!-- CSS -->
        <link rel="stylesheet" href="../../style/style.css">

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>
        <script src="../../function/fuction.js"></script>




        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Admin</title>


        <style>
        .dataTables_filter {

            /* padding: 1.5em; */
        }

        .dataTables_length {

            /* padding: 1.5em; */
        }

        .dataTables_filter label {
            font-weight: bold;
        }

        .dataTables_filter input {
            margin-left: 10px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .dataTables_length label {
            font-weight: bold;
        }

        .dataTables_length select {
            margin-left: 10px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #tableViews_wrapper {
            /* padding: 40px; */

        }

        #tableViews {
            /* padding: 40px; */
            /* margin-top: 5em; */

        }

        .chart-title {
            text-align: center;
            font-size: 24px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .chart-labels {
            text-align: center;
            font-size: 18px;
            margin-top: 10px;
        }
        
    .form-control,
    .form-check-input,
    .form-select {
      border: 1px solid black !important;
    }

    .modal-header h1 {
      font-size: 1.5rem;
    }
        </style>
    </head>

    <body>
        <!-- TOASt -->
        <div class="toast-container position-fixed top-0 end-25 p-3" style="z-index: 999">
            <div id="custom-toast" class="toast alert alert-success" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto" id="toast-title">added successful</strong>
                    <small>Just now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <p id="toast-msg">new record</pi>
                </div>
            </div>
        </div>

        <?php include '../../modal/modal.php' ?>
        <div class="header-con" style="  display: flex;
                                  flex-direction: row;
                                justify-content: space-between;
                                align-items: center;
                                padding: 0.7em;
                                background-color: WHITESMOKE;
                                width: 100%;
                                                       
                                position:fixed;        
                             z-index:99"><h4 id="header-title"><?php echo  $username; ?>( <span style="font-weight:normal;font-size:mid"><?php echo  $role; ?></span> )</h4>
                             <div>
                                <a href="../../index.php?logout=true" class="btn btn-primary">log out</a>
                             </div>
                           
                            </div>
                            <br>
                            <br>
        <div class="admin-wrap">
            <div class="tableViewsWrapper">

          


                <div class="tbwrap tbwrap1">



                    <div class="action-menu">
                        <div class="menu-item">


                            <!-- FILTER TABLE -->
                            <label for="">
                                Role:
                                <select id="table-filter" class="form-select form-select-md mb-3"
                                    aria-label="Large select example" placeholder="menu">
                                    <option value="all" selected>All</option>
                                    <option value="admin">Admin</option>
                                    <option value="Driver">Driver</option>
                                    <option value="Customer">Customer</option>
                                </select>

                            </label>
                        </div>
                        <div class="menu-item">
                            <!-- ADD BTN -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    ADD
                                </button>
                                <ul class="dropdown-menu">
                                    <li><button class="dropdown-item" onclick="addUser('admin',this)"
                                            data-bs-toggle="modal" data-bs-target="#addModal">Admin</button></li>
                                    <li><button class="dropdown-item" onclick="addUser('Driver',this)"
                                            data-bs-toggle="modal" data-bs-target="#addModal">Driver</button></li>
                                    <li><button class="dropdown-item" onclick="addUser('Customer',this)"
                                            data-bs-toggle="modal" data-bs-target="#addModal">Customer</button></li>

                                </ul>
                            </div>

                        </div>

                    </div>
                    <table id="tableViews"
                        class="table table-dark table-hover table-striped table-bordered  responsive nowrap"
                        cellspacing="0" style="padding: 0px;">

                        <caption>List of Drivers</caption>
                        <thead>
                            <tr>
                                <th>No#</th>
                                <th>Name</th>
                                <th>Username</th>
                            
                               
                                <th>Role</th>
                                <th>Action</th>
                                <!-- <th>Smoke</th>
            <th>Sound</th>
            <th>Action</th> -->
                            </tr>



                        <tbody id="driverTable" class="table-group-divider"></tbody>


                    </table>
                </div>


                <!-- Chart wrap -->
                <div class="tbwrap tbwrap2">

                    <div class="chart-wrapper">
                        <h3 id="chart-main-title">all Chart</h3>
                        <br>
                        <div class="chart-option">
                            <label for="">
                                Entries:
                                <select id="chart-filter" class="form-select form-select-md mb-3 " style="border: 2px solid black;"
                                    aria-label="Large select example" placeholder="menu" >
                                    <option value="entries" selected>Entries by month</option>
                                    <option value="sex">Entries by sex</option>
                                 
                                </select>

                            </label>

                            <label for="">
                                Chart Type:
                                <select id="chart-filter-type" class="form-select form-select-md mb-3 " style="border: 2px solid black;"
                                    aria-label="Large select example" placeholder="menu" >
                                    <option value="bar" selected>Bar graph</option>
                                    <option value="pie">Pie graph</option>
                                    <option value="line">Line graph</option>
                                    <option value="doughnut">Doughnut graph</option>
                                 
                                </select>

                            </label>
                        </div>


                        <div class="chart-title">Entries by Month</div>
                        <canvas id="pieChart"></canvas>
                        <div class="chart-labels">
                            <div class="chart-foot">Month</div>

                        </div>
                    </div>
                </div>




            </div>


        </div>






        <script>
        $(document).ready(function() {

            var role= '';
            var filter = document.getElementById('table-filter');
            var chart_filter = document.getElementById('chart-filter');
            var chart_filter_type = document.getElementById('chart-filter-type');


            getRecords([{
                name: 'role',
                value: 'all'
            },
                {
                    name: 'filter',
                    value: 'entries'
                }, {
                    name: 'filter',
                    value: chart_filter_type.value
                }]);

            //TABLE FILTER ===
            
            filter.addEventListener('change', function() {
                 role = filter.value;
                pieChart.destroy();
                $('#chart-main-title').text(role + "  Chart");
                getRecords([{
                    name: 'role',
                    value: role
                },
                {
                    name: 'filter',
                    value:chart_filter.value
                }, {
                    name: 'filter',
                    value: chart_filter_type.value
                }
            ]);
            });




              //chart FILTER ===

             
              chart_filter.addEventListener('change', function() {
            
                $('#chart-main-title').text(filter.value + " category    chart");
                    pieChart.destroy();
                $('#chart-main-title').text(role + " category    chart");
                getRecords([{
                    name: 'role',
                    value: filter.value
                },
                {
                    name: 'filter',
                    value: chart_filter.value
                }, {
                    name: 'filter',
                    value: chart_filter_type.value
                }
            
            ]);
    
                


               
            });

                //chart FILTER TYPE===

             
                chart_filter_type.addEventListener('change', function() {
            
            $('#chart-main-title').text(filter.value + " category    chart");
                pieChart.destroy();
            $('#chart-main-title').text(role + " category    chart");
            getRecords([{
                name: 'role',
                value: filter.value
            },
            {
                name: 'filter',
                value: chart_filter.value
            }, {
                name: 'filter',
                value: chart_filter_type.value
            }
        
        ]);

            


           
        });




            

        })

        var $inputs = $('.form-control');
    $('.form-control').on('click', function () {
      $('.alrt').hide();
  //  alert('changed');
    });
        </script>
    </body>

    </html>