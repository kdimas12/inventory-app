<nav
  class="fixed left-0 right-0 top-0 z-50 border-b border-gray-200 bg-white px-4 py-2.5 dark:border-gray-700 dark:bg-gray-800"
>
  <div class="flex items-center justify-between">
    <div class="flex items-center justify-start">
      <button
        data-drawer-target="drawer-navigation"
        data-drawer-toggle="drawer-navigation"
        aria-controls="drawer-navigation"
        class="mr-2 cursor-pointer rounded-lg p-2 text-gray-600 hover:bg-gray-100 hover:text-gray-900 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:bg-gray-700 dark:focus:ring-gray-700 md:hidden"
      >
        <svg
          aria-hidden="true"
          class="h-6 w-6"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
            clip-rule="evenodd"
          ></path>
        </svg>
        <svg
          aria-hidden="true"
          class="hidden h-6 w-6"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clip-rule="evenodd"
          ></path>
        </svg>
        <span class="sr-only">Toggle sidebar</span>
      </button>
      <a
        href="https://flowbite.com"
        class="mr-4 flex items-center justify-between text-gray-700 dark:text-white"
      >
        <svg
          class="mr-2 h-6 w-6"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          fill="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            fill-rule="evenodd"
            d="M14 7h-4v3a1 1 0 0 1-2 0V7H6a1 1 0 0 0-.997.923l-.917 11.924A2 2 0 0 0 6.08 22h11.84a2 2 0 0 0 1.994-2.153l-.917-11.924A1 1 0 0 0 18 7h-2v3a1 1 0 1 1-2 0V7Zm-2-3a2 2 0 0 0-2 2v1H8V6a4 4 0 0 1 8 0v1h-2V6a2 2 0 0 0-2-2Z"
            clip-rule="evenodd"
          />
        </svg>
        <span class="self-center whitespace-nowrap text-2xl font-bold">
          {{ config("app.name") }}
        </span>
      </a>
    </div>
    <div class="flex items-center lg:order-2">
      {{-- profile --}}
      <button
        type="button"
        class="mx-3 flex rounded-full bg-gray-800 text-sm focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 md:mr-0"
        id="user-menu-button"
        aria-expanded="false"
        data-dropdown-toggle="profile-dropdown"
      >
        <span class="sr-only">Open user menu</span>
        <img
          class="h-8 w-8 rounded-full"
          src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gough.png"
          alt="user photo"
        />
      </button>
      <!-- Dropdown menu -->
      <div
        class="z-50 my-4 hidden w-56 list-none divide-y divide-gray-100 rounded rounded-xl bg-white text-base shadow dark:divide-gray-600 dark:bg-gray-700"
        id="profile-dropdown"
      >
        <div class="px-4 py-3">
          <span
            class="block text-sm font-semibold text-gray-900 dark:text-white"
          >
            {{ auth()->user()->name }}
          </span>
          <span class="block truncate text-sm text-gray-900 dark:text-white">
            {{ auth()->user()->role }}
          </span>
        </div>
        <ul
          class="py-1 text-gray-700 dark:text-gray-300"
          aria-labelledby="profile-dropdown"
        >
          <li>
            <a
              href="#"
              class="block px-4 py-2 text-sm hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
            >
              Profil Saya
            </a>
          </li>
          <li>
            <a
              href="#"
              class="block px-4 py-2 text-sm hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
            >
              Pengaturan Akun
            </a>
          </li>
        </ul>
        <ul
          class="py-1 text-gray-700 dark:text-gray-300"
          aria-labelledby="profile-dropdown"
        >
          <li>
            <a
              href="{{ route("logout") }}"
              class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
            >
              Keluar
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
