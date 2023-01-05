container = document.getElementById('globe-part');
if (container) {
    var large = $('#globe-part').width();
    var haut = $('#globe-part').height();

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(80, window.innerWidth / window.innerHeight, 0.01, 1000);
    camera.position.z = 2;
    camera.position.y = 0;
    camera.position.x = 0;

    const clock = new THREE.Clock();

    const renderer = new THREE.WebGLRenderer({
        antialias: true,
        alpha: true
    })
    renderer.setSize(large, haut);
    container.appendChild(renderer.domElement);

    var loader = new THREE.TextureLoader();

    const media_tab = ([
        "./media/img/domains/Argent.png",
        "./media/img/domains/Art.png",
        "./media/img/domains/Astronomie.png",
        "./media/img/domains/Automobile.png",
        "./media/img/domains/Boulangerie.png",
        "./media/img/domains/Cuisine.png",
        "./media/img/domains/Film.png",
        "./media/img/domains/Histoire.png",
        "./media/img/domains/Informatique.png",
        "./media/img/domains/Jardinage.png",
        "./media/img/domains/Langues.png",
        "./media/img/domains/Science.png",
        "./media/img/domains/Sport.png",
        "./media/img/domains/Psychologie.png",
        "./media/img/domains/Bâtiments.png",
        "./media/img/domains/Argent.png",
        "./media/img/domains/Art.png",
        "./media/img/domains/Astronomie.png",
        "./media/img/domains/Automobile.png",
    ]);

    const domains = [];
    const lights = [];
    for (let i = 0; i < media_tab.length; i++) {
        domains[i] = new THREE.Mesh(
            new THREE.CircleGeometry(0.2, 64),
            new THREE.MeshBasicMaterial({
                map: loader.load(media_tab[i]),
                side: THREE.DoubleSide
            })
        );

        domains[i].position.x = 1 + (0.1 * i);
        domains[i].position.y = 1 + (0.1 * i);

        scene.add(domains[i]);

        lights[i] = new THREE.DirectionalLight(0xffffff, 0.4);
        scene.add(lights[i]);

    }

    const geometry = new THREE.SphereGeometry(1.5, 40, 40);
    const material2 = new THREE.MeshPhongMaterial({
        color: 0x511281,
        shininess: 30,
    });
    const sphere = new THREE.Mesh(geometry, material2);
    //scene.add(sphere);

    camera.position.z = 30;

    let mouseX = 0;
    let mouseY = 0;
    window.addEventListener('mousemove', e => {
        mouseX = e.clientX;
        mouseY = e.clientY
    })

    const loaderB = new THREE.GLTFLoader();

    var model;

    loaderB.load('./media/model/earth.glb', function (gltf) {
        gltf.scene.scale.set(0.18, 0.18, 0.18);
        gltf.scene.position.y = -0.5;

        model = gltf.scene;
        scene.add(gltf.scene);

    }, undefined, function (error) {

        console.error(error);

    });

    function animate() {
        requestAnimationFrame(animate);
        sphere.rotation.y += 0.001;
        sphere.rotation.x += 0.001;

        const time = clock.getElapsedTime();

        if (model)
            model.rotation.y += 0.005;

        for (let i = 0; i < domains.length; i++) {

            let orbit = 3.5;
            let speed = 0.3;

            domains[i].position.x = (Math.cos((time * speed) + 0.2 * i) * orbit) + 1;
            domains[i].position.z = (Math.sin((time * speed) - i) * orbit);
            domains[i].position.y = (Math.sin((time * speed) + 1.1 * i) * orbit) + 1;

            lights[i].position.set(domains[i].position.x, domains[i].position.y, domains[i].position.z);

        }

        renderer.render(scene, camera);

        if (camera.position.z > 5)
            camera.position.z -= 0.2;
    };

    window.addEventListener('resize', () => {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    })

    animate();
}

