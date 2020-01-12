// ----------- VARIABLES -----------//
// Vaiables for register page.
let divOfLevel = document.querySelector(".typing-details");
let chooseSelect = document.querySelector("#select-level");

// ----------- EVENT LISTENERS -----------//
// Event Listeners for register page.
chooseSelect.addEventListener("change", function() {
	var selcetOption = chooseSelect.querySelectorAll("option");
	var option = selcetOption.value;

	if(chooseSelect.value == "Basic") {
		divOfLevel.innerHTML = "<label> Choose paragraph :- </label>" +
								"<select name='paragraph' size='5' style='overflow:auto; height:auto;'>" +
									"<option>Welcome to typing test.</option>" +
									"<option>First, I wake up.</option>" +
									"<option>I spent eight days in Paris, France.</option>" +
									"<option>I just returned from the greatest summer vacation! It was so fantastic, I never wanted it to end.</option>" +
									"<option>This resource comprises linkers which connect sentences to each other, but excludes paratactic and hypotactic linkers within sentences.</option>" +
								"</select>" + 
								"<input type='submit' name='test_button' value='Test' id='test_button'>";
	} else if(chooseSelect.value == "Medium") {
		divOfLevel.innerHTML =  "<label> Choose paragraph :- </label>" +
								"<select name='paragraph' size='5' style='overflow:auto; height:auto;'>" +
									"<option>The aforementioned shoulders are rounded body parts that aid arms' flexibility.</option>" +
									"<option>The park is great for a leisurely stroll, and it still features some of the original architecture and replicas of monuments that were featured in the World’s Fair.</option>" +
									"<option>During the last part of his visit, Keith managed to climb the stairs inside of the Willis Tower, a 110-story skyscraper.</option>" +
								"</select>" +
								"<input type='submit' name='test_button' value='Test' id='test_button'>";
	} else {
		divOfLevel.innerHTML =  "<label> Choose paragraph :- </label>" +
								"<select name='paragraph' size='5' style='overflow:auto; height:auto;'>" +
									"<option>The Statue of Liberty, arguably one of New York City’s most iconic symbols, is a popular tourist attraction for first-time visitors to the city. This 150-foot monument was gifted to the United States from France in order to celebrate 100 years of America’s independence. The statue is located on Liberty Island, and it is accessible by taking a ferry from either Battery Park in New York City or Liberty State Park in Jersey City.</option>" +
									"<option>Arms are long, powerful body parts that are located on either side of chest, below the shoulders;arms are comprised of biceps (the thicker, more powerful upper portion), and forearms (the thinner, more flexible lower portion).</option>" +
									"<option>It goes without saying that humans (mammals identifiable as those that stand upright and are comparatively advanced and capable of detailed thought) have pretty remarkable bodies, given all that they've accomplished. (Furthermore, an especially intelligent human brain produced this text!)</option>" +
									"<option>it may be an adverb; if the word ends in \"-tion\", it is possibly a noun. If the word ends in \"-ise\", it is probably a verb.</option>" +
									"<option>Twas brillig, and the slithy toves Did gyre and gimble in the wabe: All mimsy were the borogoves, And the mome raths outgrabe.</option>" +
								"</select>" +
								"<input type='submit' name='test_button' value='Test' id='test_button'>";
	}
	console.log(option);
}, false);


// ----------- END OF EVENT LISTENERS -----------//