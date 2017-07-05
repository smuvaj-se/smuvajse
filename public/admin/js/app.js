webpackJsonp([2],{

/***/ 10:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_vue__);


window.Event = new __WEBPACK_IMPORTED_MODULE_0_vue___default.a();

window.axios = __webpack_require__(1);

window.axios.defaults.headers.common = {
	'X-CSRF-TOKEN': window.Laravel.csrfToken,
	'X-Requested-With': 'XMLHttpRequest'
};

__WEBPACK_IMPORTED_MODULE_0_vue___default.a.component('visible-filters', {
	template: '\n\t\t<div>\n\t\t\t<span\n\t\t\t\tv-for="query in queryFilters"\n\t\t\t\t:class="{ \'text-muted\': !query.selected }"\n\t\t\t\t@mouseenter="changeClassMouseenter(query)"\n\t\t\t\t@mouseout="changeClassMouseout(query)"\n\t\t\t\t@click="filterVisibility(query)"\n\t\t\t>{{query.name}}</span>\n\t\t</div>\n\t',

	methods: {
		filterVisibility: function filterVisibility(selectedFilter) {

			this.queryFilters.forEach(function (filter) {
				filter.selected = filter.query == selectedFilter.query;
				filter.active = filter.query == selectedFilter.query;
			});

			Event.$emit('country-filter', selectedFilter.query);
		},
		changeClassMouseenter: function changeClassMouseenter(query) {
			if (!query.active) query.selected = true;
		},
		changeClassMouseout: function changeClassMouseout(query) {
			if (!query.active) query.selected = false;
		}
	},

	data: function data() {
		return {
			queryFilters: [{ name: "All | ", selected: true, query: "all", active: true }, { name: "Visible | ", selected: false, query: true, active: false }, { name: "Hidden", selected: false, query: false, active: false }]
		};
	}
});

__WEBPACK_IMPORTED_MODULE_0_vue___default.a.component('country-list', {
	template: '\n\t<tbody>\n\t    <tr v-for="(country, index) in countries.data" :key="country">\n\t        <td>\n\t            <input\n\t                type="text"\n\t                name="name"\n\t                class="form-control country-name"\n\t                v-model="country.name"\n\t             >\n\t        </td>\n\t        <td>\n\t            <select name="show" class="form-control country-show" v-model="country.show">\n\t                <option value="false">No</option>\n\t                <option value="true">Yes</option>\n\t            </select>\n\t        </td>\n\t        <td>\n\t            <input\n\t                type="text"\n\t                name="order"\n\t                class="form-control country-order"\n\t                v-model="country.order"\n\t             >\n\t         </td>\n\t        <td>\n\t            <button class="btn btn-success"\n\t                @click="updateCountry(country)"\n\t                :data-id="country.id">Update</button>\n\t        </td>\n\t    </tr>\n\t</tbody>\n    ',

	props: ['countries'],

	methods: {
		updateCountry: function updateCountry(country) {

			axios.post('/country/insert', {
				id: country.id,
				name: country.name,
				order: country.order,
				show: country.show
			}).then(function (response) {
				Event.$emit('country-updated', true);
			}).catch(function (error) {
				Event.$emit('country-updated', false, error.response.data);
			});
		}
	}
});

__WEBPACK_IMPORTED_MODULE_0_vue___default.a.component('pagination-list', {

	template: '\n    \t<tfoot v-if="countries.total > 20">\n\t\t\t<tr align="center">\n\t\t\t\t<nav aria-label="Page navigation">\n\t\t\t\t\t<ul class="pagination">\n\t\t\t\t\t\t<li :class="countries.current_page == 1 ? \'disabled\' : \'\'">\n\t\t\t\t\t\t\t<a\n\t\t\t\t\t\t\t\t:class="countries.current_page == 1 ? \'disabled\' : \'\'"\n\t\t\t\t\t\t\t\t:href="countries.current_page == 1 ? \'#\' : countries.prev_page_url"\n\t\t\t\t\t\t\t\t@click.prevent="\n\t\t\t\t\t\t\t\tcountries.current_page != 1 ? pagination(countries.current_page - 1) : null"\n\t\t\t\t\t\t\t\taria-label="Previous">\n\t\t\t\t\t\t\t\t<span aria-hidden="true">&laquo;</span>\n\t\t\t\t\t\t\t</a>\n\t\t\t\t\t\t</li>\n\n\t\t\t\t\t\t<li v-for="i in countries.last_page"\n\t\t\t\t\t\t:class="countries.current_page == i ? \'active\' : \'\'"\n\t\t\t\t\t\t>\n\t\t\t\t\t\t\t<a\n\t\t\t\t\t\t\t\t:href="countries.current_page == i ? \'#\' : \'/country/search?page=\'+i"\n\t\t\t\t\t\t\t\t@click.prevent="pagination(i)"\n\t\t\t\t\t\t\t>{{i}}</a>\n\t\t\t\t\t\t</li>\n\n\t\t\t\t\t\t<li :class="countries.current_page == countries.last_page ? \'disabled\' : \'\'">\n\t\t\t\t\t\t\t<a\n\t\t\t\t\t\t\t\t:href="countries.current_page < countries.last_page ? countries.next_page_url : \'#\'"\n\t\t\t\t\t\t\t\t@click.prevent="\n\t\t\t\t\t\t\t\tcountries.current_page < countries.last_page ? pagination(countries.current_page + 1) : null"\n\t\t\t\t\t\t\t\taria-label="Next">\n\t\t\t\t\t\t\t\t<span aria-hidden="true">&raquo;</span>\n\t\t\t\t\t\t\t</a>\n\t\t\t\t\t\t</li>\n\t\t\t\t\t</ul>\n\t\t\t\t</nav>\n    \t\t</tr>\n\t\t</tfoot>\n    ',

	props: ['countries'],

	methods: {
		pagination: function pagination(page) {
			this.$parent.getCountries({ page: page });
		}
	}
});

var App = new __WEBPACK_IMPORTED_MODULE_0_vue___default.a({

	el: '#app-container',

	data: {
		countries: [],
		orderBy: 'desc',
		showMessage: false,
		messageData: {}
	},

	created: function created() {
		var _this = this;

		this.getCountries(), Event.$on('country-updated', function (success, response) {

			if (success) {
				_this.messageData.class = 'alert-success';
				_this.messageData.text = '';
				_this.messageData.title = 'Country successfully updated';
			} else {
				_this.messageData.class = 'alert-danger';
				_this.messageData.title = 'There was an error while updating country';
				_this.messageData.text = '';

				for (var key in response) {

					_this.messageData.text += '\n\t\t\t\t\t\t<p>\n\t\t\t\t\t\t\t<strong>' + key.toUpperCase() + ' - </strong>\n\t\t\t\t\t\t\t' + response[key][0] + '\n\t\t\t\t\t\t</p>\n\t\t\t\t\t';
				}
			}

			_this.showMessage = true;
		});

		Event.$on('country-filter', function (param) {
			_this.getCountries({ show: param });
		});
	},


	methods: {
		getCountries: function getCountries(params) {

			var getParams = {};

			var self = this;

			if (params && params.orderBy) {
				this.orderBy = this.orderBy == 'asc' ? 'desc' : 'asc';
			}

			axios.get('/country/search', { params: params }).then(function (response) {
				self.countries = response.data;
			}).catch(function (error) {
				console.log(error);
			});
		},
		filterCountries: function filterCountries(event) {

			var name = event.target.value;

			var self = this;

			if (name.length > 2) {

				axios.get('/country/search', {
					params: {
						name: name
					}
				}).then(function (response) {
					self.countries = response.data;

					console.log(self.countries);
				}).catch(function (error) {
					console.log(error);
				});
			}

			if (event.keyCode === 8 && name.length === 2 || !name.length) {
				this.getCountries();
			}
		}
	}

});

/***/ }),

/***/ 39:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(10);


/***/ })

},[39]);