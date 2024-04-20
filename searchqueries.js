var states = ["AL", "AK", "AZ", "AR", "CA", "CO", "CT", "DE", "FL", "GA", "HI", "ID", "IL", "IN", "IA", "KS", "KY", "LA", "ME", "MD", "MA", "MI", "MN", "MS", "MO", "MT", "NE", "NV", "NH", "NJ", "NM", "NY", "NC", "ND", "OH", "OK", "OR", "PA", "RI", "SC", "SD", "TN", "TX", "UT", "VT", "VA", "WA", "WV", "WI", "WY"];


function goToSearchResults() {
    console.log("------STARTING------")
    console.log("Function is called");
    console.log("grabbing values...");
    var serviceCompanyName = document.getElementById("servicecompanyname").value;
    var cityName = document.getElementById("cityname").value;
    var stateAbbrev = document.getElementById("stateabbrev").value;
    var zipCode = document.getElementById("zipcode").value;
    console.log("values grabbed are:", serviceCompanyName+' ,'+cityName+' ,'+stateAbbrev+' ,'+zipCode);
    var url = "results.html?";
    url += "servicecompanyname=" + encodeURIComponent(serviceCompanyName);
    url += "&cityname=" + encodeURIComponent(cityName);
    url += "&stateabbrev=" + encodeURIComponent(stateAbbrev);
    url += "&zipcode=" + encodeURIComponent(zipCode);
    console.log("url is " + url);
    console.log("------FINISHING------")
    window.location.href = url;
}

 //var state = stateAbbrev.toUpperCase();
//for(let i = 0; i<states.length; i++){
    //     if(states[i] === state){
    //         console.log(stateAbbrev + " is in states. Matches with " + states[i]);
    //         break;
    //     }
    //     else{
    //         continue;
    //         }
    // }
