<?php
$username = $_POST['username'];
$email = $_POST['email'];
$address = $_POST['address'];

echo $username;
echo $email;
echo $address;

$product_str = "";

$count = 0;
while ($count < sizeof($_POST['id'])) {
	$subtotal = intval($_POST['qty'][$count]) * floatval($_POST['price'][$count]);
	$grandtotal += $subtotal;

	$product_str .= "<p>";
	$product_str .= "id: " . $_POST['id'][$count] . "<br>";
	$product_str .= "Product name: " . $_POST['product_name'][$count] . "<br>";
	$product_str .= "Quantity: " . $_POST['qty'][$count] . "<br>";
	$product_str .= "Price: " . "$" . $_POST['price'][$count] . "<br>";
	$product_str .= "</p><br>";

	$count++;
}
$product_str .= "Total: " . "$" . (string)$grandtotal;
echo $product_str;


if (!empty($username)) {

	$to = $email;
	$subject = "Thanks for your order $username";
	$message = "<html><body>";
	$message .= "<h2>Heres your order</h2>";
	$message .= "<p>$username</p>";
	$message .= "<p>$email</p>";
	$message .= "<p>$address</p>";
	$message .= "<h3>Order Details</h3>";
	$message .= $product_str;
	/*	$message .= "<p>$qty</p>";
		$message .= "<p>$name</p>";
		$message .= "<p>$price</p>";*/
	$message .= "</body></html>";

	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
// Additional headers
	$headers .= "To: $username <$email>\r\n";
	$headers .= "From: Jeff Tartt Mobile 1 <jQuery Mobile Assignment>\r\n";
	$adminHeaders .= "Cc: 217cis@gmail.com\r\n";
	$adminHeaders .= "Bcc:jlslickt78@yahoo.com\r\n";
	$adminHeaders .= "X-Mailer: PHP/" . phpversion();
//end client email

	mail($to, $subject, $message, $headers);
}

?>