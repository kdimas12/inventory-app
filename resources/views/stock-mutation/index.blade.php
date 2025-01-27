@extends("layouts.app")

@section("content")
  <!-- Breadcrumb -->
  <nav
    class="mb-5 justify-between rounded-lg border border-gray-200 bg-white px-4 py-3 text-gray-700 sm:flex sm:px-5"
    aria-label="Breadcrumb"
  >
    <ol
      class="mb-3 inline-flex items-center space-x-1 sm:mb-0 md:space-x-2 rtl:space-x-reverse"
    >
      <li>
        <div class="flex items-center">
          <a
            href="{{ route("dashboard.index") }}"
            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white md:ms-2"
          >
            Dashboard
          </a>
        </div>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg
            class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 6 10"
          >
            <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="m1 9 4-4-4-4"
            />
          </svg>
          <span
            class="mx-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:mx-2"
          >
            Mutasi Stok
          </span>
        </div>
      </li>
    </ol>
  </nav>

  <div class="rounded-lg border border-gray-200 bg-white p-3">
    <table id="stock-mutation-table">
      <thead>
        <tr>
          <th>
            <span class="flex items-center">
              Nomor Batch
              <svg
                class="ms-1 h-4 w-4"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m8 15 4 4 4-4m0-6-4-4-4 4"
                />
              </svg>
            </span>
          </th>
          <th>
            <span class="flex items-center">
              Nama Barang
              <svg
                class="ms-1 h-4 w-4"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m8 15 4 4 4-4m0-6-4-4-4 4"
                />
              </svg>
            </span>
          </th>
          <th>
            <span class="flex items-center">
              Pengguna
              <svg
                class="ms-1 h-4 w-4"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m8 15 4 4 4-4m0-6-4-4-4 4"
                />
              </svg>
            </span>
          </th>
          <th>
            <span class="flex items-center">
              Kuantitas
              <svg
                class="ms-1 h-4 w-4"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m8 15 4 4 4-4m0-6-4-4-4 4"
                />
              </svg>
            </span>
          </th>
          <th>
            <span class="flex items-center">
              Tanggal
              <svg
                class="ms-1 h-4 w-4"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m8 15 4 4 4-4m0-6-4-4-4 4"
                />
              </svg>
            </span>
          </th>
          <th>
            <span class="flex items-center">
              Deskripsi
              <svg
                class="ms-1 h-4 w-4"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m8 15 4 4 4-4m0-6-4-4-4 4"
                />
              </svg>
            </span>
          </th>
          {{--
            <th>
            <span class="flex items-center">
            Aksi
            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="m8 15 4 4 4-4m0-6-4-4-4 4" />
            </svg>
            </span>
            </th>
          --}}
        </tr>
      </thead>
      <tbody>
        @foreach ($stockMutations as $stockMutation)
          <tr>
            <td class="whitespace-nowrap font-medium text-gray-900">
              {{ $stockMutation->inventory->batch_number }}
            </td>
            <td>{{ $stockMutation->inventory->product->name }}</td>
            <td>{{ $stockMutation->user->name }}</td>
            <td>
              <span
                class="{{ $stockMutation->mutation_type == "masuk" ? "bg-green-100 text-green-800" : "bg-red-100 text-red-800" }} me-2 rounded px-2.5 py-0.5 text-xs font-medium"
              >
                {{ $stockMutation->mutation_type == "masuk" ? "+" : "-" }}{{ $stockMutation->quantity }}
              </span>
            </td>
            <td>{{ $stockMutation->created_at }}</td>
            <td>
              <span
                class="{{ $stockMutation->mutation_type == "masuk" ? "bg-green-100 text-green-800" : "bg-red-100 text-red-800" }} me-2 rounded px-2.5 py-0.5 text-xs font-medium"
              >
                {{ $stockMutation->description }}
              </span>
            </td>
            {{--
              <td>
              <a href="{{ route('stock-mutation.edit', $stockMutation->id) }}"
              class="px-4 py-1 text-sm text-white bg-blue-500 rounded-lg hover:bg-blue-600">Edit</a>
              <a href="{{ route('stock-mutation.destroy', $stockMutation->id) }}"
              class="px-4 py-1 text-sm text-white bg-red-500 rounded-lg hover:bg-red-600"
              data-confirm-delete="true">Delete</a>
              </td>
            --}}
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection

@push("scripts")
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
  <script>
    if (
      document.getElementById('stock-mutation-table') &&
      typeof simpleDatatables.DataTable !== 'undefined'
    ) {
      const dataTable = new simpleDatatables.DataTable(
        '#stock-mutation-table',
        {
          searchable: false,
          perPageSelect: false,
          sortable: false,
        },
      );
    }
  </script>
@endpush
