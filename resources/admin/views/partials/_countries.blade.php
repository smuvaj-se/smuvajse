<div v-if="showMessage" :class="'alert alert-dismissible '  + messageData.class">
	<button
		type="button"
		class="close"
		data-dismiss="alert"
		aria-hidden="true"
		@click="showMessage = false"
		>×</button>
	<h4><i class="icon fa fa-check"></i>@{{messageData.title}}</h4>
	<span v-html="messageData.text"></span>
</div>

<div class="clearfix">
	<div class="col-md-6">

		<table class="table table-striped table-hover">

			<thead>

				<tr>
					<td class="col-md-6">
						<input
							class="form-control"
							type="text"
							id="country-filter"
							@keyup="filterCountries"
							placeholder="Filter countries by name">
					</td>
				</tr>

				<tr>

					<td class="col-md-6">Country Name
						<div class="arrow-group">
							<ordering-filters
								order-by="name"
								order="asc"
								fa-class=" fa-sort-asc"
								></ordering-filters>
							<ordering-filters
								order-by="name"
								order="desc"
								fa-class=" fa-sort-desc"
								></ordering-filters>
						</div>
					</td>

					<td class="countries-visible-filter col-md-3">
						<visible-filters></visible-filters>
					</td>
					<td>Order
						<div class="arrow-group">
							<ordering-filters
								order-by="order"
								order="asc"
								fa-class=" fa-sort-asc"
								></ordering-filters>
							<ordering-filters
								order-by="order"
								order="desc"
								fa-class=" fa-sort-desc"
								></ordering-filters>
						</div>
					</td>
					<td>Actions</td>

				</tr>

			</thead>

			<tbody is="country-list" :countries="countries"></tbody>

			<tfoot is="pagination-list" :countries="countries"></tfoot>

		</table>

	</div>
</div>
