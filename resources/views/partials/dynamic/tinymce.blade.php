<script src="/js/tinymce/tinymce.min.js"></script>
<script>
	tinymce.init({
		selector: 'textarea.{{ $component }}',
		plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
        ],
        menubar: false
	});
</script>