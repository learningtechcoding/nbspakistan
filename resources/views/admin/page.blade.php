@extends('admin.app')

@section('content')
<div class="admin-container">
    <h2 class="text-center text-capitalize mb-4 mt-3">{{$name}} Us</h2>
    <form id="main-form" action="/admin/{{$name}}" method="POST">
        @method('PUT')

        @csrf
        <div>
            <textarea id="editor" name="{{$name}}" class="editor"></textarea>
        </div>

    </form>
    <div class="d-flex justify-content-center mt-4 mb-5">
        <button id="save-form-btn" class="btn btn-lg btn-success">Update</button>
    </div>
</div>

<script>
    window.editorData = new String(`{!! $data !!}`);
</script>

<style>
    @font-face {
        font-family: Nastaleeq;
        src: url('/fonts/JameelNooriNastaleeqKasheeda.woff2') format('woff2'),
            url('/fonts/JameelNooriNastaleeqKasheeda.woff') format('woff');
    }
</style>

<script>
    const mainForm = document.getElementById("main-form");
    const saveBtn = document.getElementById("save-form-btn");
    saveBtn.addEventListener("click", e => {
        tinymce.activeEditor.uploadImages(function (success) {
            mainForm.submit();
        });
    })
</script>

<script src="/js/admin/tiny.js"></script>
<script>
    var useDarkMode = window.matchMedia("(prefers-color-scheme: dark)").matches;

    window.tinymce.init({
        selector: "textarea#editor",
        images_upload_handler: function (blobInfo, success, failure, progress) {
            var xhr, formData;
            xhr = new XMLHttpRequest();
            let token = document.querySelector('meta[name="csrf-token"]').content;
            xhr.withCredentials = false;
            xhr.open('POST', '/site/upload-images');
            xhr.upload.onprogress = function (e) {
                progress(e.loaded / e.total * 100);
            };
            xhr.setRequestHeader('X-CSRF-TOKEN', token);
            xhr.onload = function() {
                var json;
                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                success(json.location);
            };
            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);
        },
        plugins:
            "print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons",
        imagetools_cors_hosts: ["picsum.photos"],
        images_upload_url: "/site/upload-images",
        menubar: "file edit view insert format tools table help",
        toolbar:
            "undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl",
        toolbar_sticky: true,
        convert_urls: false,
        autosave_ask_before_unload: true,
        autosave_interval: "30s",
        autosave_prefix: "{path}{query}-{id}-",
        autosave_restore_when_empty: false,
        autosave_retention: "2m",
        image_advtab: true,
        automatic_uploads: false,
        font_formats: "Nunito=Nunito, sans-serif; Rubik=Rubik, sans-serif; Urdu Type=Nastaleeq;",
        fontsize_formats:"8px 9px 10px 11px 12px 14px 18px 24px 30px 36px 48px 60px 72px 96px",
        link_list: [
            { title: "My page 1", value: "https://www.tiny.cloud" },
            { title: "My page 2", value: "http://www.moxiecode.com" },
        ],
        image_list: [
            { title: "My page 1", value: "https://www.tiny.cloud" },
            { title: "My page 2", value: "http://www.moxiecode.com" },
        ],
        image_class_list: [
            { title: "None", value: "" },
            { title: "Some class", value: "class-name" },
        ],
        importcss_append: true,
        file_picker_callback: function (callback, value, meta) {
            /* Provide file and text for the link dialog */
            if (meta.filetype === "file") {
                callback("https://www.google.com/logos/google.jpg", {
                    text: "My text",
                });
            }

            /* Provide image and alt text for the image dialog */
            if (meta.filetype === "image") {
                callback("https://www.google.com/logos/google.jpg", {
                    alt: "My alt text",
                });
            }

            /* Provide alternative source and posted for the media dialog */
            if (meta.filetype === "media") {
                callback("movie.mp4", {
                    source2: "alt.ogg",
                    poster: "https://www.google.com/logos/google.jpg",
                });
            }
        },
        setup: function(editor) {
            editor.on('init', function(e) {
                if(window.editorData){
                    editor.setContent(editorData);
                }
            });
            editor.on('NodeChange', function (e) {
                if(e.element.tagName === "IMG" || e.element.tagName === "img"){
                    e.element.setAttribute("data-width", e.element.width);
                }
            });
        },
        templates: [
            {
                title: "New Table",
                description: "creates a new table",
                content:
                    '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>',
            },
            {
                title: "Starting my story",
                description: "A cure for writers block",
                content: "Once upon a time...",
            },
            {
                title: "New list with dates",
                description: "New List with dates",
                content:
                    '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>',
            },
        ],
        template_cdate_format: "[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]",
        template_mdate_format: "[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]",
        height: 600,
        image_caption: true,
        quickbars_selection_toolbar:
            "bold italic | quicklink h2 h3 blockquote quickimage quicktable",
        noneditable_noneditable_class: "mceNonEditable",
        toolbar_mode: "sliding",
        contextmenu: "link image imagetools table",
        skin: useDarkMode ? "oxide-dark" : "oxide",
        content_css: '/css/admin/tinymce.css',
    });
</script>
@endsection

