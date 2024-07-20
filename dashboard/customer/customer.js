let viewdata;
var updateRequestDATA;
let accountID = 0;
let accountusername = '';
let accountrole = '';
let reqDriverID = 0;

function responseRead(data) { // Reading ajax response data
    // Extract the JSON parts from the string
    let parts = data.match(/{.*?}/g);

    // Parse the JSON parts
    // let userInfo = JSON.parse(parts[0]);
    let res = JSON.parse(parts[0]);

    // Access the desired values
    // let username = userInfo.username;
    return res;

}


function showToast(head, msg) {
    $('#custom-toast').toast('show');
    $('#toast-msg').text(msg);
    $('#toast-title').text(head);
}

// readMutidata
function readData(data) {
    // Remove the 'succsess' prefix
    const jsonData = data.substring(8);

    // Parse the JSON data
    let parsedData;
    try {
        parsedData = JSON.parse(jsonData);
    } catch (error) {
        console.error("Failed to parse JSON:", error);
        return null;
    }

    return parsedData;
}

$(document).ready(function() {

    $('#custom-toast').toast({ delay: 4000 });
    // SIGN UP FORM AJAX ================
    var signupForm = $("#signup_form");
    signupForm.on("submit", function(e) {
        e.preventDefault();
        console.log($(this).serializeArray());
        if (!($(this).serializeArray()[5].value == $(this).serializeArray()[4].value)) {
            $('#smsg').append('<p class="alert alert-danger">Password not match!</p>');
            return
        }

        $.ajax({
            type: "POST",
            url: "api/signupAPI.php",
            data: $(this).serializeArray(),
            // dataType: "JSON",
            success: function(response) {

                console.log("Message:", readData(response)[0].msg);

                if (readData(response)[0].state) {
                    alert(readData(response)[0].msg);
                    $("#signUpModal").modal('hide');
                    $("#loginModal").modal('show');
                } else {
                    $('#smsg').append('<p class="alert alert-danger">' +
                        readData(response)[0].msg + '</p>');
                }

            },
            error: function(e) {
                console.log(e);
            }
        });


    });






    // LOG IN FORM AJAX ================
    var loginForm = $("#login_form");
    loginForm.on("submit", function(e) {
        e.preventDefault();
        console.log($(this).serializeArray());

        $.ajax({
            type: "POST",
            url: "api/loginAPI.php",
            data: $(this).serializeArray(),
            // dataType: "JSON",
            success: function(response) {
                console.log(response);
                console.log("Message:", readData(response));

                if (readData(response)[0].state) {
                    // alert(readData(response)[0].msg);
                    $("#signUpModal").modal('hide');
                    $("#loginModal").modal('hide');

                    if (readData(response)[0].role == 'Driver') {
                        window.location.replace('dashboard/driver/index.php');
                    } else if (readData(response)[0].role == 'admin') {
                        window.location.replace('dashboard/admin/index.php');

                    } else if (readData(response)[0].role == 'Customer') {
                        window.location.replace('dashboard/customer/index.php');
                    }

                } else {
                    $('#msg').append('<p class="alert alert-danger">' + readData(response)[0].msg + '</p>');
                }

            },
            error: function(e) {
                console.log(e);
            }
        });

        e.preventDefault();
    });



    // ADD User FORM AJAX ================
    var addForm = $("#add_form");
    addForm.on("submit", function(e) {

        e.preventDefault();
        console.log($(this).serializeArray());
        var role = $(this).serializeArray()[6].value;

        if (!($(this).serializeArray()[5].value == $(this).serializeArray()[4].value)) {
            $('#addmsg  ').append('<p class="alert alert-danger alrt">Password not match!</p>');
            return
        }


        $.ajax({
            type: "POST",
            url: "../../api/addAPI.php",
            data: $(this).serializeArray(),
            // dataType: "JSON",
            success: function(response) {
                console.log(response);

                // console.log("Message:", readData(response)[0].msg);

                if (readData(response)[0].state) {
                    // alert(readData(response)[0].msg);
                    $("#addModal").modal('hide');
                    $('#table-filter').val(role);
                    pieChart.destroy();
                    $('#chart-main-title').text(role + " category    chart");
                    getRecords([{
                            name: 'role',
                            value: role
                        },
                        {
                            name: 'filter',
                            value: ''
                        }, {
                            name: 'filter',
                            value: ''
                        }

                    ]);
                    showToast('added successfully', 'new ' + role + ' added ');


                } else {

                    $('#addmsg').append('<p class="alert alert-danger alrt">' + readData(response)[0].msg + '</p>');

                }

            },
            error: function(e) {
                console.log(e);
            }
        });


    });



    // viewEdit_form=========

    var viewEditForm = $("#viewEdit_form");


    viewEditForm.on("submit", function(e) {
        e.preventDefault();
        console.log($(this).serializeArray());
        if (!($(this).serializeArray()[5].value == $(this).serializeArray()[4].value)) {
            $('#viewmsg  ').append('<p class="alert alert-danger alrt">Password not match!</p>');
            return
        }
        $.ajax({
            type: "POST",
            url: "../../api/editAPI.php",
            data: $(this).serializeArray(),
            // dataType: "JSON",
            success: function(response) {
                console.log(response);

                console.log("Message:", readData(response)[0].msg);

                if (readData(response)[0].state) {}
                // alert(readData(response)[0].msg);
                $("#viewEditModal").modal('hide');
                $('#table-filter').val($('#viewEdit_Role').val());
                pieChart.destroy();
                $('#chart-main-title').text($('#viewEdit_Role').val() + " category    chart");
                getRecords([{
                        name: 'role',
                        value: $('#viewEdit_Role').val()
                    },
                    {
                        name: 'filter',
                        value: ''
                    }, {
                        name: 'filter',
                        value: ''
                    }
                ]);
                showToast('updated successfully', 'new ' + $('#viewEdit_Role').val() + ' updated ');
            }

        });
    });


    // update Data ================

    updateRequest = () => {
        console.log(updateRequestDATA);
        updateRequestDATA.from = "rizal";
        updateRequestDATA.to = "public market";

        $.ajax({
            type: "POST",
            url: "../../api/requestAPI.php",
            data: [{ name: 'update_id', value: updateRequestDATA[0].id },

                { name: 'action', value: updateRequestDATA[0].action },
                { name: 'from', value: updateRequestDATA[0].from },
                { name: 'to', value: updateRequestDATA[0].to }
            ],
            // dataType: "JSON",
            success: function(response) {
                console.log(response);

                console.log("Message:", readData(response)[0].msg);

                if (readData(response)[0].state) {

                    // alert(readData(response)[0].msg);
                    $("#promptDENY_modal").modal('hide');
                    $("#promptACCEPT_modal").modal('hide');
                    $("#promptFINISH_modal").modal('hide');
                    // $('#table-filter').val(updateRequestDATA[0].role);
                    if (updateRequestDATA[0].action == 'accept') {
                        showToast('request accepted successfully', 'just a customer accepted ');

                    } else if (updateRequestDATA[0].action == 'denied') {
                        showToast('request denied successfully', 'just a customer denied ');


                    }




                    getRecords([{
                            name: 'role',
                            value: 'Customer'
                        },
                        {
                            name: 'id',
                            value: ''
                        }, {
                            name: 'from',
                            value: 'driver'
                        }
                    ]);

                } else {
                    $("#promptDENY_modal").modal('hide');
                    $("#promptACCEPT_modal").modal('hide');
                    $("#promptFINISH_modal").modal('hide');
                    showToast('ERROR', 'Something went wrong');
                }

            }

        });

    };

    getRequestedDriver = (data) => {
        console.log(data);
        $.ajax({
            type: "POST",
            url: "../../api/getDriverAPI.php",
            data: [{
                name: 'reqID',
                value: data
            }],
            // dataType: "dataType",
            success: function(response) {
                console.log(readData(response)[0].driver_id);
                // readData(response);

                reqDriverID = readData(response)[0].driver_id;

            }
        });
    }





    // REQUEST form=========

    var viewEditForm = $("#request_form");


    viewEditForm.on("submit", function(e) {
        e.preventDefault();
        console.log($(this).serializeArray());
        console.log(updateRequestDATA);
        // updateRequestDATA.from = $(this).serializeArray()[0].value;
        // updateRequestDATA.to = $(this).serializeArray()[1].value;
        console.log(updateRequestDATA);

        $.ajax({
            type: "POST",
            url: "../../api/requestAPI.php",
            data: [{ name: 'update_id', value: updateRequestDATA[0].id },

                { name: 'action', value: 'request' },
                { name: 'request_FROM', value: $(this).serializeArray()[0].value },
                { name: 'request_TO', value: $(this).serializeArray()[1].value }
            ],
            // dataType: "JSON",
            success: function(response) {
                console.log(response);

                console.log("Message:", readData(response)[0].msg);

                if (readData(response)[0].state) {

                    // alert(readData(response)[0].msg);
                    // updateRequestDATA[0].id;
                    $("#requestModal").modal('hide');
                    // $('#table-filter').val(updateRequestDATA[0].role);




                    showToast('request successfully', 'you just request for a ride ');







                    getRecords([{
                            name: 'role',
                            value: 'all'
                        },
                        {
                            name: 'id',
                            value: accountID
                        }, {
                            name: 'from',
                            value: 'driver'
                        }
                    ]);

                } else {
                    $("#requestModal").modal('hide');
                    showToast('ERROR', 'Something went wrong');
                }

            }

        });

    });





    // GET account info

    getAccountInfo = (data) => {

        accountID = data.id;
        accountusername = data.username;
        accountrole = data.role;

        $('#header-title').html(`${accountusername}( <span style="font-weight:normal;font-size:mid">${accountrole}</span> )`);

        $.ajax({
            type: "POST",
            url: "../../api/fetchDataAPI.php",
            data: [{ name: 'prev_id', value: data.id }, { name: 'role', value: data.role }],
            // dataType: "JSON",    
            success: function(response) {
                console.log(response);
                console.log(readData(response));
                $('.account-name').html(`<b> ${readData(response)[0].name} </b> `);
                $('.account-email').html(`<b> ${readData(response)[0].email} </b> `);

                $('.account-username').html(`<b> ${readData(response)[0].username} </b> `);
                $('.account-sex').html(`<b> ${readData(response)[0].sex} </b> `);
                $('.account-created').html(`<b> ${readData(response)[0].created} </b> `);

                $('#editACCOUNT_name').val(readData(response)[0].name);
                $('#editACCOUNT_email').val(readData(response)[0].email);
                $('#editACCOUNT_newusername').val(readData(response)[0].username);
                $('#editACCOUNT_sex').val(readData(response)[0].sex);
                $('#editACCOUNT_password').val(readData(response)[0].password);



            }

        });
    }



    // edit ACCOUNT FORM AJAX ================
    var editAccountForm = $("#EDITACCOUNT_form");
    editAccountForm.on("submit", function(e) {
        e.preventDefault();
        console.log($(this).serializeArray());
        if (!($(this).serializeArray()[5].value == $(this).serializeArray()[4].value)) {
            $('#viewACCOUNTmsg  ').append('<p class="alert alert-danger alrt">Password not match!</p>');
            return
        }
        var data = $(this).serializeArray();
        data[7] = { name: 'id', value: accountID };
        data[8] = { name: 'username', value: accountusername };
        console.log(data);
        $.ajax({
            type: "POST",
            url: "../../api/editAcountAPI.php",
            data: data,
            // dataType: "JSON",
            success: function(response) {
                console.log(response);

                console.log("Message:", readData(response)[0].msg);

                if (readData(response)[0].state) {
                    // alert(readData(response)[0].msg);
                    $("#EDITACCOUNTModal").modal('hide');

                    showToast('updated successfully', 'account updated ');
                    console.log(data[2].value)
                    getAccountInfo({ id: accountID, username: data[2].value, role: accountrole });

                } else {
                    $('#viewACCOUNTmsg').append('<p class="alert alert-danger alrt">' + readData(response)[0].msg + '</p>');
                }

            }

        });
    });


});















