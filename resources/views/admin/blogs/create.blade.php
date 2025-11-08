<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create New Blog') }}
            </h2>
            <a href="{{ route('admin.blogs.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                ← Back to Blogs
            </a>
        </div>
    </x-slot>

    {{-- TinyMCE Cloud CDN --}}
    <script src="https://cdn.tiny.cloud/1/sgrz0gpyn1159lugws1kjcka6lqmi221jrtqvt85ildm1rki/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                    <strong class="font-bold">Whoops! Something went wrong.</strong>
                    <ul class="mt-3 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data" id="blogForm">
                @csrf

                <!-- Tab Navigation -->
                <div class="bg-white shadow-sm rounded-lg mb-4">
                    <div class="border-b border-gray-200">
                        <nav class="flex -mb-px">
                            <button type="button" onclick="showTab('basic')" id="tab-basic" class="tab-button active border-b-2 border-blue-500 py-4 px-6 text-sm font-medium text-blue-600">
                                Basic Info
                            </button>
                            <button type="button" onclick="showTab('content')" id="tab-content" class="tab-button border-b-2 border-transparent py-4 px-6 text-sm font-medium text-gray-500 hover:text-gray-700">
                                Content
                            </button>
                            <button type="button" onclick="showTab('seo')" id="tab-seo" class="tab-button border-b-2 border-transparent py-4 px-6 text-sm font-medium text-gray-500 hover:text-gray-700">
                                SEO & Meta
                            </button>
                            <button type="button" onclick="showTab('publish')" id="tab-publish" class="tab-button border-b-2 border-transparent py-4 px-6 text-sm font-medium text-gray-500 hover:text-gray-700">
                                Publish Settings
                            </button>
                        </nav>
                    </div>
                </div>

                <!-- Basic Info Tab -->
                <div id="content-basic" class="tab-content bg-white shadow-sm rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Basic Information</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Title * 
                                <span class="text-blue-600 font-normal text-xs">(Auto-generates unique slug)</span>
                            </label>
                            <input type="text" name="title" id="blog-title" value="{{ old('title') }}" required 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <p class="mt-1 text-xs text-gray-500">SEO best practice: Keep title between 50-60 characters</p>
                            @error('title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Slug 
                                <span class="text-gray-600 font-normal text-xs">(Auto-generated from title)</span>
                            </label>
                            <input type="text" name="slug" id="blog-slug" value="{{ old('slug') }}" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                   placeholder="auto-generated-from-title">
                            <p class="mt-1 text-xs text-gray-500">Leave empty to auto-generate. Example: my-blog-post-title</p>
                            @error('slug') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Category</label>
                                <input type="text" name="category" list="categories" value="{{ old('category') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                       placeholder="e.g., Smart Home, HVAC, Lighting">
                                <datalist id="categories">
                                    @foreach($categories ?? [] as $cat)
                                        <option value="{{ $cat }}">
                                    @endforeach
                                </datalist>
                                <p class="mt-1 text-xs text-gray-500">Type to create new or select existing category</p>
                                @error('category') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tags (comma-separated)</label>
                                <input type="text" name="tags_input" id="tags-input" value="{{ old('tags_input') }}" 
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                       placeholder="e.g., smart home, automation, IoT">
                                <p class="mt-1 text-xs text-gray-500">Separate tags with commas</p>
                            </div>
                        </div>

                        <!-- Blog Categories (Checkboxes) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Blog Categories</label>
                            <div class="border rounded-md p-4 bg-gray-50 max-h-64 overflow-y-auto">
                                @if($blogCategories->count() > 0)
                                    @foreach($blogCategories as $rootCategory)
                                        <div class="mb-3">
                                            <label class="flex items-center font-medium text-gray-700">
                                                <input type="checkbox" name="blog_categories[]" value="{{ $rootCategory->id }}" 
                                                       {{ in_array($rootCategory->id, old('blog_categories', [])) ? 'checked' : '' }}
                                                       class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                                <i class="fas fa-folder ml-2 text-blue-600"></i>
                                                <span class="ml-2">{{ $rootCategory->name }}</span>
                                                @unless($rootCategory->status)
                                                    <span class="ml-2 text-xs uppercase tracking-wide text-gray-500">(Inactive)</span>
                                                @endunless
                                            </label>
                                            @if($rootCategory->children->count() > 0)
                                                <div class="ml-8 mt-2 space-y-2">
                                                    @foreach($rootCategory->children as $child)
                                                        <label class="flex items-center text-gray-600">
                                                            <input type="checkbox" name="blog_categories[]" value="{{ $child->id }}" 
                                                                   {{ in_array($child->id, old('blog_categories', [])) ? 'checked' : '' }}
                                                                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                                            <span class="ml-2">{{ $child->name }}</span>
                                                            @unless($child->status)
                                                                <span class="ml-2 text-xs uppercase tracking-wide text-gray-500">(Inactive)</span>
                                                            @endunless
                                                        </label>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-sm text-gray-500 italic">No blog categories available. <a href="{{ route('admin.blog-categories.create') }}" class="text-blue-600 hover:text-blue-800">Create one</a></p>
                                @endif
                            </div>
                            <p class="mt-1 text-xs text-gray-500">Select one or more categories for this blog post</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Excerpt / Short Description *</label>
                            <textarea name="excerpt" rows="3" required 
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('excerpt') }}</textarea>
                            <p class="mt-1 text-xs text-gray-500">SEO best practice: 150-160 characters for search results</p>
                            @error('excerpt') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Featured Image</label>
                            <input type="file" name="featured_image" id="featured-image" accept="image/*"
                                   class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="mt-1 text-xs text-gray-500">Recommended: 1200x630px for social sharing. Max 2MB.</p>
                            @error('featured_image') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            
                            <!-- Image Preview -->
                            <div id="image-preview" class="mt-3 hidden">
                                <img src="" alt="Preview" class="h-40 rounded border">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Tab -->
                <div id="content-content" class="tab-content hidden bg-white shadow-sm rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Blog Content</h3>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Full Content *</label>
                        <textarea id="tinymce-content" name="content" rows="15" required 
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('content') }}</textarea>
                        <p class="mt-1 text-xs text-gray-500">Use headings (H2, H3), paragraphs, lists, images, and links for better SEO and readability.</p>
                        @error('content') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- SEO & Meta Tab -->
                <div id="content-seo" class="tab-content hidden bg-white shadow-sm rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">SEO & Meta Tags</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Meta Title</label>
                            <input type="text" name="meta_title" id="meta-title" value="{{ old('meta_title') }}" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                   placeholder="Leave empty to use blog title">
                            <p class="mt-1 text-xs text-gray-500">SEO best practice: 50-60 characters. Leave empty to auto-fill from title.</p>
                            @error('meta_title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Meta Description</label>
                            <textarea name="meta_description" rows="3" 
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                                      placeholder="Leave empty to use excerpt">{{ old('meta_description') }}</textarea>
                            <p class="mt-1 text-xs text-gray-500">SEO best practice: 150-160 characters. Leave empty to auto-fill from excerpt.</p>
                            @error('meta_description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Meta Keywords (comma-separated)</label>
                            <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                   placeholder="e.g., smart home, automation, IoT">
                            <p class="mt-1 text-xs text-gray-500">5-10 relevant keywords for SEO</p>
                            @error('meta_keywords') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Canonical URL</label>
                            <input type="url" name="canonical_url" value="{{ old('canonical_url') }}" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                   placeholder="https://example.com/blog/post-slug">
                            <p class="mt-1 text-xs text-gray-500">Leave empty to auto-generate from blog URL</p>
                            @error('canonical_url') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="flex items-center">
                                <input type="checkbox" name="indexable" value="1" checked 
                                       class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-700">Allow search engines to index this blog post</span>
                            </label>
                            <p class="mt-1 text-xs text-gray-500 ml-6">Uncheck to add "noindex, nofollow" meta tag</p>
                        </div>
                    </div>
                </div>

                <!-- Publish Settings Tab -->
                <div id="content-publish" class="tab-content hidden bg-white shadow-sm rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Publish Settings</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="flex items-center">
                                <input type="checkbox" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-500 focus:ring-green-500">
                                <span class="ml-2 text-sm font-medium text-gray-700">Publish this blog post</span>
                            </label>
                            <p class="mt-1 text-xs text-gray-500 ml-6">Uncheck to save as draft</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Publish Date & Time</label>
                            <input type="datetime-local" name="published_at" value="{{ old('published_at') }}" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <p class="mt-1 text-xs text-gray-500">Leave empty to use current date/time when publishing</p>
                            @error('published_at') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="bg-white shadow-sm rounded-lg p-6 mt-4">
                    <div class="flex justify-between items-center">
                        <a href="{{ route('admin.blogs.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400">
                            Cancel
                        </a>
                        <div class="flex gap-3">
                            <button type="submit" name="action" value="draft" class="inline-flex items-center px-6 py-3 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                                </svg>
                                Save as Draft
                            </button>
                            <button type="submit" name="action" value="publish" class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Create Blog Post
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Tab switching
        function showTab(tabName) {
            // Hide all tabs
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.add('hidden');
            });
            
            // Remove active state from all buttons
            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('active', 'border-blue-500', 'text-blue-600');
                btn.classList.add('border-transparent', 'text-gray-500');
            });
            
            // Show selected tab
            document.getElementById('content-' + tabName).classList.remove('hidden');
            
            // Add active state to clicked button
            const activeBtn = document.getElementById('tab-' + tabName);
            activeBtn.classList.add('active', 'border-blue-500', 'text-blue-600');
            activeBtn.classList.remove('border-transparent', 'text-gray-500');
        }

        // Vietnamese to ASCII conversion map
        function vietnameseToSlug(str) {
            const from = "àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ";
            const to   = "aaaaaaaaaaaaaaaaaeeeeeeeeeeeiiiiiooooooooooooooooouuuuuuuuuuuyyyyyd";
            
            for (let i = 0; i < from.length; i++) {
                str = str.replace(new RegExp(from[i], 'gi'), to[i]);
            }
            
            return str.toLowerCase()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/^-+|-+$/g, '');
        }

        // Auto-generate slug from title
        document.getElementById('blog-title').addEventListener('input', function() {
            const title = this.value;
            const slug = vietnameseToSlug(title);
            document.getElementById('blog-slug').value = slug;
        });

        // Image preview
        document.getElementById('featured-image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('image-preview');
                    preview.querySelector('img').src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });

        // Tags input to array
        document.querySelector('form').addEventListener('submit', function(e) {
            console.log('Form submitting...');
            
            // Get the clicked button's action value
            const submitter = e.submitter;
            if (submitter) {
                console.log('Submit button:', submitter.name, '=', submitter.value);
            }
            
            // Sync TinyMCE content to textarea before submit
            if (tinymce.get('tinymce-content')) {
                tinymce.get('tinymce-content').save();
                console.log('TinyMCE content saved');
            }
            
            const tagsInput = document.getElementById('tags-input').value;
            if (tagsInput) {
                const tagsArray = tagsInput.split(',').map(tag => tag.trim()).filter(tag => tag);
                
                // Create hidden inputs for each tag
                tagsArray.forEach((tag, index) => {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = `tags[${index}]`;
                    input.value = tag;
                    this.appendChild(input);
                });
                console.log('Tags added:', tagsArray);
            }
            
            console.log('Form is submitting to:', this.action);
            // Allow the form to submit
            return true;
        });

        // Initialize TinyMCE
        document.addEventListener('DOMContentLoaded', function() {
            tinymce.init({
                selector: '#tinymce-content',
                height: 500,
                menubar: false,
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                    'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
                ],
                toolbar: 'undo redo | blocks | ' +
                    'bold italic forecolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | link image | code | help',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
                image_title: true,
                automatic_uploads: true,
                file_picker_types: 'image',
                images_upload_url: '{{ route('admin.blogs.upload-image') }}',
                images_upload_handler: function (blobInfo, progress) {
                    return new Promise(function(resolve, reject) {
                        var xhr = new XMLHttpRequest();
                        xhr.withCredentials = false;
                        xhr.open('POST', '{{ route('admin.blogs.upload-image') }}');
                        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                        
                        xhr.upload.onprogress = function (e) {
                            progress(e.loaded / e.total * 100);
                        };
                        
                        xhr.onload = function() {
                            if (xhr.status === 403) {
                                reject({ message: 'HTTP Error: ' + xhr.status, remove: true });
                                return;
                            }
                            
                            if (xhr.status < 200 || xhr.status >= 300) {
                                reject('HTTP Error: ' + xhr.status);
                                return;
                            }
                            
                            var json = JSON.parse(xhr.responseText);
                            
                            if (!json || typeof json.location != 'string') {
                                reject('Invalid JSON: ' + xhr.responseText);
                                return;
                            }
                            
                            resolve(json.location);
                        };
                        
                        xhr.onerror = function () {
                            reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
                        };
                        
                        var formData = new FormData();
                        formData.append('file', blobInfo.blob(), blobInfo.filename());
                        
                        xhr.send(formData);
                    });
                },
                setup: function(editor) {
                    editor.on('init', function() {
                        console.log('TinyMCE initialized successfully');
                    });
                }
            });
        });
    </script>

    <style>
        .tab-button.active {
            border-bottom-width: 2px;
        }
    </style>
</x-app-layout>
