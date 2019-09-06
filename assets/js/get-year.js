// JavaScript Document

var currDate = new Date()
var year = currDate.getFullYear()
document.getElementById("copyrightDate").innerHTML = year;

function fetchDate() {
	var currentTime = new Date();
	var month = currentTime.getMonth() + 1;
	var day = currentTime.getDate();
	var year = currentTime.getFullYear();
	
	switch (month) {
		case 1:
			month = "January";
			break;
		case 2:
			month = "February";
			break;	
		case 3:
			month = "March";
			break;
		case 4:
			month = "April";
			break;
		case 5:
			month = "May";
			break;
		case 6:
			month = "June";
			break;
		case 7:
			month = "July";
			break;
		case 8:
			month = "August";
			break;
		case 9:
			month = "September";
			break;
		case 10:
			month = "October";
			break;	
		case 11:
			month = "November";
			break;
		case 12:
			month = "December";
			break;	
		default:
			month = "January";
	}
	
	var dateString = month + " " + day + ", " + year;
	return dateString;

}


function fetchYear() {
	var currentTime = new Date();
	var year = currentTime.getFullYear();
	return String(year);
}