// CHARTS ===================
let pieChart;

function createChart(dataresult, style, get, legend, title) {

    $('.chart-title').text(title);
    // Preprocess the data
    const groupedData = {};
    const groupFemale = {};
    const groupMale = {};
    const groupSex = {};
    groupSex['MALE'] = 0;
    groupSex['FEMALE'] = 0;
    groupSex['OTHER'] = 0;
    dataresult.forEach(entry => {
        const createdDate = new Date(entry.created);
        const monthYear = `${createdDate.getFullYear()}-${('0' + (createdDate.getMonth() + 1)).slice(-2)}`; // YYYY-MM format
        if (groupedData[monthYear]) {
            groupedData[monthYear]++;
        } else {
            groupedData[monthYear] = 1;
        }

        if (entry.sex == 'male') {
            groupSex['MALE']++
        } else if (entry.sex == 'female') {
            groupSex['FEMALE']++
        } else {
            groupSex['OTHER']++
        }

        // console.log('Entry ' + entry.sex);
    });
    let labels = '';
    let counts = '';
    if (get == 'entries') {
        labels = Object.keys(groupedData);
        counts = Object.values(groupedData);
    } else if (get == 'sex') {
        labels = Object.keys(groupSex);
        counts = Object.values(groupSex);

    }

    // chart data
    let data = {
        labels: labels,
        datasets: [{
            label: 'Number of Entries',
            data: counts,
            backgroundColor: [


                'rgb(255, 0, 0)', // Red
                'rgb(0, 128, 0)', // Green
                'rgb(0, 0, 255)', // Blue
                'rgb(255, 255, 0)', // Yellow
                'rgb(255, 165, 0)', // Orange
                'rgb(75, 0, 130)', // Indigo
                'rgb(238, 130, 238)', // Violet
                'rgb(0, 255, 255)', // Cyan
                'rgb(255, 0, 255)', // Magenta
                'rgb(0, 0, 0)', // Black
                'rgb(128, 128, 128)', // Gray
                'rgb(255, 255, 255)' // White


            ],
            borderColor: [
                'rgb(255, 0, 0)', // Bright Red
                'rgb(0, 128, 255)', // Vivid Blue
                'rgb(255, 255, 0)', // Bright Yellow
                'rgb(0, 255, 128)', // Bright Green
                'rgb(128, 0, 255)', // Vivid Purple
                'rgb(255, 128, 0)', // Bright Orange
                'rgb(128, 128, 128)', // Gray (less vibrant but solid)
                'rgb(0, 255, 255)', // Bright Cyan
                'rgb(255, 0, 255)', // Bright Magenta
                'rgb(0, 255, 0)', // Bright Green
                'rgb(255, 255, 255)', // White
                'rgb(0, 0, 0)' // Black

            ],
            borderWidth: 2

        }]
    };
    // CHART CONFIG
    const config = {
        type: style,
        data,
        options: {
            responsive: true,
            hoverBorderColor: 'gray',
            hoverBorderWidth: 3,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: legend,
                    position: 'top',
                },

                title: {
                    display: false,




                    text: 'Number of Entries by ' + title
                },
                footer: {
                    display: true,
                    text: 'Number of Entries by ' + title
                }

            }
        }
    };

    pieChart = new Chart(
        document.getElementById('pieChart'),
        config

    );
};









