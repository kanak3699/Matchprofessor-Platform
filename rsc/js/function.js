
//'planCard' is the array that containes all the info of each individual cards
let plan1 = document.getElementById('plan1') //1 month
let plan2 = document.getElementById('plan2') //3 month
let plan3 = document.getElementsByClassName('planCard')[2] //1 year
let plan4 = document.getElementsByClassName('planCard')[3] //6 month
let plan5 = document.getElementsByClassName('planCard')[4] //9 month



//this empty will always display plan 1 on page refresh
default_highlighter();

//this function will highlight the plan being passed into
mouseover_planHighlighter(plan1)
mouseover_planHighlighter(plan2)
mouseover_planHighlighter(plan3)
mouseover_planHighlighter(plan4)
mouseover_planHighlighter(plan5)


//this function will highlight the price, image, description of individual plans on mouseOver event
function mouseover_planHighlighter(samplePlan){

        //will highlight the plan on mouseover event
        samplePlan.addEventListener("mouseover", function(){

            //Checking which Plan is being used in the function. Then, using that plan's image
            if(samplePlan.querySelector('#planA p').innerText==='1 Month Premium'){
                sampleImg = 'rsc/images/1month.jpg'
            }
            else if(samplePlan.querySelector('#planA p').innerText==='3 Month Premium'){
                sampleImg = 'rsc/images/3month.jpg'
            }
            else if(samplePlan.querySelector('#planA p').innerText==='1 Year Premium'){
                sampleImg = 'rsc/images/1year.jpg'
            }
            else if(samplePlan.querySelector('#planA p').innerText==='6 Month Premium'){
                sampleImg = 'rsc/images/6month.jpg'
            }
            else{
                sampleImg = 'rsc/images/9month.jpg'
            }
                
            //change plan image
            document.getElementById('image').src=sampleImg;

            //change plan title
            let plan_title = document.getElementById('planNameHeading');        
            plan_title.textContent=samplePlan.querySelector('#planA p').innerText //taking the title from the plan cards and highlighting them below

            //change plan price
            let plan_price = document.getElementById('planPriceHeading');        
            plan_price.textContent=samplePlan.querySelector('.insideCardInfo h4').innerText

            //change plan description
            let plan_desc = document.getElementById('productPara');        
            plan_desc.textContent=samplePlan.querySelector('.card-description p').innerText

        
                
    })

}

function default_highlighter(){

        //change plan image
        document.getElementById('image').setAttribute('src', 'rsc/images/1month.jpg');

        //change plan title
        let plan_title = document.getElementById('planNameHeading');        
        plan_title.textContent=plan1.querySelector('#planA p').innerText //taking the title from the plan cards and highlighting them below

        //change plan price
        let plan_price = document.getElementById('planPriceHeading');        
        plan_price.textContent=plan1.querySelector('.insideCardInfo h4').innerText

        //change plan description
        let plan_desc = document.getElementById('productPara');        
        plan_desc.textContent=plan1.querySelector('.card-description p').innerText
    }

function openEmailForm(){
    // this function allows for the user to click on a button to show/hide a contact form for support
    var itemToDisplay = document.getElementById('supportForm');

    // if(itemToDisplay.style.display === 'block'){
    //     itemToDisplay.style.display = 'none';
    // }
    // else{
        itemToDisplay.style.display = 'block';
    // }
}

function closeEmailForm(){
    var itemToDisplay = document.getElementById('supportForm');

    if(itemToDisplay.style.display === 'block'){
        itemToDisplay.style.display = 'none';
    }
}