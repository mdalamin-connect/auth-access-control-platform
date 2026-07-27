@extends('layout.erp.app')
@section('title', 'Create Project')
@section('style')
<style>
    /* Base Styles */
    .mirsaige-project-container {
        padding: var(--mirsaige-space-md);
        color: var(--mirsaige-white);
        max-width: 100%;
    }

    /* Header Section */
    .mirsaige-project-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: var(--mirsaige-space-sm);
        margin-bottom: var(--mirsaige-space-md);
    }

    /* Breadcrumbs */
    .mirsaige-app-breadcrumbs {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: var(--mirsaige-space-2xs);
        font-size: 0.85rem;
        padding: 10px 0;
        margin: 10px 0;
        color: var(--mirsaige-white);
    }

    .mirsaige-app-breadcrumb {
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-2xs);
    }

    .mirsaige-app-breadcrumb a {
        color: var(--mirsaige-accent);
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: var(--mirsaige-space-3xs);
        padding: var(--mirsaige-space-3xs) var(--mirsaige-space-xs);
        border-radius: 4px;
        background: rgba(255, 178, 62, 0.1);
    }

    .mirsaige-app-breadcrumb a:hover {
        color: var(--mirsaige-gold);
        background: rgba(255, 178, 62, 0.2);
        transform: translateY(-1px);
    }
    
    .mirsaige-app-breadcrumb a.active {
        color: var(--mirsaige-white);
        pointer-events: none;
    }
    
    .mirsaige-app-breadcrumb.divider {
        color: var(--mirsaige-white);
        opacity: 0.7;
    }

    /* Action Button */
    .mirsaige-app-breadcrumbs-btn {
        background: var(--mirsaige-dark-blue);
        color: var(--mirsaige-accent);
        border: 1px solid rgba(255, 178, 62, 0.3);
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-md);
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
        align-self: flex-start; 
        margin-top: 0; 
    }

    .mirsaige-app-breadcrumbs-btn:hover {
        background: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-accent);
    }

    /* Form Container */
    .mirsaige-project-form-container {
        background: var(--mirsaige-dark-blue);
        border-radius: 8px;
        padding: var(--mirsaige-space-md);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(255, 178, 62, 0.1);
        transition: all 0.3s ease;
    }

    .mirsaige-project-form-container:hover {
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        border-color: rgba(255, 178, 62, 0.2);
    }

    /* Form Styles */
    .mirsaige-project-form {
        display: grid;
        gap: var(--mirsaige-space-md);
    }

    .mirsaige-form-group {
        display: grid;
        gap: var(--mirsaige-space-xs);
    }

    .mirsaige-form-label {
        color: var(--mirsaige-accent);
        font-weight: 500;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
    }

    .mirsaige-form-control {
        background: var(--mirsaige-darker-blue);
        border: 1px solid rgba(255, 178, 62, 0.2);
        border-radius: 4px;
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
        color: var(--mirsaige-white);
        transition: all 0.2s ease;
        width: 100%;
    }

    .mirsaige-form-control:focus {
        outline: none;
        border-color: var(--mirsaige-accent);
        box-shadow: 0 0 0 2px rgba(255, 178, 62, 0.2);
    }

    .mirsaige-form-textarea {
        min-height: 300px;
        resize: vertical;
    }

    /* Image Upload Styles */
    .mirsaige-image-upload-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: var(--mirsaige-space-sm);
    }

    .mirsaige-image-preview {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 3px solid var(--mirsaige-accent);
        object-fit: cover;
        background-color: var(--mirsaige-darker-blue);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        position: relative;
    }

    .mirsaige-image-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .mirsaige-image-placeholder {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: var(--mirsaige-white);
        font-size: 0.8rem;
        text-align: center;
        padding: var(--mirsaige-space-sm);
    }

    .mirsaige-image-placeholder i {
        font-size: 2rem;
        margin-bottom: var(--mirsaige-space-xs);
        color: var(--mirsaige-accent);
    }

    .mirsaige-image-upload-btn {
        position: relative;
        color: var(--mirsaige-accent);
        background: var(--mirsaige-dark-blue);
        border: 1px solid rgba(255, 178, 62, 0.3);
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
        border-radius: 4px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: var(--mirsaige-space-xs);
    }

    .mirsaige-image-upload-btn:hover {
        background: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-accent);
    }

    .mirsaige-image-upload-input {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        opacity: 0;
        cursor: pointer;
    }

    /* Form Actions */
    .mirsaige-form-actions {
        display: flex;
        gap: var(--mirsaige-space-sm);
        margin-top: var(--mirsaige-space-md);
    }

    /* Submit Button */
    .mirsaige-form-submit {
        background: var(--mirsaige-accent);
        color: var(--mirsaige-dark);
        border: none;
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-lg);
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: var(--mirsaige-space-xs);
    }

    .mirsaige-form-submit:hover {
        background: var(--mirsaige-gold);
    }

    /* Reset Button */
    .mirsaige-form-reset {
        background: var(--mirsaige-dark-blue);
        color: var(--mirsaige-accent);
        border: 1px solid rgba(255, 178, 62, 0.3);
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-lg);
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: var(--mirsaige-space-xs);
    }

    .mirsaige-form-reset:hover {
        background: rgba(255, 178, 62, 0.1);
    }

    /* Error Messages */
    .mirsaige-error-message {
        color: var(--mirsaige-danger) !important;
        font-size: 0.8rem;
        margin-top: 4px;
        display: block;
    }

    /* Responsive Styles */
    @media (min-width: 768px) {
        .mirsaige-project-form {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .mirsaige-form-group.full-width {
            grid-column: span 2;
        }
        
        .mirsaige-image-upload-container {
            grid-row: span 2;
            align-self: start;
        }
    }

    @media (max-width: 767px) {
        .mirsaige-project-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-app-breadcrumbs {
            font-size: 0.8rem;
        }
        
        .mirsaige-app-breadcrumbs-btn {
            padding: var(--mirsaige-space-xs);
            font-size: 0.75rem;
            margin-top: 10px;
        }
        
        .mirsaige-form-actions {
            flex-direction: column;
        }
    }

    @media (max-width: 575px) {
        .mirsaige-image-preview {
            width: 100px;
            height: 100px;
        }
        
        .mirsaige-app-breadcrumbs {
            font-size: 0.7rem;
        }
    }

    @media (max-width: 430px) {
        .mirsaige-app-breadcrumbs-btn {
            padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
            font-size: 0.75rem;
        }
        
        .mirsaige-app-breadcrumb {
            display: none;
        }

        .mirsaige-form-submit,
        .mirsaige-form-reset {
            width: 100%;
        }
    }

    /* Summernote Custom Styling - Enhanced for White Text */
    .note-editor.note-frame {
        border: 1px solid rgba(255, 178, 62, 0.3) !important;
        background-color: var(--mirsaige-dark-blue) !important;
        border-radius: 8px !important;
                color: var(--mirsaige-white) !important;

    }

    .note-editor.note-frame .note-toolbar {
        background-color: var(--mirsaige-darker-blue) !important;
        border-bottom: 1px solid rgba(255, 178, 62, 0.2) !important;
        border-radius: 8px 8px 0 0 !important;
        padding: 8px 5px !important;
                color: var(--mirsaige-white) !important;

    }

    .note-btn-group .note-btn {
        color: var(--mirsaige-accent) !important;
        background: transparent !important;
        border: 1px solid transparent !important;
        border-radius: 4px !important;
        transition: all 0.2s ease !important;
    }

    .note-btn-group .note-btn:hover {
        background: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-accent);
        border-color: rgba(255, 178, 62, 0.3) !important;
    }

    .note-editor.note-frame .note-editing-area .note-editable {
        color: var(--mirsaige-white) !important;
        background-color: var(--mirsaige-dark-blue) !important;
        padding: 15px !important;
        line-height: 1.6;
    }
    .note-editor.note-frame .note-editing-area .note-editable:hover {
        background: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-accent);
    }

    /* Dropdown Menus */
    .note-dropdown-menu {
        background-color: var(--mirsaige-darker-blue) !important;
        border: 1px solid rgba(255, 178, 62, 0.3) !important;
        color: var(--mirsaige-white) !important;
    }

    .note-dropdown-menu > li > a {
        color: var(--mirsaige-white) !important;
        padding: 8px 15px !important;
    }

    .note-dropdown-menu > li > a:hover {
        background: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-accent);
    }

    /* Style Dropdown Specific Styling */
    .note-style h1, .note-style h2, .note-style h3, 
    .note-style h4, .note-style h5, .note-style h6,
    .note-style p, .note-style pre, .note-style blockquote {
        color: var(--mirsaige-white) !important;
    }

    .note-style h1 {
        font-size: 1.5em !important;
        margin: 0.67em 0 !important;
        font-weight: bold !important;
    }

    .note-style h2 {
        font-size: 1.15em !important;
        margin: 0.75em 0 !important;
        font-weight: bold !important;
    }

    .note-style h3 {
        font-size: 1em !important;
        margin: 0.83em 0 !important;
        font-weight: bold !important;
    }

    .note-style h4 {
        font-size: 0.75em !important;
        margin: 1.12em 0 !important;
        font-weight: bold !important;
    }

    .note-style h5 {
        font-size: 0.65em !important;
        margin: 1.5em 0 !important;
        font-weight: bold !important;
    }

    .note-style h6 {
        font-size: 0.50em !important;
        margin: 1.67em 0 !important;
        font-weight: bold !important;
    }

    /* Font Family Dropdown */
    .dropdown-menu a,
    .note-fontname-btn, .dropdown-menu {
        color: var(--mirsaige-white) !important;
    }
    .note-fontname-btn .dropdown-menu {
        min-width: 180px !important;
        color: var(--mirsaige-white) !important;

    }
    .note-fontname-btn .dropdown-menu:hover {
        background: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-accent);

    }

    .note-fontname-btn .dropdown-menu a {
        font-family: inherit !important;
        color: var(--mirsaige-white) !important;

    }
    .note-fontname-btn .dropdown-menu a:hover {
        font-family: inherit !important;
        background: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-accent);

    }

    /* Font Size Dropdown */
    .note-fontsize-btn .dropdown-menu {
        background-color: var(--mirsaige-darker-blue) !important;
        border: 1px solid rgba(255, 178, 62, 0.3) !important;
        color: var(--mirsaige-white) !important;
        min-width: 80px !important;
    }
    .note-fontsize-btn .dropdown-men:hover {
        background: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-accent);

    }
    .note-fontsize-btn .dropdown-menu a {
        font-size: inherit !important;
        min-width: 80px !important;
    }
    .note-fontsize-btn .dropdown-menu a:hover {
        font-size: inherit !important;
        background: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-accent);
    }

    /* Color Palette */
    .note-color-palette {
        background: var(--mirsaige-darker-blue) !important;
        border: 1px solid rgba(255, 178, 62, 0.3) !important;
        padding: 10px !important;
    }

    .note-color-palette div .note-color-btn {
        border: 1px solid var(--mirsaige-dark-blue) !important;
    }

    /* Modal Dialogs */
    .note-modal-content {
        background-color: var(--mirsaige-dark-blue) !important;
        border: 1px solid rgba(255, 178, 62, 0.3) !important;
        color: var(--mirsaige-white) !important;
    }

    .note-modal .form-control {
        background-color: var(--mirsaige-darker-blue) !important;
        border: 1px solid rgba(255, 178, 62, 0.3) !important;
        color: var(--mirsaige-white) !important;
    }

    /* Placeholder Text */
    .note-placeholder {
        color: rgba(255, 255, 255, 0.3) !important;
    }

    /* Link Dialog */
    .note-link-dialog .note-form-control {
        color: var(--mirsaige-white) !important;
    }

    /* Code View */
    .note-codable {
        background-color: var(--mirsaige-darker-blue) !important;
        color: var(--mirsaige-white) !important;
    }
