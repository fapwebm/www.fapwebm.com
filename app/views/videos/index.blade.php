@extends('layouts.master')

@section('content')

<div class="text-center">
	<span ng-hide="posts.length >= 1 || posts.error">
		<i class="fa fa-refresh fa-spin"></i> Searcing &hellip;
	</span>
	
	<span ng-show="posts.error" ng-cloak>No webms were found <i class="fa fa-frown-o"></i></span>
</div>

<ul class="small-block-grid-1 medium-block-grid-3" infinite-scroll="nextPage()" ng-show="posts.length >= 1" ng-cloak>
	<li ng-repeat="post in posts">
		<div ng-video></div>
	</li>
</ul>

<div id="video-loader" ng-fullscreen ng-show="post" ng-cloak></div>

@stop