// READ ALL RECORDS ===================
function getRecords(gdata) {

    getRequestedDriver(accountID);
    console.log(gdata[1].value);
    $.ajax({
        type: "POST",
        url: "../../api/getDriverAPI.php",
        data: gdata,
        // dataType: "json",
        success: function(response, text, stri) {

            console.log(gdata)
            console.log(gdata[gdata.length - 1].value);
            console.log(readData(response));
            // var res = readData(response);
            var tbody = ``;
            var reqcount = 0;
            var pendingcount = 0;
            var acceptedcount = 0;
            if (gdata[gdata.length - 1].value == 'view') {
                tableAction('view', gdata[1].value, readData(response));
                // updateRequestDATA = readData(response);
                // updateRequestDATA = { action: 'accept' };
            } else if (gdata[gdata.length - 1].value == 'edit') {
                tableAction('edit', gdata[0].value, readData(response));
            } else if (gdata[gdata.length - 1].value == 'delete') {
                updateRequestDATA = gdata[0].value;
                tableAction('delete', gdata[0].value, readData(response));
            } else if (gdata[gdata.length - 1].value == 'finish') {
                updateRequestDATA = gdata[0].value;
                tableAction('finish', gdata[0].value, readData(response));
            } else if (gdata[gdata.length - 1].value == 'request') {
                updateRequestDATA = gdata[0].value;
                tableAction('request', gdata[0].value, readData(response));
            } else {

                readData(response).forEach((data) => {
                    reqcount++;

                    if (data.status == 'pending') {
                        pendingcount++;

                    } else if (data.status == 'accept') {
                        acceptedcount++;

                    }

                });
                $('#reqNum').text(reqcount);
                console.log(reqcount);


                // Initialize DataTable
                $('#tableViews').DataTable({
                    data: readData(response),
                    columns: [{
                            data: null,
                            render: function(data, type, row, meta) {
                                return meta.row + 1; // Display row number starting from 1
                            }
                        },
                        { data: 'name' },


                        {
                            data: 'id',
                            className: "center",
                            render: function(data, type, row, meta) {
                                let actionsHtml = ``;

                                if (data == reqDriverID) {
                                    actionsHtml += `<div class="action-icon">
                                   <h6>Requesting</h6>
                               </div>
                                `;
                                } else {
                                    actionsHtml += `<div class="action-icon">
                                    <button class="btn btn-primary" onclick="getRecords([
                                       { name: 'role', value: 'Driver' },
                                       { name: 'prev_id', value: ${data} },
                                       { name: 'from', value: 'customer' },
                                       { name: 'status', value: 'finish' },
                                       { name: 'action', value: 'request' }
                                   ])" class="" style="cursor:pointer;">Request</button>
                               </div>
                                `;

                                }



                                return `<div 
                                style="background-color:black;
                                display:flex;
                                justify-content:space-around;
                                justify-items:center;
                                align-items:center;
                                gap:10px;
                                align-content:center;
                                width:100%;

                                ">` + actionsHtml + `</div>`;

                            },
                            orderable: false
                        }
                    ],
                    paging: true,
                    searching: true,
                    ordering: true,
                    info: true,
                    lengthChange: true,
                    pageLength: 10,
                    lengthMenu: [5, 10, 20, 50],
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Search records",
                        lengthMenu: "Show _MENU_ entries"
                    },
                    scrollY: '300px',
                    destroy: true,
                    scrollCollapse: true,
                    paging: true
                });
















            }





        },
        error: function(e) {
            console.log(e);
        }
    });



}
//destroy the chart
function destroyChart() {
    pieChart.destroy();

}
//initialize the chart
// function initChart() {
//     pieChart = new Chart(
//         document.getElementById('pieChart'),
//         config

