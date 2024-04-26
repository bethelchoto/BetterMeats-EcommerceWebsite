<?php

// require(__DIR__ . "\\..\\settings\\db_class.php");
// require(__DIR__ . "\\..\\settings\\core.php")

require_once(__DIR__ . "/../settings/db_class.php");
require_once(__DIR__ . "/../settings/core.php");


/**
*General class to handle all functions 
*/
class general_class extends db_connection
{
	//--Customer Registration--//
	public function register($name, $email,$country, $city, $contact, $pass, $image, $role)
		{
			$ndb = new db_connection();	
			$sql = "INSERT INTO `customer` (`customer_name`, `customer_email`, `customer_pass`,`customer_country`, `customer_city`, `customer_contact`, `customer_image`, `user_role` ) VALUES ('$name', '$email', '$pass', '$country', '$city', '$contact', '$image', '$role')";
			return $this->db_query($sql);
		}

		public function fetchUser($username, $password) {
			// Prepare SQL statement
			$sql = "SELECT * FROM `customer` WHERE `customer_email` = '$username'";
			// Fetch user record
			$user = $this->db_fetch_one($sql);
			return $user;
		}

		function checkDuplicateInfor($email, $contact){
			$ndb = new db_connection();	
			$sql = "SELECT * FROM `customer` WHERE customer_email = '$email' or customer_contact = '$contact' ";
			$result_query = $this->db_query($sql);
			$num_rows = $this ->db_count($result_query);
			return $num_rows;
		}

		/*Insert Brands/Vendor */
		public function addBrand($brand_name, $v_id){
			$ndb = new db_connection();	
			$sql = "INSERT INTO `brands` (`brand_name`, `v_id`) VALUES ('$brand_name', '$v_id')";
			return $this->db_query($sql);
		}
		
		/*Insert Categories*/
		public function addCat($cat_name)
		{
			$ndb = new db_connection();	
			$sql = "INSERT INTO `categories` (`cat_name`) VALUES ('$cat_name')";
			return $this->db_query($sql);
		}

		public function getCategoryName($cat_id){
			// Prepare SQL statement
			$sql = "SELECT * FROM `categories` WHERE `cat_id` = '$cat_id'";
			// Fetch user record
			
			$category = $this->db_fetch_one($sql);

			return $category;

		}

		/*Insert Product*/
		public function addProduct($cat_id, $brand_id, $product_title, $product_price, $product_desc, $newImageName, $product_keywords, $qnty, $recipes)
		{
			$ndb = new db_connection();	
			$sql = "INSERT INTO `products` (`product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`, `qnty`, `recipes`) VALUES ('$cat_id', '$brand_id','$product_title', '$product_price', '$product_desc', '$newImageName', '$product_keywords', '$qnty', '$recipes')";
			return $this->db_query($sql);
		}

		function fetchCart($ip, $product_id, $c_id){
			$ndb = new db_connection();	
			$sql = "SELECT * FROM `cart` WHERE ip_add = '$ip' and p_id = $product_id and c_id = '$c_id'";
			$result_query = $this->db_query($sql);
			$num_rows = $this ->db_count($result_query);
			return $num_rows;
		}

		function addCart($product_id, $ip, $c_id, $qty){
			$ndb = new db_connection();
			$sql = "INSERT INTO `cart` (`p_id`, `ip_add`, `c_id`, `qty`) VALUES ('$product_id', '$ip', '$c_id' , '$qty')";
			return $this->db_query($sql);
		}

		function addOrdersPayment($user_id, $data){
			// Select cart items based on the user_id
			$cart_sql = "SELECT * FROM `cart` WHERE `c_id` = '$user_id'";
			$cart_items = $this->db_fetch_all($cart_sql); 

			// Check if cart_items exist
			if (!empty($cart_items)) {
				$invoice_no = mt_rand();
				$order_date = date("Y-m-d H:i:s");
				$order_status = 'pending';
				$currency = $data['data']['currency'];
				$custom_fields = $data['data']['metadata']['custom_fields'];
				$amnt = null;
				foreach ($custom_fields as $field) {
					if ($field['variable_name'] === 'amount') {
						$amnt = $field['value'];
						break;
					}
				}

				$order_sql = "INSERT INTO `orders` (`customer_id`, `invoice_no`, `order_date`, `order_status`) 
							  VALUES ('$user_id', '$invoice_no', '$order_date', '$order_status')";
				$this->db_query($order_sql); 

				$orders_sql = "SELECT * FROM `orders` WHERE `customer_id` = '$user_id' ORDER BY `order_id` DESC LIMIT 1";
				$orders = $this->db_fetch_one($orders_sql);
				$order_id = $orders['order_id'];
	
				$payment_sql = "INSERT INTO `payment` (`amt`, `customer_id`, `order_id`, `currency`, `payment_date`) 
				VALUES ('$amnt', '$user_id', '$order_id', '$currency' , '$order_date')";
				$this->db_query($payment_sql); 
				
				foreach ($cart_items as $cart_item) {
					$product_id = $cart_item['p_id'];
					$quantity = $cart_item['qty'];
					$sql = "SELECT * FROM `orders` WHERE `customer_id` = '$user_id' ORDER BY `order_id` DESC LIMIT 1";
					$orders = $this->db_fetch_one($sql);
					$order_id = $orders['order_id'];
					// Save order details to order_details table
					$order_details_sql = "INSERT INTO `orderdetails` (`order_id`, `product_id`, `qty`) 
										  VALUES ('$order_id', '$product_id', '$quantity')";
					$this->db_query($order_details_sql); 
				}
				// Return true or any other indication of success if needed
				return true;
			} else {
				// Return false or handle the case where there are no items in the cart
				return false;
			}
		}

