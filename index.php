<!-- Including Common Header -->
<?php include 'inc/header.php'; ?>

<!-- Page-Specific Styles -->
<link rel="stylesheet" href="./css/homepage.css" class="rel">
</head>

<body>
    <!-- Including Navbar -->
    <?php include 'inc/navbar.php'; ?>

    <?php
    $name = $email = $body = '';
    $nameErr = $emailErr = $bodyErr = '';

    //Form Submit
    if (isset($_POST['submit'])) {
        //Validate name
        if (empty($_POST['name'])) {
            $nameErr = 'Name is required.';
        } else {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        //Validate email
        if (empty($_POST['email'])) {
            $emailErr = 'Email is required.';
        } else {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        }

        //Validate body
        if (empty($_POST['body'])) {
            $bodyErr = 'Feedback is required.';
        } else {
            $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        if (empty($nameErr) && empty($emailErr) && empty($bodyErr)) {
            //Add to Database
            $sql = "INSERT INTO feedback (name, email, body) VALUES ('$name', '$email', '$body')";

            if (mysqli_query($conn, $sql)) {
                //Success
                header('Location: feedback.php');
            } else {
                //Error
                echo 'Error: ' . mysqli_error($conn);
            }
        }
    }
    ?>

    <!-- Page-Specific Content -->
    <main>
        <div>

            <div class="section-one">
                <div class="container-one">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="entry-field">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control <?php echo $nameErr ? 'is-invalid' : null ?>" id="name" name="name" placeholder="Enter your name">
                        </div>
                        <p class="invalid-feedback">
                            <?php echo $nameErr; ?>
                        </p>
                        <br>
                        <div class="entry-field">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control <?php echo $emailErr ? 'is-invalid' : null ?>" id="email" name="email" placeholder="Enter your email">
                        </div>
                        <p class="invalid-feedback">
                            <?php echo $emailErr; ?>
                        </p>
                        <br>
                        <div class="entry-field">
                            <label for="body" class="form-label">Feedback</label>
                            <textarea type="text" class="form-control <?php echo $bodyErr ? 'is-invalid' : null ?>" id="body" name="body" placeholder="Enter your feedback"></textarea>
                        </div>
                        <p class="invalid-feedback">
                            <?php echo $bodyErr; ?>
                        </p>
                        <br><br>
                        <input type="submit" name="submit" value="submit">
                    </form>
                </div>
            </div>

        </div>
    </main>

    <!-- Including Common Scripts -->
    <?php include 'inc/scripts.php'; ?>
    <!-- Page-Specific Scripts  -->

</body>

<!-- Including Footer -->
<?php include 'inc/footer.php'; ?>