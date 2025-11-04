<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Products') }}
            </h2>
            <a href="{{ route('admin.products.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add New Product
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-sm text-gray-600">Total Products</div>
                    <div class="text-2xl font-bold">{{ \App\Models\Product::count() }}</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-sm text-gray-600">Published</div>
                    <div class="text-2xl font-bold text-green-600">{{ \App\Models\Product::where('status', 'published')->count() }}</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-sm text-gray-600">Draft</div>
                    <div class="text-2xl font-bold text-yellow-600">{{ \App\Models\Product::where('status', 'draft')->count() }}</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-sm text-gray-600">Brands</div>
                    <div class="text-2xl font-bold">{{ $brands->count() }}</div>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <form method="GET" action="{{ route('admin.products') }}" id="searchForm" class="flex gap-4">
                        <div class="flex-1">
                            <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search Products</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <input 
                                    type="text" 
                                    name="search" 
                                    id="searchInput" 
                                    value="{{ request('search') }}" 
                                    placeholder="Search by product name or SKU..." 
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    autocomplete="off"
                                >
                            </div>
                        </div>
                        <div class="flex items-end gap-2">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Search
                            </button>
                            <button type="button" id="clearSearch" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition" style="display: {{ request('search') ? 'inline-flex' : 'none' }};">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Clear
                            </button>
                        </div>
                    </form>
                    <div id="searchResults" class="mt-3 text-sm text-gray-600" style="display: {{ request('search') ? 'block' : 'none' }};">
                        Showing results for: <span class="font-semibold" id="searchTerm">"{{ request('search') }}"</span>
                        <span class="ml-2 text-gray-500" id="resultCount">({{ $products->total() }} {{ Str::plural('result', $products->total()) }})</span>
                    </div>
                </div>
            </div>

            <!-- Products Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Brand</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKU</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($products as $product)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $product->name }}</div>
                                            @if($product->featured)
                                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800">
                                                    ⭐ Featured
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->brand }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->sku ?? '-' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            @if($product->price)
                                                ${{ number_format($product->price, 2) }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($product->status === 'published')
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    Published
                                                </span>
                                            @elseif($product->status === 'draft')
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                    Draft
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                    {{ ucfirst($product->status) }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->created_at->format('M d, Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex justify-end space-x-2">
                                                <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                                <form method="POST" action="{{ route('admin.products.delete', $product) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                                            @if(request('search'))
                                                No products found matching "{{ request('search') }}". 
                                                <a href="{{ route('admin.products') }}" class="text-blue-600 hover:text-blue-800">Clear search</a> or 
                                                <a href="{{ route('admin.products.create') }}" class="text-blue-600 hover:text-blue-800">create a new product</a>
                                            @else
                                                No products found. <a href="{{ route('admin.products.create') }}" class="text-blue-600 hover:text-blue-800">Create your first product</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let searchTimeout = null;
        const searchInput = document.getElementById('searchInput');
        const searchForm = document.getElementById('searchForm');
        const clearButton = document.getElementById('clearSearch');
        const searchResults = document.getElementById('searchResults');
        const searchTerm = document.getElementById('searchTerm');
        const resultCount = document.getElementById('resultCount');
        const tableBody = document.querySelector('tbody');
        const allRows = Array.from(tableBody.querySelectorAll('tr'));

        // Live search as user types
        searchInput.addEventListener('input', function(e) {
            const query = e.target.value.trim().toLowerCase();
            
            // Clear previous timeout
            if (searchTimeout) {
                clearTimeout(searchTimeout);
            }
            
            // Show/hide clear button
            if (query.length > 0) {
                clearButton.style.display = 'inline-flex';
            } else {
                clearButton.style.display = 'none';
            }
            
            // Debounce search - wait 300ms after user stops typing
            searchTimeout = setTimeout(() => {
                performSearch(query);
            }, 300);
        });

        // Search on form submit
        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const query = searchInput.value.trim().toLowerCase();
            performSearch(query);
        });

        // Clear search
        clearButton.addEventListener('click', function() {
            searchInput.value = '';
            clearButton.style.display = 'none';
            searchResults.style.display = 'none';
            showAllRows();
        });

        // Perform client-side search
        function performSearch(query) {
            if (query.length === 0) {
                showAllRows();
                searchResults.style.display = 'none';
                return;
            }

            let visibleCount = 0;
            
            allRows.forEach(row => {
                // Skip empty state rows
                if (row.cells.length === 1) {
                    row.style.display = 'none';
                    return;
                }
                
                // Get product name (column 1) and SKU (column 3)
                const name = row.cells[1]?.textContent.toLowerCase() || '';
                const sku = row.cells[3]?.textContent.toLowerCase() || '';
                
                // Check if query matches name or SKU
                if (name.includes(query) || sku.includes(query)) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            // Update search info
            searchResults.style.display = 'block';
            searchTerm.textContent = `"${searchInput.value.trim()}"`;
            const pluralResult = visibleCount === 1 ? 'result' : 'results';
            resultCount.textContent = `(${visibleCount} ${pluralResult})`;

            // Show "no results" message if needed
            if (visibleCount === 0) {
                showNoResults(searchInput.value.trim());
            }
        }

        // Show all rows
        function showAllRows() {
            allRows.forEach(row => {
                row.style.display = '';
            });
        }

        // Show no results message
        function showNoResults(query) {
            // Hide all product rows
            allRows.forEach(row => {
                if (row.cells.length > 1) {
                    row.style.display = 'none';
                }
            });
            
            // Find or create the "no results" row
            let noResultsRow = tableBody.querySelector('.no-results-row');
            if (!noResultsRow) {
                noResultsRow = document.createElement('tr');
                noResultsRow.className = 'no-results-row';
                tableBody.appendChild(noResultsRow);
            }
            
            noResultsRow.innerHTML = `
                <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                    No products found matching "${query}". 
                    <a href="#" onclick="document.getElementById('clearSearch').click(); return false;" class="text-blue-600 hover:text-blue-800">Clear search</a> or 
                    <a href="{{ route('admin.products.create') }}" class="text-blue-600 hover:text-blue-800">create a new product</a>
                </td>
            `;
            noResultsRow.style.display = '';
        }
    </script>
</x-app-layout>
