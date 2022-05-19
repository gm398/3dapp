

<script type="module">
    let camera, controls, scene, renderer, model;
    console.log("hello world");
    window.george = "hello";
    window.init();
    //render(); // remove when using next line for animation loop (requestAnimationFrame)

    window.init = () => {

        scene = new THREE.Scene();
        scene.background = new THREE.Color(0xcccccc);
        scene.fog = new THREE.FogExp2(0xcccccc, 0.002);

        renderer = new THREE.WebGLRenderer({
            antialias: true
        });
        renderer.setPixelRatio(window.devicePixelRatio);
        renderer.setSize(500, 500);
        renderer.shadowMap.enabled = true;
        document.querySelector("#home").appendChild(renderer.domElement);

        camera = new THREE.PerspectiveCamera(60, 1, 1, 1000);
        camera.position.set(1,1, 1);

        // controls

        controls = new THREE.OrbitControls(camera, renderer.domElement);

        //controls.addEventListener( 'change', render ); // call this only in static scenes (i.e., if there is no animation loop)

        controls.enableDamping = true; // an animation loop is required when either damping or auto-rotation are enabled
        controls.dampingFactor = 0.05;

        controls.screenSpacePanning = false;

        controls.minDistance = 0;
        controls.maxDistance = 10;

        controls.maxPolarAngle = Math.PI / 2;

        // world

        // const geometry = new THREE.SphereGeometry(50, 32, 32);
        // const material = new THREE.MeshBasicMaterial({
        // 	color: 0xffff00
        // });
        // const sphere = new THREE.Mesh(geometry, material);
        // scene.add(sphere);

        const loader = new THREE.GLTFLoader().setPath( './' );
        loader.load( 'model.glb', function ( gltf ) {

            gltf.scene.position.x = 0;				    //Position (x = right+ left-)
            gltf.scene.position.y = 0;				    //Position (y = up+, down-)
            gltf.scene.position.z = 0;

            model = gltf.scene;

            scene.add( gltf.scene );

            let hemiLight = new THREE.HemisphereLight(0xffeeb1, 0x080820, 4);
            scene.add(hemiLight);

            let light = new THREE.SpotLight(0xffa95c,4);
            light.position.set(10, 10, 5);
            light.castShadow = true;
            light.shadow.bias = -0.0001;
            light.shadow.mapSize.width = 1024*4;
            light.shadow.mapSize.height = 1024*4;
            scene.add( light );

            render();

            animate();

        } );


        //

        window.addEventListener('resize', onWindowResize);

    }

    function onWindowResize() {

        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();

        renderer.setSize(window.innerWidth, window.innerHeight);

    }

    function animate() {

        requestAnimationFrame(animate);

        controls.update(); // only required if controls.enableDamping = true, or if controls.autoRotate = true

        //model.rotateX(0.01);

        render();

    }

    function render() {

        renderer.render(scene, camera);

    }
</script>
--bottom--