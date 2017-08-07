<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Add Product</title> 
      <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
    <?php
        
        require_once('Product.php');
        require_once('Tool.php');
        require_once('Electronic.php');
            
        //Form variables
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $type = $_POST['type'];
        $shipper = $_POST['shipper'];
        $weight = $_POST['weight'];
        $isRecyclable = $_POST['isRecyclable'];
        
    ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        
        <h3>Choose your products type: </h3>
        <label for="type">Type </label>
          <select name="type">
            <option value="">Choose a type</option>
            <option value="product">Generic Product</option>
            <option value="tool">Tool</option>
            <option value="electronic">Electronic</option>
          </select>
          <input type="submit" name="submit_type" />
        
        </form> 
        <br />
    <?php
        
        displayProducts();
            
        if (isset($_POST['submit'])) {
            
            
            if (!empty($name) && !empty($description) && !empty($price)) {
            
                $newProduct = createNewProduct($type, $name, $description, $price, $shipper, $weight, $isRecyclable);
                $newProduct->addProduct();
                
                echo "Product $name for $$price added.";
            
            } else {
              
                echo "Please enter all product info to add a product. <br />";
              
            }
            
        }
        
        if (isset($_POST['submit_type'])) {
            
        ?> 
            
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <h3>Enter the following product information to add it to the products list.</h3>
            
            <label for="name">Product Name </label>
            <input type="text" name="name" value="<?php if(!empty($name)) echo $name; ?>" />
            <br />
            
            <label for="description">Description </label>
            <input type="textbox" name="description" value="<?php if(!empty($description)) echo $description; ?>" />
            <br />
            
            <label for="price">Price </label>
            <input type="number" name="price" min="0" step=".01" value="<?php if(!empty($price)) echo $price; ?>"/>
            <br />
            
        <?php
            
            if (!empty($type)) {
                
                if ($type == 'tool') {
                    
                    ?>    
                        <input type="hidden" name="type" value="tool"/>
                        <label for="shipper">Shipper </label>
                        <select name="shipper">
                            <option value="">Choose a shipper</option>
                            <option value="UPS">UPS</option>
                            <option value="FedEx">FedEx</option>
                            <option value="USPS">USPS</option>
                        </select>
                        <br />
                        <label for="weight">Weight </label>
                        <input type="number" name="weight" min="0" step=".01" value="<?php if(!empty($weight)) echo $weight; ?>"/>
                        <br />
                    <?php
                    
                    
                } else if ($type == 'electronic') {
                    
                    ?>
                        <input type="hidden" name="type" value="electronic"/>
                        <label for="isRecyclable">Recyclable </label>
                        <select name="isRecyclable">
                            <option value="true">Yes</option>
                            <option value="false">No</option>
                        </select>
                        
                    <?php
                    
                }
                
            }
            
        ?>
              <br />
              <br />
              
              <input type="submit" name="submit" value="Add Product" />
              <br />
            </form>
            
        <?php
        }
        
        
        function createNewProduct($type, $name, $description, $price, $shipper, $weight, $isRecyclable) {
          
          
            if ($type == 'tool') {
              
                $product = new Tool();
                
                //Set tool's variables
                $product->setName($name);
                $product->setDescription($description);
                $product->setPrice($price);
                $product->setShipper($shipper);
                $product->setWeight($weight);
            
                return $product;
              
            } else if ($type == 'electronic') {
              
                $product = new Electronic();
                
                //Set electronic's variables
                $product->setName($name);
                $product->setDescription($description);
                $product->setPrice($price);
                
                if ($isRecyclable == "true") {
                    
                    $product->setIsRecyclable(true);
                    
                } else {
                    
                    $product->setIsRecyclable(false);
                    
                }
                
                return $product;
              
            } else {
                
                $product = new Product();
                
                //Set product's variables
                $product->setName($name);
                $product->setDescription($description);
                $product->setPrice($price);
                
                return $product;
                
            }
            
            return $product;
          
        }
        
        //Display the products table
        function displayProducts() {
            
            $faux_product = new Product();
            
            $query = "SELECT * FROM products";
            $results = $faux_product->runProductsQuery($query);
            
            echo '<table><tr><td>ID</td><td>Name</td><td>Description</td>' 
                    . '<td>Price</td><td>Shipper</td><td>Weight</td><td>Recyclable</td></tr>';
            
            while ($row = mysqli_fetch_array($results)) {
            
                echo '<tr><td>' . $row['id'] . '</td><td>' . $row['title'] . '</td><td>' 
                        . $row['description'] . '</td><td>' . $row['price'] . '</td><td>' . $row['shipper']
                        . '</td><td>' . $row['weight'] . '</td><td>' . $row['isRecyclable'] . '</td></tr>';
                
            }
           
            
        }
        
    ?>
  
  </body>
</html>


