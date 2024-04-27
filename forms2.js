//function that checks that cardnumnber is only numbers
const cardNum = document.getElementById('Card-Number');
cardNum.addEventListener('keydown', function(event){
    if(!/[0-9\b\t]/.test(event.key)){
        event.preventDefault();
    }
});

//function that checks that [] is only numbers
const CVV = document.getElementById('CVV');
CVV.addEventListener('keydown', function(event){
    if(!/[0-9\b\t]/.test(event.key)){
        event.preventDefault();
    }
});

//function that checks that [] is only numbers
const zCode = document.getElementById('zip-code');
zCode.addEventListener('keydown', function(event){
    if(!/[0-9\b\t]/.test(event.key)){
        event.preventDefault();
    }
});

//function that checks that [] is only numbers
const phoneNum = document.getElementById('Phone-Number');
phoneNum.addEventListener('keydown', function(event){
    if(!/[0-9\b\t]/.test(event.key)){
        event.preventDefault();
    }
});

///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////

//function that checks that other searchboxes is only letters
const cHname = document.getElementById('CardHolder-Name2');
cHname.addEventListener('keypress', function(event){
    if(!/[a-zA-Z\b\t]/.test(event.key)){
        event.preventDefault();
    }
});

//function that checks that other searchboxes is only letters
const fName = document.getElementById('First-Name2');
fName.addEventListener('keydown', function(event){
    if(!/[a-zA-Z\b\t]/.test(event.key)){
        event.preventDefault();
    }
});

//function that checks that other searchboxes is only letters
const lName = document.getElementById("Last-name2");
lName.addEventListener('keydown', function(event){
    if(!/[a-zA-Z\b\t]/.test(event.key)){
        event.preventDefault();
    }
});

//function that checks that other searchboxes is only letters
const cityName = document.getElementById('City-Name2');
cityName.addEventListener('keydown', function(event){
    if(!/[a-zA-Z\b\t]/.test(event.key)){
        event.preventDefault();
    }
});