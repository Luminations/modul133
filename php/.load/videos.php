<div class="main wrapper clearfix">
	<video id="main-video" class="video-js videoVideo" onclick="togglePause()" controls preload="auto">
		<source src="PATH" type='video/DATATYPE'>
		<p class="vjs-no-js">
		  To view this video please enable JavaScript, and consider upgrading to a web browser that
		  <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
		</p>
	</video>
	<span class="videoDescription">
		<h2>TITLE</h2>
		<p>
			DESCRIPTION
		</p>
		<a class="readMore"><span class="readMoreWrapper"><h3>Read More</h3></span></a>
		<div class="buttonWrapper">
			<button id="goBack" class="videoButtons">Last</button>
			<button id="deleteVideo" class="videoButtons">Delete</button>
			<button id="goAhead" class="videoButtons">Next</button>
		</div>
	</span>
	<script src="js/videoManagement.js"></script>
</div>