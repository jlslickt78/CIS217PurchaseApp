<div data-role="panel" id="CrustPanel" data-position="right" data-display="reveal" data-theme="a">
	<div id="addCrust">
		<h3>Choose your crust.</h3>
		<h4>All crust choices are $3.99</h4>

		<p>Tap the menu item to add.</p>
		<div class="itemAdded"></div>
		<!-- panel content goes here -->
		<ul class="ui-listview ui-list-view-inset ui-corner-all ui-shadow ui-alt-icon" data-inset="true" data-icon="plus"
		    data-role="listview" data-position="window">

			<li data-product="5" data-name="garlic crust" data-price="3.99"><a href="#" class="addToCart">Garlic</a></li>
			<li data-product="6" data-name="parmesan crust" data-price="3.99"><a href="#" class="addToCart">Parmesan</a></li>
			<li data-product="7" data-name="stuffed crust" data-price="3.99"><a href="#" class="addToCart">Stuffed</a></li>
			<li data-product="8" data-name="thin crust" data-price="3.99"><a href="#" class="addToCart">Thin</a></li>

		</ul>
		<br>
		<div class="ui-body ui-body-a ui-corner-all">
			<h3>Review your order.</h3>

			<a href="#CurrOrderPanel" class="ui-btn ui-btn-icon-right ui-icon-arrow-r ui-alt-icon">Current Order</a>
			<a href="#" class="ui-btn ui-btn-icon-right ui-alt-icon ui-icon-delete" data-rel="close">Close</a>
		</div>
	</div>
</div>