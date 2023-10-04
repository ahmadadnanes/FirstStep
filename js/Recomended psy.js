let map = document.querySelector('.gmap_iframe');
let select = document.getElementById('gov');

select.addEventListener('change' , (value) =>{
    if(value == "Amman"){
        map.src = "https://maps.google.com/maps?width=1329&amp;height=1307&amp;hl=en&amp;q=اطباء نفسيين عمان&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed";
    } 
    else if (value == "Zarqa") {
        map.src = "https://maps.google.com/maps?width=1329&amp;height=1307&amp;hl=en&amp;q=اطباء نفسسين زرقاء&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed";
    }else{map.src = "https://maps.google.com/maps?width=1329&amp;height=1307&amp;hl=en&amp;q=اطباء نفسسين  اربد&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"}
    
})  