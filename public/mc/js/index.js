window.onload = function () {

    var camera, scene, rederer, container, controls;
    var SCREEN_WIDTH, SCREEN_HEIGHT;

    start();
    function start() {
        container = document.getElementById('game');

        var lis = document.getElementsByClassName('ck');
        for (var i = 0, v; v = lis[i]; i++) {
            v.onclick = function() {
                changeMaterial(this.getAttribute('data-url'))
            }
        }

        init();
        createSteve();

        window.onresize = resize;
        animate();
    }
    function changeMaterial(url) {
        scene.children[scene.children.length - 1].remove();
        createSteve(url);
    }

    function createSteve(url) {
        var steveTexture = new THREE.TextureLoader().load( url ? url : './img/steve.png');
        steveTexture.magFilter = THREE.NearestFilter;
        steveTexture.minFilter = THREE.LinearMipMapLinearFilter;
        var allMesh = new THREE.MeshLambertMaterial({ map: steveTexture });
        var steve = new THREE.Group();
        // 这是头部
        var headG = new THREE.BoxGeometry(8, 8, 8);
        headG.faceVertexUvs = steveuv.headfaceVertexUvs
        var head = new THREE.Mesh(headG, allMesh);
        head.position.y = 10.1;
        steve.add(head);
        // 这是身体
        var bodyG = new THREE.BoxGeometry(4, 12, 8);
        bodyG.faceVertexUvs = steveuv.bodyfaceVertexUvs
        var body = new THREE.Mesh(bodyG, allMesh);
        steve.add(body);
        // 这是手臂
        var handG = new THREE.BoxGeometry(4, 12, 4);
        handG.faceVertexUvs = steveuv.handfaceVertexUvs
        var hand = new THREE.Mesh(handG, allMesh);
        hand.position.z = 6.1;
        steve.add(hand);
        var rhand = hand.clone();
        rhand.position.z = -6.1;
        steve.add(rhand);
        // 这是脚
        var footG = new THREE.BoxGeometry(4, 12, 4);
        footG.faceVertexUvs = steveuv.footfaceVertexUvs
        var foot = new THREE.Mesh(footG, allMesh);
        foot.position.y = -12.1;
        foot.position.z = 2.1;
        steve.add(foot);
        var rfoot = foot.clone();
        rfoot.position.z = -2.1;
        steve.add(rfoot);

        scene.add(steve);
    }

    function init() {
        SCREEN_HEIGHT = window.innerHeight - 10;
        SCREEN_WIDTH = window.innerWidth - 10;
        // 这是场景
        scene = new THREE.Scene();
        // 这是渲染
        renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true })
        renderer.setPixelRatio(window.devicePixelRatio);
        renderer.setSize(SCREEN_WIDTH, SCREEN_HEIGHT);
        container.appendChild(renderer.domElement);
        // 这是辅助
        // var axesHelper = new THREE.AxesHelper(10);
        // scene.add(axesHelper);
        // 这是光照
        var ambientLight = new THREE.AmbientLight(0xffffff)
        scene.add(ambientLight);
        // var directionalLight = new THREE.DirectionalLight( 0xffffff, 2 );
        // directionalLight.position.set( 50, 50, 50 ).normalize();
        // scene.add( directionalLight );
        // 这是相机
        camera = new THREE.PerspectiveCamera(50, SCREEN_WIDTH / SCREEN_HEIGHT, 1, 800);
        camera.position.x = 50;
        camera.lookAt(scene.position);
        // 这是控制设置
        controls = new THREE.OrbitControls(camera, renderer.domElement);
        controls.enablePan = false;
        controls.autoRotate = true;
        controls.rotateSpeed = 1.0;
        controls.enableZoom = false;
        controls.dampingFactor = 0.25;
        controls.minPolarAngle = Math.PI / 2;
        controls.maxPolarAngle = Math.PI / 2;
    }

    // 屏幕大小设置
    function resize() {
        SCREEN_HEIGHT = window.innerHeight - 10;
        SCREEN_WIDTH = window.innerWidth - 10;
        camera.aspect = SCREEN_WIDTH / SCREEN_HEIGHT;
        camera.updateProjectionMatrix();
        renderer.setSize(SCREEN_WIDTH, SCREEN_HEIGHT);
    }

    // 动画主循环
    function animate() {
        controls.update(); // 如果controls.enableDamping = true，或者如果controls.autoRotate = true
        renderer.render(scene, camera);
        requestAnimationFrame(animate);
    }
}