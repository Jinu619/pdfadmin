<?php
$id = isset($_GET['id']) ? $_GET['id'] : "";
$mod = isset($_GET['mod']) ? $_GET['mod'] : "";

if ($id) {
    $sel = mysqli_query($conn, "SELECT * FROM users WHERE id='$id' ");
    $row = mysqli_fetch_object($sel);
    $name = $row->name;
    $username = $row->username;
    $branch_id = $row->branch_id;
    $email = $row->email;
    $type = $row->type;
    $user_id = $row->id;
} else {
    $name = "";
    $username = "";
    $branch_id = "";
    $type = "";
    $user_id = "";
    $email = "";
}
?>
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>User Management</h4>
                <h6>Add/Update User</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="user_validate.php" method="POST" id="userAdd">
                    <div class="row">

                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" name="user_name" id="user_name" value="<?php echo $username; ?>" required>
                                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                <div id="userError" style="color: red;"></div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" id="email" onkeyup="validateEmail(this.value)" value="<?php echo $email; ?>" required>
                                <div id=" emailError" style="color: red;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" class=" pass-input" name="password" id="password" required>
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                    <div id="passwordError" style="color: red;"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Branch</label>
                                <select class="select" name="branch" required id="branch">
                                    <option value="">Select</option>
                                    <?php
                                    $sel = mysqli_query($conn, "SELECT * FROM branches WHERE deleted_at is null ");
                                    while ($row1 = mysqli_fetch_object($sel)) {
                                    ?>
                                        <option value="<?php echo $row1->id ?>" <?php echo $branch_id == $row1->id ? 'selected' : '' ?>><?php echo $row1->branch_name ?></option>
                                    <?php } ?>
                                </select>
                                <div id="branchError" style="color: red;"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" required id="name" value="<?php echo $name; ?>">
                                <div id="nameError" style="color: red;"></div>
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select class="select" name="role" required id="role">
                                    <option value="">Select</option>
                                    <option value="1" <?php echo $type == '1' ? 'selected' : '' ?>>Super Admin</option>
                                    <option value="2" <?php echo $type == '2' ? 'selected' : '' ?>>Admin</option>
                                    <option value="3" <?php echo $type == '3' ? 'selected' : '' ?>>User</option>
                                </select>
                                <div id="roleError" style="color: red;"></div>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <div class="pass-group">
                                    <input type="password" class=" pass-inputs" name="c_password" id="c_password" onkeyup="checkPasswordMatch()" required>
                                    <span class="fas toggle-passworda fa-eye-slash"></span>
                                    <div id="passwordMatchError" style="color: red;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <a href="javascript:void(0);" onclick="check()" class="btn btn-submit me-2">Submit</a>
                            <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<script src="assets/plugins/select2/js/select2.min.js"></script>
<script>
    function check() {
        var user_name = $("#user_name").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var name = $("#name").val();
        var role = $("#role").val();
        var c_password = $("#c_password").val();
        var branch = $("#branch").val();
        var user_id = $("#user_id").val();

        var userInput = document.getElementById('user');
        var userError = document.getElementById('userError');
        if (!user_name) {
            userError.textContent = 'User name is required';
            return false
        } else {
            userError.textContent = ''; // Clear error message
        }

        var emailInput = document.getElementById('email');
        var emailError = document.getElementById('emailError');
        if (!email) {
            emailError.textContent = 'Email is required';
            return false
        } else {
            validateEmail(email);
            if ($("#emailError").text()) {
                return false;
            }
        }

        var passwordInput = document.getElementById('password');
        var passwordError = document.getElementById('passwordError');
        if (!password && user_id) {
            passwordError.textContent = 'Password is required';
            return false
        } else {
            passwordError.textContent = ''; // Clear error message
        }


        var nameInput = document.getElementById('name');
        var nameError = document.getElementById('nameError');
        if (!name) {
            nameError.textContent = 'Name is required';
            return false
        } else {
            nameError.textContent = ''; // Clear error message
        }

        var roleInput = document.getElementById('role');
        var roleError = document.getElementById('roleError');
        if (!role) {
            roleError.textContent = 'Role is required';
            return false
        } else {
            roleError.textContent = ''; // Clear error message
        }

        var branchInput = document.getElementById('branch');
        var branchError = document.getElementById('branchError');
        if (!branch) {
            branchError.textContent = 'Branch is required';
            return false
        } else {
            branchError.textContent = ''; // Clear error message
        }


        var c_passwordInput = document.getElementById('c_password');
        var c_passwordError = document.getElementById('passwordMatchError');
        if (!c_password && password) {
            c_passwordError.textContent = 'Confirm password is required';
            return false
        } else {
            checkPasswordMatch();
            if ($("#passwordMatchError").text()) {
                return false;
            }
        }

        $("#userAdd").submit();

    }

    function validateEmail(email) {
        var emailInput = document.getElementById('email');
        var emailError = document.getElementById('emailError');
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Regular expression for email validation

        if (!emailRegex.test(email)) {
            $("#emailError").text('Invalid email address');
            emailInput.classList.add('is-invalid'); // Add CSS class for styling
        } else {
            $("#emailError").text(''); // Clear error message
            emailInput.classList.remove('is-invalid'); // Remove CSS class
        }
    }

    function checkPasswordMatch() {
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('c_password').value;
        var passwordMatchError = document.getElementById('passwordMatchError');

        if (password !== confirmPassword) {
            passwordMatchError.textContent = 'Passwords do not match'; // Show error message
            document.getElementById('c_password').classList.add('is-invalid'); // Add CSS class for styling
        } else {
            passwordMatchError.textContent = ''; // Clear error message
            document.getElementById('c_password').classList.remove('is-invalid'); // Remove CSS class
        }
    }
</script>