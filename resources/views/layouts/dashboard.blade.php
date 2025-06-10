<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Dashboard - ETamu')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"
      rel="stylesheet"
    />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    @stack('styles')
  </head>
  <body class="bg-gray-50 dark:bg-gray-900 dark:text-gray-200">
    <button
      data-drawer-target="separator-sidebar"
      data-drawer-toggle="separator-sidebar"
      aria-controls="separator-sidebar"
      type="button"
      class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-800 dark:focus:ring-gray-700 transition-all"
    >
      <span class="sr-only">Open sidebar</span>
      <svg
        class="w-6 h-6"
        aria-hidden="true"
        fill="currentColor"
        viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          clip-rule="evenodd"
          fill-rule="evenodd"
          d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
        ></path>
      </svg>
    </button>

    <aside
      id="separator-sidebar"
      class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-gray-200 dark:bg-gray-900"
      aria-label="Sidebar"
    >
      <div class="h-full px-3 py-4 overflow-y-auto">
        <ul class="space-y-4">
          <li>
            <img
              class="w-3/4 mx-auto mb-6"
              src="{{ asset('assets/img/logo-diskominfo.png') }}"
              alt="logo"
            />
          </li>

          <li>
            <button
              id="theme-toggle"
              class="flex items-center w-full p-2 rounded-lg text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700 transition-all"
            >
              <i id="theme-icon" class="fas fa-moon w-5 h-5"></i>
              <span class="ml-3">Dark Mode</span>
            </button>
          </li>

          <li>
            <a
              href="{{ route('dashboard.index') }}"
              class="flex items-center p-3 rounded-lg bg-gray-200 hover:bg-teal-500 dark:bg-gray-900 dark:hover:bg-teal-600 transition-all"
            >
              <svg
                class="w-6 h-6 text-gray-500 dark:text-gray-400"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 22 21"
              >
                <path
                  d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"
                />
                <path
                  d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"
                />
              </svg>
              <span class="ml-4">Dashboard</span>
            </a>
          </li>

          <li>
            <button
              type="button"
              class="flex items-center p-3 w-full text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700 transition-all"
              aria-controls="dropdown-master"
              data-collapse-toggle="dropdown-master"
            >
              <i class="fa-solid fa-database"></i>
              <span class="ml-3">Master Data</span>
              <svg
                class="w-4 h-4 ml-auto"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M19 9l-7 7-7-7"
                />
              </svg>
            </button>
            <ul id="dropdown-master" class="hidden py-2 space-y-2">
              <li>
                <a
                  href="#"
                  class="flex items-center p-3 rounded-lg pl-12 bg-gray-200 dark:bg-gray-900 hover:bg-teal-500 dark:hover:bg-teal-600 transition-all"
                  >Managment User</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="flex items-center p-3 rounded-lg pl-12 bg-gray-200 dark:bg-gray-900 hover:bg-teal-500 dark:hover:bg-teal-600 transition-all"
                  >Perangkat Daerah</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="flex items-center p-3 rounded-lg pl-12 bg-gray-200 dark:bg-gray-900 hover:bg-teal-500 dark:hover:bg-teal-600 transition-all"
                  >Kategori Tamu</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="flex items-center p-3 rounded-lg pl-12 bg-gray-200 dark:bg-gray-900 hover:bg-teal-500 dark:hover:bg-teal-600 transition-all"
                  >Keperluan Tamu</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="flex items-center p-3 rounded-lg pl-12 bg-gray-200 dark:bg-gray-900 hover:bg-teal-500 dark:hover:bg-teal-600 transition-all"
                  >Tujuan Bidang</a
                >
              </li>
            </ul>
          </li>

          <li>
            <button
              type="button"
              class="flex items-center p-3 w-full text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700 transition-all"
              aria-controls="dropdown-operator"
              data-collapse-toggle="dropdown-operator"
            >
              <i class="fa-solid fa-database"></i>
              <span class="ml-3">Menu Operator</span>
              <svg
                class="w-4 h-4 ml-auto"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M19 9l-7 7-7-7"
                />
              </svg>
            </button>
            <ul id="dropdown-operator" class="hidden py-2 space-y-2">
              <li>
                <a
                  href="#"
                  class="flex items-center p-3 rounded-lg pl-12 bg-gray-200 dark:bg-gray-900 hover:bg-teal-500 dark:hover:bg-teal-600 transition-all"
                  >Data Questioner</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="flex items-center p-3 rounded-lg pl-12 bg-gray-200 dark:bg-gray-900 hover:bg-teal-500 dark:hover:bg-teal-600 transition-all"
                  >Data Tamu</a
                >
              </li>
            </ul>
          </li>

          <!-- Logout -->
          <li>
            <form action="{{ route('dashboard.index') }}" method="POST">
                @csrf
                <button type="submit"
                    class="flex items-center p-3 w-full rounded-lg bg-gray-200 hover:bg-red-500 dark:bg-gray-900 dark:hover:bg-red-600 transition-all">
                    <i class="fas fa-sign-out-alt w-5 h-5 text-gray-500 dark:text-gray-400"></i>
                    <span class="ml-4">Log Out</span>
                </button>
            </form>
          </li>
        </ul>
      </div>
    </aside>

    <div class="p-6 sm:ml-64 h-screen bg-gray-100 dark:bg-gray-800">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
      const themeToggle = document.getElementById("theme-toggle");
      const themeIcon = document.getElementById("theme-icon");

      const currentTheme = localStorage.getItem("theme");
      if (currentTheme === 'dark' || (!currentTheme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
          document.documentElement.classList.add('dark');
          themeIcon.classList.remove('fa-moon');
          themeIcon.classList.add('fa-sun');
      } else {
          document.documentElement.classList.remove('dark');
          themeIcon.classList.remove('fa-sun');
          themeIcon.classList.add('fa-moon');
      }

      themeToggle.addEventListener("click", () => {
        const isDark = document.documentElement.classList.toggle("dark");
        localStorage.setItem("theme", isDark ? "dark" : "light");
        themeIcon.classList.toggle("fa-sun", isDark);
        themeIcon.classList.toggle("fa-moon", !isDark);
      });
    </script>
    @stack('scripts')
  </body>
</html>
