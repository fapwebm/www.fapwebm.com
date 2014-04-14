app = angular.module 'app.services', []

# Fetch a page by uri
app.service '$pages', ['$http', '$q', ($http, $q) ->
	fetch: (uri) ->
		deferred = $q.defer()

		$http 
			method: 'GET'
			url: uri
			cache: true
			dataType: 'json'
			headers:
				'X-Requested-With': 'XMLHttpRequest'

		.success (response, status, headers, config) ->
			results = []
			results.data = response
			results.headers = headers()

			ga 'send', 'pageview', page: uri

			# Resolve
			deferred.resolve results

		.error (data, status) -> deferred.reject data, status

		deferred.promise
]