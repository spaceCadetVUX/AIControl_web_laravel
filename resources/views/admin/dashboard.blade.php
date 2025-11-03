<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col space-y-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Dashboard') }}
            </h2>
            
            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow-sm p-4">
                <h3 class="text-sm font-semibold text-gray-700 mb-3">Quick Actions</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3">
                    <a href="{{ route('admin.pages') }}" class="flex items-center justify-center px-3 py-2 border border-gray-300 rounded-md shadow-sm text-xs font-medium text-gray-700 bg-white hover:bg-gray-50 transition">
                        <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Manage Pages
                    </a>
                    <a href="{{ route('admin.users') }}" class="flex items-center justify-center px-3 py-2 border border-gray-300 rounded-md shadow-sm text-xs font-medium text-gray-700 bg-white hover:bg-gray-50 transition">
                        <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        Manage Users
                    </a>
                    <a href="{{ route('admin.products') }}" class="flex items-center justify-center px-3 py-2 border border-gray-300 rounded-md shadow-sm text-xs font-medium text-gray-700 bg-white hover:bg-gray-50 transition">
                        <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        Manage Products
                    </a>
                    <a href="{{ route('admin.brands') }}" class="flex items-center justify-center px-3 py-2 border border-gray-300 rounded-md shadow-sm text-xs font-medium text-gray-700 bg-white hover:bg-gray-50 transition">
                        <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        Manage Brands
                    </a>
                    <a href="{{ route('profile.edit') }}" class="flex items-center justify-center px-3 py-2 border border-gray-300 rounded-md shadow-sm text-xs font-medium text-gray-700 bg-white hover:bg-gray-50 transition">
                        <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Edit Profile
                    </a>
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center justify-center px-3 py-2 border border-gray-300 rounded-md shadow-sm text-xs font-medium text-gray-700 bg-white hover:bg-gray-50 transition">
                        <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                        View Website
                    </a>
                </div>
                <div class="mt-3">
                    <form method="POST" action="{{ route('logout') }}" class="inline w-full">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center px-3 py-2 border border-red-300 rounded-md shadow-sm text-xs font-medium text-red-700 bg-white hover:bg-red-50 transition">
                            <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Message -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-2">Welcome to Admin Dashboard</h3>
                    <p class="text-gray-600">
                        Logged in as: <strong>{{ Auth::user()->name }}</strong> ({{ Auth::user()->email }})
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 ml-2">
                            {{ ucfirst(Auth::user()->role) }}
                        </span>
                    </p>
                    <p class="text-sm text-gray-500 mt-1">
                        Last login: {{ Auth::user()->updated_at->format('M d, Y H:i') }}
                    </p>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Card 1 -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-sm font-medium text-gray-500">Total Pages</h4>
                                <p class="text-2xl font-semibold text-gray-900">9</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-sm font-medium text-gray-500">Active Users</h4>
                                <p class="text-2xl font-semibold text-gray-900">{{ \App\Models\User::active()->count() }}</p>
                                <p class="text-xs text-gray-400">{{ \App\Models\User::admins()->count() }} admins</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-sm font-medium text-gray-500">Products</h4>
                                <p class="text-2xl font-semibold text-gray-900">{{ $totalProducts ?? 4 }}</p>
                                <p class="text-xs text-gray-400">{{ $publishedProducts ?? 0 }} published</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Analytics Chart -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <!-- Click Statistics Chart -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                                <svg class="h-5 w-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                                Top 10 Products by Clicks
                            </h3>
                            <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded">Sorted by Clicks ↓</span>
                        </div>
                        <div style="position: relative; height: 350px; width: 100%; overflow-x: auto; overflow-y: hidden;">
                            <div style="min-width: 600px;">
                                <canvas id="clickChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- View Statistics Chart -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                                <svg class="h-5 w-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                Top 10 Products by Views
                            </h3>
                            <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded">Sorted by Views ↓</span>
                        </div>
                        <div style="position: relative; height: 350px; width: 100%; overflow-x: auto; overflow-y: hidden;">
                            <div style="min-width: 600px;">
                                <canvas id="viewChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Statistics Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                            <svg class="h-5 w-5 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            Product Performance Summary
                        </h3>
                        <div class="flex items-center space-x-2">
                            <label class="text-sm font-medium text-gray-700">Sort by:</label>
                            <select id="sortFilter" onchange="sortTable()" class="block w-64 rounded-lg border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 text-sm py-2 pl-3 pr-10 bg-white hover:bg-gray-50 transition-colors cursor-pointer">
                                <option value="clicks-desc">Clicks (High to Low)</option>
                                <option value="clicks-asc">Clicks (Low to High)</option>
                                <option value="views-desc">Views (High to Low)</option>
                                <option value="views-asc">Views (Low to High)</option>
                                <option value="engagement-desc">Engagement (High to Low)</option>
                                <option value="engagement-asc">Engagement (Low to High)</option>
                                <option value="name-asc">Name (A to Z)</option>
                                <option value="name-desc">Name (Z to A)</option>
                                <option value="brand-asc">Brand (A to Z)</option>
                                <option value="brand-desc">Brand (Z to A)</option>
                            </select>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table id="performanceTable" class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100 transition-colors" onclick="toggleSort('name')">
                                        <div class="flex items-center">
                                            Product Name
                                            <svg class="h-4 w-4 ml-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                            </svg>
                                        </div>
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100 transition-colors" onclick="toggleSort('brand')">
                                        <div class="flex items-center">
                                            Brand
                                            <svg class="h-4 w-4 ml-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                            </svg>
                                        </div>
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100 transition-colors" onclick="toggleSort('clicks')">
                                        <div class="flex items-center">
                                            Clicks
                                            <svg class="h-4 w-4 ml-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                            </svg>
                                        </div>
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100 transition-colors" onclick="toggleSort('views')">
                                        <div class="flex items-center">
                                            Views
                                            <svg class="h-4 w-4 ml-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                            </svg>
                                        </div>
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100 transition-colors" onclick="toggleSort('engagement')">
                                        <div class="flex items-center">
                                            Engagement
                                            <svg class="h-4 w-4 ml-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                            </svg>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tableBody" class="bg-white divide-y divide-gray-200">
                                @forelse($topClickedProducts ?? [] as $index => $product)
                                @php
                                    $views = $product->view_count ?? 0;
                                    $clicks = $product->click_count ?? 0;
                                    $engagement = $views > 0 ? round(($clicks / $views) * 100, 1) : 0;
                                @endphp
                                <tr class="hover:bg-gray-50" 
                                    data-name="{{ $product->name }}" 
                                    data-brand="{{ $product->brand ?? 'N/A' }}" 
                                    data-clicks="{{ $clicks }}" 
                                    data-views="{{ $views }}" 
                                    data-engagement="{{ $engagement }}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 row-number">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $product->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->brand ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ number_format($clicks) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            {{ number_format($views) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="flex items-center">
                                            <div class="w-16 bg-gray-200 rounded-full h-2 mr-2">
                                                <div class="bg-purple-600 h-2 rounded-full" style="width: {{ min($engagement, 100) }}%"></div>
                                            </div>
                                            <span class="text-xs">{{ $engagement }}%</span>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">No product data available</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        // Prepare data from Laravel - Top 10 by Clicks
        const productClickStats = @json($productClickStats ?? []);
        const clickProductNames = productClickStats.slice(0, 10).map(p => {
            const name = p.name || 'Unknown';
            return name.length > 15 ? name.substring(0, 15) + '...' : name;
        });
        const clickCounts = productClickStats.slice(0, 10).map(p => p.click_count || 0);

        // Prepare data from Laravel - Top 10 by Views
        const productViewStats = @json($productViewStats ?? []);
        const viewProductNames = productViewStats.slice(0, 10).map(p => {
            const name = p.name || 'Unknown';
            return name.length > 15 ? name.substring(0, 15) + '...' : name;
        });
        const viewCounts = productViewStats.slice(0, 10).map(p => p.view_count || 0);

        // Click Chart
        const clickCtx = document.getElementById('clickChart');
        if (clickCtx) {
            new Chart(clickCtx, {
                type: 'bar',
                data: {
                    labels: clickProductNames,
                    datasets: [{
                        label: 'Clicks',
                        data: clickCounts,
                        backgroundColor: 'rgba(59, 130, 246, 0.8)',
                        borderColor: 'rgba(59, 130, 246, 1)',
                        borderWidth: 1,
                        borderRadius: 5,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    aspectRatio: 2.5,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return 'Clicks: ' + context.parsed.y.toLocaleString();
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return value.toLocaleString();
                                }
                            }
                        },
                        x: {
                            ticks: {
                                maxRotation: 45,
                                minRotation: 45,
                                font: {
                                    size: 10
                                }
                            }
                        }
                    }
                }
            });
        }

        // View Chart
        const viewCtx = document.getElementById('viewChart');
        if (viewCtx) {
            new Chart(viewCtx, {
                type: 'bar',
                data: {
                    labels: viewProductNames,
                    datasets: [{
                        label: 'Views',
                        data: viewCounts,
                        backgroundColor: 'rgba(34, 197, 94, 0.8)',
                        borderColor: 'rgba(34, 197, 94, 1)',
                        borderWidth: 1,
                        borderRadius: 5,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    aspectRatio: 2.5,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return 'Views: ' + context.parsed.y.toLocaleString();
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return value.toLocaleString();
                                }
                            }
                        },
                        x: {
                            ticks: {
                                maxRotation: 45,
                                minRotation: 45,
                                font: {
                                    size: 10
                                }
                            }
                        }
                    }
                }
            });
        }
    </script>

    <!-- Table Sorting Script -->
    <script>
        function sortTable() {
            const select = document.getElementById('sortFilter');
            const sortValue = select.value;
            const [column, order] = sortValue.split('-');
            sortTableBy(column, order);
        }

        function toggleSort(column) {
            const select = document.getElementById('sortFilter');
            const currentValue = select.value;
            const [currentColumn, currentOrder] = currentValue.split('-');
            
            // If clicking the same column, toggle the order
            let newOrder = 'desc';
            if (currentColumn === column && currentOrder === 'desc') {
                newOrder = 'asc';
            }
            
            // Update dropdown to match
            select.value = `${column}-${newOrder}`;
            
            // Sort the table
            sortTableBy(column, newOrder);
        }

        function sortTableBy(column, order = 'desc') {
            const tbody = document.getElementById('tableBody');
            const rows = Array.from(tbody.querySelectorAll('tr'));

            rows.sort((a, b) => {
                let aValue, bValue;

                switch(column) {
                    case 'name':
                    case 'brand':
                        aValue = a.dataset[column].toLowerCase();
                        bValue = b.dataset[column].toLowerCase();
                        const textCompare = aValue.localeCompare(bValue);
                        return order === 'asc' ? textCompare : -textCompare;
                    
                    case 'clicks':
                    case 'views':
                    case 'engagement':
                        aValue = parseFloat(a.dataset[column]) || 0;
                        bValue = parseFloat(b.dataset[column]) || 0;
                        return order === 'asc' ? aValue - bValue : bValue - aValue;
                    
                    default:
                        return 0;
                }
            });

            // Clear tbody and re-append sorted rows
            tbody.innerHTML = '';
            rows.forEach((row, index) => {
                // Update row number
                row.querySelector('.row-number').textContent = index + 1;
                tbody.appendChild(row);
            });

            // Update select dropdown to match
            const select = document.getElementById('sortFilter');
            const expectedValue = `${column}-${order}`;
            if (select.value !== expectedValue) {
                select.value = expectedValue;
            }
        }

        // Initialize default sort
        document.addEventListener('DOMContentLoaded', function() {
            sortTableBy('clicks', 'desc');
        });
    </script>
</x-app-layout>
