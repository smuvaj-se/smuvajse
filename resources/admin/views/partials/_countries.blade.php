<table class="table table-striped table-hover">

	<thead>

		<tr>
			<td>
				<input
					type="text"
					id="country-filter"
					@keyup="filterCountries">
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

	<tfoot>
		<tr>
			<td>{{ $countries->links() }}</td>
		</tr>
	</tfoot>

</table>
