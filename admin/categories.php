
<?php include_once('includes/admin_header.php'); ?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include_once('includes/admin_navigation.php'); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>

                        <div class="col-xs-6">

                        <?php insurt_category(); ?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Add category</label>
                                    <input class="form-control" type="text" name="cat_title" id="cat-title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add categoriy">
                                </div>
                            </form>

                        <?php
                        
                            if(isset($_GET['edit'])) {
                                $edit_id = $_GET['edit'];

                                include('includes/update_category.php');
                            }
                        
                        ?>
                            
                        </div>

                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>categoriy title</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php findall_categories(); ?>
                                </tbody>
                            </table>
                        </div>

                        <?php delete_category(); ?>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include_once('includes/admin_footer.php'); ?>
