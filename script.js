$(document).ready(function() {
    $('#imageFile').on('change', function(event) {
        var file = event.target.files[0];
        if (!file.type.match('image.*')) {
            alert("请选择一个图片文件");
            return;
        }

        var reader = new FileReader();
        reader.onload = function(e) {
            $('#preview').attr('src', e.target.result);
        };
        reader.readAsDataURL(file);
    });
});