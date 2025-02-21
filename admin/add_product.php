<?php include('header.php'); ?>


<div class="container-fluid">
    <div class="row" style="min-height: 1000px"> 

        <!--  sidebar menu -->
        <?php include('sidemenu.php'); ?> 


        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
              
            </div>


            <h2>Create Product</h2>
            <div class="table-responsive">

                <div class="mx-auto container">
                 
                    <form id="create-form" enctype="multipart/form-data" method="POST" action="create_product.php">

                        <p style="color:red;"> 
                            <?php if (isset($_GET['error'])) { 
                                echo $_GET['error']; 
                            } ?> 
                        </p>
 
                        <div class="form-group mt-2">
                            <label>Title</label>
                            <input type="text" class="form-control" id="product-name" name="name" placeholder="Product Name">
                        </div>

                        <div class="form-group mt-2">
                            <label>Description</label>
                            <input type="text" class="form-control" id="product-desc" name="description" placeholder="Product Description">
                        </div>

                        <div class="form-group mt-2">
                            <label>Price</label>
                            <input type="text" class="form-control" id="product-price" name="price" placeholder="Product Price">
                        </div>

                        <div class="form-group mt-2">
                            <label>Special Offer</label>
                            <input type="number" class="form-control" id="product-offer" name="offer" placeholder="Product Offer">
                        </div>

                        <div class="form-group mt-2">
                            <label>Category</label>
                            <select class="form-select" required name="category">
                                <option value="arts">Painting</option>
                                <option value="handmade">Handmade</option>
                                <option value="antique">Antique</option>
                                <option value="currency">Old Currency</option>
                            </select>
                        </div>

                        <div class="form-group mt-2">
                            <label>Image - 1</label>
                            <input type="file" class="form-control" id="image1" name="image1" placeholder="Image 1">
                        </div>
                        <div class="form-group mt-2">
                            <label>Image - 2</label>
                            <input type="file" class="form-control" id="image2" name="image2" placeholder="Image 2">
                        </div>
                        <div class="form-group mt-2">
                            <label>Image - 3</label>
                            <input type="file" class="form-control" id="image3" name="image3" placeholder="Image 3">
                        </div>
                        <div class="form-group mt-2">
                            <label>Image - 4</label>
                            <input type="file" class="form-control" id="image4" name="image4" placeholder="Image 4">
                        </div>

                        <div class="form-group mt-3">
                            <input type="submit" class="btn btn-primary" name="create_product" value="Create">
                        </div>

                    </form>
                </div>

        </main>

    </div>

</div>

<script src="../admin/assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script>feather.replace();</script>
