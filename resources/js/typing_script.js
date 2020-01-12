// Variables for typing test page.
const testWrapper = document.querySelector(".test-wrapper");
const testArea = document.querySelector("#test-area");
const originText = document.querySelector("#origin-text p").innerHTML;
const resetButton = document.querySelector("#reset");
const theTimer = document.querySelector(".timer");

let showResult = document.querySelector("#result");
let rows = document.querySelector("tbody");

var timer = [0,0,0,0];
var interval;
var timerRunning = false;

// -----------END OF VARIABLES -----------//

// ----------- Functions for Typing test timer. -----------//
// Formate digit to string like 06:08:60
function leadingZero(time) {
	if(time <= 9) {
		time = "0" + time;
	}
	return time;
}

function runTimer() {
	let currentTime = leadingZero(timer[0]) + ":" + leadingZero(timer[1]) + ":" + leadingZero(timer[2]);
	theTimer.innerHTML = currentTime;
	timer[3]++;

	timer[0] = Math.floor((timer[3]/100)/60);
	timer[1] = Math.floor((timer[3]/100) - (timer[0] * 60));
	timer[2] = Math.floor(timer[3] - (timer[1] * 100) - (timer[0] * 6000));
}

// Match the text entered with provided text on the paragraph.
function spellCheck() {
	let textEntered = testArea.value;
	let originTextMatch = originText.substring(0, textEntered.length);
	var keycode = window.event.keyCode;
	if(textEntered == originText) {
		clearInterval(interval);
		testArea.style.borderColor = "#16af1c";     // "#16af1c"
 	} else {
		if(textEntered == originTextMatch || keycode == 13) {
			testArea.style.borderColor = "#0088bb";   // "#0088bb"
		} else {
			testArea.style.borderColor = "#ff3e33";    // "#ff3e33"
		}
	}
}

// Start the timer
function start() {
	let textEnteredLength = testArea.value.length;
	if(textEnteredLength === 0 && !timerRunning) {
		timerRunning = true;
		interval = setInterval(runTimer, 10);
	}
}

// Reset Everything
function reset() {
	clearInterval(interval);
	interval = null;
	timer = [0,0,0,0];
	timerRunning = false;

	showResult.innerHTML = "";
	testArea.value = "";
	theTimer.innerHTML = "00:00:00";
	testArea.style.borderColor = "#585858";
}

// ----------- END OF Functions for Typing test timer. -----------//


// ----------- EVENT LISTENERS -----------//
// Event Listeners for typing test page.
testArea.addEventListener("keypress", start, false);
testArea.addEventListener("keyup", spellCheck, false);
resetButton.addEventListener("click", reset, false);

testArea.addEventListener("keypress", function() {
	var key = window.event.keyCode;
	var time = theTimer.innerHTML;
	if(testArea.style.borderColor == "rgb(22, 175, 28)" && key == 13) {
		testArea.style.borderColor = "rgb(22, 175, 28)";
		if(showResult.style.display == "none") {
			showResult.style.display = "block";
		} else {
			showResult.innerHTML = "Time for your typing is: ";
		}
		showResult.innerHTML = showResult.innerHTML + time;
		console.log(showResult.innerHTML);
		var firstName = document.querySelector("#FirstName").value;	
		var lastName = document.querySelector("#LastName").value;
		var userLevel = document.querySelector("#selectLevel").value;
		var timing = document.querySelector(".timer").innerHTML;
		// rows.innerHTML += "<tr><td>" + id + "</td><td>" + (firstName+ " " +lastName) + "</td><td>" + userLevel + "</td><td>" + time + "</td>";
		theTimer.innerHTML = "";

		$.ajax({
		type:'POST',
		url: 'db.php',
		data: {
			first_name: firstName,
			last_name: lastName,
			userLevel: userLevel,
			timing: time, 
		},
		success: function(html) {
			alert("success");
			}
		});

		window.location.reload();
	} 	
}, false);


// ----------- END OF EVENT LISTENERS -----------//