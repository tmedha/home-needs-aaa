////////////////////////////////////////////
var states = ["AL", "AK", "AZ", "AR", "CA", "CO", "CT", "DE", "FL", "GA", "HI", "ID", "IL", "IN", "IA", "KS", "KY", "LA", "ME", "MD", "MA", "MI", "MN", "MS", "MO", "MT", "NE", "NV", "NH", "NJ", "NM", "NY", "NC", "ND", "OH", "OK", "OR", "PA", "RI", "SC", "SD", "TN", "TX", "UT", "VT", "VA", "WA", "WV", "WI", "WY"];
    //function that checks that zipcode is only numbers
const zipCode = document.getElementById('zipcode');
zipCode.addEventListener('keydown', function(event){
    if(!/[0-9\b\t]/.test(event.key)){
        event.preventDefault();
    }
});

    //function that checks that other searchboxes is only letters
const letInput = document.getElementById('servicecompanyname');
letInput.addEventListener('keydown', function(event){
    if(!/[a-zA-Z\b\t]/.test(event.key)){
        event.preventDefault();
    }
});

    //function that checks that other searchboxes is only letters
    const letInput2 = document.getElementById('cityname');
    letInput2.addEventListener('keydown', function(event){
        if(!/[a-zA-Z\b\t]/.test(event.key)){
            event.preventDefault();
        }
    });

    //function that checks that other searchboxes is only letters
    const letInput3 = document.getElementById('stateabbrev');
    letInput3.addEventListener('keydown', function(event){
        if(!/[a-zA-Z\b\t]/.test(event.key)){
            event.preventDefault();
        }
    });
    
////////////////////////////////////////////
//////////////////FUNCTIONS TO PREVENT SUBMISSION IF INCOMPLETE//////////////////////////
const firstSB = document.getElementById('servicecompanyname');
const secondSB = document.getElementById('cityname');
const thirdSB = document.getElementById('stateabbrev');
const fourthSB= document.getElementById('zipcode');
const submitBtt= document.getElementById('submitButton');

firstSB.addEventListener('input', toggleSubmitButton);
secondSB.addEventListener('input', toggleSubmitButton);
thirdSB.addEventListener('input', toggleSubmitButton);
fourthSB.addEventListener('input', toggleSubmitButton);

function toggleSubmitButton(){
    const firstSBlength = firstSB.value.trim().length;
    const secondSBlength = secondSB.value.trim().length;
    const thirdSBlength = thirdSB.value.trim().length;
    const fourthSBlength = fourthSB.value.trim().length;

    var stateAbbrev = document.getElementById("stateabbrev").value;
    var state = stateAbbrev.toUpperCase();

    if (firstSBlength >= 5 && secondSBlength >= 4 && thirdSBlength === 2 && fourthSBlength === 5) {
        for(let i =0 ; i <states.length; i++){
            if(states[i]===state){
                console.log(stateAbbrev + " is in states.... Matches with " + states[i]);
                submitBtt.disabled = false; 
            }
        }
       
            } else {
                submitBtt.disabled = true; 
            }
}
////////////////////////////////////////////
//////////////////FUNCTIONS TO CHECK IF STATE ABBREV IS APPROPRIATE//////////////////////////


// function checkStateAbbreviation(){
//     console.log("----- checking stateabbrev -----");
//    var abbrevInput = document.getElementById("stateabbrev").value;
//    var state = abbrevInput.toUpperCase(); 
//     console.log("Input is " + abbrevInput);
//     console.log("Abbrev is " + state);

    
//     for(let i = 0; i<states.length; i++){
//         var found = false;
//         if(states[i] === state){
//             found = true;
//             console.log(abbrevInput + " is in states. Matches with " + states[i]);
//             break;
//         }
//         else{
//             console.log(abbrevInput + " is not in states.");
//             }
//     }
//     console.log("-----DONE-----");
// }

// toggleSubmitButton();

 // for(let i = 0; i<states.length; i++){
    //     if(states[i]===state){
    //         console.log(stateAbbrev + " is in states.... Matches with " + states[i]);
            // if (firstSBlength >= 5 && secondSBlength >= 4 && thirdSBlength === 2 && fourthSBlength === 5) {
             //         submitBtt.disabled = false; 
             //     } else {
             //         submitBtt.disabled = true; 
             //     }
        // }
    //     else{
    //         // submitBtt.disabled = true;
    //         continue;
    //         }
    // }