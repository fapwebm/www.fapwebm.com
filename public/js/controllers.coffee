app = angular.module 'app.controllers', ['infinite-scroll']

winObj = angular.element(window)

$body = angular.element('html, body')
$container = angular.element('#container')

$search = angular.element('#header form')
$searchInput = $search.find 'input'

app.controller 'MainCtrl', ['$scope', '$pages', ($scope, $pages) ->
	$scope.posts = []
	$scope.board = if location.pathname isnt '/' then location.pathname.replace /\//g, '' else 'gif'

	handleXhrResponse = (response, cb) ->
		_data = response.data

		unless _data.error?
			$scope.posts.push data for data, i in _data
			cb() if cb?

		else $scope.posts = _data

	### Infinite scroll ###
	page = 1
	preventXhr = false

	require ['infinitescroll'], ->
		$scope.nextPage = ->
			return if preventXhr
			preventXhr = true

			$pages.fetch("/#{$scope.board}/#{page}").then (response) ->
				handleXhrResponse response, ->
					preventXhr = response.data.length is 0
					page++ unless preventXhr

		$scope.nextPage()

	### Search form ###
	$search.on 'submit', ->
		$scope.posts = []
		term = $searchInput.val()
		preventXhr = term isnt ''

		if term isnt ''
			$pages.fetch("/#{$scope.board}/search/#{term}").then (response) ->
				handleXhrResponse response, -> winObj.scrollTop 0

		else
			page = 1 
			$scope.nextPage()
]