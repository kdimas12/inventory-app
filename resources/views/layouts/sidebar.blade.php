<aside
  class="fixed left-0 top-0 z-40 h-screen w-64 -translate-x-full border-r border-gray-200 bg-white pt-14 transition-transform md:translate-x-0"
  aria-label="Sidenav"
  id="drawer-navigation"
>
  <div class="h-full overflow-y-auto bg-white px-3 py-5">
    {{-- Menu Utama - Semua Role --}}
    <ul class="mb-4 space-y-2">
      <h3 class="px-2 text-sm font-medium text-gray-500">Menu Utama</h3>
      <li>
        <a
          href="{{ route("dashboard.index") }}"
          class="{{ Request::is("dashboard") ? "bg-gray-100" : "" }} group flex items-center rounded-lg p-2 text-base text-gray-900 hover:bg-gray-100"
        >
          <svg
            class="h-6 w-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
            fill="currentColor"
            viewBox="0 0 20 20"
          >
            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
          </svg>
          <span class="ml-3">Dashboard</span>
        </a>
      </li>

      {{-- Menu Staff --}}
      @if (auth()->user()->isStaff())
        <li>
          <a
            href="{{ route("sales.index") }}"
            class="{{ Request::is("penjualan*") ? "bg-gray-100" : "" }} group flex items-center rounded-lg p-2 text-base text-gray-900 hover:bg-gray-100"
          >
            <svg
              class="h-6 w-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
              fill="none"
              viewBox="0 0 24 24"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2M12 4v12m0-12 4 4m-4-4L8 8"
              />
            </svg>
            <span class="ml-3">Penjualan</span>
          </a>
        </li>
        <li>
          <a
            href="{{ route("inventory.index") }}"
            class="{{ Request::is("inventori*") ? "bg-gray-100" : "" }} group flex items-center rounded-lg p-2 text-base text-gray-900 hover:bg-gray-100"
          >
            <svg
              class="h-6 w-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
              fill="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z"
              />
            </svg>
            <span class="ml-3">Stok Barang</span>
          </a>
        </li>
      @endif

      {{-- Menu Admin --}}
      @if (auth()->user()->isAdmin() ||auth()->user()->isOwner())
        {{-- Master Data --}}
        <h3 class="mt-4 px-2 text-sm font-medium text-gray-500">Master Data</h3>
        <li>
          <a
            href="{{ route("supplier.index") }}"
            class="{{ Request::is("supplier*") ? "bg-gray-100" : "" }} group flex items-center rounded-lg p-2 text-base text-gray-900 transition duration-75 hover:bg-gray-100"
          >
            <svg
              class="h-6 w-6 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              fill="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                fill-rule="evenodd"
                d="M4 4a2 2 0 0 0-2 2v9a1 1 0 0 0 1 1h.535a3.5 3.5 0 1 0 6.93 0h3.07a3.5 3.5 0 1 0 6.93 0H21a1 1 0 0 0 1-1v-4a.999.999 0 0 0-.106-.447l-2-4A1 1 0 0 0 19 6h-5a2 2 0 0 0-2-2H4Zm14.192 11.59.016.02a1.5 1.5 0 1 1-.016-.021Zm-10 0 .016.02a1.5 1.5 0 1 1-.016-.021Zm5.806-5.572v-2.02h4.396l1 2.02h-5.396Z"
                clip-rule="evenodd"
              />
            </svg>
            <span class="ml-3">Supplier</span>
          </a>
        </li>
        <li>
          <button
            type="button"
            class="group flex w-full items-center rounded-lg p-2 text-base text-gray-900 transition duration-75 hover:bg-gray-100"
            aria-controls="dropdown-product"
            data-collapse-toggle="dropdown-product"
          >
            <svg
              class="h-6 w-6 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              fill="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                fill-rule="evenodd"
                d="M5.024 3.783A1 1 0 0 1 6 3h12a1 1 0 0 1 .976.783L20.802 12h-4.244a1.99 1.99 0 0 0-1.824 1.205 2.978 2.978 0 0 1-5.468 0A1.991 1.991 0 0 0 7.442 12H3.198l1.826-8.217ZM3 14v5a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5h-4.43a4.978 4.978 0 0 1-9.14 0H3Zm5-7a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm0 2a1 1 0 0 0 0 2h8a1 1 0 1 0 0-2H8Z"
                clip-rule="evenodd"
              />
            </svg>

            <span class="ml-3 flex-1 whitespace-nowrap text-left">Barang</span>
            <svg
              aria-hidden="true"
              class="h-6 w-6 transform transition-transform duration-300"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </button>
          <ul
            id="dropdown-product"
            class="{{ Route::is("category*") || Route::is("product*") ? "block" : "hidden" }} space-y-2 py-2"
          >
            <li>
              <a
                href="{{ route("category.index") }}"
                class="{{ Route::is("category*") ? "bg-gray-100" : "" }} group flex w-full items-center rounded-lg p-2 pl-11 text-base text-gray-900 transition duration-75 hover:bg-gray-100"
              >
                Kategori
              </a>
            </li>
            <li>
              <a
                href="{{ route("product.index") }}"
                class="{{ Route::is("product*") ? "bg-gray-100" : "" }} group flex w-full items-center rounded-lg p-2 pl-11 text-base text-gray-900 transition duration-75 hover:bg-gray-100"
              >
                Daftar Barang
              </a>
            </li>
          </ul>
        </li>

        {{-- Transaksi --}}
        <h3 class="mt-4 px-2 text-sm font-medium text-gray-500">Transaksi</h3>
        <li>
          <a
            href="{{ route("purchase.index") }}"
            class="{{ Request::is("pembelian*") ? "bg-gray-100" : "" }} group flex items-center rounded-lg p-2 text-base text-gray-900 hover:bg-gray-100"
          >
            <svg
              class="h-6 w-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
              fill="none"
              viewBox="0 0 24 24"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2m-8 1V4m0 12-4-4m4 4 4-4"
              />
            </svg>
            <span class="ml-3">Pembelian</span>
          </a>
        </li>
        <li>
          <a
            href="{{ route("sales.index") }}"
            class="{{ Request::is("penjualan*") ? "bg-gray-100" : "" }} group flex items-center rounded-lg p-2 text-base text-gray-900 hover:bg-gray-100"
          >
            <svg
              class="h-6 w-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
              fill="none"
              viewBox="0 0 24 24"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2M12 4v12m0-12 4 4m-4-4L8 8"
              />
            </svg>
            <span class="ml-3">Penjualan</span>
          </a>
        </li>
        <h3 class="mt-4 px-2 text-sm font-medium text-gray-500">Laporan</h3>
        <li>
          <a
            href="{{ route("inventory.index") }}"
            class="{{ Request::is("inventori*") ? "bg-gray-100" : "" }} group flex items-center rounded-lg p-2 text-base text-gray-900 hover:bg-gray-100"
          >
            <svg
              class="h-6 w-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
              fill="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z"
              />
            </svg>
            <span class="ml-3">Inventori</span>
          </a>
        </li>
        <li>
          <a
            href="{{ route("stock-mutation.index") }}"
            class="{{ Request::is("mutasi-stok*") ? "bg-gray-100" : "" }} group flex items-center rounded-lg p-2 text-base text-gray-900 transition duration-75 hover:bg-gray-100"
          >
            <svg
              class="h-6 w-6 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              fill="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                fill-rule="evenodd"
                d="M9.166 19.986A.915.915 0 0 1 9 20H5a1 1 0 1 1 0-2h4c.057 0 .112.005.166.014a3.001 3.001 0 0 1 5.668 0A.915.915 0 0 1 15 18h4a1 1 0 1 1 0 2h-4c-.056 0-.112-.005-.166-.014a3.001 3.001 0 0 1-5.668 0ZM11 19a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"
                clip-rule="evenodd"
              />
              <path
                d="M11.5 2.131a1 1 0 0 1 1 0l4.601 2.657c-.06.018-.12.044-.179.075L12.08 7.475 6.946 4.76 11.5 2.131ZM5.967 6.505v5.21a1 1 0 0 0 .5.866l4.57 2.638V9.186l-5.07-2.681Zm7.07 8.671 4.496-2.595a1 1 0 0 0 .5-.866v-5.2a1 1 0 0 1-.161.108l-4.835 2.608v5.945Z"
              />
            </svg>
            <span class="ml-3">Mutasi Stok</span>
          </a>
        </li>
      @endif

      @if (auth()->user()->isOwner())
        <h3 class="mt-4 px-2 text-sm font-medium text-gray-500">Pengaturan</h3>
        <li>
          <a
            href="{{ route("user.index") }}"
            class="{{ Request::is("pengguna*") ? "bg-gray-100" : "" }} group flex items-center rounded-lg p-2 text-base text-gray-900 hover:bg-gray-100"
          >
            <svg
              class="h-6 w-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              fill="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                fill-rule="evenodd"
                d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                clip-rule="evenodd"
              />
            </svg>
            <span class="ml-3">Pengguna</span>
          </a>
        </li>
      @endif
    </ul>
  </div>

  {{-- Footer --}}
  {{--
    <div class="hidden absolute bottom-0 left-0 justify-center p-4 space-x-4 w-full lg:flex bg-white z-20">
    <button type="button" class="flex items-center text-sm p-2 text-gray-500 rounded hover:text-gray-900">
    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
    <path
    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" />
    </svg>
    <span class="ml-1">Pengaturan</span>
    </button>
    <button type="button" class="flex items-center text-sm p-2 text-gray-500 rounded hover:text-gray-900">
    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
    <path
    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v5a1 1 0 1 0 2 0V8Zm-1 7a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H12Z" />
    </svg>
    <span class="ml-1">Bantuan</span>
    </button>
    </div>
  --}}
</aside>
