CKEDITOR.replace('ckeditor', {
    height: '40vh',
    toolbar: 'Custom', //makes all editors use this toolbar
    toolbarStartupExpanded: false,
    toolbarCanCollapse: false,
    toolbar_Custom: [{
            name: 'document',
            groups: ['mode', 'document', 'doctools']
        },
        {
            name: 'clipboard',
            groups: ['clipboard', 'undo'],
            items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']
        },
        {
            name: 'editing',
            groups: ['find', 'selection', 'spellchecker'],
            items: ['Find', 'Replace', '-', 'SelectAll', '-']
        },
        {
            name: 'basicstyles',
            groups: ['basicstyles', 'cleanup'],
            items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-',
                'CopyFormatting', 'RemoveFormat'
            ]
        },
        {
            name: 'paragraph',
            groups: ['list', 'blocks'],
            items: ['NumberedList', 'BulletedList', '-', 'Blockquote'
            ]
        },
        {
            name: 'links',
            items: ['Link', 'Unlink']
        },
        // {
        //     name: 'insert',
        //     items: ['Table', 'HorizontalRule', 'Smiley', 'SpecialChar']
        // },
        {
            name: 'styles',
            items: ['Format', 'Font', 'FontSize']
        },
        {
            name: 'colors',
            items: ['TextColor', 'BGColor']
        },
        {
            name: 'others',
            items: ['-']
        },
    ] //define an empty array or whatever buttons you want.
});