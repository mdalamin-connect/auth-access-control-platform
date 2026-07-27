
document.addEventListener('DOMContentLoaded', function() {
   // Initialize Summernote with proper configuration
$('.rich-text-editor').summernote({
    height: 300,
    minHeight: 200,
    maxHeight: 500,
    focus: true,
    dialogsInBody: true,
    followingToolbar: true,
    fontNames: [
        'Arial', 'Arial Black', 'Comic Sans MS', 'Courier New',
        'Helvetica Neue', 'Impact', 'Lucida Grande',
        'Tahoma', 'Times New Roman', 'Verdana', 'Roboto',
        'Open Sans', 'Noto Sans', 'Poppins', 'DM Sans'
    ],
    fontNamesIgnoreCheck: ['Arial', 'Arial Black', 'Comic Sans MS'],
    fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '24', '36'],
    lineHeights: ['1.0', '1.2', '1.4', '1.5', '1.6', '1.8', '2.0', '3.0'],
    colors: [
        ['#000000', '#424242', '#636363', '#9C9C94', '#CEC6CE', '#EFEFEF', '#F7F7F7', '#FFFFFF'],
        ['#FF0000', '#FF9C00', '#FFFF00', '#00FF00', '#00FFFF', '#0000FF', '#9C00FF', '#FF00FF'],
        ['#F7C6CE', '#FFE7CE', '#FFEFC6', '#D6EFD6', '#CEDEE7', '#CEE7F7', '#D6D6E7', '#E7D6DE'],
        ['#E79C9C', '#FFC69C', '#FFE79C', '#B5D6A5', '#A5C6CE', '#9CC6EF', '#B5A5D6', '#D6A5BD'],
        ['#E76363', '#F7AD6B', '#FFD663', '#94BD7B', '#73A5AD', '#6BADDE', '#8C7BC6', '#C67BA5'],
        ['#CE0000', '#E79439', '#EFC631', '#6BA54A', '#4A7B8C', '#3984C6', '#634AA5', '#A54A7B'],
        ['#9C0000', '#B56308', '#BD9400', '#397B21', '#104A5A', '#085294', '#311873', '#731842'],
        ['#630000', '#7B3900', '#846300', '#295218', '#083139', '#003163', '#21104A', '#4A1031']
    ],
    toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'clear', 'strikethrough', 'superscript', 'subscript']],
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph', 'height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video', 'hr']],
        ['view', ['fullscreen', 'codeview', 'help']]
    ],
    styleTags: [
        'p',
        { title: 'Blockquote', tag: 'blockquote', className: 'blockquote', value: 'blockquote' },
        'pre',
        'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
    ],
    callbacks: {
        onInit: function() {
            // Force the dropdowns to appear on top of everything
            $('.note-dropdown-menu').css('z-index', 9999);
        }
    }
});
// Fix Summernote dropdowns in modals
$(document).on('shown.bs.modal', '.modal', function() {
    $('.note-editor.note-frame').css('z-index', 'auto');
    $('.note-popover, .note-modal').css('z-index', '1060');
});
// Function to handle image uploads
function uploadImage(file, editor) {
    const formData = new FormData();
    formData.append("file", file);
    
    $.ajax({
        url: "/upload-image", // Your upload endpoint
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        type: "POST",
        success: function(data) {
            if(data.url) {
                editor.summernote('insertImage', data.url);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Image upload failed:", textStatus, errorThrown);
        }
    });
}
});
