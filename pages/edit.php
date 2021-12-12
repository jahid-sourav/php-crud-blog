<?php
include 'includes/header.php';?>

<section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow border-info">
                        <div class="card-header bg-dark">
                            <h3 class="text-center text-info">Edit Blog Info</h3>
                        </div>
                        <div class="card-body">
                            <h4 class="text-center text-success mb-4">
                                <?php echo isset($message) ? $message : '';?>
                            </h4>
                            <form action="action.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="blog-title" class="text-info font-weight-bolder mb-0">Title</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" value="<?php echo $title;?>" name="title" id="blog-title" class="form-control border-info">
                                            <input type="hidden" name="id" value="<?php echo $id;?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="blog-author" class="text-info font-weight-bolder mb-0">Author</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" value="<?php echo $author;?>" name="author" id="blog-author" class="form-control border-info">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="blog-description" class="text-info font-weight-bolder mb-0">Description</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <textarea name="description" id="blog-description" class="form-control border-info"><?php echo $description;?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="blog-image" class="text-info font-weight-bolder mb-0">Image</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="file" name="image" id="blog-image" class="form-control-file">
                                            <img src="<?php echo $image;?>" alt="Blog Image" height="150" width="150" class="border-info rounded p-2">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3"></div>
                                        <div class="col-lg-9">
                                            <input type="submit" name="updateBtn"  value="Update Blog" class="btn btn-dark btn-block text-warning font-weight-bolder text-uppercase">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php';?>