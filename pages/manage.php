<?php include 'includes/header.php'; ?>

<section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow border-info">
                        <div class="card-header bg-dark">
                            <h3 class="text-center text-info">All Blogs Info</h3>
                        </div>
                        <div class="card-body">
                            <h3 class="text-center text-success font-weight-bolder">
                                <?php
                                if (isset($_SESSION['message']))
                                {
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                }
                                ?>
                            </h3>
                            <h3 class="text-center font-weight-bolder mb-4"><?php echo isset($_SESSION['message']) ? $_SESSION['message'] : ''; ?></h3>
                            <table class="table table-bordered">
                                <thead>
                                <tr class="text-center">
                                    <th>Blog Title</th>
                                    <th>Author Name</th>
                                    <th>Blog Thumbnail</th>
                                    <th>Take Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($blogs as $blog) {extract($blog)?>
                                    <tr class="text-center text-success font-weight-bolder">
                                        <td><?php echo $title;?></td>
                                        <td><?php echo $author;?></td>
                                        <td><img src="<?php echo $image;?>" alt="Blog Image" height="100" width="100"></td>
                                        <td>
                                            <a href="action.php?status=edit&id=<?php echo $id;?>" class="btn btn-sm btn-success font-weight-bolder text-uppercase">Edit</a>
                                            <a href="action.php?status=delete&id=<?php echo $id;?>" class="btn btn-sm btn-danger font-weight-bolder text-uppercase">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>