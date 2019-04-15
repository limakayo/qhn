$(function() {
	$('.delete').on('submit', function() {
		return confirm('Tem certeza que deseja remover? Não poderá ser desfeito');
	});

	$('.summernote').summernote({
    callbacks: {
        onPaste: function (e) {
            var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
            e.preventDefault();
            document.execCommand('insertText', false, bufferText);
        }
    }
	});
});
