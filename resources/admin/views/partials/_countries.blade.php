<table class="table table-striped table-hover">

	<thead>

		<tr>
			<td>
				<input
					class="form-control"
					type="text"
					id="country-filter"
					@keyup="filterCountries"
					placeholder="Filter countries by name">
			</td>
		</tr>

		<tr>

			<td>Country Name</td>
			<td>Visible</td>
			<td>Order</td>
			<td>Actions</td>

		</tr>

	</thead>

	<tbody is="country-list" :countries="countries"></tbody>

	<tfoot is="pagination-list"></tfoot>

</table>
