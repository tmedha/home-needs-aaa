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

//function that checks that [] is only numbers
const zCodeS = document.getElementById('Zipcode-1');
zCodeS.addEventListener('keydown', function(event){
    if(!/[0-9\b\t]/.test(event.key)){
        event.preventDefault();
    }
});

//function that checks that [] is only numbers
const zCodeE = document.getElementById('Zipcode-2');
zCodeE.addEventListener('keydown', function(event){
    if(!/[0-9\b\t]/.test(event.key)){
        event.preventDefault();
    }
});

///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////

//function that checks that other searchboxes is only letters
const cHname = document.getElementById('CardHolder-Name');
cHname.addEventListener('keydown', function(event){
    if(!/[a-zA-Z\b\t]/.test(event.key)){
        event.preventDefault();
    }
});

//function that checks that other searchboxes is only letters
const fName = document.getElementById('First-Name');
fName.addEventListener('keydown', function(event){
    if(!/[a-zA-Z\b\t]/.test(event.key)){
        event.preventDefault();
    }
});

//function that checks that other searchboxes is only letters
const lName = document.getElementById('Last-name');
lName.addEventListener('keydown', function(event){
    if(!/[a-zA-Z\b\t]/.test(event.key)){
        event.preventDefault();
    }
});

//function that checks that other searchboxes is only letters
const cityName = document.getElementById('City-Name');
cityName.addEventListener('keydown', function(event){
    if(!/[a-zA-Z\b\t]/.test(event.key)){
        event.preventDefault();
    }
});

//function that checks that [] is only letters
const s1 = document.getElementById('Service-1');
s1.addEventListener('keydown', function(event){
    if(!/[a-zA-Z\b\t]/.test(event.key)){
        event.preventDefault();
    }
});

//function that checks that [] is only letters
const s2 = document.getElementById('Service-2');
s2.addEventListener('keydown', function(event){
    if(!/[a-zA-Z\b\t]/.test(event.key)){
        event.preventDefault();
    }
});

//function that checks that [] is only letters
const s3 = document.getElementById('Service-3');
s3.addEventListener('keydown', function(event){
    if(!/[a-zA-Z\b\t]/.test(event.key)){
        event.preventDefault();
    }
});

//function that checks that [] is only letters
const s4 = document.getElementById('Service-4');
s4.addEventListener('keydown', function(event){
    if(!/[a-zA-Z\b\t]/.test(event.key)){
        event.preventDefault();
    }
});

//function that checks that [] is only letters
const s5 = document.getElementById('Service-5');
s5.addEventListener('keydown', function(event){
    if(!/[a-zA-Z\b\t]/.test(event.key)){
        event.preventDefault();
    }
});

//function that checks that [] is only letters
const s6 = document.getElementById('Service-6');
s6.addEventListener('keydown', function(event){
    if(!/[a-zA-Z\b\t]/.test(event.key)){
        event.preventDefault();
    }
});

//function that checks that [] is only letters
const s7 = document.getElementById('Service-7');
s7.addEventListener('keydown', function(event){
    if(!/[a-zA-Z\b\t]/.test(event.key)){
        event.preventDefault();
    }
});

//function that checks that [] is only letters
const s8 = document.getElementById('Service-8');
s8.addEventListener('keydown', function(event){
    if(!/[a-zA-Z\b\t]/.test(event.key)){
        event.preventDefault();
    }
});