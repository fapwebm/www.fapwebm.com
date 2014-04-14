# Require JS config.
requirejs.config
	baseUrl: '/js/'
	# urlArgs: "bust=#{(new Date()).getTime()}"
	
	paths:
		# CDN powered
		angular: ['//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min']
		jquery: ['//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min']
		infinitescroll: ['library/nginfinitescroll']

		# Local
		controllers: ['controllers']
		services: ['services']
		directives: ['directives']
		filters: ['filters']

	shim: 
		angular: exports: 'angular'
		controllers: ['angular']
		services: ['angular']
		directives: ['angular']
		filters: ['angular']
		sanitize: ['angular']
		infinitescroll: ['angular']

	priority: ['angular', 'jquery']

require [
	'jquery', 
	'angular',
	'controllers', 
	'directives',
	'services',
	'filters',
	'infinitescroll',
], ($, angular) ->
	angular.element(document).ready ->
		angular.module 'app', [
			'app.controllers',
			'app.directives',
			'app.services',
			'app.filters',
			'infinite-scroll',
		]

		angular.bootstrap document, ['app']