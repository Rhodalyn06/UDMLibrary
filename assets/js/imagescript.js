

var myImage = document.getElementById("myPhoto");

var imageArray = ["images/2.jpg","images/23.jpg","images/22.jpg","images/21.jpg",
				  "images/20.jpg","images/19.jpg","images/18.jpg","images/17.jpg",
				  "images/16.jpg","images/15.jpg","images/14.jpg","images/13.jpg",
				  "images/12.jpg","images/11.jpg","images/10.jpg","images/9.jpg",
				  "images/8.jpg","images/7.jpg","images/6.jpg","images/5.jpg",
				  "images/4.jpg","images/3.jpg","images/1.jpg"];

var imageIndex = 0;
	
	function changeImage() {

		myPhoto.setAttribute("src", imageArray [imageIndex]);
		imageIndex++;
		if (imageIndex >= imageArray.length){
			imageIndex=0;
		}
	}

var intervalHandle = setInterval(changeImage, 1500);

myPhoto.onClick = function() {
	clearInterval(intervalHandle);
}