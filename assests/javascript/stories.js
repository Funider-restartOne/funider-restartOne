function myFunction() {
    var x = document.getElementById('stories-comment-box');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}

$("i").click(function () {
  $("input[type='file']").trigger('click');
});

$('input[type="file"]').on('change', function() {
  var val = $(this).val();
  $(this).siblings('span').text(val);
})


