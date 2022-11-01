<!-- Including Common Header -->
<?php include 'inc/header.php'; ?>

<?php
    $sql = 'SELECT * FROM feedback';
    $result = mysqli_query($conn, $sql);
    $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!-- Page-Specific Styles -->
<link rel="stylesheet" href="./css/feedback.css" class="rel">
</head>

<body>
    <!-- Including Navbar -->
    <?php include 'inc/navbar.php'; ?>

    <!-- Page-Specific Content -->
    <main>
        <div>

            <div class="section-one">
                <div class="container-one">

                    <h1>Past Feedback</h1>

                    <?php 
                    if(empty($feedback)) {
                        echo 'Nobody has left feedback yet.';
                    }
                    ?>

                    <?php foreach ($feedback as $item) : ?>

                        <div class="card">
                            <p class="name"><?php echo $item['name']; ?></p>
                            <p class="email"><?php echo $item['email']; ?></p>
                            <p class="content"><?php echo $item['body']; ?></p>
                            <p class="email">Written on <?php echo $item['date']; ?></p>
                        </div>

                    <?php endforeach; ?>

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