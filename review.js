function goToWriteAReview() {
    window.location.href = 'writing_reviews.php';
}

function getStarRating(){
    var starRating = null;
    var radios = document.getElementsByName('rating');

    for (var i=0; i < radios.length; i++){
        if(radios[i].checked){
            starRating = radios[i].value;
            break;
        }
    }
    return starRating;
}


function submitReview(event){
    event.preventDefault();
    console.log("Function is called");
    console.log("grabbing values...");
    var revStar = getStarRating();
    var revDescription = document.getElementById("exampleFormControlTextarea1").value;
    console.log("Values grabbed");
    console.log("Star Rating is " + revStar +  " Review Description is " + revDescription);
    window.location.href = 'services.php';
}