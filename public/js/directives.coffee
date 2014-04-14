app = angular.module 'app.directives', []

winObj = angular.element(window)
$body = angular.element('body')

# Video play on hover
app.directive 'ngVideo', ['$sce', '$compile', ($sce, $compile) ->
	restrict: 'A'
	scope: true
	templateUrl: '/partials/video.html'
	link: (scope, el) ->
		video = el.find('video:first')[0]

		$(el).one 'click', -> 
			video.src = video.dataset.src
			el.addClass 'loaded'

			el.on 'mousemove', -> video.play() if video.paused
			el.on 'mouseleave', -> video.pause()

			el.trigger 'mousemove'
			
			scope.goFullWidth = (e) ->
				video.pause()
				scope.$emit 'goingFullscreen', scope.post
]

# Video lightbox
app.directive 'ngFullscreen', ['$sce', ($sce) ->
	restrict: 'A'
	scope: true
	templateUrl: '/partials/video-full.html'
	link: (scope, el) ->
		el.on 'click', -> $body.removeClass 'popup-open'
		el.find('a').on 'click', (e) -> e.stopPropagation()

		handleFullscreenEvt = (e, post) ->
			$body.addClass 'popup-open'

			if e
				scope.post = post

			else scope.$apply -> scope.post = post

		scope.$parent.$on 'goingFullscreen', handleFullscreenEvt

		# Listen to wsad and arrow keys
		handleKeyPress = (e, keys, $to) ->
			if keys.indexOf(e.keyCode) isnt -1 and $to.length is 1
				e.preventDefault()
				handleFullscreenEvt false, $to.scope().post

		winObj.on 'keydown', (e) ->
			return unless $body.hasClass 'popup-open'

			$curVideo = angular.element("[ng-video] video[data-src='#{scope.post.src}']").parents 'li:first'

			handleKeyPress e, [65, 37, 38, 87], $curVideo.prev()
			handleKeyPress e, [68, 39, 40, 83], $curVideo.next()
]