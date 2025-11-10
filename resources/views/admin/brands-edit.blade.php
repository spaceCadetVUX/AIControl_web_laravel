<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Brand') }}: {{ $brand->name }}
            </h2>
            <a href="{{ route('admin.brands') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                ← Back to Brands
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('admin.brands.update', $brand->id) }}">
                @csrf
                @method('PUT')

                <div class="bg-white shadow-sm rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Brand Information</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Brand Name *</label>
                            <input type="text" name="name" value="{{ old('name', $brand->name) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Slug</label>
                            <input type="text" value="{{ $brand->slug }}" disabled class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm">
                            <p class="mt-1 text-xs text-gray-500">Slug is auto-generated from brand name</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description', $brand->description) }}</textarea>
                            @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Logo</label>
                            <div class="flex gap-2">
                                <input type="text" id="logo_url" name="logo_url" value="{{ old('logo_url', $brand->logo_url) }}" placeholder="assets/AIcontrol_imgs/ALLBrandImgs/your-logo.jpg" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <button type="button" onclick="openBrandImageUploader('logo_url')" class="mt-1 px-3 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition whitespace-nowrap">
                                    📤 Upload
                                </button>
                                <button type="button" onclick="removeBrandImage()" class="mt-1 px-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition whitespace-nowrap" title="Remove current logo">
                                    🗑️ Remove
                                </button>
                                <input type="hidden" id="remove_logo" name="remove_logo" value="0">
                            </div>
                            @error('logo_url') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            <div id="logoPreview" class="mt-2">
                                @if(old('logo_url', $brand->logo_url))
                                    <img src="{{ str_starts_with(old('logo_url', $brand->logo_url), 'http') ? old('logo_url', $brand->logo_url) : asset(old('logo_url', $brand->logo_url)) }}" alt="Logo preview" class="h-16 w-auto rounded border">
                                @endif
                            </div>
                            <p class="mt-1 text-xs text-gray-500">Upload a logo image (stored in <code>assets/AIcontrol_imgs/ALLBrandImgs</code>) or paste the relative path above.</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Website</label>
                            <input type="url" name="website" value="{{ old('website', $brand->website) }}" placeholder="https://www.brand-website.com" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('website') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="flex items-center">
                                <input type="checkbox" name="status" value="1" {{ old('status', $brand->status) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-700">Active (available for product selection)</span>
                            </label>
                        </div>

                        <div class="border-t pt-4">
                            <div class="grid grid-cols-2 gap-4 text-sm text-gray-600">
                                <div>
                                    <strong>Total Products:</strong> {{ \App\Models\Product::where('brand', $brand->name)->count() }}
                                </div>
                                <div>
                                    <strong>Created:</strong> {{ $brand->created_at->format('M d, Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="bg-white shadow-sm rounded-lg p-6 mt-4">
                    <div class="flex items-center justify-between">
                        <a href="{{ route('admin.brands') }}" class="text-gray-600 hover:text-gray-800">Cancel</a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                            Update Brand
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
<div id="brandImageUploadModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex justify-between items-center mb-4">
                <div id="brandRenameContainer" class="hidden mt-3">
                    <label class="block text-sm font-medium text-gray-700">Filename (change to avoid conflict)</label>
                    <div class="flex gap-2 mt-1">
                        <input type="text" id="brandRenameInput" class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                        <button type="button" id="brandRenameUploadBtn" class="px-3 py-2 bg-blue-600 text-white rounded-md">Upload with new name</button>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-900">Upload Image</h3>
                <button onclick="closeBrandImageUploader()" class="text-gray-400 hover:text-gray-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="mt-2">
                <input type="file" id="brandImageFileInput" accept="image/*,image/svg+xml,.svg" class="block w-full text-sm text-gray-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-md file:border-0
                    file:text-sm file:font-semibold
                    file:bg-blue-50 file:text-blue-700
                    hover:file:bg-blue-100">
                <p class="mt-2 text-xs text-gray-500">
                    Maximum file size: 5MB<br>
                    Supported formats: JPEG, PNG, GIF, WebP, SVG
                </p>

                <!-- Upload Progress -->
                <div id="brandUploadProgress" class="hidden mt-4">
                    <div class="flex items-center justify-center">
                        <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
                        <span class="ml-2 text-sm text-gray-600">Uploading...</span>
                    </div>
                </div>

                <!-- Upload Message -->
                <div id="brandUploadMessage" class="hidden mt-4 text-sm font-medium"></div>
            </div>
            <div class="mt-4 flex justify-end gap-3">
                <button onclick="closeBrandImageUploader()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                    Cancel
                </button>
                <button onclick="handleBrandImageUpload()" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    Upload
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    let brandCurrentTargetInput = null;

    function openBrandImageUploader(inputId) {
        brandCurrentTargetInput = inputId;
        document.getElementById('brandImageUploadModal').classList.remove('hidden');
    }

    function closeBrandImageUploader() {
        document.getElementById('brandImageUploadModal').classList.add('hidden');
        document.getElementById('brandImageFileInput').value = '';
        document.getElementById('brandUploadProgress').classList.add('hidden');
        document.getElementById('brandUploadMessage').classList.add('hidden');
        document.getElementById('brandRenameContainer').classList.add('hidden');
    }

    function handleBrandImageUpload() {
        const fileInput = document.getElementById('brandImageFileInput');
        const file = fileInput.files[0];
        if (!file) {
            showBrandUploadMessage('Please select an image file', 'error');
            return;
        }

        const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp', 'image/svg+xml'];
        const isSvgByExt = file.name && file.name.toLowerCase().endsWith('.svg');
        if (!validTypes.includes(file.type) && !isSvgByExt) {
            showBrandUploadMessage('Please select a valid image file (JPEG, PNG, GIF, WebP, or SVG)', 'error');
            return;
        }

        if (file.size > 5 * 1024 * 1024) {
            showBrandUploadMessage('File size must be less than 5MB', 'error');
            return;
        }

    const formData = new FormData();
    formData.append('image', file);
    formData.append('_token', '{{ csrf_token() }}');
    formData.append('target', 'brand');

        document.getElementById('brandUploadProgress').classList.remove('hidden');
        document.getElementById('brandUploadMessage').classList.add('hidden');

        fetch('{{ route("admin.upload.image") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('brandUploadProgress').classList.add('hidden');
            if (data.success) {
                document.getElementById(brandCurrentTargetInput).value = data.path;
                showBrandUploadMessage(data.message, 'success');
                // show preview
                const preview = document.getElementById('logoPreview');
                if (preview) {
                    preview.innerHTML = `<img src="${data.path.startsWith('http') ? data.path : '/' + data.path}" alt="Logo preview" class="h-16 w-auto rounded border">`;
                }
                setTimeout(() => closeBrandImageUploader(), 1500);
            } else if (data.exists) {
                showBrandUploadMessage(data.message, 'warning');
                document.getElementById('brandRenameContainer').classList.remove('hidden');
                document.getElementById('brandRenameInput').value = data.filename || data.originalName || '';
                document.getElementById('brandRenameUploadBtn').onclick = function() {
                    const newName = document.getElementById('brandRenameInput').value.trim();
                    if (!newName) {
                        showBrandUploadMessage('Please enter a filename', 'error');
                        return;
                    }
                    uploadBrandWithFilename(newName);
                };
            } else {
                showBrandUploadMessage(data.message || 'Upload failed', 'error');
            }
        })
        .catch(error => {
            document.getElementById('brandUploadProgress').classList.add('hidden');
            showBrandUploadMessage('Upload failed: ' + error.message, 'error');
        });
    }

    function uploadBrandWithFilename(filename) {
        const fileInput = document.getElementById('brandImageFileInput');
        const file = fileInput.files[0];
        if (!file) {
            showBrandUploadMessage('Please select an image file', 'error');
            return;
        }

    const formData = new FormData();
    formData.append('image', file);
    formData.append('_token', '{{ csrf_token() }}');
    formData.append('target', 'brand');
    formData.append('filename', filename);

        document.getElementById('brandUploadProgress').classList.remove('hidden');
        document.getElementById('brandUploadMessage').classList.add('hidden');

        fetch('{{ route("admin.upload.image") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('brandUploadProgress').classList.add('hidden');
            if (data.success) {
                document.getElementById(brandCurrentTargetInput).value = data.path;
                showBrandUploadMessage(data.message, 'success');
                const preview = document.getElementById('logoPreview');
                if (preview) {
                    preview.innerHTML = `<img src="${data.path.startsWith('http') ? data.path : '/' + data.path}" alt="Logo preview" class="h-16 w-auto rounded border">`;
                }
                setTimeout(() => closeBrandImageUploader(), 1500);
            } else if (data.exists) {
                showBrandUploadMessage(data.message, 'error');
            } else {
                showBrandUploadMessage(data.message || 'Upload failed', 'error');
            }
        })
        .catch(error => {
            document.getElementById('brandUploadProgress').classList.add('hidden');
            showBrandUploadMessage('Upload failed: ' + error.message, 'error');
        });
    }

    function showBrandUploadMessage(message, type) {
        const messageDiv = document.getElementById('brandUploadMessage');
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

    function removeBrandImage() {
        const input = document.getElementById('logo_url');
        if (input) input.value = '';
        const preview = document.getElementById('logoPreview');
        if (preview) preview.innerHTML = '';
        const hidden = document.getElementById('remove_logo');
        if (hidden) hidden.value = '1';
        showBrandUploadMessage('Logo removed locally. Submit the form to save this change.', 'warning');
    }
</script>
<script>
    // Live preview when user pastes/changes the logo path
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('logo_url');
        if (!input) return;
        input.addEventListener('input', function() {
            const val = this.value.trim();
            const preview = document.getElementById('logoPreview');
            if (!preview) return;
            if (!val) {
                preview.innerHTML = '';
                return;
            }
            const src = val.startsWith('http') ? val : '/' + val.replace(/^\/+/, '');
            preview.innerHTML = `<img src="${src}" alt="Logo preview" class="h-16 w-auto rounded border">`;
        });
    });
</script>
