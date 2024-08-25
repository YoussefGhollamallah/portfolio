        // Animation de l'arrière-plan avec Three.js (identique au code précédent)
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer();
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.getElementById('background').appendChild(renderer.domElement);

        const geometry = new THREE.BufferGeometry();
        const vertices = [];

        for (let i = 0; i < 10000; i++) {
            vertices.push((Math.random() - 0.5) * 1000);
            vertices.push((Math.random() - 0.5) * 1000);
            vertices.push((Math.random() - 0.5) * 1000);
        }

        geometry.setAttribute('position', new THREE.Float32BufferAttribute(vertices, 3));

        const material = new THREE.PointsMaterial({ color: 0x00ffff });
        const points = new THREE.Points(geometry, material);
        scene.add(points);

        camera.position.z = 400;

        document.addEventListener('mousemove', onMouseMove, false);

        let mouseX = 0, mouseY = 0;

        function onMouseMove(event) {
            mouseX = (event.clientX - window.innerWidth / 2) / 5;
            mouseY = (event.clientY - window.innerHeight / 2) / 5;
        }

        function animate() {
            requestAnimationFrame(animate);
            camera.position.x += (mouseX - camera.position.x) * 0.05;
            camera.position.y += (-mouseY - camera.position.y) * 0.05;
            camera.lookAt(scene.position);
            renderer.render(scene, camera);
        }

        animate();

        window.addEventListener('resize', function() {
            const width = window.innerWidth;
            const height = window.innerHeight;
            renderer.setSize(width, height);
            camera.aspect = width / height;
            camera.updateProjectionMatrix();
        });

        // Animation du texte dynamique
        const words = ["Ghollamallah Youssef", "Développeur Fullstack", "Développeur Frontend", "Développeur Backend"];
        let wordIndex = 0;
        let letterIndex = 0;
        const dynamicTextElement = document.getElementById("dynamicText");

        function typeWord() {
            const currentWord = words[wordIndex];
            dynamicTextElement.textContent = currentWord.substring(0, letterIndex + 1);
            letterIndex++;

            if (letterIndex === currentWord.length) {
                setTimeout(eraseWord, 2000); // Attend 2 secondes avant d'effacer le mot
            } else {
                setTimeout(typeWord, 100);
            }
        }

        function eraseWord() {
            const currentWord = words[wordIndex];
            dynamicTextElement.textContent = currentWord.substring(0, letterIndex - 1);
            letterIndex--;

            if (letterIndex === 0) {
                wordIndex = (wordIndex + 1) % words.length;
                setTimeout(typeWord, 500); // Attend 0.5 secondes avant de taper le mot suivant
            } else {
                setTimeout(eraseWord, 50);
            }
        }

        typeWord(); // Démarrer l'animation