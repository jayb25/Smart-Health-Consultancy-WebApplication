<?php
session_start();
include('configs/config.php');
include('configs/codeGen.php');
//handle login
if (isset($_POST['sign-up'])) {
    $month_joined = $_POST['month_joined'];
    $doc_id = $_POST['doc_id'];
    $doc_number = $_POST['doc_number'];
    $doc_name = $_POST['doc_name'];
    $doc_email = $_POST['doc_email'];
    $doc_phone = $_POST['doc_phone'];
    $doc_status = $_POST['doc_status'];
    $doc_password = sha1(md5($_POST['doc_password']));

    $query = "INSERT INTO medical_experts (doc_password, month_joined, doc_id, doc_number, doc_name, doc_email, doc_phone, doc_status) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssssssss', $doc_password, $month_joined, $doc_id, $doc_number, $doc_name, $doc_email, $doc_phone, $doc_status);
    $stmt->execute();
    if ($stmt) {
        //inject alert that post is shared
        $success = "Medical Expert Account Created" && header("refresh:1; url=index.php");
    } else {
        //inject alert that task failed
        $info = "Please Try Again Or Try Later";
    }
}
require_once('partials/_head.php');
?>

<body class="form">


    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
                        <h1 class="">Smart Health Consultancy - Doctors` Module</h1>
                        <p class="">Fill All Fields </p>
                        <form method="POST" class="text-left">
                            <div class="form">
                                <div id="username-field" class="field-wrapper input">
                                    <label for="username">Full Name</label>
                                    <input id="username" required name="doc_name" type="text" class="form-control">
                                    <input required name="doc_id" value="<?php echo $doc_id; ?>" type="hidden" class="form-control">
                                    <input required name="doc_number" type="hidden" value="<?php echo $a; ?>-<?php echo $b; ?>" class="form-control">
                                    <input required name="month_joined" type="hidden" value="<?php echo date('M'); ?>" class="form-control">
                                    <input required name="doc_status" type="hidden" value="Pending" class="form-control">
                                </div>

                                <div id="username-field" class="field-wrapper input">
                                    <label for="username">Email Address</label>
                                    <input id="username" required name="doc_email" type="email" class="form-control">
                                </div>

                                <div id="username-field" class="field-wrapper input">
                                    <label for="username">Phone Number</label>
                                    <input  required name="doc_phone" type="text" class="form-control">
                                </div>
                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">Password</label>
                                    </div>
                                    <input id="password" required name="doc_password" type="password" class="form-control">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" name="sign-up" class="btn btn-primary mixin" value="">Sign Up</button>
                                    </div>
                                </div>

                                <!-- <div class="division">
                                    <span>OR</span>
                                </div>

                                <div class="social">
                                    <a href="doc/" class="btn social-fb">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook">
                                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                        </svg>
                                        <span class="brand-name">Login In As Doctor</span>
                                    </a>
                                </div>-->
                                <p class="signup-link">Registered ? <a href="index.php">Log In</a></p>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once('partials/_scripts.php'); ?>
</body>

</html>