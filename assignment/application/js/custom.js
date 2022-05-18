


$(document).ready(function(){
    //when the doucent is loaded lets do stuff
    if (location.protocol !== 'https:') {
        location.replace(`https:${location.href.substring(location.protocol.length)}`);
    }

    $('[data-toggle="popover"]').popover();

    fetch("application/mvc/controller.php/otherPage").then(response => response.json().then(data => 
    {
        if(response.ok)
        {
            console.log(data.name);
            //document.querySelector("#title_left").textContent = data.name;
        }
    }));
    updateContents("getHomePage");

});


function test(){
    
}

document.querySelector("#navContact").addEventListener("click", e => 
{
    fetch("application/mvc/controller.php/home").then(response => response.json().then(data => 
    {
        if(response.ok)
        {
            console.log(data.data);
        }
    }));
})

document.querySelector("#navHome").addEventListener("click", e => {
    /*
     fetch("https://users.sussex.ac.uk/~gm398/3dapp/assignment/application/model/home.php").then(response => response.json().then(data =>
         {
             if(response.ok)
             {
                 //console.log(data);
                 document.getElementById("home").innerHTML = data;
             }
             else
             {
                console.log(data);
             }

         }));
     */
    updateContents("getHomePage");
});
document.querySelector("#navAbout").addEventListener("click", e => 
{
    console.log("about");
    updateContents("getAboutPage");
})
document.querySelector("#navModels").addEventListener("click", e => 
{
    console.log("model");
    
    updateContents("get3dModelPage");
})
document.querySelector("#navContact").addEventListener("click", e => 
{
    console.log("contact");
    updateContents("getContactPage");
})

// document.querySelector("#test").addEventListener("click", e => 
// {
//     fetch("https://users.sussex.ac.uk/~gm398/3dapp/assignment/test.php").then(response => response.text().then(data => 
//     {
//         if(response.ok)
//         {
//             console.log(data.data);
//             document.getElementById("wubwubwub").innerHTML = data;
//         }
//     }));

// })

function clearPage(){

}
function updateContents(pageType){
    fetch("application/mvc/controller.php/"+pageType).then(response => response.text().then(data => 
        {
            if(response.ok)
            {
                //console.log(data);
                document.getElementById("home").innerHTML = data;
            }
        }));
}