<div data-role="panel" data-position="right" data-display="reveal" data-position-fixed="true" data-theme="a" id="ToppingsPanel">
	<div id="addToppings">
		<h3>Add Toppings</h3>
		<h4>All toppings are $1.25 each</h4>

		<p class="p">Tap the menu item to add.</p>
		<span class="itemAdded"></span>

		<!-- panel content goes here -->
		<ul id="toppings" class="ui-listview ui-list-view-inset ui-corner-all ui-shadow ui-alt-icon" data-inset="true"
		    data-role="listview" data-position="window" data-icon="plus">

			<li data-product="1" data-name="Red Peppers" data-price="1.25"><a href="#" class="addToCart">Red Peppers</a></li>
			<li data-product="2" data-name="Mushrooms" data-price="1.25"><a href="#" class="addToCart">Mushrooms</a></li>
			<li data-product="3" data-name="Pepperoni" data-price="1.25"><a href="#" class="addToCart">Pepperoni</a></li>
			<li data-product="4" data-name="Olives" data-price="1.25"><a href="#" class="addToCart">Olives</a></li>

		</ul>
		<br>
		<div class="ui-body ui-body-a ui-corner-all">
		<h3>Review your order.</h3>

			<a href="#CurrOrderPanel" class="ui-btn ui-btn-icon-right ui-icon-arrow-r ui-alt-icon">Current Order</a>
			<a href="#" class="ui-btn ui-btn-icon-right ui-alt-icon ui-icon-delete" data-rel="close">Close</a>
		</div>

	</div>

</div><!-- /panel -->