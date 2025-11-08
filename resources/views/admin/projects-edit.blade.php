<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Project') }}: {{ $project->title }}
            </h2>
            <a href="{{ route('admin.projects') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                ← Back to Projects
            </a>
        </div>
    </x-slot>

    {{-- TinyMCE Cloud CDN --}}
    <script src="https://cdn.tiny.cloud/1/sgrz0gpyn1159lugws1kjcka6lqmi221jrtqvt85ildm1rki/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <strong>Errors occurred:</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.projects.update', $project->id) }}" enctype="multipart/form-data" id="projectForm">
                @csrf
                @method('PUT')

                <!-- Tab Navigation -->
                <div class="bg-white shadow-sm rounded-lg mb-4">
                    <div class="border-b border-gray-200">
                        <nav class="flex -mb-px overflow-x-auto">
                            <button type="button" onclick="showTab('basic')" id="tab-basic" class="tab-button active border-b-2 border-blue-500 py-4 px-6 text-sm font-medium text-blue-600 whitespace-nowrap">
                                Basic Info
                            </button>
                            <button type="button" onclick="showTab('categories')" id="tab-categories" class="tab-button border-b-2 border-transparent py-4 px-6 text-sm font-medium text-gray-500 hover:text-gray-700 whitespace-nowrap">
                                Categories
                            </button>
                            <button type="button" onclick="showTab('images')" id="tab-images" class="tab-button border-b-2 border-transparent py-4 px-6 text-sm font-medium text-gray-500 hover:text-gray-700 whitespace-nowrap">
                                Images
                            </button>
                            <button type="button" onclick="showTab('details')" id="tab-details" class="tab-button border-b-2 border-transparent py-4 px-6 text-sm font-medium text-gray-500 hover:text-gray-700 whitespace-nowrap">
                                Project Details
                            </button>
                            <button type="button" onclick="showTab('overview')" id="tab-overview" class="tab-button border-b-2 border-transparent py-4 px-6 text-sm font-medium text-gray-500 hover:text-gray-700 whitespace-nowrap">
                                Overview
                            </button>
                            <button type="button" onclick="showTab('slider')" id="tab-slider" class="tab-button border-b-2 border-transparent py-4 px-6 text-sm font-medium text-gray-500 hover:text-gray-700 whitespace-nowrap">
                                Slider & Steps
                            </button>
                            <button type="button" onclick="showTab('seo')" id="tab-seo" class="tab-button border-b-2 border-transparent py-4 px-6 text-sm font-medium text-gray-500 hover:text-gray-700 whitespace-nowrap">
                                SEO
                            </button>
                        </nav>
                    </div>
                </div>

                <!-- Basic Info Tab -->
                <div id="content-basic" class="tab-content bg-white shadow-sm rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Basic Information</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Title <span class="text-red-500">*</span></label>
                            <input type="text" name="title" id="project-title" value="{{ old('title', $project->title) }}" required 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Slug</label>
                            <input type="text" name="slug" id="project-slug" value="{{ old('slug', $project->slug) }}" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('slug') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Short Description</label>
                            <textarea name="short_description" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('short_description', $project->short_description) }}</textarea>
                            @error('short_description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Status</label>
                                <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="draft" {{ old('status', $project->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ old('status', $project->status) == 'published' ? 'selected' : '' }}>Published</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Display Order</label>
                                <input type="number" name="order" value="{{ old('order', $project->order) }}" min="0"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <div class="flex items-end pb-2">
                                <label class="flex items-center">
                                    <input type="checkbox" name="featured" id="featured" value="1" {{ old('featured', $project->featured) ? 'checked' : '' }}
                                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                    <span class="ml-2 text-sm text-gray-900">Featured Project</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Published Date</label>
                            <input type="datetime-local" name="published_at" value="{{ old('published_at', $project->published_at ? $project->published_at->format('Y-m-d\TH:i') : '') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div class="border-t pt-4">
                            <div class="grid grid-cols-2 gap-4 text-sm text-gray-600">
                                <div>
                                    <strong>View Count:</strong> {{ number_format($project->view_count) }}
                                </div>
                                <div>
                                    <strong>Created:</strong> {{ $project->created_at->format('M d, Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Categories Tab -->
                <div id="content-categories" class="tab-content hidden bg-white shadow-sm rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Project Categories</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Primary Category</label>
                            <select name="project_category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">-- Select Category --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('project_category_id', $project->project_category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Secondary Category (Optional)</label>
                            <select name="project_category_id_2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">-- Select Secondary Category --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('project_category_id_2', $project->project_category_id_2) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Images Tab -->
                <div id="content-images" class="tab-content hidden bg-white shadow-sm rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Project Images</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Banner Image</label>
                            @if($project->banner_image)
                                @php
                                    $bannerPath = $project->banner_image;
                                    $bannerUrl = \Illuminate\Support\Str::startsWith($bannerPath, ['http://', 'https://'])
                                        ? $bannerPath
                                        : asset(ltrim($bannerPath, '/'));
                                @endphp
                                <div class="mt-2 mb-2">
                                    <img src="{{ $bannerUrl }}" alt="Current Banner" class="h-32 rounded border">
                                    <p class="text-xs text-gray-500 mt-1">Current banner image</p>
                                </div>
                            @endif
                            <input type="file" name="banner_image" accept="image/*" 
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="mt-1 text-xs text-gray-500">Recommended: 1920x800px. Leave empty to keep current image.</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Thumbnail</label>
                            @if($project->thumbnail_image)
                                @php
                                    $thumbPath = $project->thumbnail_image;
                                    $thumbUrl = \Illuminate\Support\Str::startsWith($thumbPath, ['http://', 'https://'])
                                        ? $thumbPath
                                        : asset(ltrim($thumbPath, '/'));
                                @endphp
                                <div class="mt-2 mb-2">
                                    <img src="{{ $thumbUrl }}" alt="Current Thumbnail" class="h-32 rounded border">
                                    <p class="text-xs text-gray-500 mt-1">Current thumbnail</p>
                                </div>
                            @endif
                            <input type="file" name="thumbnail_image" accept="image/*"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="mt-1 text-xs text-gray-500">Recommended: 600x400px</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @for($i = 1; $i <= 3; $i++)
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Gallery {{ $i }}</label>
                                    @php
                                        $galleryPath = $project->{'gallery_image_' . $i};
                                        if ($galleryPath) {
                                            $galleryUrl = \Illuminate\Support\Str::startsWith($galleryPath, ['http://', 'https://'])
                                                ? $galleryPath
                                                : asset(ltrim($galleryPath, '/'));
                                        }
                                    @endphp
                                    @if(!empty($galleryPath))
                                        <div class="mt-2 mb-2">
                                            <img src="{{ $galleryUrl }}" alt="Gallery {{ $i }}" class="h-24 rounded border">
                                        </div>
                                    @endif
                                    <input type="file" name="gallery_image_{{ $i }}" accept="image/*"
                                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <!-- Details Tab -->
                <div id="content-details" class="tab-content hidden bg-white shadow-sm rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Project Details (4 Title/Value Pairs)</h3>
                    
                    <div class="space-y-6">
                        @for($i = 1; $i <= 4; $i++)
                            <div class="border rounded-lg p-4">
                                <h4 class="font-medium text-gray-700 mb-3">Detail {{ $i }}</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Title</label>
                                        <input type="text" name="detail_{{ $i }}_title" value="{{ old('detail_' . $i . '_title', $project->{'detail_' . $i . '_title'}) }}" placeholder="e.g., Client"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Value</label>
                                        <input type="text" name="detail_{{ $i }}_value" value="{{ old('detail_' . $i . '_value', $project->{'detail_' . $i . '_value'}) }}" placeholder="e.g., ABC Company"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>

                <!-- Overview Tab -->
                <div id="content-overview" class="tab-content hidden bg-white shadow-sm rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Project Overview</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Overview Title</label>
                            <input type="text" name="overview_title" value="{{ old('overview_title', $project->overview_title) }}" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Overview Content (Rich Text Editor)</label>
                            <textarea id="tinymce-overview" name="overview_content" rows="15">{{ old('overview_content', $project->overview_content) }}</textarea>
                            @error('overview_content') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <!-- Slider & Steps Tab -->
                <div id="content-slider" class="tab-content hidden bg-white shadow-sm rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Slider & Detail Steps</h3>
                    
                    <div class="space-y-6">
                        <!-- Slider Images with Upload and Alt Text -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Slider Images</label>
                            <p class="text-xs text-gray-500 mb-3">Upload ảnh hoặc nhập URL. Mỗi ảnh có thể có text mô tả (alt text) cho SEO.</p>
                            <div id="slider-images-container" class="space-y-3">
                                @if($project->slider_images && is_array($project->slider_images) && count($project->slider_images) > 0)
                                    @foreach($project->slider_images as $image)
                                        <div class="slider-image-item border border-gray-300 rounded-lg p-4 bg-gray-50">
                                            <div class="grid grid-cols-12 gap-3">
                                                <div class="col-span-5">
                                                    <label class="block text-xs font-medium text-gray-600 mb-1">Upload hoặc URL</label>
                                                    @if(is_string($image))
                                                        <!-- Old format: just string URL -->
                                                        <input type="text" name="slider_image_urls[]" value="{{ $image }}" placeholder="https://..." 
                                                            class="block w-full text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                                        <input type="file" name="slider_image_files[]" accept="image/*" 
                                                            onchange="previewSliderImage(this)"
                                                            class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                                    @else
                                                        <!-- New format: object with url and alt -->
                                                        <input type="text" name="slider_image_urls[]" value="{{ $image['url'] ?? '' }}" placeholder="https://..." 
                                                            class="block w-full text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                                        <input type="file" name="slider_image_files[]" accept="image/*" 
                                                            onchange="previewSliderImage(this)"
                                                            class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                                    @endif
                                                    @if(is_array($image) && isset($image['url']) && !str_starts_with($image['url'], 'http'))
                                                        <div class="mt-2">
                                                            <img src="{{ asset($image['url']) }}" alt="{{ $image['alt'] ?? '' }}" class="h-20 rounded border">
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-span-5">
                                                    <label class="block text-xs font-medium text-gray-600 mb-1">Alt Text (Mô tả ảnh)</label>
                                                    <input type="text" name="slider_image_alts[]" 
                                                        value="{{ is_array($image) ? ($image['alt'] ?? '') : '' }}"
                                                        placeholder="VD: Phòng khách thông minh biệt thự Vinhomes" 
                                                        class="block w-full text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                                </div>
                                                <div class="col-span-2 flex items-end">
                                                    <button type="button" onclick="removeSliderImage(this)" 
                                                        class="w-full px-3 py-2 bg-red-500 text-white text-sm rounded-md hover:bg-red-600">
                                                        Xóa
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="slider-image-item border border-gray-300 rounded-lg p-4 bg-gray-50">
                                        <div class="grid grid-cols-12 gap-3">
                                            <div class="col-span-5">
                                                <label class="block text-xs font-medium text-gray-600 mb-1">Upload hoặc URL</label>
                                                <input type="file" name="slider_image_files[]" accept="image/*" 
                                                    onchange="previewSliderImage(this)"
                                                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                                <input type="text" name="slider_image_urls[]" placeholder="hoặc nhập URL: https://..." 
                                                    class="mt-2 block w-full text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            </div>
                                            <div class="col-span-5">
                                                <label class="block text-xs font-medium text-gray-600 mb-1">Alt Text (Mô tả ảnh)</label>
                                                <input type="text" name="slider_image_alts[]" placeholder="VD: Phòng khách thông minh biệt thự Vinhomes" 
                                                    class="block w-full text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            </div>
                                            <div class="col-span-2 flex items-end">
                                                <button type="button" onclick="removeSliderImage(this)" 
                                                    class="w-full px-3 py-2 bg-red-500 text-white text-sm rounded-md hover:bg-red-600">
                                                    Xóa
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button type="button" onclick="addSliderImage()" 
                                class="mt-3 px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 text-sm font-medium">
                                <i class="fas fa-plus mr-1"></i> Thêm hình Slider
                            </button>
                        </div>

                        <!-- Secondary Title -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Secondary Title</label>
                            <input type="text" name="secondary_title" value="{{ old('secondary_title', $project->secondary_title) }}" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <!-- Detail Steps -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Detail Steps (JSON array)</label>
                            <div id="detail-steps-container" class="space-y-3">
                                @if($project->detail_steps && is_array($project->detail_steps) && count($project->detail_steps) > 0)
                                    @foreach($project->detail_steps as $step)
                                        <div class="flex items-start space-x-2 p-3 bg-gray-50 rounded">
                                            <div class="flex-1">
                                                <input type="text" name="detail_steps_title[]" value="{{ $step['title'] ?? '' }}" placeholder="Step title" 
                                                    class="mb-2 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                                <textarea name="detail_steps_description[]" rows="2" placeholder="Step description"
                                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ $step['description'] ?? '' }}</textarea>
                                            </div>
                                            <button type="button" onclick="removeDetailStep(this)" class="px-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Remove</button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="flex items-start space-x-2 p-3 bg-gray-50 rounded">
                                        <div class="flex-1">
                                            <input type="text" name="detail_steps_title[]" placeholder="Step title" 
                                                class="mb-2 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            <textarea name="detail_steps_description[]" rows="2" placeholder="Step description"
                                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                                        </div>
                                        <button type="button" onclick="removeDetailStep(this)" class="px-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Remove</button>
                                    </div>
                                @endif
                            </div>
                            <button type="button" onclick="addDetailStep()" class="mt-2 px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">+ Add Step</button>
                        </div>
                    </div>
                </div>

                <!-- SEO Tab -->
                <div id="content-seo" class="tab-content hidden bg-white shadow-sm rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">SEO & Meta Tags</h3>
                    <p class="text-sm text-gray-600 mb-6">Tối ưu hóa nội dung cho công cụ tìm kiếm. Để trống để tự động tạo từ tiêu đề và mô tả.</p>
                    
                    <div class="space-y-6">
                        <div>
                            <div class="flex justify-between items-center mb-1">
                                <label class="block text-sm font-medium text-gray-700">Meta Title</label>
                                <span id="meta-title-count" class="text-xs text-gray-500">0/70 ký tự</span>
                            </div>
                            <input type="text" name="meta_title" id="meta-title-input" value="{{ old('meta_title', $project->meta_title) }}" maxlength="70"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="VD: Dự án biệt thự Vinhomes - AIControl">
                            <p class="mt-1 text-xs text-gray-500">📌 Tối ưu: 50-60 ký tự. Bao gồm từ khóa chính và tên thương hiệu.</p>
                        </div>

                        <div>
                            <div class="flex justify-between items-center mb-1">
                                <label class="block text-sm font-medium text-gray-700">Meta Description</label>
                                <span id="meta-desc-count" class="text-xs text-gray-500">0/160 ký tự</span>
                            </div>
                            <textarea name="meta_description" id="meta-desc-input" rows="3" maxlength="160"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Mô tả ngắn gọn về dự án, bao gồm các từ khóa quan trọng...">{{ old('meta_description', $project->meta_description) }}</textarea>
                            <p class="mt-1 text-xs text-gray-500">📌 Tối ưu: 120-155 ký tự. Mô tả hấp dẫn, kêu gọi hành động.</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Meta Keywords</label>
                            <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $project->meta_keywords) }}" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="nhà thông minh, biệt thự, ABB, điều khiển tự động">
                            <p class="mt-1 text-xs text-gray-500">📌 Các từ khóa cách nhau bởi dấu phẩy. VD: nhà thông minh, hệ thống điều khiển</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">OG Image (Open Graph)</label>
                            @if($project->og_image)
                                @php
                                    $ogPath = $project->og_image;
                                    $ogUrl = \Illuminate\Support\Str::startsWith($ogPath, ['http://', 'https://'])
                                        ? $ogPath
                                        : asset(ltrim($ogPath, '/'));
                                @endphp
                                <div class="mt-2 mb-2">
                                    <img src="{{ $ogUrl }}" alt="Current OG Image" class="h-32 rounded border">
                                    <p class="text-xs text-gray-500 mt-1">Current OG image</p>
                                </div>
                            @endif
                            <input type="file" name="og_image" accept="image/*"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="mt-1 text-xs text-gray-500">📌 Kích thước đề nghị: 1200x630px (tỷ lệ 1.91:1). Sử dụng cho chia sẻ mạng xã hội.</p>
                        </div>

                        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mt-6">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h4 class="text-sm font-medium text-blue-800">Mẹo SEO</h4>
                                    <div class="mt-2 text-sm text-blue-700">
                                        <ul class="list-disc list-inside space-y-1">
                                            <li>Sử dụng từ khóa chính trong Meta Title</li>
                                            <li>Meta Description nên thu hút người đọc click vào</li>
                                            <li>Tránh trùng lặp Meta Title với các dự án khác</li>
                                            <li>OG Image giúp bài viết nổi bật khi chia sẻ</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="bg-white shadow-sm rounded-lg p-6 mt-4">
                    <div class="flex items-center justify-between">
                        <a href="{{ route('admin.projects') }}" class="text-gray-600 hover:text-gray-800">Cancel</a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Update Project
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        // Tab switching
        function showTab(tabName) {
            document.querySelectorAll('.tab-content').forEach(content => content.classList.add('hidden'));
            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('active', 'border-blue-500', 'text-blue-600');
                button.classList.add('border-transparent', 'text-gray-500');
            });
            
            document.getElementById('content-' + tabName).classList.remove('hidden');
            const activeButton = document.getElementById('tab-' + tabName);
            activeButton.classList.add('active', 'border-blue-500', 'text-blue-600');
            activeButton.classList.remove('border-transparent', 'text-gray-500');
        }

        // Auto-generate slug
        document.getElementById('project-title').addEventListener('input', function(e) {
            const slug = e.target.value
                .toLowerCase()
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .replace(/đ/g, 'd')
                .replace(/[^a-z0-9\s-]/g, '')
                .trim()
                .replace(/\s+/g, '-');
            document.getElementById('project-slug').value = slug;
        });

        // Character counters for SEO fields
        const metaTitleInput = document.getElementById('meta-title-input');
        const metaTitleCount = document.getElementById('meta-title-count');
        const metaDescInput = document.getElementById('meta-desc-input');
        const metaDescCount = document.getElementById('meta-desc-count');

        function updateCount(input, counter, maxLength) {
            const length = input.value.length;
            counter.textContent = `${length}/${maxLength} ký tự`;
            
            if (length > maxLength * 0.9) {
                counter.classList.add('text-orange-500');
                counter.classList.remove('text-gray-500', 'text-green-500');
            } else if (length >= maxLength * 0.7) {
                counter.classList.add('text-green-500');
                counter.classList.remove('text-gray-500', 'text-orange-500');
            } else {
                counter.classList.add('text-gray-500');
                counter.classList.remove('text-green-500', 'text-orange-500');
            }
        }

        if (metaTitleInput) {
            metaTitleInput.addEventListener('input', () => updateCount(metaTitleInput, metaTitleCount, 70));
            updateCount(metaTitleInput, metaTitleCount, 70);
        }

        if (metaDescInput) {
            metaDescInput.addEventListener('input', () => updateCount(metaDescInput, metaDescCount, 160));
            updateCount(metaDescInput, metaDescCount, 160);
        }

        // Slider images management with preview
        function addSliderImage() {
            const container = document.getElementById('slider-images-container');
            const div = document.createElement('div');
            div.className = 'slider-image-item border border-gray-300 rounded-lg p-4 bg-gray-50';
            div.innerHTML = `
                <div class="grid grid-cols-12 gap-3">
                    <div class="col-span-5">
                        <label class="block text-xs font-medium text-gray-600 mb-1">Upload hoặc URL</label>
                        <input type="file" name="slider_image_files[]" accept="image/*" 
                            onchange="previewSliderImage(this)"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        <input type="text" name="slider_image_urls[]" placeholder="hoặc nhập URL: https://..." 
                            class="mt-2 block w-full text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="col-span-5">
                        <label class="block text-xs font-medium text-gray-600 mb-1">Alt Text (Mô tả ảnh)</label>
                        <input type="text" name="slider_image_alts[]" placeholder="VD: Phòng khách thông minh biệt thự Vinhomes" 
                            class="block w-full text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="col-span-2 flex items-end">
                        <button type="button" onclick="removeSliderImage(this)" 
                            class="w-full px-3 py-2 bg-red-500 text-white text-sm rounded-md hover:bg-red-600">
                            Xóa
                        </button>
                    </div>
                </div>
                <div class="mt-2 slider-preview hidden">
                    <img src="" alt="" class="h-20 rounded border border-gray-300">
                </div>
            `;
            container.appendChild(div);
        }

        function removeSliderImage(button) {
            const items = document.querySelectorAll('.slider-image-item');
            if (items.length > 1) {
                button.closest('.slider-image-item').remove();
            } else {
                alert('Phải có ít nhất một trường slider image');
            }
        }

        function previewSliderImage(input) {
            const item = input.closest('.slider-image-item');
            const preview = item.querySelector('.slider-preview');
            const img = preview ? preview.querySelector('img') : null;
            
            if (input.files && input.files[0] && img) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    img.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Detail steps management
        function addDetailStep() {
            const container = document.getElementById('detail-steps-container');
            const div = document.createElement('div');
            div.className = 'flex items-start space-x-2 p-3 bg-gray-50 rounded';
            div.innerHTML = `
                <div class="flex-1">
                    <input type="text" name="detail_steps_title[]" placeholder="Step title" 
                        class="mb-2 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <textarea name="detail_steps_description[]" rows="2" placeholder="Step description"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                </div>
                <button type="button" onclick="removeDetailStep(this)" class="px-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Remove</button>
            `;
            container.appendChild(div);
        }

        function removeDetailStep(button) {
            if (document.querySelectorAll('#detail-steps-container > div').length > 1) {
                button.parentElement.remove();
            } else {
                alert('Must have at least one step');
            }
        }

        // Form submit - sync TinyMCE
        document.getElementById('projectForm').addEventListener('submit', function() {
            if (tinymce.get('tinymce-overview')) {
                tinymce.get('tinymce-overview').save();
            }
        });

        // Initialize TinyMCE
        document.addEventListener('DOMContentLoaded', function() {
            tinymce.init({
                selector: '#tinymce-overview',
                height: 500,
                menubar: false,
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                    'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'media', 'table', 'help', 'wordcount'
                ],
                toolbar: 'undo redo | blocks | bold italic forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link image | code | help',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
                image_title: true,
                automatic_uploads: false,
                file_picker_types: 'image'
            });
        });
    </script>

    <style>
        .tab-button.active {
            border-bottom-width: 2px;
        }
    </style>
</x-app-layout>