//     );
// }

// add user btn
function addUser(param, btn) {
    $('#add_id').val(param);

    // if (param == 'admin') {
    //     $('#add_Role').append('<option>admin</option>');
    //     $('#add_Role').attr('disabled', true);

    // }
    $('#modalTitle').html("ADD " + param);


    // alert(param);

}

function tableAction(action, id, data) {
    // alert(action + " " + id);
    if (action == "view") {
        $('#promptACCEPT_modal').modal('show');

        // $('#viewModalTitle').text(action + " User");

        // $('#viewEdit_name').val(data[0].name);
        // $('#viewEdit_username').val(data[0].username);
        // $('#viewEdit_email').val(data[0].email);
        // $('#viewEdit_password').val(data[0].password);
        // $('#viewEdit_sex').val(data[0].sex);
        // $('#viewEdit_Role').val(data[0].role);



        // $('.form-control').attr('readonly', true);

        // $('#viewEdit_Role').attr('disabled', true);
        // $('#viewEdit_sex').attr('disabled', true);


        // $('#viewEdit_confirmpassword_con').hide();
        // $('#viewEdit_submit').hide();
        // console.log(updateRequestDATA);

        updateRequestDATA = data;
        updateRequestDATA[0].action = 'accept';
        console.log(updateRequestDATA);

    }


    if (action == "edit") {
        $('#viewEditModal').modal('show');
        $('#viewModalTitle').text(action + " User");
        $('#viewEdit_name').val(data[0].name);
        $('#viewEdit_username').val(data[0].username);
        $('#viewEdit_email').val(data[0].email);
        $('#viewEdit_password').val(data[0].password);
        $('#viewEdit_sex').val(data[0].sex);

        $('#viewEdit_Role').append('<option>admin</option>');

        $('#viewEdit_Role').val(data[0].role);
        $('#viewEdit_id').val(data[0].id);

        $('#viewEdit_submit').show();
        $('#viewEdit_confirmpassword_con').show();
        $('.form-control').attr('readonly', false);


        $('#viewEdit_sex').attr('disabled', false);
        if (data[0].role == 'admin') {

            // $('#viewEdit_Role').attr('disabled', true);
            $('#role-wrap-con').hide();
            $('#viewEditRole-con').append('<input type="hidden" name="viewEdit_Role" value="admin">');
        } else {
            $('#role-wrap-con').show();
        }
    }

    if (action == "delete") {
        console.log(data);
        $('#promptDENY_modal').modal('show');
        // $('#delete_id').val(id);
        updateRequestDATA = data;
        updateRequestDATA[0].action = 'denied';
    }

    if (action == "finish") {
        console.log(data);
        $('#promptFINISH_modal').modal('show');
        // $('#delete_id').val(id);
        updateRequestDATA = data;
        updateRequestDATA[0].action = 'finish';
    }
    if (action == "request") {
        console.log(data);
        $('#requestModal').modal('show');
        // $('#delete_id').val(id);
        updateRequestDATA = data;

    }

}