webpackJsonp([2],{

/***/ 10:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue__ = __webpack_require__(2);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_vue__);


window.axios = __webpack_require__(1);

window.axios.defaults.headers.common = {
	'X-CSRF-TOKEN': window.Laravel.csrfToken,
	'X-Requested-With': 'XMLHttpRequest'
};

__WEBPACK_IMPORTED_MODULE_0_vue___default.a.component('country-list', {
	template: '\n\t<tbody>\n\t\t<tr is="country" v-for="country in countries.data">\n\t\t\t<td>\n\t\t\t\t<input\n\t\t\t\t\ttype="text"\n\t\t\t\t\tname="name"\n\t\t\t\t\tclass="form-control country-name"\n\t\t\t\t\t:value="country.name"\n\t\t\t\t >\n\t\t\t</td>\n\t\t\t<td>{{country.show? \'Yes\' : \'No\'}}</td>\n\t\t\t<td>\n\t\t\t\t<input\n\t\t\t\t\ttype="text"\n\t\t\t\t\tname="order"\n\t\t\t\t\tclass="form-control country-order"\n\t\t\t\t\t:value="country.order"\n\t\t\t\t >\n\t\t\t </td>\n\t\t\t<td>\n\t\t\t\t<button class="btn btn-primary">{{ country.show ? "Hide" : "Show" }}</button>\n\t\t\t\t<button class="btn btn-success"\n\t\t\t\t\t@click="updateCountry"\n\t\t\t\t\t:data-id="country.id">Update</button>\n\t\t\t</td>\n\t\t</tr>\n\t</tbody>\n    ',

	props: ['countries'],

	methods: {
		updateCountry: function updateCountry(event) {

			var countryID = event.target.dataset.id;

			var parent = event.target.closest('.parent');

			var countryName = parent.getElementsByClassName('country-name')[0].value;

			var countryOrder = parent.getElementsByClassName('country-order')[0].value;

			axios.post('/country/insert', {
				id: countryID,
				name: countryName,
				order: countryOrder
			}).then(function (response) {
				console.log(response);
			}).catch(function (error) {
				console.log(error);
			});
		}
	}
});

__WEBPACK_IMPORTED_MODULE_0_vue___default.a.component('country', {
	template: '<tr class=parent><slot></slot></tr>'
});

__WEBPACK_IMPORTED_MODULE_0_vue___default.a.component('pagination-list', {

	template: '\n    \t<tfoot>\n\t\t\t<div>\n\t\t\t  <tr>\n\t\t\t  \t<td v-for="i in 10">{{ i }}</td>\n\t\t\t  </tr>\n\t\t\t</div>\n\t\t</tfoot>\n    ',

	props: ['countries']
});

var App = new __WEBPACK_IMPORTED_MODULE_0_vue___default.a({

	el: '#app-container',

	data: {
		countries: []
	},

	created: function created() {
		this.getCountries();
	},


	methods: {
		getCountries: function getCountries() {

			var self = this;

			axios.get('/admin/countries').then(function (response) {

				self.countries = response.data;

				console.log(self.countries);
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