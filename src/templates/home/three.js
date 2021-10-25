import {
  TorusKnotGeometry,
  MeshStandardMaterial,
  Mesh,
  PerspectiveCamera,
  WebGLRenderer,
  Scene,
  Clock,
  PointLight,
  DirectionalLight,
} from "https://cdn.skypack.dev/three@0.132.2";
import { OrbitControls } from "https://cdn.skypack.dev/three@0.132.2/examples/jsm/controls/OrbitControls.js";

// Cursor
const cursor = {
  x: 0,
  y: 0,
};
window.addEventListener("mousemove", (event) => {
  cursor.x = event.clientX / sizes.width - 0.5;
  cursor.y = -(event.clientY / sizes.height - 0.5);
});

/**
 * Base
 */
// Canvas
const canvas = document.querySelector("canvas.webgl");

// Sizes
const sizes = {
  width: window.innerWidth,
  height: window.innerHeight - 176,
};

window.addEventListener("resize", () => {
  // Update sizes
  sizes.width = window.innerWidth;
  sizes.height = window.innerHeight - 176;

  // Update camera
  camera.aspect = sizes.width / sizes.height;
  camera.updateProjectionMatrix();

  // Update renderer
  renderer.setSize(sizes.width, sizes.height);
  renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
});

// Scene
const scene = new Scene();

// Object
const geometry = new TorusKnotGeometry(10, 3, 100, 16);
const material = new MeshStandardMaterial({ color: 0xff0000 });
material.metalness = 1;
material.roughness = 0.5;
const mesh = new Mesh(geometry, material);
scene.add(mesh);

// Camera
const camera = new PerspectiveCamera(50, sizes.width / sizes.height, 0.1, 100);
camera.position.z = 50;
camera.lookAt(mesh.position);
scene.add(camera);

const controls = new OrbitControls(camera, canvas);
controls.enableDamping = true;

// Renderer
const renderer = new WebGLRenderer({
  canvas: canvas,
  alpha: true,
});
renderer.setSize(sizes.width, sizes.height);

// Light
const ambientLight = new DirectionalLight(0xffffff, 0.75);
const pointLight = new PointLight(0xffffff, 2);
pointLight.position.set(1, 1, 1);
scene.add(ambientLight, pointLight);

// Animate
const clock = new Clock();

const tick = () => {
  const elapsedTime = clock.getElapsedTime();

  // Update controls
  controls.update();

  // Update objects
  mesh.rotation.y = elapsedTime * 0.5;
  mesh.rotation.x = elapsedTime * 0.25;
  mesh.rotation.z = elapsedTime * 0.25;
  renderer.render(scene, camera);

  // Call tick again on the next frame
  window.requestAnimationFrame(tick);
};

tick();
