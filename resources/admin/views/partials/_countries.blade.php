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

<table class="table table-striped table-hover">

	<thead>

		<tr>
			<td class="col-md-4">
				<input
					class="form-control"
					type="text"
					id="country-filter"
					@keyup="filterCountries"
					placeholder="Filter countries by name">
			</td>
		</tr>

		<tr>

			<td class="col-md-4">Country Name
				<i class="fa fa-sort-asc fa-2x" aria-hidden="true"
					@click="getCountries({orderBy: orderBy})">
				</i>
			</td>
			<td class="countries-visible-filter col-md-2">
				<visible-filters></visible-filters>
			</td>
			<td>Order</td>
			<td>Actions</td>

		</tr>

	</thead>

	<tbody is="country-list" :countries="countries"></tbody>

	<tfoot is="pagination-list" :countries="countries"></tfoot>

</table>
