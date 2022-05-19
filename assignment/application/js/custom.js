


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

// document.querySelector("#navModels").addEventListener("click", e =>
// {
//     console.log("model");
//
//     updateContents("get3dModelPage");
//     fetch("application/mvc/controller.php/getModelUrl/coke").then(response => response.json().then(data =>
//     {
//         if(response.ok)
//         {
//             //console.log(data);
//             init(data[0].modelURL);
//             // document.echo(<script>init(data)</script>);
//         }
//     }));
// })
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

document.querySelector("#cokeModel").addEventListener("click", e =>
{
    console.log("cokeModel");
    updateContents("getContactPage");
    fetch("application/mvc/controller.php/getModelUrl/coke").then(response => response.json().then(data =>
    {
        if(response.ok)
        {
            //console.log(data);
            init(data[0].modelURL);
            // document.echo(<script>init(data)</script>);
        }
    }));
});

document.querySelector("#appletiserModel").addEventListener("click", e =>
{
    console.log("appletiserModel");
    updateContents("getContactPage");
    fetch("application/mvc/controller.php/getModelUrl/appletiser").then(response => response.json().then(data =>
    {
        if(response.ok)
        {
            //console.log(data);
            init(data[0].modelURL);
            // document.echo(<script>init(data)</script>);
        }
    }));
});

document.querySelector("#fantaModel").addEventListener("click", e =>
{
    console.log("fantaModel");
    updateContents("getContactPage");
    fetch("application/mvc/controller.php/getModelUrl/fanta").then(response => response.json().then(data =>
    {
        if(response.ok)
        {
            //console.log(data);
            init(data[0].modelURL);
            // document.echo(<script>init(data)</script>);
        }
    }));
})
document.querySelector("#spinX").addEventListener("click", e =>
{
    resetAnimations();
    spinX = true;
})
document.querySelector("#spinY").addEventListener("click", e =>
{
    resetAnimations();
    spinY = true;
})
document.querySelector("#spinZ").addEventListener("click", e =>
{
    resetAnimations();
    spinZ = true;
})
document.querySelector("#stopAnimations").addEventListener("click", e =>
{
    resetAnimations();
})
document.querySelector("#camTop").addEventListener("click", e =>
{
    camera.position.set(0,10, 0);
})
document.querySelector("#camFront").addEventListener("click", e =>
{
    camera.position.set(0,0, 10);
})
document.querySelector("#camSide").addEventListener("click", e =>
{
    camera.position.set(10,0, 0);
})

document.querySelector("#wireframe").addEventListener("click", e =>
{
    wireframe = !wireframe;
    model.traverse(function(object) {
        if (!object.isMesh) return;
        object.material.wireframe = wireframe;
        object.material.needsUpdate = true; // not sure if this is needed?
    })
})
fetch("application/mvc/controller.php/getModelUrl/coke").then(response => response.json().then(data =>
{
    if(response.ok)
    {
        //console.log(data);
        init(data[0].modelURL);
        // document.echo(<script>init(data)</script>);
    }
}));
// model stuff

let camera, controls, scene, renderer, model;

let wireframe = false;
let spinX = false;
let spinZ = false;
let spinY = false;
let camFront = false;
let camTop = false;
let camSide = false;
//render(); // remove when using next line for animation loop (requestAnimationFrame)

function init(newModel){

    scene = new THREE.Scene();
    scene.background = new THREE.Color(0xcccccc);
    scene.fog = new THREE.FogExp2(0xcccccc, 0.002);

    renderer = new THREE.WebGLRenderer({
        antialias: true
    });
    renderer.setPixelRatio(window.devicePixelRatio);
    renderer.setSize(500, 500);
    // renderer.shadowMap.enabled = true;
    document.querySelector("#models").innerHTML = "";
    document.querySelector('#models').appendChild(renderer.domElement);

    camera = new THREE.PerspectiveCamera(60, 1, 1, 1000);
    camera.position.set(10,5, 5);

    // controls

    controls = new THREE.OrbitControls(camera, renderer.domElement);

    //controls.addEventListener( 'change', render ); // call this only in static scenes (i.e., if there is no animation loop)

    controls.enableDamping = true; // an animation loop is required when either damping or auto-rotation are enabled
    controls.dampingFactor = 0.05;

    controls.screenSpacePanning = false;

    controls.minDistance = 0;
    controls.maxDistance = 1000000;

    controls.maxPolarAngle = Math.PI / 2;

    // world

    // const geometry = new THREE.SphereGeometry(50, 32, 32);
    // const material = new THREE.MeshBasicMaterial({
    // 	color: 0xffff00
    // });
    // const sphere = new THREE.Mesh(geometry, material);
    // scene.add(sphere);

    const loader = new THREE.GLTFLoader().setPath( './' );
    loader.load( newModel, function ( gltf ) {

        gltf.scene.position.x = 0;				    //Position (x = right+ left-)
        gltf.scene.position.y = 0;				    //Position (y = up+, down-)
        gltf.scene.position.z = 0;

        model = gltf.scene;

        scene.add( gltf.scene );

    } );

    let hemiLight = new THREE.HemisphereLight(0xffeeb1, 0x080820, 4);
    scene.add(hemiLight);

    let light = new THREE.SpotLight(0xffa95c,4);
    light.position.set(0, 10, 3);
    light.castShadow = true;
    light.shadow.bias = -0.0001;
    light.shadow.mapSize.width = 1024*4;
    light.shadow.mapSize.height = 1024*4;
    scene.add( light );

    render();

    animate();
    //

    //window.addEventListener('resize', onWindowResize);

}

function onWindowResize() {

    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();

    renderer.setSize(window.innerWidth, window.innerHeight);

}

function animate() {

    requestAnimationFrame(animate);

    controls.update(); // only required if controls.enableDamping = true, or if controls.autoRotate = true

    if(spinX){
        model.rotateX(0.01);
    }
    if(spinY){
        model.rotateY(0.01);
    }
    if(spinZ){
        model.rotateZ(0.01);
    }


    render();
}

function render() {

    renderer.render(scene, camera);

}
function toggleWireFrame(){
    wireframe = !wireframe;
}
function resetAnimations(){
    spinX = false;
    spinZ = false;
    spinY = false;
    camFront = false;
    camTop = false;
    camSide = false;
}

