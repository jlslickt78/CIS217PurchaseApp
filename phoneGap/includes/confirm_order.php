
<div data-role="page" id="confirmOrder">
	<?php require "nav.php"; ?>
	<div data-role="main" class="ui-content" data-theme="a">
		<h3>Review your Order.</h3>

		<div class="cartDisplay"></div>
		<form id="orderForm">
			<label for="username">Name:</label>
			<input type="text" name="username" id="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" required />

			<label for="email">Email:</label>
			<input type="text" name="email" id="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required />

			<label for="address">Address:</label>
			<input type="text" name="address" id="address" value="<?php if (isset($_POST['address'])) echo $_POST['address']; ?>" required />

			<a href="#homePage" class="ui-btn ui-btn-corner-all">Cancel</a>
			<span class="itemSaved"></span>
			<button id="saveOrder" type="button" class="ui-btn ui-btn-corner-all">Save</button>

			<div class="order-purchased">
				<h3>Thank you for your order.</h3>
				<p>An email has been sent containing you order information.</p>
				<p>You'll will now be redirected to the home page.</p>
			</div>

			<button id="confirmOrderBtn" type="submit" class="ui-btn ui-btn-corner-all">Confirm Order</button>

		</form>
	</div>

	<!--Footer	-->
	<?php require "footer.php"; ?>
	<!--End footer-->
</div>