</style>
@endsection

@section('page')
<div class="mirsaige-project-container">
    <div class="mirsaige-project-header">
        <div>
            <div class="mirsaige-app-breadcrumbs">
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Home</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                   <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('projects.index') }}">Projects</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('projects.create') }}" class="active">Create Project</a>
                </div>
            </div>
        </div>
        
        <a href="{{ route('projects.index') }}" class="mirsaige-app-breadcrumbs-btn">
            <i class="fa-solid fa-list-check"></i> Project List
        </a>
    </div>

    <div class="mirsaige-project-form-container">
        <form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data" class="mirsaige-project-form" id="projectForm">
            @csrf
            <div class="mirsaige-form-group">
                <label for="name" class="mirsaige-form-label">
                    <i class="fa-solid fa-signature"></i>
                    Project Name
                </label>
                <input type="text" class="mirsaige-form-control" name="name" id="name" 
                       placeholder="Enter project name" required value="{{ old('name') }}">
                @error('name')
                    <span class="mirsaige-error-message">{{ $message }}</span>
                @enderror
            </div>
            <!-- Image Upload -->
            <div class="mirsaige-form-group mirsaige-image-upload-container">
                <div class="mirsaige-image-preview" id="imagePreview">
                    <div class="mirsaige-image-placeholder">
                        <i class="fa-solid fa-image"></i>
                        <span>Project Image</span>
                    </div>
                </div>
                <button type="button" class="mirsaige-image-upload-btn" id="uploadBtn">
                    <i class="fa-solid fa-upload"></i> Upload Image
                    <input type="file" name="photo" id="imageUpload" class="mirsaige-image-upload-input" accept="image/*">
                </button>
                @error('photo')
                    <span class="mirsaige-error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <!-- Basic Information -->

            
            <div class="mirsaige-form-group">
                <label for="department_id" class="mirsaige-form-label">
                    <i class="fa-solid fa-building"></i>
                    Department
                </label>
                <select class="mirsaige-form-control" name="department_id" id="department_id" required>
                    <option value="">Select Department</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
                @error('department_id')
                    <span class="mirsaige-error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <!-- Date Information -->
            <div class="mirsaige-form-group">
                <label for="start_date" class="mirsaige-form-label">
                    <i class="fa-solid fa-calendar-day"></i>
                    Start Date
                </label>
                <input type="date" class="mirsaige-form-control" name="start_date" id="start_date" 
                       required value="{{ old('start_date') }}">
                @error('start_date')
                    <span class="mirsaige-error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mirsaige-form-group">
                <label for="end_date" class="mirsaige-form-label">
                    <i class="fa-solid fa-calendar-check"></i>
                    End Date
                </label>
                <input type="date" class="mirsaige-form-control" name="end_date" id="end_date" 
                       value="{{ old('end_date') }}">
                @error('end_date')
                    <span class="mirsaige-error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <!-- Location Information -->
            <div class="mirsaige-form-group">
                <label for="locations" class="mirsaige-form-label">
                    <i class="fa-solid fa-location-dot"></i>
                    Location(s)
                </label>
                <input type="text" class="mirsaige-form-control" name="locations" id="locations" 
                       placeholder="Enter project location(s)" value="{{ old('locations') }}">
                @error('locations')
                    <span class="mirsaige-error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mirsaige-form-group">
                <label for="status" class="mirsaige-form-label">
                    <i class="fa-solid fa-circle-check"></i>
                    Status
                </label>
                <select class="mirsaige-form-control" name="status" id="status" required>
                    <option value="Planning" {{ old('status') == 'Planning' ? 'selected' : '' }}>Planning</option>
                    <option value="In Progress" {{ old('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="On Hold" {{ old('status') == 'On Hold' ? 'selected' : '' }}>On Hold</option>
                    <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Cancelled" {{ old('status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                @error('status')
                    <span class="mirsaige-error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <!-- Rich Text Editor -->
            <div class="mirsaige-form-group full-width">
                <label for="richTextEditor" class="mirsaige-form-label">
                    <i class="fa-solid fa-align-left"></i>
                    Description
                </label>
                <textarea class="mirsaige-form-control mirsaige-form-textarea rich-text-editor" 
                        name="descriptions" 
                        id="richTextEditor" 
                        placeholder="Enter project description">{{ old('descriptions') }}</textarea>
                @error('descriptions')
                    <span class="mirsaige-error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <!-- Form Actions -->
            <div class="mirsaige-form-actions">
                <button type="submit" class="mirsaige-form-submit">
                   <i class="fa-solid fa-floppy-disk"></i> Save Project
                </button>
                <button type="reset" class="mirsaige-form-reset" id="resetFormBtn">
                    <i class="fas fa-undo"></i> Reset Form
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        // Initialize Summernote with all white text and proper styling
        $('.rich-text-editor').summernote({
            height: 480,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['forecolor','backcolor']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            styleTags: [
                'p',
                { title: 'Heading 1', tag: 'h1', className: 'h1', value: 'h1' },
                { title: 'Heading 2', tag: 'h2', className: 'h2', value: 'h2' },
                { title: 'Heading 3', tag: 'h3', className: 'h3', value: 'h3' },
                { title: 'Heading 4', tag: 'h4', className: 'h4', value: 'h4' },
                { title: 'Heading 5', tag: 'h5', className: 'h5', value: 'h5' },
                { title: 'Heading 6', tag: 'h6', className: 'h6', value: 'h6' },
                'pre', 'blockquote'
            ],
            fontNames: ['Arial', 'Arial Black', 'Courier New', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana', 'Roboto', 'Open Sans'],
            fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '22', '24', '28', '32', '36', '48', '72'],
            callbacks: {
                onInit: function() {
                    // Force styling after initialization
                    $('.note-editor').css('background-color', 'var(--mirsaige-dark-blue)');
                    $('.note-editable').css({
                        'background-color': 'var(--mirsaige-dark-blue)',
                        'color': 'var(--mirsaige-white)'
                    });
                    $('.note-toolbar').css('background-color', 'var(--mirsaige-darker-blue)');
                    
                    // Style dropdown items
                    $('.note-style li a').css({'color': 'var(--mirsaige-white)','background-color': 'var(--mirsaige-dark-blue)'});
                    $('.note-fontname li a').css({'color': 'var(--mirsaige-white)','background-color': 'var(--mirsaige-dark-blue)'});
                    $('.note-fontsize li a').css({'color': 'var(--mirsaige-white)','background-color': 'var(--mirsaige-dark-blue)'});
                    $('.note-color li a').css({'color': 'var(--mirsaige-white)','background-color': 'var(--mirsaige-dark-blue)'});
                }
            }
        });

        // Image Preview Functionality
        const imageUpload = document.getElementById('imageUpload');
        const imagePreview = document.getElementById('imagePreview');
        const uploadBtn = document.getElementById('uploadBtn');

        imageUpload.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                if (!file.type.match('image.*')) {
                    alert('Please select an image file');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.innerHTML = `<img src="${e.target.result}" alt="Project Preview" class="img-fluid">`;
                }
                reader.readAsDataURL(file);
            }
        });

        // Trigger file input when button is clicked
        uploadBtn.addEventListener('click', function() {
            imageUpload.click();
        });

        // Date Validation
        const startDate = document.getElementById('start_date');
        const endDate = document.getElementById('end_date');

        startDate.addEventListener('change', validateDates);
        endDate.addEventListener('change', validateDates);

        function validateDates() {
            if (startDate.value && endDate.value) {
                const start = new Date(startDate.value);
                const end = new Date(endDate.value);
                
                if (start > end) {
                    alert('End date must be after start date');
                    endDate.value = '';
                }
            }
        }

        // Form Reset
        document.getElementById('resetFormBtn').addEventListener('click', function() {
            // Reset the image preview
            imagePreview.innerHTML = `
                <div class="mirsaige-image-placeholder">
                    <i class="fa-solid fa-image"></i>
                    <span>Project Image</span>
                </div>
            `;
            
            // Reset Summernote
            $('.rich-text-editor').summernote('reset');
        });

        // Form Submission Validation
        document.getElementById('projectForm').addEventListener('submit', function(e) {
            if (!startDate.value) {
                e.preventDefault();
                alert('Please select a start date');
                startDate.focus();
                return false;
            }
            
            return true;
        });
    });
</script>
@endsection