<div class="main wrapper clearfix">
	<div class="center">
		<button id="goBack" class="videoButtons float"></button>
		<video id="main-video" class="video-js videoVideo float" onclick="togglePause()" controls preload="auto">
			<source src="PATH" type='video/DATATYPE'>
		</video>
		<span class="videoDescription float">
			<h2>TITLE</h2>
			<p>
				DESCRIPTION
			</p>
			<a class="readMore"><span class="readMoreWrapper"><h3>Read More</h3></span></a>
			<div class="buttonWrapper">
				<!--<button id="deleteVideo ID" class="videoButtons">Delete</button>-->
			</div>
		</span>
		<button id="goAhead" class="videoButtons float"></button>
	</div>
	<script src="js/video-controls.js"></script>
</div>