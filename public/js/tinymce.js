tinymce.init({
    selector: "textarea#tinymce",
    height: 500,
    plugins: [
        "accordion ",
        "importcss searchreplace autosave save",
        "advlist",
        "anchor",
        "autolink",
        "charmap",
        "code",
        "codesample",
        "fullscreen",
        "help",
        "image",

        "link",
        "lists",
        "media",
        "preview",
        "directionality pagebreak nonbreaking quickbars",
        "table",
        "visualblocks",
        "emoticons",
        "insertdatetime",

        "wordcount",
        "visualchars",
    ],
    editimage_cors_hosts: ["picsum.photos"],
    menubar: "file edit view insert format tools table help",
    toolbar:
        "undo redo | accordion accordionremove anchor  | styles | fontfamily fontsize | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link code codesample | emoticons fullscreen image | insertdatetime preview searchreplace | wordcount visualchars | save print | pagebreak codesample | ltr rtl",
    autosave_ask_before_unload: true,
    autosave_interval: "30s",
    autosave_prefix: "{path}{query}-{id}-",
    autosave_restore_when_empty: false,
    autosave_retention: "2m",
    image_advtab: true,
    link_list: [
        {
            title: "My page 1",
            value: "https://www.tiny.cloud",
        },
        {
            title: "My page 2",
            value: "http://www.moxiecode.com",
        },
    ],
    image_list: [
        {
            title: "My page 1",
            value: "https://www.tiny.cloud",
        },
        {
            title: "My page 2",
            value: "http://www.moxiecode.com",
        },
    ],
    image_class_list: [
        {
            title: "None",
            value: "",
        },
        {
            title: "Some class",
            value: "class-name",
        },
    ],
    importcss_append: true,
    toolbar_sticky: true,
    visualchars_default_state: true,
    insertdatetime_timeformat: "%H:%M:%S",
    insertdatetime_element: true,
    lists_indent_on_tab: true,
    image_title: true,
    /* enable automatic uploads of images represented by blob or data URIs*/
    automatic_uploads: true,
    newdocument_content:
        "<details><summary>Accordion summary...</summary><p>Accordion body...</p></details>",
    details_initial_state: "expanded",
    details_serialized_state: "collapsed",
    image_caption: true,
    fullscreen_native: true,
    file_picker_types: "image",
    /* and here's our custom image picker*/
    file_picker_callback: (cb, value, meta) => {
        const input = document.createElement("input");
        input.setAttribute("type", "file");
        input.setAttribute("accept", "image/*");

        input.addEventListener("change", (e) => {
            const file = e.target.files[0];

            const reader = new FileReader();
            reader.addEventListener("load", () => {
                /*
                  Note: Now we need to register the blob in TinyMCEs image blob
                  registry. In the next release this part hopefully won't be
                  necessary, as we are looking to handle it internally.
                */
                const id = "blobid" + new Date().getTime();
                const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                const base64 = reader.result.split(",")[1];
                const blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);

                /* call the callback and populate the Title field with the file name */
                cb(blobInfo.blobUri(), {
                    title: file.name,
                });
            });
            reader.readAsDataURL(file);
        });

        input.click();
    },
    file_picker_types: "file image media",
    images_file_types: "jpg,svg,webp,mp4,webm,ogg", // Add video file types
    // skin_url: "default",
    // content_css: "default",
    noneditable_class: "mceNonEditable",
    toolbar_mode: "sliding",
    contextmenu: "link image table",
    content_style:
        "body { font-family:Helvetica,Arial,sans-serif; font-size:16px }",
});
