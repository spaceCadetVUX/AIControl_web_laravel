<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create New Product') }}
            </h2>
            <a href="{{ route('admin.products') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                ← Back to Products
            </a>
        </div>
    </x-slot>

    {{-- TinyMCE Cloud CDN --}}
    <script src="https://cdn.tiny.cloud/1/sgrz0gpyn1159lugws1kjcka6lqmi221jrtqvt85ildm1rki/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Tab Navigation -->
                <div class="bg-white shadow-sm rounded-lg mb-4">
                    <div class="border-b border-gray-200">
                        <nav class="flex -mb-px">
                            <button type="button" onclick="showTab('basic')" id="tab-basic" class="tab-button active border-b-2 border-blue-500 py-4 px-6 text-sm font-medium text-blue-600">
                                Basic Info
                            </button>
                            <button type="button" onclick="showTab('content')" id="tab-content" class="tab-button border-b-2 border-transparent py-4 px-6 text-sm font-medium text-gray-500 hover:text-gray-700">
                                Content & Media
                            </button>
                            <button type="button" onclick="showTab('pricing')" id="tab-pricing" class="tab-button border-b-2 border-transparent py-4 px-6 text-sm font-medium text-gray-500 hover:text-gray-700">
                                Pricing & Inventory
                            </button>
                            <button type="button" onclick="showTab('seo')" id="tab-seo" class="tab-button border-b-2 border-transparent py-4 px-6 text-sm font-medium text-gray-500 hover:text-gray-700">
                                SEO & Meta
                            </button>
                            <button type="button" onclick="showTab('advanced')" id="tab-advanced" class="tab-button border-b-2 border-transparent py-4 px-6 text-sm font-medium text-gray-500 hover:text-gray-700">
                                Advanced
                            </button>
                        </nav>
                    </div>
                </div>

                <!-- Basic Info Tab -->
                <div id="content-basic" class="tab-content bg-white shadow-sm rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Basic Information</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">
                                Product Name * 
                                <span class="text-blue-600 font-normal text-xs">(Auto-generates unique slug)</span>
                            </label>
                            <input type="text" name="name" value="{{ old('name') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <p class="mt-1 text-xs text-gray-500">Product name will be converted to a unique URL-friendly slug</p>
                            @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                SKU
                                <span class="text-yellow-600 font-normal text-xs">⚠️ Must be unique</span>
                            </label>
                            <input type="text" name="sku" value="{{ old('sku') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="e.g., PROD-001">
                            <p class="mt-1 text-xs text-yellow-600">Each product must have a unique SKU (Stock Keeping Unit)</p>
                            @error('sku') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Brand *</label>
                            <select name="brand" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">-- Select Brand --</option>
                                @foreach($brands ?? [] as $brand)
                                    <option value="{{ $brand->name }}" {{ old('brand') == $brand->name ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('brand') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            <p class="mt-1 text-xs text-gray-500">
                                Don't see your brand? <a href="{{ route('admin.brands.create') }}" target="_blank" class="text-blue-600 hover:text-blue-800">Add a new brand</a>
                            </p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Function Category</label>
                            <input type="text" name="function_category" value="{{ old('function_category') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Catalog</label>
                            <input type="text" name="catalog" value="{{ old('catalog') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status *</label>
                            <select name="status" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                                <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Visibility</label>
                            <select name="visibility" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="visible" {{ old('visibility') == 'visible' ? 'selected' : '' }}>Visible</option>
                                <option value="hidden" {{ old('visibility') == 'hidden' ? 'selected' : '' }}>Hidden</option>
                            </select>
                        </div>

                        <div class="flex items-center space-x-4">
                            <label class="flex items-center">
                                <input type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-700">Featured</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="is_new" value="1" {{ old('is_new') ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-700">New</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="is_bestseller" value="1" {{ old('is_bestseller') ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-700">Bestseller</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Content & Media Tab -->
                <div id="content-content" class="tab-content hidden bg-white shadow-sm rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Content & Media</h3>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Short Description</label>
                            <textarea name="short_description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('short_description') }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Full Description</label>
                            <textarea id="tinymce-description-create" name="description" rows="8" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description') }}</textarea>
            <p class="mt-1 text-xs text-gray-500">Use headings, paragraphs, links, and images to create rich product content. Images support alt text for SEO.</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Image URL</label>
                                <div class="flex gap-2">
                                    <input type="text" id="main_image_url_create" name="image_url" value="{{ old('image_url') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <button type="button" onclick="openImageUploaderCreate('main_image_url_create')" class="mt-1 px-3 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition whitespace-nowrap">
                                        📤 Upload
                                    </button>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Image Alt Text</label>
                                <input type="text" name="image_alt" value="{{ old('image_alt') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Video URL</label>
                                <input type="url" name="video_url" value="{{ old('video_url') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Manual URL</label>
                                <input type="url" name="manual_url" value="{{ old('manual_url') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Datasheet URL</label>
                                <input type="url" name="datasheet_url" value="{{ old('datasheet_url') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                        </div>

                        <!-- Features Section -->
                        <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-3">✨ Product Features</label>
                            <div id="features-container" class="space-y-2">
                                <div class="feature-item flex gap-2">
                                    <input type="text" name="features[]" value="{{ old('features.0') }}" placeholder="Enter a feature" class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                    <button type="button" onclick="removeFeature(this)" class="px-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition text-sm">Remove</button>
                                </div>
                            </div>
                            <button type="button" onclick="addFeature()" class="mt-3 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">+ Add Feature</button>
                        </div>

                        <!-- Specifications Section -->
                        <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-3">📋 Product Specifications</label>
                            <p class="text-xs text-blue-600 mb-3">💡 Tip: You can add URLs in the value field (e.g., for Doc, Datasheet). They will automatically become clickable links on the product page.</p>
                            <div id="specifications-container" class="space-y-2">
                                <div class="specification-item flex gap-2">
                                    <input type="text" name="spec_keys[]" value="{{ old('spec_keys.0') }}" placeholder="Spec name (e.g., Nguồn điện, Doc)" class="w-1/3 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                    <input type="text" name="spec_values[]" value="{{ old('spec_values.0') }}" placeholder="Value or URL (e.g., 24V DC or https://...)" class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                    <button type="button" onclick="removeSpecification(this)" class="px-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition text-sm">Remove</button>
                                </div>
                            </div>
                            <button type="button" onclick="addSpecification()" class="mt-3 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">+ Add Specification</button>
                        </div>

                        <script>
                            // Features Functions
                            function addFeature() {
                                const container = document.getElementById('features-container');
                                const newItem = document.createElement('div');
                                newItem.className = 'feature-item flex gap-2';
                                newItem.innerHTML = `
                                    <input type="text" name="features[]" value="" placeholder="Enter a feature" class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                    <button type="button" onclick="removeFeature(this)" class="px-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition text-sm">Remove</button>
                                `;
                                container.appendChild(newItem);
                            }

                            function removeFeature(button) {
                                const container = document.getElementById('features-container');
                                const items = container.querySelectorAll('.feature-item');
                                if (items.length > 1) {
                                    button.closest('.feature-item').remove();
                                } else {
                                    // Keep at least one input field
                                    const input = button.closest('.feature-item').querySelector('input');
                                    input.value = '';
                                }
                            }

                            // Specifications Functions
                            function addSpecification() {
                                const container = document.getElementById('specifications-container');
                                const newItem = document.createElement('div');
                                newItem.className = 'specification-item flex gap-2';
                                newItem.innerHTML = `
                                    <input type="text" name="spec_keys[]" value="" placeholder="Spec name (e.g., Nguồn điện, Doc)" class="w-1/3 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                    <input type="text" name="spec_values[]" value="" placeholder="Value or URL (e.g., 24V DC or https://...)" class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                    <button type="button" onclick="removeSpecification(this)" class="px-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition text-sm">Remove</button>
                                `;
                                container.appendChild(newItem);
                            }

                            function removeSpecification(button) {
                                const container = document.getElementById('specifications-container');
                                const items = container.querySelectorAll('.specification-item');
                                if (items.length > 1) {
                                    button.closest('.specification-item').remove();
                                } else {
                                    // Keep at least one input field
                                    const inputs = button.closest('.specification-item').querySelectorAll('input');
                                    inputs.forEach(input => input.value = '');
                                }
                            }
                        </script>
                    </div>
                </div>

                <!-- Pricing & Inventory Tab -->
                <div id="content-pricing" class="tab-content hidden bg-white shadow-sm rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Pricing & Inventory</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Price</label>
                            <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Sale Price</label>
                            <input type="number" step="0.01" name="sale_price" value="{{ old('sale_price') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Currency</label>
                            <select name="currency" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="USD">USD</option>
                                <option value="VND">VND</option>
                                <option value="EUR">EUR</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Stock Quantity</label>
                            <input type="number" name="stock_quantity" value="{{ old('stock_quantity', 0) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Stock Status</label>
                            <select name="stock_status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="in_stock">In Stock</option>
                                <option value="out_of_stock">Out of Stock</option>
                                <option value="on_backorder">On Backorder</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Minimum Order Quantity</label>
                            <input type="number" name="min_order_quantity" value="{{ old('min_order_quantity', 1) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Weight (kg)</label>
                            <input type="text" name="weight" value="{{ old('weight') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Dimensions</label>
                            <input type="text" name="dimensions" value="{{ old('dimensions') }}" placeholder="L x W x H" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Color</label>
                            <input type="text" name="color" value="{{ old('color') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Material</label>
                            <input type="text" name="material" value="{{ old('material') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Warranty Period</label>
                            <input type="text" name="warranty_period" value="{{ old('warranty_period') }}" placeholder="e.g., 12 months" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Manufacturer Country</label>
                            <input type="text" name="manufacturer_country" value="{{ old('manufacturer_country') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Origin</label>
                            <input type="text" name="origin" value="{{ old('origin') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </div>
                </div>

                <!-- SEO & Meta Tab -->
                <div id="content-seo" class="tab-content hidden bg-white shadow-sm rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">SEO & Meta Data</h3>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Meta Title</label>
                            <input type="text" name="meta_title" value="{{ old('meta_title') }}" maxlength="60" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <p class="mt-1 text-xs text-gray-500">Recommended: 50-60 characters</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Meta Description</label>
                            <textarea name="meta_description" rows="3" maxlength="160" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('meta_description') }}</textarea>
                            <p class="mt-1 text-xs text-gray-500">Recommended: 150-160 characters</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Meta Keywords</label>
                            <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}" placeholder="keyword1, keyword2, keyword3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Canonical URL</label>
                            <input type="url" name="canonical_url" value="{{ old('canonical_url') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div class="border-t pt-6">
                            <h4 class="text-md font-semibold mb-4">Open Graph (Social Media)</h4>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">OG Title</label>
                                    <input type="text" name="og_title" value="{{ old('og_title') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">OG Description</label>
                                    <textarea name="og_description" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('og_description') }}</textarea>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">OG Image URL</label>
                                    <input type="url" name="og_image" value="{{ old('og_image') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>

                        <div class="border-t pt-6">
                            <h4 class="text-md font-semibold mb-4">Sitemap Settings</h4>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Sitemap Priority</label>
                                    <select name="sitemap_priority" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        <option value="0.0">0.0</option>
                                        <option value="0.1">0.1</option>
                                        <option value="0.3">0.3</option>
                                        <option value="0.5" selected>0.5</option>
                                        <option value="0.8">0.8</option>
                                        <option value="1.0">1.0</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Change Frequency</label>
                                    <select name="sitemap_changefreq" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        <option value="always">Always</option>
                                        <option value="hourly">Hourly</option>
                                        <option value="daily">Daily</option>
                                        <option value="weekly" selected>Weekly</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="yearly">Yearly</option>
                                        <option value="never">Never</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mt-4">
                                <label class="flex items-center">
                                    <input type="checkbox" name="indexable" value="1" checked class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Allow search engines to index this product</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Advanced Tab -->
                <div id="content-advanced" class="tab-content hidden bg-white shadow-sm rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Advanced Settings</h3>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tags (comma separated)</label>
                            <input type="text" name="tags" value="{{ old('tags') }}" placeholder="tag1, tag2, tag3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Categories (comma separated)</label>
                            <input type="text" name="categories" value="{{ old('categories') }}" placeholder="category1, category2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Related Products (comma separated IDs)</label>
                            <input type="text" name="related_products" value="{{ old('related_products') }}" placeholder="1, 5, 12" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Gallery Images (Thumbnail Images)</label>
                            <div id="gallery-images-container" class="space-y-3">
                                @php
                                    $galleryImages = old('gallery_images', []);
                                    if (empty($galleryImages)) {
                                        $galleryImages = [['url' => '', 'alt' => '']];
                                    }
                                @endphp
                                
                                @foreach($galleryImages as $index => $image)
                                @php
                                    $imageUrl = is_array($image) ? ($image['url'] ?? '') : $image;
                                    $imageAlt = is_array($image) ? ($image['alt'] ?? '') : '';
                                @endphp
                                <div class="gallery-image-item p-3 bg-gray-50 rounded-md border border-gray-200">
                                    <div class="flex gap-2 items-start">
                                        <div class="flex-1 space-y-2">
                                            <div class="flex gap-2">
                                                <input type="text" id="gallery_url_create_{{ $index }}" name="gallery_images[{{ $index }}][url]" value="{{ $imageUrl }}" placeholder="Image URL: assets/AIcontrol_imgs/Products/..." class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                                <button type="button" onclick="openImageUploaderCreate('gallery_url_create_{{ $index }}')" class="px-3 py-1.5 bg-green-500 text-white rounded-md hover:bg-green-600 transition text-sm whitespace-nowrap">
                                                    📤 Upload
                                                </button>
                                            </div>
                                            <input type="text" name="gallery_images[{{ $index }}][alt]" value="{{ $imageAlt }}" placeholder="Alt text: Describe the image for SEO and accessibility" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                        </div>
                                        <button type="button" onclick="removeGalleryImageCreate(this)" class="px-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 text-sm">Remove</button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <button type="button" onclick="addGalleryImageCreate()" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">+ Add Image</button>
                            <p class="mt-1 text-sm text-gray-500">Enter relative paths like: assets/AIcontrol_imgs/Products/ABB/images/image.jpg</p>
                        </div>

                        <script>
                            let galleryImageCreateIndex = {{ count($galleryImages) }};
                            
                            function addGalleryImageCreate() {
                                const container = document.getElementById('gallery-images-container');
                                const newItem = document.createElement('div');
                                newItem.className = 'gallery-image-item p-3 bg-gray-50 rounded-md border border-gray-200';
                                const newId = 'gallery_url_create_' + galleryImageCreateIndex;
                                newItem.innerHTML = `
                                    <div class="flex gap-2 items-start">
                                        <div class="flex-1 space-y-2">
                                            <div class="flex gap-2">
                                                <input type="text" id="${newId}" name="gallery_images[${galleryImageCreateIndex}][url]" value="" placeholder="Image URL: assets/AIcontrol_imgs/Products/..." class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                                <button type="button" onclick="openImageUploaderCreate('${newId}')" class="px-3 py-1.5 bg-green-500 text-white rounded-md hover:bg-green-600 transition text-sm whitespace-nowrap">
                                                    📤 Upload
                                                </button>
                                            </div>
                                            <input type="text" name="gallery_images[${galleryImageCreateIndex}][alt]" value="" placeholder="Alt text: Describe the image for SEO and accessibility" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                                        </div>
                                        <button type="button" onclick="removeGalleryImageCreate(this)" class="px-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 text-sm">Remove</button>
                                    </div>
                                `;
                                container.appendChild(newItem);
                                galleryImageCreateIndex++;
                            }

                            function removeGalleryImageCreate(button) {
                                const container = document.getElementById('gallery-images-container');
                                const items = container.querySelectorAll('.gallery-image-item');
                                if (items.length > 1) {
                                    button.closest('.gallery-image-item').remove();
                                } else {
                                    // Keep at least one input field
                                    const inputs = button.closest('.gallery-image-item').querySelectorAll('input');
                                    inputs.forEach(input => input.value = '');
                                }
                            }
                        </script>                        <div>
                            <label class="block text-sm font-medium text-gray-700">Language</label>
                            <select name="language" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="en">English</option>
                                <option value="vi">Vietnamese</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Custom Fields (JSON)</label>
                            <textarea name="custom_fields" rows="4" placeholder='{"field1": "value1", "field2": "value2"}' class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('custom_fields') }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Structured Data (JSON-LD)</label>
                            <textarea name="structured_data" rows="6" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 font-mono text-xs">{{ old('structured_data') }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Published At</label>
                            <input type="datetime-local" name="published_at" value="{{ old('published_at') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="bg-white shadow-sm rounded-lg p-6 mt-4">
                    <div class="flex items-center justify-between">
                        <a href="{{ route('admin.products') }}" class="text-gray-600 hover:text-gray-800">Cancel</a>
                        <div class="flex space-x-3">
                            <button type="submit" name="action" value="draft" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                Save as Draft
                            </button>
                            <button type="submit" name="action" value="publish" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                                Publish Product
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showTab(tabName) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            
            // Remove active class from all tab buttons
            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('active', 'border-blue-500', 'text-blue-600');
                button.classList.add('border-transparent', 'text-gray-500');
            });
            
            // Show selected tab content
            document.getElementById('content-' + tabName).classList.remove('hidden');
            
            // Add active class to selected tab button
            const activeButton = document.getElementById('tab-' + tabName);
            activeButton.classList.add('active', 'border-blue-500', 'text-blue-600');
            activeButton.classList.remove('border-transparent', 'text-gray-500');
        }

        // Image Upload Modal and Functions
        let currentTargetInputCreate = null;

        function openImageUploaderCreate(inputId) {
            currentTargetInputCreate = inputId;
            document.getElementById('imageUploadModalCreate').classList.remove('hidden');
        }

        function closeImageUploaderCreate() {
            document.getElementById('imageUploadModalCreate').classList.add('hidden');
            document.getElementById('imageFileInputCreate').value = '';
            document.getElementById('uploadProgressCreate').classList.add('hidden');
            document.getElementById('uploadMessageCreate').classList.add('hidden');
        }

        function handleImageUploadCreate() {
            const fileInput = document.getElementById('imageFileInputCreate');
            const file = fileInput.files[0];
            
            if (!file) {
                showUploadMessageCreate('Please select an image file', 'error');
                return;
            }

            // Validate file type
            const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];
            if (!validTypes.includes(file.type)) {
                showUploadMessageCreate('Please select a valid image file (JPEG, PNG, GIF, or WebP)', 'error');
                return;
            }

            // Validate file size (5MB)
            if (file.size > 5 * 1024 * 1024) {
                showUploadMessageCreate('File size must be less than 5MB', 'error');
                return;
            }

            const formData = new FormData();
            formData.append('image', file);
            formData.append('_token', '{{ csrf_token() }}');

            // Show progress
            document.getElementById('uploadProgressCreate').classList.remove('hidden');
            document.getElementById('uploadMessageCreate').classList.add('hidden');

            fetch('{{ route("admin.upload.image") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('uploadProgressCreate').classList.add('hidden');
                
                if (data.success) {
                    // Set the image path to the target input
                    document.getElementById(currentTargetInputCreate).value = data.path;
                    
                    // Show success message
                    if (data.renamed) {
                        showUploadMessageCreate(data.message, 'warning');
                    } else {
                        showUploadMessageCreate(data.message, 'success');
                    }
                    
                    // Close modal after 2 seconds
                    setTimeout(() => {
                        closeImageUploaderCreate();
                    }, 2000);
                } else {
                    showUploadMessageCreate(data.message, 'error');
                }
            })
            .catch(error => {
                document.getElementById('uploadProgressCreate').classList.add('hidden');
                showUploadMessageCreate('Upload failed: ' + error.message, 'error');
            });
        }

        function showUploadMessageCreate(message, type) {
            const messageDiv = document.getElementById('uploadMessageCreate');
            messageDiv.classList.remove('hidden', 'text-green-600', 'text-yellow-600', 'text-red-600');
            
            if (type === 'success') {
                messageDiv.classList.add('text-green-600');
            } else if (type === 'warning') {
                messageDiv.classList.add('text-yellow-600');
            } else {
                messageDiv.classList.add('text-red-600');
            }
            
            messageDiv.textContent = message;
        }

        // TinyMCE Rich Text Editor
        document.addEventListener('DOMContentLoaded', function() {
            tinymce.init({
                selector: '#tinymce-description-create',
                height: 500,
                menubar: true,
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                    'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'media', 'table', 'help', 'wordcount'
                ],
                toolbar: 'undo redo | blocks | bold italic forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | removeformat | code | help',
                block_formats: 'Paragraph=p; Heading 2=h2; Heading 3=h3; Heading 4=h4; Heading 5=h5; Heading 6=h6',
                content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; font-size: 14px; }',
                
                // Image upload configuration
                images_upload_handler: function (blobInfo, progress) {
                    return new Promise((resolve, reject) => {
                        const formData = new FormData();
                        formData.append('image', blobInfo.blob(), blobInfo.filename());
                        formData.append('_token', '{{ csrf_token() }}');

                        fetch('{{ route("admin.upload.image") }}', {
                            method: 'POST',
                            body: formData,
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                resolve('{{ url("/") }}/' + data.path);
                            } else {
                                reject(data.message || 'Image upload failed');
                            }
                        })
                        .catch(error => {
                            reject('Image upload failed: ' + error.message);
                        });
                    });
                },
                
                // Image settings
                image_title: true,
                image_description: true,
                image_caption: true,
                automatic_uploads: true,
                
                // Keep line breaks
                convert_urls: false,
                remove_script_host: false,
                relative_urls: false,
            });
        });
    </script>

    <!-- Image Upload Modal -->
                        ]
                    }
                })
                .catch(error => {
                    console.error('CKEditor initialization error:', error);
                });
        });
    </script>

    <!-- Image Upload Modal -->
    <div id="imageUploadModalCreate" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Upload Image</h3>
                    <button onclick="closeImageUploaderCreate()" class="text-gray-400 hover:text-gray-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <div class="mt-2">
                    <input type="file" id="imageFileInputCreate" accept="image/*" class="block w-full text-sm text-gray-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-md file:border-0
                        file:text-sm file:font-semibold
                        file:bg-blue-50 file:text-blue-700
                        hover:file:bg-blue-100">
                    
                    <p class="mt-2 text-xs text-gray-500">
                        Maximum file size: 5MB<br>
                        Supported formats: JPEG, PNG, GIF, WebP
                    </p>

                    <!-- Upload Progress -->
                    <div id="uploadProgressCreate" class="hidden mt-4">
                        <div class="flex items-center justify-center">
                            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
                            <span class="ml-2 text-sm text-gray-600">Uploading...</span>
                        </div>
                    </div>

                    <!-- Upload Message -->
                    <div id="uploadMessageCreate" class="hidden mt-4 text-sm font-medium"></div>
                </div>
                
                <div class="mt-4 flex justify-end gap-3">
                    <button onclick="closeImageUploaderCreate()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                        Cancel
                    </button>
                    <button onclick="handleImageUploadCreate()" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Upload
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
