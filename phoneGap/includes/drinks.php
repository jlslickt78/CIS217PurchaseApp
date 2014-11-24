<div data-role="panel" id="DrinksPanel" data-position="right" data-display="reveal" data-theme="a">
	<div id="addDrinks">
		<h3>Add A Drink</h3>
		<h4>All drinks are $2.00 each</h4>

		<p>Tap the menu item to add.</p>
		<div class="itemAdded"></div>
		<!-- panel content goes here -->
		<ul class="ui-listview ui-list-view-inset ui-corner-all ui-shadow ui-alt-icon" data-inset="true"
		    data-role="listview" data-position="window" data-icon="plus">

			<li data-product="9" data-name="Coke" data-price="2"><a href="#" class="addToCart">Coke</a></li>
			<li data-product="10" data-name="Sprite" data-price="2"><a href="#" class="addToCart">Sprite</a></li>
			<li data-product="11" data-name="Pepsi" data-price="2"><a href="#" class="addToCart">Pepsi</a></li>
			<li data-product="12" data-name="Root Beer" data-price="2"><a href="#" class="addToCart">Root Beer</a></li>

		</ul>

		<br>
		<div class="ui-body ui-body-a ui-corner-all">
			<h3>Review your order.</h3>

			<a href="#CurrOrderPanel" class="ui-btn ui-btn-icon-right ui-icon-arrow-r ui-alt-icon">Current Order</a>
			<a href="#" class="ui-btn ui-btn-icon-right ui-alt-icon ui-icon-delete" data-rel="close">Close</a>
		</div>
	</div>

</div><!-- /panel -->