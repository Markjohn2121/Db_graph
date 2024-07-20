<!-- Login Modal -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="loginModalLabel">Trike Talk Log In</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="login_form">
          <div id="msg"></div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="login_username" id="login_username" placeholder="Username" required>
            <label for="login_username">Username</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" name="login_password" id="login_password" placeholder="Password" required>
            <label for="login_password">Password</label>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="showpassword">
            <label class="form-check-label" for="showpassword">Show password</label>
          </div>
          <button type="submit" class="btn btn-primary w-100">Log in</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Sign Up Modal -->
<div class="modal fade" id="signUpModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="signUpModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="signUpModalLabel">Trike Talk Sign Up</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="signup_form" class="row g-3">
          <div id="smsg"></div>
          <div class="form-floating col-md-6 mb-3">
            <input type="text" class="form-control" name="signup_name" id="signup_name" placeholder="Name" required>
            <label for="signup_name">Name</label>
          </div>
          <div class="form-floating col-md-6 mb-3">
            <input type="email" class="form-control" name="signup_email" id="signup_email" placeholder="Email" required>
            <label for="signup_email">Email</label>
          </div>
          <div class="form-floating col-md-6 mb-3">
            <input type="text" class="form-control" name="signup_username" id="signup_username" placeholder="Username" required>
            <label for="signup_username">Username</label>
          </div>
          <div class="form-floating col-md-6 mb-3">
            <select name="signup_sex" id="signup_sex" class="form-select" required>
              <option value="male" selected>Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
            </select>
            <label for="signup_sex">Sex</label>
          </div>
          <div class="form-floating col-md-6 mb-3">
            <input type="password" class="form-control" name="signup_password" id="signup_password" placeholder="Password" required>
            <label for="signup_password">Password</label>
          </div>
          <div class="form-floating col-md-6 mb-3">
            <input type="password" class="form-control" name="signup_confirmpassword" id="signup_confirmpassword" placeholder="Confirm Password" required>
            <label for="signup_confirmpassword">Confirm Password</label>
          </div>
          <div class="col-12 mb-3">
            <label for="signup_Role" class="form-label fw-bold">As:</label>
            <select name="signup_Role" id="signup_Role" class="form-select" required>
              <option value="Driver">Driver</option>
              <option value="Customer">Customer</option>
            </select>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">Sign up</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>





<!-- ADD Data -->
<div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><span id="modalTitle">Trike Talk ADD</span></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- ADD body -->
        <form action="post" class="row g-3" id="add_form">
          <div id="addmsg"></div>
          <div class="form-floating col-md-6 mb-3">
            <input type="text" class="form-control" name="add_name" id="add_name" placeholder="Name" required>
            <label for="add_name">Name</label>
          </div>
          <div class="form-floating col-md-6 mb-3">
            <input type="email" class="form-control" name="add_email" id="add_email" placeholder="Email" required>
            <label for="add_email">Email</label>
          </div>
          <div class="form-floating col-md-6 mb-3">
            <input type="text" class="form-control" name="add_username" id="add_username" placeholder="Username" required>
            <label for="add_username">Username</label>
          </div>
          <div class="form-floating col-md-6 mb-3">
            <select name="add_sex" id="add_sex" class="form-select" required>
              <option value="male" selected>Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
            </select>
            <label for="add_sex">Sex</label>
          </div>
          <div class="form-floating col-md-6 mb-3">
            <input type="password" class="form-control" name="add_password" id="add_password" placeholder="Password" required>
            <label for="add_password">Password</label>
          </div>
          <div class="form-floating col-md-6 mb-3">
            <input type="password" class="form-control" name="add_confirmpassword" id="add_confirmpassword" placeholder="Confirm Password" required>
            <label for="add_confirmpassword">Confirm Password</label>
          </div>
          <div class="col-12">
            <input type="hidden" name="add_Role" id="add_id">
            <button type="submit" class="btn btn-primary">ADD</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>






<!-- View EDit  Modal -->



<div class="modal fade" id="viewEditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="viewModalTitle">Trike Talk</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <!-- View EDit  body  -->

        <form action="post" class="row g-3" id="viewEdit_form">
          <div id="viewmsg"></div>
          <div class="form-floating col-md-6">
          
            <input type="text" class="form-control" name="viewEdit_name" id="viewEdit_name"  placeholder="Name" style="border:1px solid black" required>
            <label for="viewEdit_name" >Name</label>
          </div>



       

          <div class="form-floating col-md-10">
           
            <input type="email" class="form-control" name="viewEdit_email" id="viewEdit_email" placeholder="Email" style="border:1px solid black" required>
            <label for="viewEdit_email" class="form-label">Email</label>
          </div>


         

          <div class="form-floating  col-md-6">

            <input type="text" class="form-control" name="viewEdit_username"id="viewEdit_username" placeholder="Username" style="border:1px solid black" required>
            <label for="viewEdit_username" class="form-label">Username</label>
          </div>




          <div class="form-floating col-md-6">
           
         
                            
           <select name="viewEdit_sex" id="viewEdit_sex" class="form-select form-select-md mb-3 " style="border: 2px solid black;"
               aria-label="Large select example" placeholder="Sex" >
               <option value="male" selected>Male</option>
               <option value="female">Female</option>
               <option value="other">other</option>
            
           </select>

           <label for="viewEdit_sex">Sex</label>
