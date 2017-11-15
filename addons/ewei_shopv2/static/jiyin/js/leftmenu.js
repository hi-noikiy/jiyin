			window.onload = toggleSide;
			
			function toggleSide () {
				var listBtn = document.getElementById('show-list'),
					sideList = document.getElementById('side-list'),
					mask = document.getElementById('mask'),
					closeEles = document.querySelectorAll('.close-side');
				listBtn.onclick = function () {
					showSide();
				}
				for (var i=0;i<closeEles.length; i++) {
					closeEles[i].onclick = function() {
						hideSide();
					};
				}
				var showSide = function () {
					mask.style.display = 'block';
					sideList.style.webkitTransform = 'translateX(0)';
					sideList.style.transform = 'translateX(0)';
				}
				var hideSide = function () {
					sideList.style.webkitTransform = 'translateX(-100%)';
					sideList.style.transform = 'translateX(-100%)';
					setTimeout(function () {
						mask.style.display = 'none';
					}, 300);
				}
			}