// JavaScript Document
$(document).ready(function(){

	 //AJAX service request to get the main text data from the json data store
	 $.getJSON('application/model/data.json', function(jsonObj) {
		console.log(jsonObj);
		//Get the home page main text data
		$('#title_home').php('<h2>' + jsonObj.pageTextData[0].title + '<h2>');
		$('#subTitle_home').php('<h3>' + jsonObj.pageTextData[0].subTitle + '</h3>');
		$('#description_home').php('<p>' + jsonObj.pageTextData[0].description + '</p>');
		
         //Get the home page left column text data
		$('#title_left').php('<h2>' + jsonObj.pageTextData[1].title + '<h2>');
		$('#subTitle_left').php('<h3>' + jsonObj.pageTextData[1].subTitle + '</h3>');
		$('#description_left').php('<p>' + jsonObj.pageTextData[1].description + '</p>');	
		
		//Get the home page centre column text data
		$('#title_centre').php('<h2>' + jsonObj.pageTextData[2].title + '<h2>');
		$('#subTitle_centre').php('<h3>' + jsonObj.pageTextData[2].subTitle + '</h3>');
		$('#description_centre').php('<p>' + jsonObj.pageTextData[2].description + '</p>');	
		
		//Get the home page right column text data
		$('#title_right').php('<h2>' + jsonObj.pageTextData[3].title + '<h2>');
		$('#subTitle_right').php('<h3>' + jsonObj.pageTextData[3].subTitle + '</h3>');
		$('#description_right').php('<p>' + jsonObj.pageTextData[3].description + '</p>');			
	  
		//Get the coke main text data
		$('#x3dModelTitle_coke').php('<h2>' + jsonObj.pageTextData[4].x3dModelTitle + '<h2>');
		$('#x3dCreationMethod_coke').php('<p>' + jsonObj.pageTextData[4].x3dCreationMethod + '<p>');
		$('#title_coke').php('<h2>' + jsonObj.pageTextData[4].title + '<h2>');
		$('#subTitle_coke').php('<h3>' + jsonObj.pageTextData[4].subTitle + '</h3>');
		$('#description_coke').php('<p>' + jsonObj.pageTextData[4].description + '</p>');
 
		//Get the sprite main text data
		$('#x3dModelTitle_sprite').php('<h2>' + jsonObj.pageTextData[5].x3dModelTitle + '<h2>');
		$('#x3dCreationMethod_sprite').php('<p>' + jsonObj.pageTextData[5].x3dCreationMethod + '<p>');
		$('#title_sprite').php('<h2>' + jsonObj.pageTextData[5].title + '<h2>');
		$('#subTitle_sprite').php('<h3>' + jsonObj.pageTextData[5].subTitle + '</h3>');
		$('#description_sprite').php('<p>' + jsonObj.pageTextData[5].description + '</p>');		

		//Get the pepper main text data
		$('#x3dModelTitle_pepper').php('<h2>' + jsonObj.pageTextData[6].x3dModelTitle + '<h2>');
		$('#x3dCreationMethod_pepper').php('<p>' + jsonObj.pageTextData[6].x3dCreationMethod + '<p>');
 		$('#title_pepper').php('<h2>' + jsonObj.pageTextData[6].title + '<h2>');
		$('#subTitle_pepper').php('<h3>' + jsonObj.pageTextData[6].subTitle + '</h3>');
		$('#description_pepper').php('<p>' + jsonObj.pageTextData[6].description + '</p>');
		
		//Get the gallery contents data
		$('.title_gallery').php('<h2>' + jsonObj.pageTextData[7].galleryTitle + '<h2>');
		$('.description_gallery').php('<p>' + jsonObj.pageTextData[7].galleryDescription + '</p>');

		//Get camera contents data
		$('.x3dCameraTitle').php('<h2>' + jsonObj.pageTextData[8].CameraTitle + '<h2>');
		$('.x3dCameraSubtitle').php('<p>' + jsonObj.pageTextData[8].CameraSubtitle + '<p');

	 });
});








