<?php  include('header.php'); ?>	
 <?php  include('sidebar.php'); ?>	
 <?php
$currentid = $_REQUEST['id'];
$statement = $pdo->prepare("SELECT * FROM products WHERE pid=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$p_name = $row['name'];
	$p_old_price = $row['p_old_price'];
	$p_current_price = $row['p_current_price'];
	$p_qty = $row['p_qty'];
	$p_description = $row['p_description'];
	$p_short_description = $row['p_short_description'];
	$p_feature = $row['p_feature'];
	$p_condition = $row['p_condition'];
	$p_return_policy = $row['p_return_policy'];
	$p_is_featured = $row['p_is_featured'];
	$p_is_active = $row['p_is_active'];
	$tcat_name = $row['ecat_name'];
	$sub_cat = $row['sub_cat'];
	$last_cat = $row['last_cat'];

}
?>
            <div class="page-body">

                <!-- New Product Add Start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-8 m-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Product Information</h5>
                                            </div>

                                            <form class="theme-form theme-form-2 mega-form">
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Product Name</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text"    value="<?php echo $p_name; ?>">
                                                    </div>
                                                </div>

                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title">Product
                                                        Type</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-example-basic-single w-100" name="state">
                                                            <option disabled>Static Menu</option>
                                                            <option>Simple</option>
                                                            <option>Classified</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">Category</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-example-basic-single w-100" name="state">
                                                            <option disabled>Category Menu</option>
                                                           <?php
                                                            $statement = $pdo->prepare("SELECT * FROM tbl_top_category ORDER BY tcat_name ASC");
                                                            $statement->execute();
                                                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);   
                                                            foreach ($result as $row) { ?>
                                                             <option value="<?php echo $row['tcat_name']; ?>" <?php if($row['tcat_name'] == $tcat_name){echo 'selected';} ?>><?php echo $row['tcat_name']; ?></option>
                                                           <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">Subcategory</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-example-basic-single w-100" name="state">
                                                            <option disabled>Subcategory Menu</option>
                                                            <?php
		                            $statement = $pdo->prepare("SELECT * FROM tbl_mid_category ORDER BY mcat_name ASC");
		                            $statement->execute(array());
		                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);   
		                            foreach ($result as $row) {
		                                ?>
		                                <option value="<?php echo $row['mcat_name']; ?>" <?php if($row['mcat_name'] == $sub_cat){echo 'selected';} ?>><?php echo $row['mcat_name']; ?></option>
		                                <?php
		                            }
		                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                             <!--   <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">Brand</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-example-basic-single w-100">
                                                            <option disabled>Brand Menu</option>
                                                            <option value="puma">Puma</option>
                                                            <option value="hrx">HRX</option>
                                                            <option value="roadster">Roadster</option>
                                                            <option value="zara">Zara</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title">Unit</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-example-basic-single w-100">
                                                            <option disabled>Unit Menu</option>
                                                            <option>Kilogram</option>
                                                            <option>Pieces</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title">Tags</label>
                                                    <div class="col-sm-9">
                                                        <div class="bs-example">
                                                            <input type="text" class="form-control"
                                                                placeholder="Type tag & hit enter" id="#inputTag"
                                                                data-role="tagsinput">
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">Exchangeable</label>
                                                    <div class="col-sm-9">
                                                        <label class="switch">
                                                            <input type="checkbox"><span class="switch-state"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">Refundable</label>
                                                    <div class="col-sm-9">
                                                        <label class="switch">
                                                            <input type="checkbox" checked=""><span
                                                                class="switch-state"></span>
                                                        </label>
                                                    </div>
                                                </div>-->
                                            </form>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Description</h5>
                                            </div>

                                            <form class="theme-form theme-form-2 mega-form">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <label class="form-label-title col-sm-3 mb-0">Product
                                                                Description</label>
                                                            <div class="col-sm-9">
                                                                <div id="editor"><?php echo $p_short_description; ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Product Images</h5>
                                            </div>

                                            <form class="theme-form theme-form-2 mega-form">
                                                <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">Images</label>
                                                    <div class="col-sm-9">
                                                    <?php
								$statement = $pdo->prepare("SELECT * FROM tbl_product_photo_2 WHERE pro_id=?");
			                        	$statement->execute(array($_REQUEST['id']));
			                        	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			                        	foreach ($result as $row) {
											///$imspath = $row['path'];
											$p_featured_photo = $row['img_id'];
                                            if($p_featured_photo=='') {  $p_featured_photo = 0;}
											$get_feature = $pdo->prepare("SELECT * FROM tbl_product_photo WHERE  id=?");
											$get_feature->execute(array($row['img_id']));
											$get_feature_imgid = $get_feature->fetchAll(PDO::FETCH_ASSOC);  
											$currentfeature_img =  $get_feature_imgid[0]['image_name']; 
										 
										 } if($currentfeature_img==''){  ?>
                                            <img src="assets/images/product/1.png" >
                                         <?php } else { ?>
                                        <img src="../assets/shop-gallery/thumbnail/<?php echo $currentfeature_img; ?>" alt="">
                                                <?php } ?>    </div>
                                                </div>

                                                <div class="row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title">Gallery 
                                                        Image</label>
                                                    <div class="col-sm-9">
                                                            
			                        	<?php
			                        	$statement = $pdo->prepare("SELECT * FROM tbl_gallery WHERE pro_id=?");
			                        	$statement->execute(array($_REQUEST['id']));
			                        	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			                        	foreach ($result as $row) {
											
											$statement = $pdo->prepare("SELECT * FROM tbl_product_photo WHERE  id=?");
											$statement->execute(array($row['img_id']));
											$result2 = $statement->fetchAll(PDO::FETCH_ASSOC);
											foreach ($result2 as $row2) {
			                        		?>
										 	<div class="col-sm-3">
				                                   <img src="../assets/shop-gallery/thumbnail/<?php echo $row2['image_name']; ?>" alt="">
				                               </div>
										 <?php } } ?>	
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                  <!--  <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Product Videos</h5>
                                            </div>

                                            <form class="theme-form theme-form-2 mega-form">
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title">Video
                                                        Provider</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-example-basic-single w-100" name="state">
                                                            <option>Vimeo</option>
                                                            <option>Youtube</option>
                                                            <option>Dailymotion</option>
                                                            <option>Vimeo</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Video
                                                        Link</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text"
                                                            placeholder="Video Link">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>-->

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Product variations</h5>
                                            </div>

                                            <form class="theme-form theme-form-2 mega-form">
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Option
                                                        Name</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-example-basic-single w-100" name="state">
                                                            <option>Color</option>
                                                            <option>Size</option>
                                                            <option>Material</option>
                                                            <option>Style</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title">Option
                                                        Value</label>
                                                    <div class="col-sm-9">
                                                        <div class="bs-example">
                                                            <input type="text" class="form-control"
                                                                placeholder="Type tag & hit enter" id="#inputTag"
                                                                data-role="tagsinput">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
 
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Shipping</h5>
                                            </div>

                                            <form class="theme-form theme-form-2 mega-form">
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Weight
                                                        (kg)</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="number" placeholder="Weight">
                                                    </div>
                                                </div>

                                                <div class="row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title">Dimensions
                                                        (cm)</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-example-basic-single w-100" name="state">
                                                            <option>Length</option>
                                                            <option>Width</option>
                                                            <option>Height</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Product Price</h5>
                                            </div>

                                            <form class="theme-form theme-form-2 mega-form">
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 form-label-title">price</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="number" value="<?php echo $p_old_price; ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 form-label-title">Compare at
                                                        price</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="number" placeholder="0">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 form-label-title">Cost per item</label>
                                                    <div class="col-sm-5">
                                                        <input class="form-control" type="number" placeholder="0">
                                                    </div>
                                                     
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Product Inventory</h5>
                                            </div>

                                            <form class="theme-form theme-form-2 mega-form">
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">SKU</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title">Stock
                                                        Status</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-example-basic-single w-100" name="state">
                                                            <option>In Stock</option>
                                                            <option>Out Of Stock</option>
                                                            <option>On Backorder</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                            <table class="table variation-table table-responsive-sm">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Variant</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">SKU</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Red</td>
                                                        <td>
                                                            <input class="form-control" type="number" placeholder="0">
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="number" placeholder="0">
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="number" placeholder="0">
                                                        </td>
                                                        <td>
                                                            <ul class="order-option">
                                                                <li><a href="javascript:void(0)" data-toggle="modal"
                                                                        data-target="#deleteModal"><i
                                                                            class="ri-delete-bin-line"></i></a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Blue</td>
                                                        <td>
                                                            <input class="form-control" type="number" placeholder="0">
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="number" placeholder="0">
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="number" placeholder="0">
                                                        </td>
                                                        <td>
                                                            <ul class="order-option">
                                                                <li><a href="javascript:void(0)" data-toggle="modal"
                                                                        data-target="#deleteModal"><i
                                                                            class="ri-delete-bin-line"></i></a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Link Products</h5>
                                            </div>

                                            <form class="theme-form theme-form-2 mega-form">
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Upsells</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="search">
                                                    </div>
                                                </div>

                                                <div class="row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Cross-Sells</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="search">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                 <!--   <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Search engine listing</h5>
                                            </div>

                                            <div class="seo-view">
                                                <span class="link">https://fastkart.com</span>
                                                <h5>Buy fresh vegetables & Fruits online at best price</h5>
                                                <p>Online Vegetable Store - Buy fresh vegetables & Fruits online at best
                                                    prices. Order online and get free delivery.</p>
                                            </div>

                                            <form class="theme-form theme-form-2 mega-form">
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Page title</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="search"
                                                            placeholder="Fresh Fruits">
                                                    </div>
                                                </div>

                                                <div class="mb-4 row">
                                                    <label class="form-label-title col-sm-3 mb-0">Meta
                                                        description</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control" rows="3"></textarea>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="form-label-title col-sm-3 mb-0">URL handle</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="search"
                                                            placeholder="https://fastkart.com/fresh-veggies">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="card-submit-button">
                                            <button class="btn btn-animation ms-auto" type="submit">Submit</button>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- New Product Add End -->

                <?php  include('footer.php'); ?>	