		public function deleteCart($user_id){
			$sql = "DELETE FROM `cart` WHERE c_id = " . $user_id;
			return $this->db_query($sql);
		}

		public function userReceipt($user_id){
			// Prepare SQL statement
			$orders_sql = "SELECT * FROM `payment` WHERE `customer_id` = '$user_id' ORDER BY `order_id` DESC LIMIT 1";

			

			$orders = $this->db_fetch_one($orders_sql);


			return $orders;
		}
		function  productsReceipts($order_id){
			$sql = "SELECT * FROM `orderdetails` 
			JOIN `products` ON orderdetails.product_id = products.product_id
			JOIN `categories` ON products.product_cat = categories.cat_id
			-- JOIN `orders` ON orderdetails.order_id = orders.order_id
			-- JOIN `customer` ON orders.customer_id = customer.customer_id


			WHERE `order_id` = '$order_id'";
			// Fetch user record
			$order_products = $this->db_fetch_all($sql);
			return $order_products;
		}
		
		public function fetchId($product_cat) {
			// Prepare SQL statement
			$sql = "SELECT * FROM `categories` WHERE `cat_name` = '$product_cat'";
			// Fetch user record
			$category = $this->db_fetch_one($sql);
			return $category;
		}

		public function fetchBrandID($product_brand){
			$sql = "SELECT * FROM `brands` WHERE `brand_name` = '$product_brand'";
			// Fetch brand record
			$brand = $this->db_fetch_one($sql);
			return $brand;
		}

		public function fetchBrand($brand_id){
			$sql = "SELECT * FROM `brands` WHERE `brand_id` = '$brand_id'";
			// Fetch brand record
			$brand = $this->db_fetch_one($sql);
			return $brand;
		}

		public function fetchProduct($product_id){
			$sql = "SELECT * FROM `products` WHERE `product_id` = '$product_id'";
			// Fetch brand record
			$product = $this->db_fetch_one($sql);
			return $product;
		}

		public function getAllBrands(){
			$sql = "SELECT * FROM brands";
			$allbrands = $this->db_fetch_all($sql);
			return $allbrands;
		}

		function getSearched($product_keywords){
			$sql = "SELECT * FROM products WHERE product_keywords LIKE '%$product_keywords%'";
			$found = $this->db_fetch_all($sql);
			return $found;
		}

		function showByCat($cat_id){
			$sql = "SELECT *, categories.cat_name FROM `categories` 
			JOIN `products` ON categories.cat_id = products.product_cat 
			WHERE cat_id = '$cat_id'";
			$showCat = $this->db_fetch_all($sql);
			return $showCat;

		}

		public function getAllCategories(){
			$sql = "SELECT * FROM categories";
			$allcategories = $this->db_fetch_all($sql);
			return $allcategories;
		}
		
		// fetch all function 
		public function getAllProducts(){
			$sql = "SELECT * FROM `products` order by rand() LIMIT 0,20";
			$allproducts = $this->db_fetch_all($sql);
			return $allproducts;
		}
		

		// fetch all function 
		public function getAdminProducts(){

			$admin_id = $_SESSION['id'];
			$sql = "SELECT *, brands.brand_name  FROM `brands`
			JOIN `products` ON brands.brand_id = products.product_brand 
			JOIN `categories` ON products.product_cat = categories.cat_id
			WHERE v_id = '$admin_id'";
			$allproducts = $this->db_fetch_all($sql);
			return $allproducts;
		}

		public function getAdminOrders(){
			$sql = "SELECT *, orders.order_id FROM `orders`
			JOIN `payment` ON orders.order_id = payment.order_id 
			JOIN `customer` ON customer.customer_id = payment.customer_id 
			WHERE order_status = 'pending'";

			$allproducts = $this->db_fetch_all($sql);
			return $allproducts;
		}