</div>

          <div class="form-floating  col-md-8">

          
          
            <input type="text" class="form-control" name="viewEdit_password" id="viewEdit_password" placeholder="Password" style="border:1px solid black" required>
            <label for="viewEdit_password" class="form-label">Password</label>
          </div>

          <div id="viewEdit_confirmpassword_con" class="form-floating  col-md-6">
          
            <input type="text" class="form-control"  name="viewEdit_confirmpassword" id="viewEdit_confirmpassword" placeholder="Confirm Password" style="border:1px solid black" required>
            <label for="viewEdit_confirmpassword" class="form-label">Confirm Password</label>
          </div>


          <div class="col-md-12 w-75" id="viewEditRole-con">
            <div id="role-wrap">
            <label for="viewEdit_Role" class="form-label" style="font-weight: bold;">role:</label>
            <select name="viewEdit_Role" id="viewEdit_Role" class="fo" style="border:1px solid black" required>
              <option>Driver</option>
              <option>Customer</option>
            </select>
            </div>
          
          </div>

<input type="hidden" name="viewEdit_id" id="viewEdit_id">
          <div class="col-12">
            <button type="submit" class="btn btn-primary" id="viewEdit_submit">Save</button>
          </div>
        </form>




      </div>

    </div>
  </div>
</div>


<!-- Prompt Modal delete-->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="prompt_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="staticBackdropLabel">Are you sure to delete this user?</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>note: Deleting of user cannot be undone.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="deletUser()">Understood</button>
      </div>
    </div>
  </div>
</div>


<!-- PROMPT DENY MODAL -->


<div class="modal fade" id="promptDENY_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="staticBackdropLabel">Are you sure to DENY the request of customer?</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>note: Denying  of request cannot be undone.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="updateRequest()">Understood</button>
      </div>
    </div>
  </div>
</div>






<!-- PROMPT Accept MODAL -->


<div class="modal fade" id="promptACCEPT_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="staticBackdropLabel">Are you sure to ACCEPT the request of customer?</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>note: you must take the responsibility in accepting request.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="updateRequest()">Understood</button>
      </div>
    </div>
  </div>
</div>




<!-- PROMPT FINISH SESSION MODAL -->


<div class="modal fade" id="promptFINISH_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="staticBackdropLabel">Thank you</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>Thank you for making your customer safe.
        
      </p>
      <p>Good job!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="updateRequest()">Understood</button>
      </div>
    </div>
  </div>
</div>


<!-- View ACCOUNT Modal -->
<div class="modal fade" id="EDITACCOUNTModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="viewModalTitle">Trike Talk Edit Account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="EDITACCOUNT_form" class="row g-3">
          <div id="viewACCOUNTmsg"></div>
          <div class="form-floating col-md-6 mb-3">
            <input type="text" class="form-control" name="editACCOUNT_name" id="editACCOUNT_name" placeholder="Name" required>
            <label for="editACCOUNT_name">Name</label>
          </div>
          <div class="form-floating col-md-6 mb-3">
            <input type="email" class="form-control" name="editACCOUNT_email" id="editACCOUNT_email" placeholder="Email" required>
            <label for="editACCOUNT_email">Email</label>
          </div>
          <div class="form-floating col-md-6 mb-3">
            <input type="text" class="form-control" name="editACCOUNT_newusername" id="editACCOUNT_newusername" placeholder="Username" required>
            <label for="editACCOUNT_newusername">Username</label>
          </div>
          <div class="form-floating col-md-6 mb-3">
            <select name="editACCOUNT_sex" id="editACCOUNT_sex" class="form-select" required>
              <option value="male" selected>Male</option>
              <option value="female">female</option>
              <option value="other">Other</option>
            </select>
            <label for="editACCOUNT_sex">Sex</label>
          </div>
          <div class="form-floating col-md-6 mb-3">
            <input type="text" class="form-control" name="editACCOUNT_password" id="editACCOUNT_password" placeholder="Password" required>
            <label for="editACCOUNT_password">Password</label>
          </div>
          <div class="form-floating col-md-6 mb-3">
            <input type="text" class="form-control" name="editACCOUNT_confirmpassword" id="viewEdit_confirmpassword" placeholder="Confirm Password" required>
            <label for="editACCOUNT_confirmpassword">Confirm Password</label>
          </div>
          <input type="hidden" name="viewEdit_id" id="viewEdit_id">
          <div class="col-12">
            <button type="submit" class="btn btn-primary w-100" id="viewEdit_submit">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>





<!-- REQUEST Modal -->



<div class="modal fade" id="requestModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="viewModalTitle">Trike Talk</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      

        <form action="post" class="row g-3" id="request_form">
          <div id="viewmsg"></div>
          <div class="form-floating col-md-6">
          
            <input type="text" class="form-control" name="request_FROM" id="request_FROM"  placeholder="From" style="border:1px solid black" required>
            <label for="request_FROM" >FROM:</label>
          </div>



       

          <div class="form-floating col-md-10">
           
            <input type="text" class="form-control" name="request_TO" id="request_TO" placeholder="To" style="border:1px solid black" required>
            <label for="request_TO" class="form-label">TO:</label>
          </div>


         
<!-- <input type="hidden" name="viewEdit_id" id="viewEdit_id"> -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary" id="viewEdit_submit">Save</button>
          </div>
        </form>




      </div>

    </div>
  </div>
</div>