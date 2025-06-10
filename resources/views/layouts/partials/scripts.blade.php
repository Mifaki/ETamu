<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    var themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");
    var themeToggleLightIcon = document.getElementById("theme-toggle-light-icon");
    var themeToggleBtn = document.getElementById("theme-toggle");

    function setTheme() {
        if (
            localStorage.getItem("color-theme") === "dark" ||
            (!("color-theme" in localStorage) &&
                window.matchMedia("(prefers-color-scheme: dark)").matches)
        ) {
            document.documentElement.classList.add("dark");
            themeToggleLightIcon.classList.remove("hidden");
            themeToggleDarkIcon.classList.add("hidden");
        } else {
            document.documentElement.classList.remove("dark");
            themeToggleLightIcon.classList.add("hidden");
            themeToggleDarkIcon.classList.remove("hidden");
        }
    }

    setTheme();

    themeToggleBtn.addEventListener("click", function () {
        themeToggleDarkIcon.classList.toggle("hidden");
        themeToggleLightIcon.classList.toggle("hidden");

        if (localStorage.getItem("color-theme")) {
            if (localStorage.getItem("color-theme") === "light") {
                document.documentElement.classList.add("dark");
                localStorage.setItem("color-theme", "dark");
            } else {
                document.documentElement.classList.remove("dark");
                localStorage.setItem("color-theme", "light");
            }
        } else {
            if (document.documentElement.classList.contains("dark")) {
                document.documentElement.classList.remove("dark");
                localStorage.setItem("color-theme", "light");
            } else {
                document.documentElement.classList.add("dark");
                localStorage.setItem("color-theme", "dark");
            }
        }
    });
</script>

<script>
    const currentLocation = location.href;
    const navLinks = document.querySelectorAll(".nav-link");

    navLinks.forEach((link) => {
        if (link.href === currentLocation) {
            link.classList.add(
                "text-blue-700",
                "font-bold",
                "md:bg-transparent",
                "md:text-blue-500"
            );
        }
    });
</script>

<script>
    window.addEventListener("scroll", function () {
        const navbar = document.getElementById("navbar");
        if (window.scrollY > 50) {
            navbar.classList.remove("bg-transparent");
            navbar.classList.add("bg-white", "dark:bg-gray-800", "shadow");
        } else {
            navbar.classList.remove("bg-white", "dark:bg-gray-800", "shadow");
            navbar.classList.add("bg-transparent");
        }
    });
</script>

<script>
    AOS.init();
</script>

<script>
    const lottieContainer = document.getElementById("lottie-animation");
    if (lottieContainer) {
        var animation = lottie.loadAnimation({
            container: lottieContainer,
            renderer: "svg",
            loop: true,
            autoplay: true,
            path: "{{ asset('assets/lottie/lottie-jumbotron.json') }}"
        });
    }
</script>