		public function getAllCustomers(){
			$sql = "SELECT * FROM customer";
			$allcustomers = $this->db_fetch_all($sql);
			return $allcustomers;
		}

		function getCartProduct(){

			$current_ip = getIPAddress();

			if(isset($_SESSION['id'])){

				$c_id = $_SESSION['id'];
				$id = '0';

				$sql = "SELECT *, cart.qty FROM `cart` 
				JOIN `products` ON cart.p_id = products.product_id 
				JOIN `categories` ON products.product_cat = categories.cat_id
				WHERE ip_add = '$current_ip' AND c_id = '$c_id' or c_id = 0";

				$cartproductdetails = $this->db_fetch_all($sql);

				return $cartproductdetails;

			}else{

				$c_id = '0';

				$sql = "SELECT *, cart.qty FROM `cart` 
				JOIN `products` ON cart.p_id = products.product_id 
				JOIN `categories` ON products.product_cat = categories.cat_id
				WHERE cart.ip_add = '$current_ip' AND cart.c_id = 0";
				// and cart.c_id = '$c_id'

				$cartproductdetails = $this->db_fetch_all($sql);

				return $cartproductdetails;
			}

		}
		
		public function getProductsPayments(){
			$current_ip = getIPAddress();
			

			if(isset($_SESSION['id'])){
				$c_id = $_SESSION['id'];


				$sql = "SELECT *, cart.qty FROM `cart` 
				JOIN `products` ON cart.p_id = products.product_id 
				JOIN `categories` ON products.product_cat = categories.cat_id
				WHERE ip_add = '$current_ip' AND c_id = '$c_id' or c_id = 0";

				$cartproductdetails = $this->db_fetch_all($sql);

				return $cartproductdetails;
			}

		}

		public function showCartDetailsIP(){

			$c_id = $_SESSION['id'];
			$current_ip = getIPAddress();
			$temp_cid = 0;

			if(!isLogged()){
				$sql = "SELECT * FROM `cart` WHERE ip_add = '$current_ip' and c_id = '$temp_cid'";
			}
			else {
				$sql = "SELECT * FROM `cart` WHERE ip_add = '$current_ip' and c_id = '$c_id'";
			}

			$cartdetails = $this->db_fetch_all($sql);
			return $cartdetails;
			
		}

		function numProductInCart(){

			$current_ip = getIPAddress();

			if(isset($_SESSION['id'])){
				$c_id = $_SESSION['id'];

				$sql = "SELECT * FROM `cart` WHERE ip_add = '$current_ip' AND c_id = '$c_id' or c_id = 0";
				$result_query = $this->db_query($sql);
				$num_rows = $this ->db_count($result_query);
				return $num_rows;

				// AND c_id = '$c_id
			}else {
				// $c_id = '0';
				$sql = "SELECT * FROM `cart` WHERE ip_add = '$current_ip' AND c_id = 0";
				// $sql = "SELECT * FROM `cart` WHERE ip_add = '$current_ip' AND $c_id = 0";
				$result_query = $this->db_query($sql);
				$num_rows = $this ->db_count($result_query);
				return $num_rows;
				// AND c_id='$c_id'
			}	
		}



		public function deleteBrand($brand_id){
			$sql = "DELETE FROM brands WHERE brand_id = " . $brand_id;
			return $this->db_query($sql);
			
		}

		public function deleteItemsCart($pid_old, $ip_old){
			$sql = "DELETE FROM `cart` WHERE p_id = $pid_old";
			return $this->db_query($sql);
			
		}

		public function deleteProduct($product_id){

			$sql = "DELETE FROM orderdetails WHERE product_id = " . $product_id;
			$this->db_query($sql);
			

			$sql = "DELETE FROM products WHERE product_id = " . $product_id;
			return $this->db_query($sql);
		}

		public function updateBrand($brand_id, $brand_name){
			$sql = "UPDATE brands SET brand_name='$brand_name' WHERE brand_id='$brand_id'";
			return $this->db_query($sql);
		}

		public function updateQtyCart($pid, $new_qty){
			// echo $pid;
			echo $new_qty;

			$sql = "UPDATE `cart` SET qty='$new_qty' WHERE p_id='$pid'";
			return $this->db_query($sql);
		}

		function updateProduct($product_id, $product_title, $product_price, $product_desc, $product_keywords) {
			$sql = "UPDATE products SET 
					product_title = '$product_title', 
					product_price = $product_price, 
					product_desc = '$product_desc', 
					product_keywords = '$product_keywords' 
					WHERE product_id = '$product_id'";
			return $this->db_query($sql);
		}		
}

?>